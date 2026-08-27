@extends('layouts.app')
@section('content')
    <div class="page-header">
        <div>
            <h1>Student Records</h1>
            <p>Manage, search, and filter student information.</p>
        </div>
        <a href="{{ route('students.create') }}" class="btn">
            Add New Student
        </a>
    </div>
    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif
    <!-- Search and Filter Form -->
    <form action="{{ route('students.index') }}" method="GET" class="search-filter-form">
        <div class="search-field">
            <label for="search">
                Search Student
            </label>
            <input type="text" id="search" name="search" value="{{ $search }}"
                placeholder="Student number, name, or email">
        </div>
        <div class="filter-field">
            <label for="course">
                Filter by Course
            </label>
            <select id="course" name="course">
                <option value="">All Courses</option>
                @foreach ($courses as $courseOption)
                    <option value="{{ $courseOption }}" {{ $course === $courseOption ? 'selected' : '' }}>
                        {{ $courseOption }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="filter-buttons">
            <button type="submit" class="btn">
                Search / Filter
            </button>
            <a href="{{ route('students.index') }}" class="btn-secondary">
                Clear
            </a>
        </div>
    </form>
    <!-- Search Summary -->
    @if ($search !== '' || $course !== '')
        <div class="search-summary">
            <strong>Active search:</strong>
            @if ($search !== '')
                Keyword:
                <span>{{ $search }}</span>
            @endif
            @if ($course !== '')
                Course:
                <span>{{ $course }}</span>
            @endif
            <br>
            <strong>
                {{ $students->count() }}
                {{ $students->count() === 1 ? 'record' : 'records' }}
                found
            </strong>
        </div>
    @endif
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Picture</th>
                    <th>Student Number</th>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Course</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                    <tr>
                        <td>
                            @if ($student->profile_picture)
                                <img src="{{ asset('storage/' . $student->profile_picture) }}"
                                    alt="{{ $student->full_name }}" class="student-picture">
                            @else
                                <div class="default-picture">
                                    {{ strtoupper(substr($student->full_name, 0, 1)) }}
                                </div>
                            @endif
                        </td>
                        <td>
                            {{ $student->student_number }}
                        </td>
                        <td>
                            {{ $student->full_name }}
                        </td>
                        <td>
                            {{ $student->email }}
                        </td>
                        <td>
                            <span class="course-badge">
                                {{ $student->course }}
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('students.edit', $student->id) }}" class="btn-small">
                                    Edit
                                </a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                    class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger"
                                        onclick="return confirm(
 'Are you sure you want to delete this student?'
 )">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty-message">
                            @if ($search !== '' || $course !== '')
                                No student records matched your search.
                            @else
                                No student records found.
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
