<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CompanyProfile;
use App\Models\Gallery;
use App\Models\Leader;
use App\Models\Service;
use App\Models\Team;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalBlogs' => Blog::count(),
            'totalServices' => Service::count(),
            'totalGalleries' => Gallery::count(),
            'totalCompanyProfiles' => CompanyProfile::count(),
            'totalLeaders' => Leader::count(),
            'totalTeams' => Team::count(),
        ]);
    }
}
