<?php

namespace App\Http\Controllers;

use App\Models\Blog;


use Illuminate\Http\Request;

class BlogController extends Controller
{
   public function bloglist()
    {
        // Fetch all blogs
        $blogs = Blog::all();

        // Pass blogs data to the view
        return view('blog', compact('blogs'));
    }
 

    
    public function blogdetail($id)
    {
        // Fetch the blog by its ID
        $blog = Blog::findOrFail($id);

        // Fetch all blogs for displaying alongside the blog details
        $blogs = Blog::latest()->take(5)->get();

        // Pass both the blog and blogs data to the view
        return view('jovie.blog-details', compact('blog', 'blogs'));
    }


    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.list', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'tags' => 'nullable',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);

        Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'tags' => $request->tags,
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.show', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable',
            'tags' => 'nullable',
        ]);

        $blog = Blog::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $blog->image = $imageName;
        }

        $blog->update([
            'title' => $request->title,
            'description' => $request->description,
            'tags' => $request->tags,
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }

}
