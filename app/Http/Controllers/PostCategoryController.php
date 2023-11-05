<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=PostCategory::all();
        return view('admin.layouts.category.list',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);

        $category = new PostCategory([
            'category_name' => $request->input('category_name'),
            'category_slug' => Str::slug($request->input('category_name')),
            'category_meta_title' => $request->input('category_meta_title'),
            'category_meta_tag' => $request->input('category_meta_tag'),
            'category_meta_desc' => $request->input('category_meta_desc'),
        ]);

        $category->save();

        return response()->json(['success' => true], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(PostCategory $postCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostCategory $category)
    {
        // return $category;
        return view('admin.layouts.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostCategory $category)
    {
        $category->update($request->all());

        return redirect()->route('post.category.list')->with('success','category update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostCategory $category)
    {
        $category->delete();
    }
}
