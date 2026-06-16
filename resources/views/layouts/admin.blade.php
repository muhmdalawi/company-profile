<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - Nigmagrid</title>
    <link rel="icon" href="{{ asset('images/logo_nigma.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <style>
        body { background: #f4f6f9; }
        .admin-shell { min-height: 100vh; }
        .sidebar { width: 260px; background: #1f3a5f; color: #fff; }
        .sidebar a { color: rgba(255, 255, 255, .78); text-decoration: none; border-radius: 8px; }
        .sidebar a:hover, .sidebar a.active { color: #fff; background: rgba(255, 255, 255, .12); }
        .content-area { flex: 1; min-width: 0; }
        .admin-card { border: 0; border-radius: 8px; box-shadow: 0 8px 24px rgba(20, 37, 63, .08); }
        .table-img { width: 68px; height: 50px; object-fit: cover; border-radius: 6px; }
        .preview-img { max-width: 180px; max-height: 130px; object-fit: cover; border-radius: 8px; }
        @media (max-width: 991px) {
            .admin-shell { flex-direction: column; }
            .sidebar { width: 100%; }
        }
    </style>
</head>

<body>
    <div class="admin-shell d-flex">
        <aside class="sidebar p-3">
            <div class="d-flex align-items-center gap-2 mb-4">
                <img src="{{ asset('images/logo_nigma.png') }}" width="36" alt="logo">
                <div>
                    <strong>Nigmagrid</strong>
                    <div class="small opacity-75">Admin Panel</div>
                </div>
            </div>
            <nav class="d-grid gap-1">
                <a class="px-3 py-2 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
                <a class="px-3 py-2 {{ request()->routeIs('admin.company-profile.*') ? 'active' : '' }}" href="{{ route('admin.company-profile.edit') }}"><i class="bi bi-building me-2"></i>Company Profile</a>
                <a class="px-3 py-2 {{ request()->routeIs('admin.leaders.*') ? 'active' : '' }}" href="{{ route('admin.leaders.index') }}"><i class="bi bi-person-badge me-2"></i>Leadership</a>
                <a class="px-3 py-2 {{ request()->routeIs('admin.teams.*') ? 'active' : '' }}" href="{{ route('admin.teams.index') }}"><i class="bi bi-people me-2"></i>Team</a>
                <a class="px-3 py-2 {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}" href="{{ route('admin.blogs.index') }}"><i class="bi bi-newspaper me-2"></i>Blog</a>
                <a class="px-3 py-2 {{ request()->routeIs('admin.services.*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}"><i class="bi bi-grid me-2"></i>Services</a>
                <a class="px-3 py-2 {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}" href="{{ route('admin.galleries.index') }}"><i class="bi bi-images me-2"></i>Gallery</a>
                <a class="px-3 py-2 {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}" href="{{ route('admin.reports.index') }}"><i class="bi bi-file-earmark-pdf me-2"></i>Reports</a>
                <a class="px-3 py-2" href="{{ route('home') }}" target="_blank"><i class="bi bi-box-arrow-up-right me-2"></i>Frontend</a>
            </nav>
        </aside>

        <div class="content-area">
            <header class="bg-white border-bottom px-4 py-3 d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h4 mb-0">@yield('page-title', 'Admin')</h1>
                    <div class="small text-muted">{{ session('admin_email') }}</div>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm" type="submit">
                        <i class="bi bi-box-arrow-right me-1"></i>Logout
                    </button>
                </form>
            </header>

            <main class="p-4">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
