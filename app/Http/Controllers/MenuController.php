<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use App\Components\MenuRecusive;
use App\Components\Recursive;


class MenuController extends Controller
{
    private $menuRecursive;
    private $menu;
    private $htmlOptions;
    public function __construct(Menu $menu)
    {
        $this->menuRecursive = new MenuRecusive();
        $this->menu = $menu;
        $this->htmlOptions = '';
    }

    public function index()
    {
        $menus = $this->menu->paginate(10);
        return view('admin/menus.index', compact('menus'));
    }

    public function create()
    {
        $menus = $this->getMenuRecusive();
        return view('admin/menus.add', compact('menus'));
    }

    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name)
        ]);
        return redirect()->route('menu.create');
    }

    public function edit($id)
    {
        $menu = $this->menu->find($id);
        $htmlOptions = $this->getMenus($menu->parent_id);
        return view('admin/menus.edit', compact('menu', 'htmlOptions'));
    }

    public function update($id, Request $request)
    {
        $menus = $this->menu->paginate(10);
        $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name)
        ]);
        return redirect(route('menu.index'));
    }

    public function delete($id)
    {
        $this->menu::where('id', $id)->delete();
        return redirect(route('admin/menu.index'));
    }

    function getMenuRecusive()
    {
        return $this->menuRecursive->menuRecursiveAdd();
    }

    public function getMenus($parentId = '')
    {
        $listMenu = $this->menu->all();
        $recursive = new Recursive($listMenu);
        $htmlOptions = $recursive->categoryRecursive($parentId);
        return $htmlOptions;
    }
}
