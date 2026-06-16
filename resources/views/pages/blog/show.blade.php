@extends('layouts.app')
@section('title', $blog->title)

@section('content')
    <div class="container py-5">
        <div class="mb-5 fade-scroll">
            <h1 class="fw-bold text-primary-custom">{{ $blog->title }}</h1>
            <div class="text-muted mt-2 d-flex gap-2 flex-wrap">
                <small>{{ $blog->created_at->format('d M Y') }}</small>
                <small>•</small>
                <small>{{ $blog->author }}</small>
                <small>•</small>
                <small class="badge bg-light text-dark">{{ $blog->category }}</small>
            </div>
        </div>
        <div class="row align-items-start g-5">
            <div class="col-md-5 fade-scroll">
                <img src="{{ $blog->imageUrl() }}" class="blog-detail-img" alt="{{ $blog->title }}">
            </div>
            <div class="col-md-7 fade-scroll">
                <div class="blog-content">
                    <p>
                        {{ $blog->description }}
                    </p>
                </div>
            </div>
        </div>
        <div class="mt-5 fade-scroll">
            <a href="{{ route('blog') }}" class="btn btn-outline-primary back-btn">
                ← Kembali ke Blog
            </a>
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
