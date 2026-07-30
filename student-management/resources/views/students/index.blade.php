@extends('layouts.app')
@section('content')
    <h1>Student Records</h1>
    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('students.create') }}" class="btn">
        Add New Student
    </a>
    <table>
        <thead>
            <tr>
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
                        {{ $student->student_number }}
                    </td>
                    <td>
                        {{ $student->full_name }}
                    </td>
                    <td>
                        {{ $student->email }}
                    </td>
                    <td>
                        {{ $student->course }}
                    </td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn">
                            Edit
                        </a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger"
                                onclick="return confirm('Are you sure you want to delete this student?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        No student records found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
