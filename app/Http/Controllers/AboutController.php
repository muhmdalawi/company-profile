<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Leader;
use App\Models\Team;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('pages.about', [
            'profile' => CompanyProfile::first(),
            'leaders' => Leader::orderBy('sort_order')->get(),
            'teams' => Team::orderBy('sort_order')->get(),
        ]);
    }
}
