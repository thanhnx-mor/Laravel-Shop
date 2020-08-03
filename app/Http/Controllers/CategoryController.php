<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $htmlSelect;
    public function __construct()
    {
        $this->htmlSelect = '';
    }

    public function index() {
        return view('category.index');
    }
    public function create() {
        $rawData = Category::all();
        $htmlOptions = $this->categoryRecursive(0);
        return view('category.add', compact('htmlOptions'));
    }
    function categoryRecursive($id, $text = '') {
        $rawData = Category::all();
        foreach ($rawData as $data) {
            if ( $data['parent_id'] == $id ) {
                $this->htmlSelect .= "<option value=".$data['id'].">".$text.$data['id'] . "</option>";
                $this->categoryRecursive($data['id'], '-');
            }
        }
        return $this->htmlSelect;
    }
}
