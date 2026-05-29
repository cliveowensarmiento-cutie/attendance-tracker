@extends('layout')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="mb-4">Dashboard</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Students</h5>
                        <p class="card-text display-4">{{ \App\Models\Student::count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Today's Records</h5>
                        <p class="card-text display-4">{{ \App\Models\Attendance::where('date', today())->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Present Today</h5>
                        <p class="card-text display-4">{{ \App\Models\Attendance::where('date', today())->where('status', 'present')->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Absent Today</h5>
                        <p class="card-text display-4">{{ \App\Models\Attendance::where('date', today())->where('status', 'absent')->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('students.index') }}" class="btn btn-primary btn-block w-100 mb-2">View Students</a>
                        <a href="{{ route('attendance.index') }}" class="btn btn-success btn-block w-100 mb-2">Mark Attendance</a>
                        <a href="{{ route('attendance.report') }}" class="btn btn-info btn-block w-100">View Reports</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Today's Summary</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Date:</strong> {{ today()->format('l, F j, Y') }}</p>
                        <p><strong>Present:</strong> {{ \App\Models\Attendance::where('date', today())->where('status', 'present')->count() }}</p>
                        <p><strong>Absent:</strong> {{ \App\Models\Attendance::where('date', today())->where('status', 'absent')->count() }}</p>
                        <p><strong>Late:</strong> {{ \App\Models\Attendance::where('date', today())->where('status', 'late')->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
