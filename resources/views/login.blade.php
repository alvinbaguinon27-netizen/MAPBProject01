<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container min-vh-100 d-flex align-items-center py-5">
        <div class="row g-4 w-100 justify-content-center">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm bg-primary text-white h-100">
                    <div class="card-body p-4 p-md-5 d-flex flex-column">
                        <p class="text-uppercase small fw-semibold mb-2">MAPBProject01</p>
                        <h1 class="display-6 fw-bold">Campus records, redesigned for daily use.</h1>
                        <p class="mt-3 mb-4 text-white-50">A focused portal for academic profiles, degree assignments, and institutional access.</p>
                        <div class="row g-3 mt-auto">
                            <div class="col-md-6">
                                <div class="bg-white bg-opacity-10 rounded-3 p-3 h-100">
                                    <div class="small text-uppercase fw-semibold mb-2">Unified access</div>
                                    <div>One entry point for admins, teachers, and students.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="bg-white bg-opacity-10 rounded-3 p-3 h-100">
                                    <div class="small text-uppercase fw-semibold mb-2">Faster maintenance</div>
                                    <div>Clean screens for updating records without clutter.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <p class="text-uppercase text-primary small fw-semibold mb-2">Student, Teacher, and Admin Portal</p>
                        <h2 class="h1 mb-3">Sign in</h2>
                        <p class="text-secondary mb-4">Use your assigned username and password to continue.</p>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
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

                        <form method="POST" action="{{ route('login.attempt') }}" class="d-grid gap-3">
                            @csrf
                            <div>
                                <label for="username" class="form-label">Username</label>
                                <input id="username" name="username" type="text" class="form-control" value="{{ old('username') }}" required>
                            </div>
                            <div>
                                <label for="password" class="form-label">Password</label>
                                <input id="password" name="password" type="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
