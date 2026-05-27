@extends('layouts.app')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                <div>
                    <p class="text-uppercase text-primary small fw-semibold mb-2">Admin Management</p>
                    <h2 class="h1 mb-0">Teachers</h2>
                </div>
                <a href="{{ route('teacher.create') }}" class="btn btn-primary">Add Teacher</a>
            </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Contact</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->full_name }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->userAccount?->username }}</td>
                            <td>{{ $teacher->contactno }}</td>
                            <td>
                                <div class="d-flex flex-wrap gap-2">
                                <a href="{{ route('teacher.show', $teacher) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                <a href="{{ route('teacher.edit', $teacher) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form method="POST" action="{{ route('teacher.destroy', $teacher) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this teacher?')">Delete</button>
                                </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-secondary">No teachers found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">{{ $teachers->links() }}</div>
        </div>
    </div>
@endsection
