@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section class="hero-section d-flex align-items-center" style="background-color:#f8f9fa;">
        <div class="container">
            <div class="row align-items-center w-100">
                <div class="col-lg-6 fade-scroll">
                    <h1 class="fw-bold" style="color:#1f3a5f;">
                        <span id="typing-text"></span>
                    </h1>

                    <h3 class="mb-3" style="color:#1f3a5f;">
                        <span id="typing-sub"></span>
                    </h3>
                    <p class="mt-3">
                        Nigmagrid Indonesia menyediakan solusi teknologi terintegrasi
                        untuk membantu perusahaan bekerja lebih cerdas, efisien,
                        dan siap menghadapi transformasi digital.
                    </p>
                    <a href="/services" class="btn text-white mt-3" style="background-color:#1f3a5f;">
                        Jelajahi Layanan Kami
                    </a>
                </div>

                <div class="col-lg-6 text-center fade-scroll">
                    <div class="hero-image position-relative">
                        <img src="{{ asset('images/hero1.png') }}" class="img-fluid active">
                        <img src="{{ asset('images/hero2.png') }}" class="img-fluid">
                        <img src="{{ asset('images/hero3.png') }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row align-items-center fade-scroll">
                <div class="col-md-6 text-center mb-4 mb-md-0">
                    <img src="{{ $profile?->logoUrl() ?? asset('images/logo_nigma.png') }}" class="img-fluid about-logo">
                </div>
                <div class="col-md-6">
                    <h2 class="fw-bold text-primary-custom">{{ $profile?->main_title ?? 'About Nigmagrid' }}</h2>
                    <p class="mt-3">
                        {{ \Illuminate\Support\Str::limit($profile?->main_description ?? 'Nigmagrid Indonesia adalah perusahaan teknologi yang berfokus pada penyediaan solusi digital terintegrasi.', 260) }}
                    </p>
                </div>
            </div>

            <div class="row mt-5 text-center justify-content-center">
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-box p-3 fade-scroll">
                        <h3 class="fw-bold text-primary-custom counter" data-target="100">0</h3>
                        <p class="mb-0">Projects Completed</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-box p-3 fade-scroll">
                        <h3 class="fw-bold text-primary-custom counter" data-target="50">0</h3>
                        <p class="mb-0">Clients</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-box p-3 fade-scroll">
                        <h3 class="fw-bold text-primary-custom counter" data-target="5">0</h3>
                        <p class="mb-0">Years Experience</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="services-section bg-light">
        <div class="container text-center">
            <h2 class="fw-bold text-primary-custom mb-4 fade-scroll">Our Services</h2>
            <div class="row mt-5 justify-content-center">
                @forelse ($services as $service)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="service-item p-4 h-100 fade-scroll">
                            <img src="{{ $service->imageUrl() }}" class="service-img mb-3" alt="{{ $service->title }}">
                            <h5 class="fw-bold">{{ $service->title }}</h5>
                            <p>{{ \Illuminate\Support\Str::limit($service->description, 90) }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-muted fade-scroll">Belum ada layanan yang dipublikasikan.</div>
                @endforelse
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let index = 0;
            const images = document.querySelectorAll('.hero-image img');

            if (images.length > 1) {
                setInterval(() => {
                    images[index].classList.remove('active');
                    index = (index + 1) % images.length;
                    images[index].classList.add('active');
                }, 3000);
            }
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
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                const update = () => {
                    const target = +counter.getAttribute('data-target');
                    const current = +counter.innerText;
                    const increment = target / 50;

                    if (current < target) {
                        counter.innerText = Math.ceil(current + increment);
                        setTimeout(update, 30);
                    } else {
                        counter.innerText = target + '+';
                    }
                };
                update();
            });

            const texts = [{
                    title: "Solusi Teknologi",
                    sub: "Untuk Masa Depan Bisnis Anda"
                },
                {
                    title: "Transformasi Digital",
                    sub: "Untuk Perusahaan Modern"
                },
                {
                    title: "Inovasi Berbasis Data",
                    sub: "Untuk Keputusan Lebih Cerdas"
                }
            ];

            let textIndex = 0;
            let charIndex = 0;

            const titleEl = document.getElementById("typing-text");
            const subEl = document.getElementById("typing-sub");

            function typeEffect() {
                const current = texts[textIndex];

                if (charIndex < current.title.length) {
                    titleEl.textContent += current.title.charAt(charIndex);
                    charIndex++;
                    setTimeout(typeEffect, 60);
                } else {
                    typeSub();
                }
            }

            function typeSub() {
                const current = texts[textIndex];
                let subIndex = 0;

                function typingSubLoop() {
                    if (subIndex < current.sub.length) {
                        subEl.textContent += current.sub.charAt(subIndex);
                        subIndex++;
                        setTimeout(typingSubLoop, 40);
                    } else {
                        setTimeout(eraseEffect, 2000);
                    }
                }

                typingSubLoop();
            }

            function eraseEffect() {
                if (titleEl.textContent.length > 0 || subEl.textContent.length > 0) {
                    titleEl.textContent = titleEl.textContent.slice(0, -1);
                    subEl.textContent = subEl.textContent.slice(0, -1);
                    setTimeout(eraseEffect, 20);
                } else {
                    textIndex = (textIndex + 1) % texts.length;
                    charIndex = 0;
                    setTimeout(typeEffect, 300);
                }
            }

            typeEffect();

        });
    </script>

@endsection
