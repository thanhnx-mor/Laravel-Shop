<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Components\Recursive;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->latest()->paginate(5);
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        $htmlOptions = $this->getCategory();
        return view('category.add', compact('htmlOptions'));
    }

    public function store(Request $request)
    {
        $this->category->create(
            [
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'slug' => str_slug($request->name)
            ]
        );
        return redirect(route('categories.create'));
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOptions = $this->getCategory($category->parent_id);
        return view('category.edit', compact('category', 'htmlOptions'));
    }

    public function update($id, Request $request)
    {
       $this->category->find($id)->update([
           'name' => $request->name,
           'parent_id' => $request->parent_id,
           'slug' => str_slug($request->name)
       ]);
       return redirect(route('categories.index'));
    }

    public function delete($id)
    {
        $this->category::where('id', $id)->delete();
        return redirect(route('categories.index'));
    }

    public function getCategory($parentId = '')
    {
        $listCategory = $this->category->all();
        $recursive = new Recursive($listCategory);
        $htmlOptions = $recursive->categoryRecursive($parentId);
        return $htmlOptions;
    }
}
