@extends('layouts.admin')

@section('title', 'Services')
@section('page-title', 'Services')

@section('content')
    <div class="card admin-card">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <strong>Data Services</strong>
            <a class="btn btn-primary btn-sm" href="{{ route('admin.services.create') }}">Tambah Service</a>
        </div>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead><tr><th>Gambar</th><th>Nama Layanan</th><th>Deskripsi</th><th>Status</th><th width="160">Aksi</th></tr></thead>
                <tbody>
                    @forelse ($services as $service)
                        <tr>
                            <td><img src="{{ $service->imageUrl() }}" class="table-img" alt="{{ $service->title }}"></td>
                            <td>{{ $service->title }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($service->description, 80) }}</td>
                            <td><span class="badge bg-{{ $service->status === 'published' ? 'success' : 'secondary' }}">{{ ucfirst($service->status) }}</span></td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.services.edit', $service) }}">Edit</a>
                                <form class="d-inline" method="POST" action="{{ route('admin.services.destroy', $service) }}" onsubmit="return confirm('Hapus service ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">Belum ada service.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-body">{{ $services->links('pagination::bootstrap-5') }}</div>
    </div>
@endsection
