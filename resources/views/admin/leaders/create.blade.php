@extends('layouts.admin')

@section('title', 'Tambah Leadership')
@section('page-title', 'Tambah Leadership')

@section('content')
    <div class="card admin-card"><div class="card-body">
        <form method="POST" action="{{ route('admin.leaders.store') }}" enctype="multipart/form-data">
            @include('admin.leaders.form')
        </form>
    </div></div>
@endsection
