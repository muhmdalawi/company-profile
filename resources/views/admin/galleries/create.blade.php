@extends('layouts.admin')

@section('title', 'Tambah Gallery')
@section('page-title', 'Tambah Gallery')

@section('content')
    <div class="card admin-card"><div class="card-body">
        <form method="POST" action="{{ route('admin.galleries.store') }}" enctype="multipart/form-data">
            @include('admin.galleries.form')
        </form>
    </div></div>
@endsection
