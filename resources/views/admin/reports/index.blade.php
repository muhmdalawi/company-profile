@extends('layouts.admin')

@section('title', 'Reports')
@section('page-title', 'Reports')

@section('content')
    <div class="card admin-card">
        <div class="card-body">
            <div class="d-flex gap-2 flex-wrap">
                <a class="btn btn-danger" href="{{ route('admin.reports.blog.pdf') }}">Download Blog PDF</a>
                <a class="btn btn-danger" href="{{ route('admin.reports.services.pdf') }}">Download Services PDF</a>
                <a class="btn btn-danger" href="{{ route('admin.reports.galleries.pdf') }}">Download Gallery PDF</a>
            </div>
        </div>
    </div>
@endsection
