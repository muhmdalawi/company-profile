@extends('layouts.admin')

@section('title', 'Edit Team')
@section('page-title', 'Edit Team')

@section('content')
    <div class="card admin-card"><div class="card-body">
        <form method="POST" action="{{ route('admin.teams.update', $team) }}" enctype="multipart/form-data">
            @method('PUT')
            @include('admin.teams.form')
        </form>
    </div></div>
@endsection
