<form method="POST" action="{{ $submitUrl }}" class="row g-3">
    @csrf
    @if($submitMethod !== 'POST')
        @method($submitMethod)
    @endif
    <div class="col-md-6">
        <label for="fname" class="form-label">First Name</label>
        <input id="fname" name="fname" type="text" class="form-control" value="{{ old('fname', $student?->fname) }}" required>
    </div>
    <div class="col-md-6">
        <label for="mname" class="form-label">Middle Name</label>
        <input id="mname" name="mname" type="text" class="form-control" value="{{ old('mname', $student?->mname) }}">
    </div>
    <div class="col-md-6">
        <label for="lname" class="form-label">Last Name</label>
        <input id="lname" name="lname" type="text" class="form-control" value="{{ old('lname', $student?->lname) }}" required>
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $student?->email) }}" required>
    </div>
    <div class="col-md-6">
        <label for="contactno" class="form-label">Contact Number</label>
        <input id="contactno" name="contactno" type="text" class="form-control" value="{{ old('contactno', $student?->contactno) }}" required>
    </div>
    <div class="col-md-6">
        <label for="degree_id" class="form-label">Degree</label>
        <select id="degree_id" name="degree_id" class="form-select" required>
            <option value="">Select Degree</option>
            @foreach($degrees as $degree)
                <option value="{{ $degree->id }}" @selected(old('degree_id', $student?->degree_id) == $degree->id)>{{ $degree->degree_title }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label for="username" class="form-label">Username</label>
        <input id="username" name="username" type="text" class="form-control" value="{{ old('username', $student?->userAccount?->username) }}" required>
    </div>
    <div class="col-md-6">
        <label for="password" class="form-label">Password {{ $student ? '(Leave blank to keep current)' : '' }}</label>
        <input id="password" name="password" type="password" class="form-control" {{ $student ? '' : 'required' }}>
    </div>
    <div class="col-md-6">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" {{ $student ? '' : 'required' }}>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
    </div>
</form>
