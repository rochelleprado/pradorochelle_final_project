<?php

namespace App\Http\Controllers;

use App\Events\StudentCreated;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of students.
     */
    public function index(): View
    {
        $students = Student::query()
            ->orderBy('last_name')
            ->orderBy('first_name')
            ->paginate(10);

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     */
    public function create(): View
    {
        return view('students.create');
    }

    /**
     * Store a newly created student.
     */
    public function store(StoreStudentRequest $request): RedirectResponse
    {
        $student = Student::create($request->validated());

        broadcast(new StudentCreated($student));

        return redirect()
            ->route('students.index')
            ->with('status', 'student-created');
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit(Student $student): View
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified student.
     */
    public function update(UpdateStudentRequest $request, Student $student): RedirectResponse
    {
        $student->update($request->validated());

        return redirect()
            ->route('students.index')
            ->with('status', 'student-updated');
    }

    /**
     * Remove the specified student.
     */
    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('status', 'student-deleted');
    }
}