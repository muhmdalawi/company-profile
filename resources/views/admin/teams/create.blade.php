@extends('layouts.admin')

@section('title', 'Tambah Team')
@section('page-title', 'Tambah Team')

@section('content')
    <div class="card admin-card"><div class="card-body">
        <form method="POST" action="{{ route('admin.teams.store') }}" enctype="multipart/form-data">
            @include('admin.teams.form')
        </form>
    </div></div>
@endsection
