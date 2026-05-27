@extends('layouts.app')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <p class="text-uppercase text-primary small fw-semibold mb-2">Administrator</p>
            <h2 class="h1 mb-2">Admin Dashboard</h2>
            <p class="text-secondary mb-4">A quick operational snapshot of your academic records workspace.</p>

            <div class="row g-3 mb-4">
                <div class="col-md-6 col-xl-3">
                    <div class="card h-100 border-primary-subtle">
                        <div class="card-body stat-card">
                            <span class="text-secondary small text-uppercase">Students</span>
                            <strong>{{ $stats['students'] }}</strong>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card h-100 border-primary-subtle">
                        <div class="card-body stat-card">
                            <span class="text-secondary small text-uppercase">Teachers</span>
                            <strong>{{ $stats['teachers'] }}</strong>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card h-100 border-primary-subtle">
                        <div class="card-body stat-card">
                            <span class="text-secondary small text-uppercase">Degrees</span>
                            <strong>{{ $stats['degrees'] }}</strong>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card h-100 border-primary-subtle">
                        <div class="card-body stat-card">
                            <span class="text-secondary small text-uppercase">Active Accounts</span>
                            <strong>{{ $stats['active_accounts'] }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-4"><a href="{{ route('student.index') }}" class="btn btn-outline-primary w-100 py-3">Manage Students</a></div>
                <div class="col-md-4"><a href="{{ route('teacher.index') }}" class="btn btn-outline-primary w-100 py-3">Manage Teachers</a></div>
                <div class="col-md-4"><a href="{{ route('degree.index') }}" class="btn btn-outline-primary w-100 py-3">Manage Degrees</a></div>
            </div>
        </div>
    </div>
@endsection
