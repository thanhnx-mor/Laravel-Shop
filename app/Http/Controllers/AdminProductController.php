<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;

class AdminProductController extends Controller
{
    private $categories;
    public function __construct(Category $category)
    {
        $this->categories = new CategoryController($category);
    }

    public function index()
    {
        return view('admin.product.index');
    }

    public function store(Request $request)
    {
       $fileName = $request->feature_image_path->getClientOriginalName();
       $path = $request->file('feature_image_path')->storeAs('public/product', $fileName);
    }
    public function edit()
    {

    }

    public function delete()
    {

    }

    public function create()
    {
        $htmlOptions = $this->categories->getCategory();
        return view('admin.product.add', compact('htmlOptions'));
    }
}
