<form method="POST" action="{{ $action }}" class="row g-3">
    @csrf
    @if($degree)
        @method('PUT')
    @endif

    <div class="col-12">
        <label for="degree_title" class="form-label">Degree Title</label>
        <input id="degree_title" name="degree_title" type="text" class="form-control" value="{{ old('degree_title', $degree?->degree_title) }}" required>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
    </div>
</form>
