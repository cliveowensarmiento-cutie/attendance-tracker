<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->query('date', today()->toDateString());
        $students = Student::all();
        $attendance = Attendance::where('date', $date)->get()->keyBy('student_id');

        return view('attendance_index', compact('students', 'attendance', 'date'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'attendance' => 'required|array',
            'attendance.*.student_id' => 'required|exists:students,id',
            'attendance.*.status' => 'required|in:present,absent,late',
        ]);

        $date = $validated['date'];

        foreach ($validated['attendance'] as $record) {
            Attendance::updateOrCreate(
                [
                    'student_id' => $record['student_id'],
                    'date' => $date,
                ],
                [
                    'status' => $record['status'],
                ]
            );
        }

        return redirect()->route('attendance.index', ['date' => $date])->with('success', 'Attendance marked successfully!');
    }

    public function report()
    {
        $students = Student::with('attendance')->get();
        return view('attendance_report', compact('students'));
    }

    public function studentReport(Student $student)
    {
        $attendance = $student->attendance()->orderBy('date', 'desc')->get();
        return view('attendance_student_report', compact('student', 'attendance'));
    }
}
