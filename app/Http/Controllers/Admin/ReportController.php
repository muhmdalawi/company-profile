<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Service;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.reports.index');
    }

    public function blogPdf()
    {
        $blogs = Blog::latest()->get();

        return Pdf::loadView('admin.reports.blog-pdf', compact('blogs'))->download('blog-report.pdf');
    }

    public function servicesPdf()
    {
        $services = Service::latest()->get();

        return Pdf::loadView('admin.reports.services-pdf', compact('services'))->download('services-report.pdf');
    }

    public function galleriesPdf()
    {
        $galleries = Gallery::latest()->get();

        return Pdf::loadView('admin.reports.gallery-pdf', compact('galleries'))->download('gallery-report.pdf');
    }
}
