<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SSG Project') }}</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="app-shell">
    @php($sessionUser = session('user_account'))
    @php($role = $sessionUser['role'] ?? null)

    <div class="page-frame">
        <header class="topbar">
            <div class="container topbar-inner">
                <div class="brand-block">
                    <a href="{{ route('dashboard') }}" class="brand">MAPBProject01</a>
                    <p class="brand-copy">Academic records hub for students, faculty, and administrators.</p>
                </div>

                <nav class="nav-links">
                    <a href="{{ route('dashboard') }}">Overview</a>
                    @if($role === 'admin')
                        <a href="{{ route('student.index') }}">Students</a>
                        <a href="{{ route('teacher.index') }}">Teachers</a>
                        <a href="{{ route('degree.index') }}">Degrees</a>
                    @endif
                </nav>

                @if($sessionUser)
                    <div class="topbar-meta">
                        <div class="identity-chip">
                            <span class="identity-label">{{ strtoupper($role ?? 'user') }}</span>
                            <strong>{{ $sessionUser['username'] ?? 'Session User' }}</strong>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                @endif
            </div>
        </header>

        <main class="container page-content">
            <section class="page-hero">
                <div>
                    <p class="eyebrow">Campus operations</p>
                    <h1 class="hero-title">Manage academic information with a clearer, faster workspace.</h1>
                </div>
                <p class="hero-copy">
                    Track profiles, maintain degree records, and keep account access organized in one system.
                </p>
            </section>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    <ul class="error-list">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

</body>
</html>
