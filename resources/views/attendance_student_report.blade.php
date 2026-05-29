@extends('layout')

@section('title', $student->name . ' - Attendance Report')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="mb-4">{{ $student->name }}'s Attendance Report</h1>

        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Classes</h5>
                        <p class="card-text display-5">{{ $attendance->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Present</h5>
                        <p class="card-text display-5 text-success">{{ $attendance->where('status', 'present')->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Absent</h5>
                        <p class="card-text display-5 text-danger">{{ $attendance->where('status', 'absent')->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Late</h5>
                        <p class="card-text display-5 text-warning">{{ $attendance->where('status', 'late')->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Attendance History</h5>
            </div>
            <div class="card-body">
                @if ($attendance->count() == 0)
                    <div class="alert alert-info">No attendance records found.</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendance as $record)
                                    <tr>
                                        <td>{{ $record->date->format('F j, Y') }}</td>
                                        <td>{{ $record->date->format('l') }}</td>
                                        <td>
                                            @if ($record->status === 'present')
                                                <span class="badge bg-success">Present</span>
                                            @elseif ($record->status === 'absent')
                                                <span class="badge bg-danger">Absent</span>
                                            @else
                                                <span class="badge bg-warning text-dark">Late</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back to Students</a>
    </div>
</div>
@endsection
