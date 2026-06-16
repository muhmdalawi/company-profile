@extends('layouts.admin')

@section('title', 'Tambah Service')
@section('page-title', 'Tambah Service')

@section('content')
    <div class="card admin-card"><div class="card-body">
        <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
            @include('admin.services.form')
        </form>
    </div></div>
@endsection
