<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        $students = Student::query()
            ->with(['degree', 'userAccount'])
            ->latest()
            ->paginate(10);

        return view('student.index', compact('students'));
    }

    public function create(): View
    {
        $degrees = Degree::query()->orderBy('degree_title')->get();

        return view('student.create', compact('degrees'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'mname' => ['nullable', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                Rule::unique('students', 'email'),
                Rule::unique('user_accounts', 'email'),
            ],
            'contactno' => ['required', 'string', 'max:255'],
            'degree_id' => ['required', 'exists:degrees,id'],
            'username' => ['required', 'string', 'max:255', Rule::unique('user_accounts', 'username')],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        DB::transaction(function () use ($data): void {
            $account = \App\Models\UserAccounts::create([
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'student',
                'is_active' => true,
                'must_change_password' => true,
            ]);

            Student::create([
                'fname' => $data['fname'],
                'mname' => $data['mname'] ?? null,
                'lname' => $data['lname'],
                'email' => $data['email'],
                'contactno' => $data['contactno'],
                'degree_id' => $data['degree_id'],
                'user_account_id' => $account->id,
            ]);
        });

        return redirect()->route('student.index')->with('success', 'Student created successfully.');
    }

    public function show(Student $student): View
    {
        $student->load(['degree', 'userAccount']);

        return view('student.show', compact('student'));
    }

    public function edit(Student $student): View
    {
        $student->load('userAccount');
        $degrees = Degree::query()->orderBy('degree_title')->get();

        return view('student.edit', compact('student', 'degrees'));
    }

    public function update(Request $request, Student $student): RedirectResponse
    {
        $student->load('userAccount');

        $data = $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'mname' => ['nullable', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                Rule::unique('students', 'email')->ignore($student->id),
                Rule::unique('user_accounts', 'email')->ignore($student->user_account_id),
            ],
            'contactno' => ['required', 'string', 'max:255'],
            'degree_id' => ['required', 'exists:degrees,id'],
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('user_accounts', 'username')->ignore($student->user_account_id),
            ],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        DB::transaction(function () use ($data, $student): void {
            $student->userAccount?->update(array_filter([
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => filled($data['password'] ?? null) ? Hash::make($data['password']) : null,
                'must_change_password' => filled($data['password'] ?? null) ? true : null,
            ], fn ($value) => ! is_null($value)));

            $student->update([
                'fname' => $data['fname'],
                'mname' => $data['mname'] ?? null,
                'lname' => $data['lname'],
                'email' => $data['email'],
                'contactno' => $data['contactno'],
                'degree_id' => $data['degree_id'],
            ]);
        });

        return redirect()->route('student.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student): RedirectResponse
    {
        DB::transaction(function () use ($student): void {
            $account = $student->userAccount;
            $student->courses()->detach();
            $student->delete();
            $account?->delete();
        });

        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }
}
