@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <div class="row g-3 mb-4">
        @foreach ([
            ['label' => 'Total Blog', 'value' => $totalBlogs, 'icon' => 'bi-newspaper'],
            ['label' => 'Total Services', 'value' => $totalServices, 'icon' => 'bi-grid'],
            ['label' => 'Total Gallery', 'value' => $totalGalleries, 'icon' => 'bi-images'],
            ['label' => 'Company Profile', 'value' => $totalCompanyProfiles, 'icon' => 'bi-building'],
            ['label' => 'Leadership', 'value' => $totalLeaders, 'icon' => 'bi-person-badge'],
            ['label' => 'Team', 'value' => $totalTeams, 'icon' => 'bi-people'],
        ] as $card)
            <div class="col-md-4">
                <div class="card admin-card h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted small">{{ $card['label'] }}</div>
                            <div class="h3 mb-0">{{ $card['value'] }}</div>
                        </div>
                        <i class="bi {{ $card['icon'] }} fs-1 text-primary"></i>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="card admin-card">
        <div class="card-header bg-white fw-bold">Shortcut Menu</div>
        <div class="card-body d-flex gap-2 flex-wrap">
            <a class="btn btn-primary" href="{{ route('admin.blogs.create') }}">Tambah Blog</a>
            <a class="btn btn-primary" href="{{ route('admin.services.create') }}">Tambah Service</a>
            <a class="btn btn-primary" href="{{ route('admin.galleries.create') }}">Tambah Gallery</a>
            <a class="btn btn-outline-primary" href="{{ route('admin.company-profile.edit') }}">Edit Profile</a>
            <a class="btn btn-outline-danger" href="{{ route('admin.reports.index') }}">Export PDF</a>
        </div>
    </div>
@endsection
