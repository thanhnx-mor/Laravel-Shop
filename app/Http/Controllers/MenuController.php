<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use App\Components\MenuRecusive;

class MenuController extends Controller
{
    private $menuRecursive;
    private $menu;
    public function __construct(Menu $menu)
    {
        $this->menuRecursive = new MenuRecusive();
        $this->menu = $menu;
    }

    public function index()
    {
        $menus = $this->menu->latest()->paginate(10);
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        $menus = $this->getMenuRecusive();
        return view('menus.add', compact('menus'));
    }

    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);
        return redirect()->route('menus.add');
    }

    public function edit($id)
    {
        return $id;
    }

    public function update($id)
    {
        return $id;
    }

    public function delete($id)
    {
        return $id;
    }

    function getMenuRecusive()
    {
        return $this->menuRecursive->menuRecursiveAdd();
    }
}
