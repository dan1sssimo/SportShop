<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        $subcategories = SubCategory::all()->where("category_id", $id);
        $category_name = Category::all()->where("category_id", $id)->value("category_name");
        return view('subcategories_grid', compact("subcategories"), ["category_name" =>$category_name]);
    }

    public function index()
    {
        $categories = Category::all();
        return view('categories_grid', compact("categories"));
    }
}
