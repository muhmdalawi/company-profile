@extends('layouts.admin')

@section('title', 'Edit Leadership')
@section('page-title', 'Edit Leadership')

@section('content')
    <div class="card admin-card"><div class="card-body">
        <form method="POST" action="{{ route('admin.leaders.update', $leader) }}" enctype="multipart/form-data">
            @method('PUT')
            @include('admin.leaders.form')
        </form>
    </div></div>
@endsection
