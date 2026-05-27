@extends('layouts.app')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <p class="text-uppercase text-primary small fw-semibold mb-2">Student</p>
            <h2 class="h1 mb-2">Welcome, {{ $student->full_name }}</h2>
            <p class="text-secondary mb-4">Your current profile and degree information are shown here.</p>

            <div class="card">
                <div class="card-body">
                    <h3 class="h5 mb-3">Profile</h3>
                    <div class="row g-3">
                        <div class="col-md-6"><strong>Username:</strong> {{ $student->userAccount?->username }}</div>
                        <div class="col-md-6"><strong>Email:</strong> {{ $student->email }}</div>
                        <div class="col-md-6"><strong>Contact:</strong> {{ $student->contactno }}</div>
                        <div class="col-md-6"><strong>Degree:</strong> {{ $student->degree?->degree_title ?? 'Not assigned' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
