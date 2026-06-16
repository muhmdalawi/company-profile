<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\CompanyProfile;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home', [
            'profile' => CompanyProfile::first(),
            'services' => Service::where('status', 'published')->latest()->take(3)->get(),
            'latestBlogs' => Blog::where('status', 'published')->latest()->take(3)->get(),
        ]);
    }
}
