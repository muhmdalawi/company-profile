@extends('layouts.admin')

@section('title', 'Leadership')
@section('page-title', 'Leadership')

@section('content')
    <div class="card admin-card">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <strong>Data Leadership</strong>
            <a class="btn btn-primary btn-sm" href="{{ route('admin.leaders.create') }}">Tambah Leadership</a>
        </div>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead><tr><th>Foto</th><th>Nama</th><th>Jabatan</th><th>Urutan</th><th width="160">Aksi</th></tr></thead>
                <tbody>
                    @forelse ($leaders as $leader)
                        <tr>
                            <td><img src="{{ $leader->photoUrl() }}" class="table-img" alt="{{ $leader->name }}"></td>
                            <td>{{ $leader->name }}</td>
                            <td>{{ $leader->position }}</td>
                            <td>{{ $leader->sort_order }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.leaders.edit', $leader) }}">Edit</a>
                                <form class="d-inline" method="POST" action="{{ route('admin.leaders.destroy', $leader) }}" onsubmit="return confirm('Hapus leadership ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">Belum ada data leadership.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-body">{{ $leaders->links('pagination::bootstrap-5') }}</div>
    </div>
@endsection
