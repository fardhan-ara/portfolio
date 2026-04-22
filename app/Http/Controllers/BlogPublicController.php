<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogPublicController extends Controller
{
    public function index()
    {
        $blogs = Blog::published()->latest('published_at')->paginate(9);
        $categories = Blog::published()->distinct()->pluck('category');
        return view('blog.index', compact('blogs', 'categories'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->published()->firstOrFail();
        $blog->incrementViews();
        $relatedBlogs = Blog::published()
            ->where('category', $blog->category)
            ->where('id', '!=', $blog->id)
            ->limit(3)
            ->get();
        
        return view('blog.show', compact('blog', 'relatedBlogs'));
    }

    public function category($category)
    {
        $blogs = Blog::published()
            ->where('category', $category)
            ->latest('published_at')
            ->paginate(9);
        $categories = Blog::published()->distinct()->pluck('category');
        
        return view('blog.index', compact('blogs', 'categories', 'category'));
    }
}
