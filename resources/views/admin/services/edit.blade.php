@extends('layouts.admin')

@section('title', 'Edit Service')
@section('page-title', 'Edit Service')

@section('content')
    <div class="card admin-card"><div class="card-body">
        <form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data">
            @method('PUT')
            @include('admin.services.form')
        </form>
    </div></div>
@endsection
