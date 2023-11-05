<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function blog_api()
    {
        $posts = BlogPost::all();
        return json_encode($posts);
    }

    public function index()
    {
        $posts = BlogPost::all();
        return view('admin.layouts.blog.list', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = PostCategory::all();
        return view('admin.layouts.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // return $request->all();
        $request->validate([
            'post_title' => 'required',
        ]);

        $imageName = '';
        if ($request->hasFile('post_banner')) {
            $image = $request->file('post_banner');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/images/blog/', $imageName);
        }

        $post = BlogPost::create([
            'post_title' => $request->post_title,
            'post_slug' => Str::slug($request->post_title),
            'post_banner' => $imageName,
            'post_desc' => $request->post_desc,
            'meta_title' => $request->meta_title,
            'meta_tag' => $request->meta_tag,
            'meta_desc' => $request->meta_desc,
            'post_category_id' => $request->post_category_id,
            // 'post_status'=>$request->post_status
        ]);

        // if ($request->has('tags')) {
        //     $post->tags()->attach($request->tags);
        // }

        return redirect()->route('blog.list')->with('success', 'blog create successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show_user(BlogPost $blogPost)
    {
        return json_encode($blogPost);
    }

    public function show(BlogPost $blogPost)
    {
        return view('admin.layouts.blog.detail',compact('blogPost'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blogPost)
    {
        $categories = PostCategory::all();
        return view('admin.layouts.blog.edit', compact('blogPost', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $imageName = '';
        $deleteOldImage = "uploads/images/blog/{$blogPost->post_banner}";
        if ($image = $request->file('post_banner')) {
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage);
            }

            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/images/blog/', $imageName);
        } else {
            $imageName = $blogPost->post_banner;
        }

        $blogPost->update([
            'post_title' => $request->post_title,
            'post_slug' => Str::slug($request->post_title),
            'post_banner' => $imageName,
            'post_desc' => $request->post_desc,
            'post_category_id' => $request->post_category_id,
            // 'post_status'=>$request->post_status
        ]);

        // if ($request->has('tags')) {
        //     $blogPost->tags()->attach($request->tags);
        // }

        return redirect()->route('blog.list')->with('success', 'blog update successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
    }
}
