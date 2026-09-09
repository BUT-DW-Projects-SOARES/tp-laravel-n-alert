<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
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

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $category = new Category();
        $category->fill($data);
        $category->save();
        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->fill($data);
        $category->save();
        return redirect()->route('category.show', ['category' => $category]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
