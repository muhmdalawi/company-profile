@extends('layouts.admin')

@section('title', 'Edit Gallery')
@section('page-title', 'Edit Gallery')

@section('content')
    <div class="card admin-card"><div class="card-body">
        <form method="POST" action="{{ route('admin.galleries.update', $gallery) }}" enctype="multipart/form-data">
            @method('PUT')
            @include('admin.galleries.form')
        </form>
    </div></div>
@endsection
