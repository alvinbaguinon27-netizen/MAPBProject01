@extends('layouts.app')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <p class="text-uppercase text-primary small fw-semibold mb-2">Admin Management</p>
            <h2 class="h1 mb-4">Create Teacher</h2>
            @include('teacher.partials.form', [
                'action' => route('teacher.store'),
                'teacher' => null,
                'buttonText' => 'Create Teacher'
            ])
        </div>
    </div>
@endsection
