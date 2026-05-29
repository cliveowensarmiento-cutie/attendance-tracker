@extends('layout')

@section('title', 'Attendance Report')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="mb-4">Attendance Report</h1>

        @if ($students->count() == 0)
            <div class="alert alert-info">No students found.</div>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Roll Number</th>
                            <th>Total Classes</th>
                            <th>Present</th>
                            <th>Absent</th>
                            <th>Late</th>
                            <th>Attendance %</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            @php
                                $total = $student->attendance->count();
                                $present = $student->attendance->where('status', 'present')->count();
                                $absent = $student->attendance->where('status', 'absent')->count();
                                $late = $student->attendance->where('status', 'late')->count();
                                $percentage = $total > 0 ? round(($present / $total) * 100, 2) : 0;
                            @endphp
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->roll_number }}</td>
                                <td>{{ $total }}</td>
                                <td><span class="badge bg-success">{{ $present }}</span></td>
                                <td><span class="badge bg-danger">{{ $absent }}</span></td>
                                <td><span class="badge bg-warning text-dark">{{ $late }}</span></td>
                                <td>
                                    @if ($percentage >= 75)
                                        <span class="badge bg-success">{{ $percentage }}%</span>
                                    @elseif ($percentage >= 50)
                                        <span class="badge bg-warning text-dark">{{ $percentage }}%</span>
                                    @else
                                        <span class="badge bg-danger">{{ $percentage }}%</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('attendance.student-report', $student) }}" class="btn btn-sm btn-info">View Details</a>
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
