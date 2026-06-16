@extends('layouts.admin')

@section('title', 'Team')
@section('page-title', 'Team')

@section('content')
    <div class="card admin-card">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <strong>Data Team</strong>
            <a class="btn btn-primary btn-sm" href="{{ route('admin.teams.create') }}">Tambah Team</a>
        </div>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead><tr><th>Foto</th><th>Nama</th><th>Jabatan</th><th>Urutan</th><th width="160">Aksi</th></tr></thead>
                <tbody>
                    @forelse ($teams as $team)
                        <tr>
                            <td><img src="{{ $team->photoUrl() }}" class="table-img" alt="{{ $team->name }}"></td>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->position }}</td>
                            <td>{{ $team->sort_order }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.teams.edit', $team) }}">Edit</a>
                                <form class="d-inline" method="POST" action="{{ route('admin.teams.destroy', $team) }}" onsubmit="return confirm('Hapus team ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">Belum ada data team.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-body">{{ $teams->links('pagination::bootstrap-5') }}</div>
    </div>
@endsection
