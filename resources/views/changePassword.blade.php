@extends('layouts.app')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <p class="text-uppercase text-primary small fw-semibold mb-2">Password Update</p>
            <h2 class="h1 mb-4">Change password</h2>

            <form method="POST" action="{{ route('password.change.update') }}" class="row g-3">
                @csrf
                <div class="col-12">
                    <label for="current_password" class="form-label">Current Password</label>
                    <input id="current_password" name="current_password" type="password" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">New Password</label>
                    <input id="password" name="password" type="password" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update Password</button>
                </div>
            </form>
        </div>
    </div>
@endsection
