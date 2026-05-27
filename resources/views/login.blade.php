<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="auth-page">
    <div class="auth-layout">
        <section class="auth-intro">
            <p class="eyebrow">MAPBProject01</p>
            <h1>Campus records, redesigned for daily use.</h1>
            <p class="auth-copy">
                A focused portal for managing academic profiles, degree assignments, and institutional access.
            </p>
            <div class="auth-highlights">
                <article class="highlight-card">
                    <span>Unified access</span>
                    <strong>One entry point for admins, teachers, and students.</strong>
                </article>
                <article class="highlight-card">
                    <span>Faster maintenance</span>
                    <strong>Clean screens for updating records without clutter.</strong>
                </article>
            </div>
        </section>

        <div class="auth-card">
            <div>
                <p class="eyebrow">Student, Teacher, and Admin Portal</p>
                <h2>Sign in</h2>
                <p class="muted">Use your assigned username and password to continue.</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
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

            <form method="POST" action="{{ route('login.attempt') }}" class="form-grid">
                @csrf
                <div>
                    <label for="username">Username</label>
                    <input id="username" name="username" type="text" value="{{ old('username') }}" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" required>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
