<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $title = 'Category';
        return view('category.index', compact('title', 'categories'));
    }

    public function createCategory(Request $request)
    {
        Category::updateOrCreate($request->all());
        return redirect()->back()->with('success', 'Category has been saved!');
    }

    public function editCategory($id)
    {
        return response()->json(Category::find($id));
    }

    public function deleteCategory($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('success', 'Category has been deleted!');
    }
}
