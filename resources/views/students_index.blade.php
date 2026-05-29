@extends('layout')

@section('title', 'Students')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="mb-4">Students</h1>
        <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">+ Add Student</a>

        @if ($students->count() == 0)
            <div class="alert alert-info">No students found. <a href="{{ route('students.create') }}">Add one now</a></div>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roll Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->roll_number }}</td>
                                <td>
                                    <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ route('attendance.student-report', $student) }}" class="btn btn-sm btn-info">Report</a>
                                    <form method="POST" action="{{ route('students.destroy', $student) }}" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
