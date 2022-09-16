<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use App\Models\Subcategories;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ProductAdd() // сторінка додавання продуктів
    {
        $categories = Category::all();
        return view('product.product_add', compact('categories'));
    }

    //End Method
    public function ProductStore(Request $request) // додавання нового продукту
    {
        $product = new Products();
        $product->product_name = $request->input('product_name');
        $product->product_count = $request->input('product_count');
        $product->product_price = $request->input('product_price');
        $product->product_description = $request->input('product_description');
        $product->product_character = $request->input('product_character');
        $product->subsubcategory_id = 1;
        if ($request->file('product_image')) {
            $file = $request->file('product_image');

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/product_images'), $filename);
            $product['product_image'] = $filename;
        }

        if ($request->ajax()) {
            $subcategories = Subcategories::all()->where('category_id', $request->category_id);
            $data = view('product.subcategory', ['subcategories' => $subcategories])->render();
            return response()->json(['options' => $data]);
        }

        $product->save();

        return redirect()->route('home');
    }
    //End Method

}
