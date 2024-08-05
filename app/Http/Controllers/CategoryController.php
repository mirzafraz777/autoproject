<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::all();
        return view('admin.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "category_name" => 'required|max:255|unique:categories,category_name',
        ]);
        $category = new category();
        $category->category_name = $request->category_name;
        $category->save();
        return redirect()->route('category.index')->with('message', 'Category Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view('admin.edit-category',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $request->validate([
            "category_name" => 'required|max:255|unique:categories,category_name',
        ]);
        $category->category_name = $request->category_name;
        $category->save();
        return redirect()->route('category.index')->with('message', 'Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = category::find($id);
        if($category){
            $category->delete();
            return redirect()->route('category.index')->with('message','Category Deleted Successfully.');
        }
    }
}
