<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminGalleryController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LeaderController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServicesController::class, 'index'])->name('services');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.process');

    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        Route::get('/company-profile', [CompanyProfileController::class, 'edit'])->name('company-profile.edit');
        Route::put('/company-profile', [CompanyProfileController::class, 'update'])->name('company-profile.update');

        Route::resource('blogs', AdminBlogController::class)->except(['show']);
        Route::resource('services', AdminServiceController::class)->except(['show']);
        Route::resource('galleries', AdminGalleryController::class)->except(['show']);
        Route::resource('leaders', LeaderController::class)->except(['show']);
        Route::resource('teams', TeamController::class)->except(['show']);

        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
        Route::get('/reports/blog/pdf', [ReportController::class, 'blogPdf'])->name('reports.blog.pdf');
        Route::get('/reports/services/pdf', [ReportController::class, 'servicesPdf'])->name('reports.services.pdf');
        Route::get('/reports/galleries/pdf', [ReportController::class, 'galleriesPdf'])->name('reports.galleries.pdf');
    });
});
