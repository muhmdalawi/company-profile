<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::where('status', 'published')->latest()->get();

        return view('pages.services', compact('services'));
    }
}
