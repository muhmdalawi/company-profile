@extends('layouts.admin')

@section('title', 'Tambah Blog')
@section('page-title', 'Tambah Blog')

@section('content')
    <div class="card admin-card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data">
                @include('admin.blogs.form')
            </form>
        </div>
    </div>
@endsection
