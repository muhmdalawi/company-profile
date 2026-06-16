@extends('layouts.app')
@section('title', 'Services')

@section('content')
    <div class="container py-5">
        <div class="text-center mb-5 fade-scroll">
            <h1 class="fw-bold text-primary-custom">Our Services</h1>
            <p class="mt-3 mx-auto" style="max-width:600px;">
                Kami menyediakan berbagai solusi teknologi untuk membantu bisnis Anda berkembang
                secara efisien dan siap menghadapi transformasi digital.
            </p>
        </div>
        <div class="row g-4 mb-5 justify-content-center">
            @forelse ($services as $service)
                <div class="col-md-4">
                    <div class="service-card p-4 h-100 text-center fade-scroll">
                        <img src="{{ $service->imageUrl() }}" class="mb-3 service-img" alt="{{ $service->title }}">
                        <h5 class="fw-bold">{{ $service->title }}</h5>
                        <p>{{ $service->description }}</p>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted fade-scroll">Belum ada layanan yang dipublikasikan.</div>
            @endforelse
        </div>

        <div class="section-divider my-5"></div>

        <section class="py-5">
            <div class="container">
                <div class="text-center mb-5 fade-scroll">
                    <h2 class="fw-bold text-primary-custom">Why Choose Us</h2>
                    <p class="text-muted">Alasan kenapa Nigmagrid menjadi pilihan terbaik</p>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-4">
                        <div class="why-card p-4 h-100 text-center fade-scroll">
                            <img src="{{ asset('images/reliable.png') }}" class="why-img mb-3">
                            <h5 class="fw-bold">Reliable System</h5>
                            <p class="text-muted">Sistem stabil dan dapat diandalkan.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="why-card p-4 h-100 text-center fade-scroll">
                            <img src="{{ asset('images/scalable.png') }}" class="why-img mb-3">
                            <h5 class="fw-bold">Scalable Solution</h5>
                            <p class="text-muted">Solusi fleksibel sesuai kebutuhan bisnis.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="why-card p-4 h-100 text-center fade-scroll">
                            <img src="{{ asset('images/security.png') }}" class="why-img mb-3">
                            <h5 class="fw-bold">High Security</h5>
                            <p class="text-muted">Keamanan data menjadi prioritas utama.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
