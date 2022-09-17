<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use App\Models\Subcategories;
use App\Models\Subsubcategories;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ProductAdd() // сторінка додавання продуктів
    {
        $categories = Category::all();
        return view('product.product_add', compact('categories'));
    }//End Method

    public function ProductStore(Request $request) // додавання нового продукту
    {
        $validateDate = $request->validate([
            'product_name' => 'required|max:100|min:1',
            'product_count' => 'required',
            'product_price' => 'required',
            'product_description' => 'required|min:1',
            'product_character' => 'required|min:1',
            'subsubcategory' => 'required',
        ]);
        $product = new Products();
        $product->product_name = $request->input('product_name');
        $product->product_count = $request->input('product_count');
        $product->product_price = $request->input('product_price');
        $product->product_description = $request->input('product_description');
        $product->product_character = $request->input('product_character');
        $product->subsubcategory_id = $request->input('subsubcategory');
        if ($request->file('product_image')) {
            $file = $request->file('product_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/product_images'), $filename);
            $product['product_image'] = $filename;
        }
        $notification = array(
            'message' => 'Product Added Successfully',
            'alert-type' => 'success');
        $product->save();
        return redirect()->route('product.add')->with($notification);
    }//End Method

    public function SubCategoryStore(Request $request)
    {
        if ($request->ajax()) {
            $subcategories = Subcategories::all()->where('category_id', $request->category_id);
            $data = view('product.subcategory', ['subcategories' => $subcategories])->render();
            return response()->json(['options' => $data]);
        }
        return null;
    }//End Method

    public function SubSubCategoryStore(Request $request)
    {
        if ($request->ajax()) {
            $subsubcategories = Subsubcategories::all()->where('subcategory_id', $request->subcategory_id);
            $data = view('product.subsubcategory', ['subsubcategories' => $subsubcategories])->render();
            return response()->json(['options' => $data]);
        }
        return null;
    }//End Method

}
