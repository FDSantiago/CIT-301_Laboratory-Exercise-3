<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display student records with search and course filtering.
     */
    public function index(Request $request): View
    {
        // Read the values from the URL query string.
        $search = trim((string) $request->input('search'));
        $course = trim((string) $request->input('course'));
        // Begin building the student query.
        $query = Student::query();
        /*
 * Search student_number, full_name, or email.
 *
 * The conditions are grouped so that they work correctly
 * when combined with the course filter.
 */
        if ($search !== '') {
            $query->where(function ($studentQuery) use ($search) {
                $studentQuery
                    ->where('student_number', 'like', '%' . $search . '%')
                    ->orWhere('full_name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        }
        // Apply the course filter only when a course is selected.
        if ($course !== '') {
            $query->where('course', $course);
        }
        // Arrange the newest records first.
        $students = $query
            ->latest()
            ->get();
        /*
 * Retrieve the available courses directly from the database.
 * This keeps the filter updated when new course values are added.
 */
        $courses = Student::query()
            ->whereNotNull('course')
            ->where('course', '!=', '')
            ->distinct()
            ->orderBy('course')
            ->pluck('course');
        return view(
            'students.index',
            compact('students', 'courses', 'search', 'course')
        );
    }
    /**
     * Show the Create Student form.
     */
    public function create(): View
    {
        return view('students.create');
    }
    /**
     * Save a new student.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'student_number' => [
                'required',
                'max:50',
                'unique:students,student_number',
            ],
            'full_name' => [
                'required',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:students,email',
            ],
            'course' => [
                'required',
                'max:100',
            ],
            'profile_picture' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],
        ]);
        /*
 * Store the picture only when the user uploaded one.
 * The returned value is the stored relative path.
 */
        if ($request->hasFile('profile_picture')) {
            $validatedData['profile_picture'] =
                $request->file('profile_picture')
                ->store('student_pictures', 'public');
        }
        Student::create($validatedData);
        return redirect()
            ->route('students.index')
            ->with('success', 'Student record added successfully.');
    }
    /**
     * Show the Edit Student form.
     */
    public function edit(Student $student): View
    {
        return view('students.edit', compact('student'));
    }
    /**
     * Update an existing student.
     */
    public function update(
        Request $request,
        Student $student
    ): RedirectResponse {
        $validatedData = $request->validate([
            'student_number' => [
                'required',
                'max:50',
                'unique:students,student_number,' . $student->id,
            ],
            'full_name' => [
                'required',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:students,email,' . $student->id,
            ],
            'course' => [
                'required',
                'max:100',
            ],
            'profile_picture' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],
        ]);
        /*
 * When a new picture is uploaded, delete the old picture
 * before storing the replacement.
 */
        if ($request->hasFile('profile_picture')) {
            if (
                $student->profile_picture &&
                Storage::disk('public')
                ->exists($student->profile_picture)
            ) {
                Storage::disk('public')
                    ->delete($student->profile_picture);
            }
            $validatedData['profile_picture'] =
                $request->file('profile_picture')
                ->store('student_pictures', 'public');
        }
        $student->update($validatedData);
        return redirect()
            ->route('students.index')
            ->with('success', 'Student record updated successfully.');
    }
    /**
     * Delete a student and the associated picture.
     */
    public function destroy(Student $student): RedirectResponse
    {
        /*
 * Delete the student's uploaded picture before deleting
 * the database record.
 */
        if (
            $student->profile_picture &&
            Storage::disk('public')
            ->exists($student->profile_picture)
        ) {
            Storage::disk('public')
                ->delete($student->profile_picture);
        }
        $student->delete();
        return redirect()
            ->route('students.index')
            ->with('success', 'Student record deleted successfully.');
    }
}
