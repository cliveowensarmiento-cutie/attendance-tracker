@extends('layout')

@section('title', 'Mark Attendance')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="mb-4">Mark Attendance</h1>

        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('attendance.index') }}">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="date" class="form-label">Select Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ $date }}">
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">Load</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Attendance for {{ \Carbon\Carbon::parse($date)->format('l, F j, Y') }}</h5>
            </div>
            <div class="card-body">
                @if ($students->count() == 0)
                    <div class="alert alert-info">No students found.</div>
                @else
                    <form method="POST" action="{{ route('attendance.store') }}">
                        @csrf

                        <input type="hidden" name="date" value="{{ $date }}">

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Roll Number</th>
                                        <th>Attendance Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        @php
                                            $attendanceRecord = $attendance->get($student->id);
                                            $currentStatus = $attendanceRecord?->status ?? 'present';
                                        @endphp
                                        <tr>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->roll_number }}</td>
                                            <td>
                                                <select class="form-select" name="attendance[{{ $loop->index }}][student_id]" style="display:none;">
                                                    <option value="{{ $student->id }}"></option>
                                                </select>
                                                <input type="hidden" name="attendance[{{ $loop->index }}][student_id]" value="{{ $student->id }}">
                                                <select class="form-select" name="attendance[{{ $loop->index }}][status]">
                                                    <option value="present" {{ $currentStatus === 'present' ? 'selected' : '' }}>Present</option>
                                                    <option value="absent" {{ $currentStatus === 'absent' ? 'selected' : '' }}>Absent</option>
                                                    <option value="late" {{ $currentStatus === 'late' ? 'selected' : '' }}>Late</option>
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Save Attendance</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
