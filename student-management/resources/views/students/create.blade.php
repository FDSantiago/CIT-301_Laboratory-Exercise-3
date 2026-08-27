@extends('layouts.app')
@section('content')
    <h1>Register New Student</h1>
    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="student_number">Student Number</label>
            <input type="text" id="student_number" name="student_number" value="{{ old('student_number') }}" required>
            @error('student_number')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
            @error('full_name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="course">Course</label>
            <select id="course" name="course" required>
                <option value="">Select a course</option>
                <option value="BSIT" {{ old('course') === 'BSIT' ? 'selected' : '' }}>
                    BS Information Technology
                </option>
                <option value="BSCS" {{ old('course') === 'BSCS' ? 'selected' : '' }}>
                    BS Computer Science
                </option>
                <option value="BSEMC" {{ old('course') === 'BSEMC' ? 'selected' : '' }}>
                    BS Entertainment and Multimedia Computing
                </option>
                <option value="ACT" {{ old('course') === 'ACT' ? 'selected' : '' }}>
                    Associate in Computer Technology
                </option>
            </select>
            @error('course')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="profile_picture">Student Picture</label>
            <input type="file" id="profile_picture" name="profile_picture" accept=".jpg,.jpeg,.png,image/jpeg,image/png">
            <small>
                Optional. Accepted formats: JPG, JPEG, and PNG.
                Maximum file size: 2 MB.
            </small>
            @error('profile_picture')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn">
            Save Student
        </button>
        <a href="{{ route('students.index') }}" class="btn-secondary">
            Cancel
        </a>
    </form>
@endsection
