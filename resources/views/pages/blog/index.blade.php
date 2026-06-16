@extends('layouts.app')
@section('title', 'Blog')

@section('content')
    <div class="container py-5">
        <div class="text-center mb-5 fade-scroll">
            <h1 class="fw-bold text-primary-custom">Blog & Articles</h1>
            <p class="text-muted">Insight teknologi & update terbaru</p>
        </div>
        <div class="row g-4">
            @forelse ($blogs as $blog)
                <div class="col-md-4">
                    <a href="{{ route('blog.show', $blog->id) }}" class="text-decoration-none text-dark">
                        <div class="blog-card h-100 d-flex flex-column fade-scroll">
                            <img src="{{ $blog->imageUrl() }}" class="blog-img" alt="{{ $blog->title }}">
                            <div class="p-3 flex-grow-1">
                                <small class="text-muted">
                                    {{ $blog->created_at->format('d M Y') }}
                                </small>
                                <h5 class="fw-bold mt-2 mb-2">
                                    {{ $blog->title }}
                                </h5>
                                <p class="text-muted mb-0">
                                    {{ Str::limit($blog->description, 100) }}
                                </p>
                            </div>
                            <div class="px-3 pb-3 d-flex justify-content-between align-items-center">
                                <span class="badge bg-success">
                                    {{ ucfirst($blog->status) }}
                                </span>
                                <span class="read-more">Read →</span>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center py-5 fade-scroll">
                    <h5 class="text-muted">Belum ada artikel</h5>
                    <p class="text-muted">Silakan cek kembali nanti</p>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-5 fade-scroll">
            {{ $blogs->links('pagination::bootstrap-5') }}
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const elements = document.querySelectorAll('.fade-scroll');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('show');
                    }
                });
            }, {
                threshold: 0.2
            });
            elements.forEach(el => observer.observe(el));
        });
    </script>
@endsection
