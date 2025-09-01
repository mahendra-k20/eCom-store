<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function category()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    public function add_categroy(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->back();
    }

    public function edit_category($id)
    {
        $id = base64_decode($id);
        $category = Category::find($id);
        return view('admin.edit-category', compact('category'));
    }

    public function update_category(Request $request, $id)
    {
        $id = base64_decode($id);
        $category = Category::find($id);
        $category->category_name = $request->category;
        $category->save();

        return redirect()->route('admin.category');
    }

    public function add_product()
    {
        $categories = category::all();
        return view('admin.add_product', compact('categories'));
    }

    public function upload_product(Request $request)
    {
        $product = New Product;
        $product->title = $request->product_title;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->quantity = $request->product_quantity;
        $product->category = $request->product_category;
        $image = $request->product_image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->product_image->move('products', $imagename);
            $product->image = $imagename;
        }
        $product->save();
        return redirect()->back();
    }

    public function view_product()
    {
        $product = Product::paginate(10);
        return view('admin.view_product', compact('product'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);
        $image_path = public_path('products/' . $product->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $product->delete();

        return redirect()->back();
    }
}
