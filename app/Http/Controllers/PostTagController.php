<?php

namespace App\Http\Controllers;

use App\Models\PostTag;

use Illuminate\Http\Request;

class PostTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tag_name' => 'required',
        ]);

        $tag = new PostTag([
            'tag_name' => $request->input('tag_name'),
        ]);

        $tag->save();

        return response()->json(['success' => true], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(PostTag $postTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostTag $postTag)
    {
        return json_encode($postTag);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostTag $postTag)
    {
        $postTag->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostTag $postTag)
    {
        $postTag->delete();
    }
}
