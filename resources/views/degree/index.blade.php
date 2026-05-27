@extends('layouts.app')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                <div>
                    <p class="text-uppercase text-primary small fw-semibold mb-2">Admin Management</p>
                    <h2 class="h1 mb-0">Degrees</h2>
                </div>
                <a href="{{ route('degree.create') }}" class="btn btn-primary">Add Degree</a>
            </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($degrees as $degree)
                        <tr>
                            <td>{{ $degree->degree_title }}</td>
                            <td>{{ $degree->created_at?->format('M d, Y') }}</td>
                            <td>
                                <div class="d-flex flex-wrap gap-2">
                                <a href="{{ route('degree.show', $degree) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                <a href="{{ route('degree.edit', $degree) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form method="POST" action="{{ route('degree.destroy', $degree) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this degree?')">Delete</button>
                                </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-secondary">No degrees found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">{{ $degrees->links() }}</div>
        </div>
    </div>
@endsection
