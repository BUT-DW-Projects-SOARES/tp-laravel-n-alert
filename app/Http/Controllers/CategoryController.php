<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index', ['categories' => Category::all()]);
    }

    public function show(Category $category)
    {
        return view('category.show', ['category' => $category]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $category = new Category();
        $category->label = $data['label'];
        $category->save();
        return redirect()->route('category.index');
    }
}
