<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = BlogPost::all();
        return json_encode($posts);
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
            'post_title'=>'required'
        ]);

        $imageName = '';
        if ($request->hasFile('post_banner')) {
            $image = $request->file('post_banner');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/blog/images/', $imageName);
        }

        $post = BlogPost::create([
            'post_title'=>$request->post_title,
            'post_slug'=>Str::slug($request->post_title),
            'post_banner'=>$imageName,
            'post_desc'=>$request->post_desc,
            'post_category_id'=>$request->post_category_id,
            'post_status'=>$request->post_status
        ]);

        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        return response()->json(['success' => true], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost)
    {
        return json_encode($blogPost);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blogPost)
    {
        return json_encode($blogPost);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $imageName = '';
        $deleteOldImage = "public/blog/images/{$blogPost->post_banner}";
        if ($image = $request->file('post_banner')) {
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage);
            }

            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/blog/images/', $imageName);
        } else {
            $imageName = $blogPost->post_banner;
        }

        $blogPost->update([
            'post_title'=>$request->post_title,
            'post_slug'=>Str::slug($request->post_title),
            'post_banner'=>$imageName,
            'post_desc'=>$request->post_desc,
            'post_category_id'=>$request->post_category_id,
            'post_status'=>$request->post_status
        ]);

        if ($request->has('tags')) {
            $blogPost->tags()->attach($request->tags);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
    }
}
