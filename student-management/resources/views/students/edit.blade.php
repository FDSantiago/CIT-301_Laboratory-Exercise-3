@extends('layouts.app')
@section('content')
    <h1>Edit Student</h1>
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="student_number">
            Student Number
        </label>
        <input type="text" id="student_number" name="student_number"
            value="{{ old('student_number', $student->student_number) }}">
        @error('student_number')
            <div class="error">
                {{ $message }}
            </div>
        @enderror
        <label for="full_name">
            Full Name
        </label>
        <input type="text" id="full_name" name="full_name" value="{{ old('full_name', $student->full_name) }}">
        @error('full_name')
            <div class="error">
                {{ $message }}
            </div>
        @enderror
        <label for="email">
            Email Address
        </label>
        <input type="email" id="email" name="email" value="{{ old('email', $student->email) }}">
        @error('email')
            <div class="error">
                {{ $message }}
            </div>
        @enderror
        <label for="course">
            Course
        </label>
        <input type="text" id="course" name="course" value="{{ old('course', $student->course) }}">
        @error('course')
            <div class="error">
                {{ $message }}
            </div>
        @enderror
        <button type="submit" class="btn">
            Update Student
        </button>
        <a href="{{ route('students.index') }}" class="btn">
            Cancel
        </a>
    </form>
@endsection
