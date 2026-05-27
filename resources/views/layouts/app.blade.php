<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MAPBProject01') }}</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .page-hero { background: linear-gradient(135deg, #0d6efd, #6ea8fe); }
        .stat-card strong { font-size: 2rem; }
        .table td, .table th { vertical-align: middle; }
        .field-error { color: #dc3545; font-size: 0.875rem; margin-top: 0.25rem; }
    </style>
</head>
<body>
    @php($sessionUser = session('user_account'))
    @php($role = $sessionUser['role'] ?? null)

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a href="{{ route('dashboard') }}" class="navbar-brand fw-semibold">MAPBProject01</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                    @if($role === 'admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('student.index') }}">Students</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('teacher.index') }}">Teachers</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('degree.index') }}">Degrees</a></li>
                    @endif
                </ul>

                @if($sessionUser)
                    <div class="d-flex align-items-center gap-3">
                        <span class="badge text-bg-light text-uppercase">{{ $role }}</span>
                        <span class="text-white small">{{ $sessionUser['username'] ?? 'user' }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <main class="container py-4">
        <section class="page-hero text-white rounded-4 p-4 p-md-5 mb-4 shadow-sm">
            <div class="row g-3 align-items-end">
                <div class="col-md-8">
                    <p class="text-uppercase small fw-semibold mb-2">Campus Operations</p>
                    <h1 class="display-6 fw-bold mb-0">Manage academic information in one place.</h1>
                </div>
                <div class="col-md-4">
                    <p class="mb-0 opacity-75">Students, teachers, degrees, and account access in a deploy-safe Bootstrap interface.</p>
                </div>
            </div>
        </section>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
