@extends('layouts.app')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                <div>
                    <p class="text-uppercase text-primary small fw-semibold mb-2">Teacher Record</p>
                    <h2 class="h1 mb-0">{{ $teacher->full_name }}</h2>
                </div>
                <a href="{{ route('teacher.edit', $teacher) }}" class="btn btn-primary">Edit</a>
            </div>

            <div class="row g-3">
                <div class="col-md-6"><div class="card"><div class="card-body"><strong>Email:</strong> {{ $teacher->email }}</div></div></div>
                <div class="col-md-6"><div class="card"><div class="card-body"><strong>Username:</strong> {{ $teacher->userAccount?->username }}</div></div></div>
                <div class="col-md-6"><div class="card"><div class="card-body"><strong>Contact:</strong> {{ $teacher->contactno }}</div></div></div>
                <div class="col-md-6"><div class="card"><div class="card-body"><strong>Role:</strong> {{ ucfirst($teacher->userAccount?->role ?? 'teacher') }}</div></div></div>
            </div>
        </div>
    </div>
@endsection
