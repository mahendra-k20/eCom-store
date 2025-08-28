<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function category()
    {
        return view('admin.category');
    }

    public function add_categroy(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();

        return redirect()->back();
    }
}
