<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
}
