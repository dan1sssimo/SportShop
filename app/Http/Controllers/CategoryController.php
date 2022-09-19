<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategories;
use App\Models\Subsubcategories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show_subcategory($id)
    {
        $subcategories = Subcategories::all()->where("category_id", $id);
        $category_name = Category::all()->where("category_id", $id)->value("category_name");
        return view('subcategories_grid', compact("subcategories"), ["category_name" =>$category_name]);
    }

    public function show_subsubcategory($id)
    {
        $subsubcategories = Subsubcategories::all()->where("subcategory_id", $id);
        $subcategory_name = Subcategories::all()->where("subcategory_id", $id)->value("subcategory_name");
        return view('subsubcategories_grid', compact("subsubcategories"), ["subcategory_name" =>$subcategory_name]);
    }

    public function index()
    {
        $categories = Category::all();
        return view('categories_grid', compact("categories"));
    }
}
