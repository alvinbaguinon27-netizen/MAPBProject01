<form method="POST" action="{{ $action }}" class="row g-3">
    @csrf
    @if($teacher)
        @method('PUT')
    @endif

    <div class="col-md-6">
        <label for="fname" class="form-label">First Name</label>
        <input id="fname" name="fname" type="text" class="form-control" value="{{ old('fname', $teacher?->fname) }}" required>
    </div>
    <div class="col-md-6">
        <label for="mname" class="form-label">Middle Name</label>
        <input id="mname" name="mname" type="text" class="form-control" value="{{ old('mname', $teacher?->mname) }}">
    </div>
    <div class="col-md-6">
        <label for="lname" class="form-label">Last Name</label>
        <input id="lname" name="lname" type="text" class="form-control" value="{{ old('lname', $teacher?->lname) }}" required>
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $teacher?->email) }}" required>
    </div>
    <div class="col-md-6">
        <label for="contactno" class="form-label">Contact Number</label>
        <input id="contactno" name="contactno" type="text" class="form-control" value="{{ old('contactno', $teacher?->contactno) }}" required>
    </div>
    <div class="col-md-6">
        <label for="username" class="form-label">Username</label>
        <input id="username" name="username" type="text" class="form-control" value="{{ old('username', $teacher?->userAccount?->username) }}" required>
    </div>
    <div class="col-md-6">
        <label for="password" class="form-label">Password {{ $teacher ? '(Leave blank to keep current)' : '' }}</label>
        <input id="password" name="password" type="password" class="form-control" {{ $teacher ? '' : 'required' }}>
    </div>
    <div class="col-md-6">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" {{ $teacher ? '' : 'required' }}>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
    </div>
</form>
