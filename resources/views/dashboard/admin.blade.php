@extends('layouts.app')

@section('content')
    <section class="panel dashboard-panel">
        <div class="panel-header">
            <div>
                <p class="eyebrow">Administrator</p>
                <h1>Admin Dashboard</h1>
                <p class="muted">A quick operational snapshot of your academic records workspace.</p>
            </div>
        </div>

        <div class="card-grid">
            <article class="stat-card">
                <span>Students</span>
                <strong>{{ $stats['students'] }}</strong>
            </article>
            <article class="stat-card">
                <span>Teachers</span>
                <strong>{{ $stats['teachers'] }}</strong>
            </article>
            <article class="stat-card">
                <span>Degrees</span>
                <strong>{{ $stats['degrees'] }}</strong>
            </article>
            <article class="stat-card">
                <span>Active Accounts</span>
                <strong>{{ $stats['active_accounts'] }}</strong>
            </article>
        </div>

        <div class="action-grid">
            <a href="{{ route('student.index') }}" class="action-card">
                <span>Directory</span>
                <strong>Manage Students</strong>
            </a>
            <a href="{{ route('teacher.index') }}" class="action-card">
                <span>Faculty</span>
                <strong>Manage Teachers</strong>
            </a>
            <a href="{{ route('degree.index') }}" class="action-card">
                <span>Programs</span>
                <strong>Manage Degrees</strong>
            </a>
        </div>
    </section>
@endsection
