@extends('layouts.app')
@section('title', 'About')

@section('content')
    <div class="container py-5">
        <div class="text-center mb-5 fade-scroll">
            <h1 class="fw-bold text-primary-custom mb-3">{{ $profile?->main_title ?? 'About Nigmagrid' }}</h1>
            <p style="max-width:800px;margin:auto;">
                {{ $profile?->main_description ?? 'Nigmagrid Indonesia adalah perusahaan teknologi yang berfokus pada penyediaan solusi digital terintegrasi untuk mendukung transformasi bisnis di era modern.' }}
            </p>
        </div>
        <section class="py-5 mt-4 mb-5">
            <div class="row align-items-center">
                <div class="col-md-6 text-center mb-4 mb-md-0 fade-scroll">
                    <img src="{{ $profile?->logoUrl() ?? asset('images/logo_nigma.png') }}" class="img-fluid about-logo" alt="about">
                </div>
                <div class="col-md-6 fade-scroll">
                    <h4 class="fw-bold text-primary-custom mb-3">{{ $profile?->who_we_are_title ?? 'Who We Are' }}</h4>
                    <p>
                        {{ $profile?->who_we_are_description ?? 'Kami berfokus pada pengembangan solusi seperti ERP, CRM, dan Cloud yang membantu perusahaan meningkatkan efisiensi operasional dan pengambilan keputusan berbasis data.' }}
                    </p>
                </div>
            </div>
        </section>
        <div class="text-center mb-4 fade-scroll">
            <h2 class="fw-bold text-primary-custom mb-2">Leadership</h2>
            <p class="text-muted">Pimpinan utama perusahaan</p>
        </div>
        <div class="row justify-content-center mb-5 g-4">
            @forelse ($leaders as $leader)
                <div class="col-md-4 col-6 text-center">
                    <div class="team-card p-4 h-100 fade-scroll">
                        <img src="{{ $leader->photoUrl() }}" class="team-img mb-3" alt="{{ $leader->name }}">
                        <h5 class="fw-bold mb-1">{{ $leader->name }}</h5>
                        <small class="text-muted">{{ $leader->position }}</small>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">Belum ada data leadership.</div>
            @endforelse
        </div>
        <div class="section-divider my-5"></div>
        <div class="text-center mb-4 fade-scroll">
            <h2 class="fw-bold text-primary-custom mb-2">Our Team</h2>
            <p class="text-muted">Tim pengembang dan operasional</p>
        </div>
        <div class="row justify-content-center mb-5 g-4">
            @forelse ($teams as $team)
                <div class="col-md-3 col-6 text-center">
                    <div class="team-card p-4 h-100 fade-scroll">
                        <img src="{{ $team->photoUrl() }}" class="team-img mb-3" alt="{{ $team->name }}">
                        <h6 class="fw-bold mb-1">{{ $team->name }}</h6>
                        <small class="text-muted">{{ $team->position }}</small>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">Belum ada data team.</div>
            @endforelse
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
