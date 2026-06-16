@extends('layouts.admin')

@section('title', 'Gallery')
@section('page-title', 'Gallery')

@section('content')
    <div class="card admin-card">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <strong>Data Gallery</strong>
            <a class="btn btn-primary btn-sm" href="{{ route('admin.galleries.create') }}">Tambah Gallery</a>
        </div>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead><tr><th>Gambar</th><th>Judul</th><th>Deskripsi</th><th width="160">Aksi</th></tr></thead>
                <tbody>
                    @forelse ($galleries as $gallery)
                        <tr>
                            <td><img src="{{ $gallery->imageUrl() }}" class="table-img" alt="{{ $gallery->title }}"></td>
                            <td>{{ $gallery->title }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($gallery->description, 80) }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.galleries.edit', $gallery) }}">Edit</a>
                                <form class="d-inline" method="POST" action="{{ route('admin.galleries.destroy', $gallery) }}" onsubmit="return confirm('Hapus gallery ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center text-muted py-4">Belum ada gallery.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-body">{{ $galleries->links('pagination::bootstrap-5') }}</div>
    </div>
@endsection
