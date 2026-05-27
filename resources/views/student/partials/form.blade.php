<div class="row g-3 student-form" data-submit-url="{{ $submitUrl }}" data-submit-method="{{ $submitMethod }}">
    <div class="col-md-6">
        <label for="fname" class="form-label">First Name</label>
        <input id="fname" name="fname" type="text" class="form-control" value="{{ old('fname', $student?->fname) }}" required>
        <p class="field-error" data-error-for="fname"></p>
    </div>
    <div class="col-md-6">
        <label for="mname" class="form-label">Middle Name</label>
        <input id="mname" name="mname" type="text" class="form-control" value="{{ old('mname', $student?->mname) }}">
        <p class="field-error" data-error-for="mname"></p>
    </div>
    <div class="col-md-6">
        <label for="lname" class="form-label">Last Name</label>
        <input id="lname" name="lname" type="text" class="form-control" value="{{ old('lname', $student?->lname) }}" required>
        <p class="field-error" data-error-for="lname"></p>
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $student?->email) }}" required>
        <p class="field-error" data-error-for="email"></p>
    </div>
    <div class="col-md-6">
        <label for="contactno" class="form-label">Contact Number</label>
        <input id="contactno" name="contactno" type="text" class="form-control" value="{{ old('contactno', $student?->contactno) }}" required>
        <p class="field-error" data-error-for="contactno"></p>
    </div>
    <div class="col-md-6">
        <label for="degree_id" class="form-label">Degree</label>
        <select id="degree_id" name="degree_id" class="form-select" required>
            <option value="">Select Degree</option>
            @foreach($degrees as $degree)
                <option value="{{ $degree->id }}" @selected(old('degree_id', $student?->degree_id) == $degree->id)>{{ $degree->degree_title }}</option>
            @endforeach
        </select>
        <p class="field-error" data-error-for="degree_id"></p>
    </div>
    <div class="col-md-6">
        <label for="username" class="form-label">Username</label>
        <input id="username" name="username" type="text" class="form-control" value="{{ old('username', $student?->userAccount?->username) }}" required>
        <p class="field-error" data-error-for="username"></p>
    </div>
    <div class="col-md-6">
        <label for="password" class="form-label">Password {{ $student ? '(Leave blank to keep current)' : '' }}</label>
        <input id="password" name="password" type="password" class="form-control" {{ $student ? '' : 'required' }}>
        <p class="field-error" data-error-for="password"></p>
    </div>
    <div class="col-md-6">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" {{ $student ? '' : 'required' }}>
        <p class="field-error" data-error-for="password_confirmation"></p>
    </div>

    <div class="col-12">
        <div id="message"></div>
        <button type="button" class="btn btn-primary" id="{{ $student ? 'editStudentBtn' : 'saveStudentBtn' }}">{{ $buttonText }}</button>
    </div>
</div>
