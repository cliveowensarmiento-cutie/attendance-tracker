<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample students
        $students = [
            ['name' => 'John Smith', 'email' => 'john@example.com', 'roll_number' => 'S001'],
            ['name' => 'Jane Doe', 'email' => 'jane@example.com', 'roll_number' => 'S002'],
            ['name' => 'Bob Johnson', 'email' => 'bob@example.com', 'roll_number' => 'S003'],
            ['name' => 'Alice Williams', 'email' => 'alice@example.com', 'roll_number' => 'S004'],
            ['name' => 'Charlie Brown', 'email' => 'charlie@example.com', 'roll_number' => 'S005'],
        ];

        foreach ($students as $studentData) {
            Student::create($studentData);
        }

        // Create sample attendance records for the last 30 days
        $students = Student::all();
        for ($i = 0; $i < 30; $i++) {
            $date = now()->subDays($i);
            
            foreach ($students as $student) {
                // Random attendance status (80% present, 15% absent, 5% late)
                $random = rand(1, 100);
                if ($random <= 80) {
                    $status = 'present';
                } elseif ($random <= 95) {
                    $status = 'absent';
                } else {
                    $status = 'late';
                }

                Attendance::updateOrCreate(
                    [
                        'student_id' => $student->id,
                        'date' => $date->toDateString(),
                    ],
                    [
                        'status' => $status,
                    ]
                );
            }
        }

        $this->command->info('Sample data seeded successfully!');
    }
}
