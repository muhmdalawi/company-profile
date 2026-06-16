<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Web Profile')</title>
    <link rel="icon" href="{{ asset('images/logo_nigma.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">
            <a href="/" class="navbar-brand d-flex align-items-center">
                <img src="{{ $footerProfile?->logoUrl() ?? asset('images/logo_nigma.png') }}" alt="logo">
                <span>{{ $footerProfile?->company_name ?? 'Nigmagrid Indonesia' }}</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link {{ request()->is('about') ? 'active' : '' }}">
                            About
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('services') }}"
                            class="nav-link {{ request()->is('services') ? 'active' : '' }}">
                            Services
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('blog') }}" class="nav-link {{ request()->is('blog') ? 'active' : '' }}">
                            Blog
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('contact') }}"
                            class="nav-link {{ request()->is('contact') ? 'active' : '' }}">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer-custom pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="d-flex align-items-center mb-2">
                        <img src="{{ $footerProfile?->logoUrl() ?? asset('images/logo_nigma.png') }}" width="40" class="me-2">
                        <h5 class="mb-0">{{ $footerProfile?->company_name ?? 'Nigmagrid Indonesia' }}</h5>
                    </div>
                    <p class="small opacity-75">
                        {{ $footerProfile?->footer_description ?? 'Solusi digital kreatif untuk membantu bisnis berkembang di era modern.' }}
                    </p>
                </div>
                <div class="col-md-2 mb-4">
                    <h6 class="fw-bold">Menu</h6>
                    <ul class="list-unstyled small">
                        <li><a href="/" class="footer-link">Home</a></li>
                        <li><a href="{{ route('about') }}" class="footer-link">About</a></li>
                        <li><a href="{{ route('services') }}" class="footer-link">Services</a></li>
                        <li><a href="{{ route('blog') }}" class="footer-link">Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6 class="fw-bold">Contact</h6>
                    <ul class="list-unstyled small">
                        <li>Email: {{ $footerProfile?->email ?? 'info@nigmagrid.com' }}</li>
                        <li>Phone: {{ $footerProfile?->phone ?? '+62 812-3456-7890' }}</li>
                        <li>{{ $footerProfile?->address ?? 'Indonesia' }}</li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6 class="fw-bold">Follow Us</h6>
                    <div class="d-flex gap-2">
                        <a href="{{ $footerProfile?->facebook_url ?? '#' }}" class="social-icon"><i class="bi bi-facebook"></i></a>
                        <a href="{{ $footerProfile?->instagram_url ?? '#' }}" class="social-icon"><i class="bi bi-instagram"></i></a>
                        <a href="{{ $footerProfile?->linkedin_url ?? '#' }}" class="social-icon"><i class="bi bi-linkedin"></i></a>
                        <a href="{{ $footerProfile?->twitter_url ?? '#' }}" class="social-icon"><i class="bi bi-twitter-x"></i></a>
                    </div>
                </div>
            </div>
            <div class="section-divider my-3"></div>
            <div class="text-center small opacity-75">
                &copy; 2026 {{ $footerProfile?->company_name ?? 'Nigmagrid Indonesia' }}. All rights reserved.
            </div>
        </div>
    </footer>
    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
