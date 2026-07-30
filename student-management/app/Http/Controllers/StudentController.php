<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_number' => 'required|unique:students,student_number',
            'full_name' => 'required|max:255',
            'email' => 'required|email|unique:students,email',
            'course' => 'required|max:100',
        ]);
        Student::create($validatedData);
        return redirect()
            ->route('students.index')
            ->with('success', 'Student record added successfully.');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'student_number' =>
            'required|unique:students,student_number,' . $student->id,
            'full_name' =>
            'required|max:255',
            'email' =>
            'required|email|unique:students,email,' . $student->id,
            'course' =>
            'required|max:100',
        ]);
        $student->update($validatedData);
        return redirect()
            ->route('students.index')
            ->with(
                'success',
                'Student record updated successfully.'
            );
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()
            ->route('students.index')
            ->with(
                'success',
                'Student record deleted successfully.'
            );
    }
}
