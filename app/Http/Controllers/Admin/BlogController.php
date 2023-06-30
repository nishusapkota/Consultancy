<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'body' => 'required',
            'extra' => 'required',
            'status' => 'nullable|boolean'
        ]);
        $slug = Str::slug($request->title);
        $counter = 1;
        while (Blog::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->title) . '-' . $counter;
            $counter++;
        }
        Blog::create([
            'title' => $request->title,
            'slug' => $slug,
            'short_description' => $request->short_description,
            'body' => $request->body,
            'extra' => $request->extra,
            'status' => $request->status ? 1 : 0
        ]);
        return redirect()->route('admin.blog.index')->with('success', 'Blog created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('admin.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Blog $blog)
    {
        $data = $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'body' => 'required',
            'extra' => 'required',
            'status' => 'nullable|boolean'
        ]);
        $slug = Str::slug($request->title);
        $counter = 1;
        while (Blog::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->title) . '-' . $counter;
            $counter++;
        }
        $blog->update([
            'title' => $request->title,
            'slug' => $slug,
            'short_description' => $request->short_description,
            'body' => $request->body,
            'extra' => $request->extra,
            'status' => $request->status ? 1 : 0
        ]);
        return redirect()->route('admin.blog.index')->with('success', 'Blog updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Blog deleted successfully');
    }
}
