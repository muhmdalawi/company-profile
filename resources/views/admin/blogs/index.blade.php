@extends('layouts.admin')

@section('title', 'Blog')
@section('page-title', 'Blog')

@section('content')
    <div class="card admin-card">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <strong>Data Blog</strong>
            <a class="btn btn-primary btn-sm" href="{{ route('admin.blogs.create') }}">Tambah Blog</a>
        </div>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Author</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($blogs as $blog)
                        <tr>
                            <td><img src="{{ $blog->imageUrl() }}" class="table-img" alt="{{ $blog->title }}"></td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->author }}</td>
                            <td>{{ $blog->category }}</td>
                            <td><span class="badge bg-{{ $blog->status === 'published' ? 'success' : 'secondary' }}">{{ ucfirst($blog->status) }}</span></td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.blogs.edit', $blog) }}">Edit</a>
                                <form class="d-inline" method="POST" action="{{ route('admin.blogs.destroy', $blog) }}" onsubmit="return confirm('Hapus blog ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted py-4">Belum ada blog.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-body">{{ $blogs->links('pagination::bootstrap-5') }}</div>
    </div>
@endsection
