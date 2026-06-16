@extends('layouts.admin')

@section('title', 'Edit Blog')
@section('page-title', 'Edit Blog')

@section('content')
    <div class="card admin-card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.blogs.update', $blog) }}" enctype="multipart/form-data">
                @method('PUT')
                @include('admin.blogs.form')
            </form>
        </div>
    </div>
@endsection
