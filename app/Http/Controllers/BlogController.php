<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 'published')->latest()->paginate(6);
        return view('pages.blog.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::where('status', 'published')
            ->where(function ($query) use ($id) {
                $query->where('id', $id)->orWhere('slug', $id);
            })
            ->firstOrFail();

        return view('pages.blog.show', compact('blog'));
    }
}
