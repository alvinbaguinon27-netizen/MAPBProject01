@extends('layouts.app')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                <div>
                    <p class="text-uppercase text-primary small fw-semibold mb-2">Admin Management</p>
                    <h2 class="h1 mb-0">Students</h2>
                </div>
                <a href="{{ route('student.create') }}" class="btn btn-primary">Add Student</a>
            </div>

            <div id="message"></div>

            <div id="studentsTableRegion" data-url="{{ route('student.index') }}">
                @include('student.partials.table', ['students' => $students])
            </div>
        </div>
    </div>
@endsection
