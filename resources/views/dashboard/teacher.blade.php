@extends('layouts.app')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <p class="text-uppercase text-primary small fw-semibold mb-2">Teacher</p>
            <h2 class="h1 mb-2">Welcome, {{ $teacher->full_name }}</h2>
            <p class="text-secondary mb-4">Your profile and account details are available below.</p>

            <div class="card">
                <div class="card-body">
                    <h3 class="h5 mb-3">Profile</h3>
                    <div class="row g-3">
                        <div class="col-md-6"><strong>Username:</strong> {{ $teacher->userAccount?->username }}</div>
                        <div class="col-md-6"><strong>Email:</strong> {{ $teacher->email }}</div>
                        <div class="col-md-6"><strong>Contact:</strong> {{ $teacher->contactno }}</div>
                        <div class="col-md-6"><strong>Role:</strong> {{ ucfirst($teacher->userAccount?->role ?? 'teacher') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
