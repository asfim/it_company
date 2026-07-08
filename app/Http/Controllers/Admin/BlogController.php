<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'              => 'required|string|max:255',
            'category'           => 'required|string|in:dev,design,publishing,marketing',
            'image'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image_url'          => 'nullable|string|max:2048',
            'excerpt'            => 'required|string|max:255',
            'content'            => 'required|string',
            'author_name'        => 'required|string|max:100',
            'author_avatar_text' => 'required|string|max:10',
            'author_role'        => 'required|string|max:100',
            'read_time'          => 'required|string|max:50',
            'is_featured'        => 'nullable|boolean',
        ]);

        $slug = Str::slug($request->title);
        // Ensure slug is unique
        $originalSlug = $slug;
        $count = 2;
        while (Blog::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $imageUrl = $request->image_url;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/blogs'), $imageName);
            $imageUrl = 'uploads/blogs/' . $imageName;
        }

        // If this post is set as featured, reset other featured posts
        if ($request->has('is_featured') && $request->is_featured) {
            Blog::where('is_featured', true)->update(['is_featured' => false]);
        }

        Blog::create([
            'title'              => $request->title,
            'slug'               => $slug,
            'category'           => $request->category,
            'image_url'          => $imageUrl,
            'excerpt'            => $request->excerpt,
            'content'            => $request->content,
            'author_name'        => $request->author_name,
            'author_avatar_text' => $request->author_avatar_text,
            'author_role'        => $request->author_role,
            'read_time'          => $request->read_time,
            'is_featured'        => $request->has('is_featured') ? (bool)$request->is_featured : false,
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'              => 'required|string|max:255',
            'category'           => 'required|string|in:dev,design,publishing,marketing',
            'image'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image_url'          => 'nullable|string|max:2048',
            'excerpt'            => 'required|string|max:255',
            'content'            => 'required|string',
            'author_name'        => 'required|string|max:100',
            'author_avatar_text' => 'required|string|max:10',
            'author_role'        => 'required|string|max:100',
            'read_time'          => 'required|string|max:50',
            'is_featured'        => 'nullable|boolean',
        ]);

        $slug = $blog->slug;
        if ($blog->title !== $request->title) {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $count = 2;
            while (Blog::where('slug', $slug)->where('id', '!=', $blog->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
        }

        $imageUrl = $request->image_url ?: $blog->image_url;
        if ($request->hasFile('image')) {
            // Delete old uploaded image if exists and local
            if ($blog->image_url && file_exists(public_path($blog->image_url)) && strpos($blog->image_url, 'uploads/blogs/') === 0) {
                @unlink(public_path($blog->image_url));
            }
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/blogs'), $imageName);
            $imageUrl = 'uploads/blogs/' . $imageName;
        }

        if ($request->has('is_featured') && $request->is_featured) {
            Blog::where('is_featured', true)->where('id', '!=', $blog->id)->update(['is_featured' => false]);
        }

        $blog->update([
            'title'              => $request->title,
            'slug'               => $slug,
            'category'           => $request->category,
            'image_url'          => $imageUrl,
            'excerpt'            => $request->excerpt,
            'content'            => $request->content,
            'author_name'        => $request->author_name,
            'author_avatar_text' => $request->author_avatar_text,
            'author_role'        => $request->author_role,
            'read_time'          => $request->read_time,
            'is_featured'        => $request->has('is_featured') ? (bool)$request->is_featured : false,
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        // Delete local image file if exists
        if ($blog->image_url && file_exists(public_path($blog->image_url)) && strpos($blog->image_url, 'uploads/blogs/') === 0) {
            @unlink(public_path($blog->image_url));
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted successfully.');
    }
}
