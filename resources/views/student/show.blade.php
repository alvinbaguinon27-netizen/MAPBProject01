@extends('layouts.app')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                <div>
                    <p class="text-uppercase text-primary small fw-semibold mb-2">Student Record</p>
                    <h2 class="h1 mb-0">{{ $student->full_name }}</h2>
                </div>
                <a href="{{ route('student.edit', $student) }}" class="btn btn-primary">Edit</a>
            </div>

            <div class="row g-3">
                <div class="col-md-6"><div class="card"><div class="card-body"><strong>Email:</strong> {{ $student->email }}</div></div></div>
                <div class="col-md-6"><div class="card"><div class="card-body"><strong>Username:</strong> {{ $student->userAccount?->username }}</div></div></div>
                <div class="col-md-6"><div class="card"><div class="card-body"><strong>Degree:</strong> {{ $student->degree?->degree_title ?? 'Not assigned' }}</div></div></div>
                <div class="col-md-6"><div class="card"><div class="card-body"><strong>Contact:</strong> {{ $student->contactno }}</div></div></div>
            </div>
        </div>
    </div>
@endsection
