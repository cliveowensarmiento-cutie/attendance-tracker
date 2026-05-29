# Attendance Tracker - Laravel Application

A complete attendance tracking system built with Laravel featuring user authentication, student management, and attendance marking with reporting.

## Features

✅ **User Authentication**
- User registration and login
- Secure password hashing
- Session management

✅ **Student Management**
- Add, edit, and delete students
- Store student details (name, email, roll number)
- View all students

✅ **Attendance Marking**
- Mark attendance by date
- Three attendance statuses: Present, Absent, Late
- Bulk marking for all students at once
- Update attendance records anytime

✅ **Reporting & Analytics**
- Overall attendance report with statistics
- Individual student attendance history
- Attendance percentage calculation
- Color-coded attendance indicators

✅ **Dashboard**
- Quick overview of statistics
- Today's summary
- Quick action buttons

## System Requirements

- PHP 8.2 or higher
- MySQL/MariaDB (via XAMPP)
- Composer
- Node.js and npm (for assets)

## Installation Steps

### 1. Navigate to Project Directory
```bash
cd c:\xampp\htdocs\attendance_tracker
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Generate Application Key
```bash
php artisan key:generate
```

### 4. Configure Environment
The `.env` file is already configured for XAMPP MySQL:
- Database: `db_attrack`
- Username: `root`
- Password: (empty)

Ensure XAMPP MySQL is running on port 3306.

### 5. Run Migrations
```bash
php artisan migrate
```

### 6. Build Assets (Optional)
```bash
npm run build
```

### 7. Start Development Server
```bash
php artisan serve
```

Then visit: `http://localhost:8000`

## Usage

### First Time Setup
1. Register a new account at `/register`
2. Login with your credentials
3. Access the dashboard

### Workflow
1. **Add Students**: Navigate to Students → Add Student
2. **Mark Attendance**: Go to Mark Attendance, select date, mark statuses for each student
3. **View Reports**: Check Reports to see attendance statistics
4. **Student Reports**: Click on any student to see their attendance history

## Database Schema

### Users Table
- id, name, email, password, timestamps

### Students Table
- id, name, email, roll_number, timestamps

### Attendance Table
- id, student_id (FK), date, status (present/absent/late), timestamps
- Unique constraint on (student_id, date)

## File Structure

```
app/
├── Models/
│   ├── User.php
│   ├── Student.php
│   └── Attendance.php
├── Http/Controllers/
│   ├── StudentController.php
│   └── AttendanceController.php

resources/views/
├── layout.blade.php (Main layout)
├── dashboard.blade.php
├── login.blade.php
├── register.blade.php
├── students_*.blade.php (Student views)
└── attendance_*.blade.php (Attendance views)

database/migrations/
├── ..._create_users_table.php
├── ..._create_students_table.php
└── ..._create_attendance_table.php

routes/
└── web.php (All application routes)
```

## Default Routes

- `/` → Redirect to dashboard (if logged in) or login
- `/register` → Registration page
- `/login` → Login page
- `/dashboard` → Dashboard (authenticated)
- `/students` → Student list (GET), Create student (POST)
- `/students/{id}/edit` → Edit student (GET), Update (PUT)
- `/students/{id}` → Delete student (DELETE)
- `/attendance` → Mark attendance (GET), Save (POST)
- `/attendance/report` → Overall attendance report
- `/attendance/student/{id}` → Individual student report
- `/logout` → Logout (POST)

## Features Breakdown

### Authentication
- Built with Laravel's authentication system
- Password hashing with bcrypt
- Session-based authentication
- Login/logout functionality
- Registration with validation

### Student Management
- Full CRUD operations
- Unique email and roll number validation
- Delete with cascade (removes related attendance records)

### Attendance Tracking
- Daily attendance marking
- Support for multiple statuses
- Update existing records
- Prevent duplicate entries per student per day

### Reporting
- Aggregate attendance statistics
- Attendance percentage calculation
- Individual student history with dates
- Color-coded status indicators

## Troubleshooting

### Database Connection Error
- Ensure XAMPP is running
- Verify MySQL service is active
- Check `.env` database configuration
- Run: `php artisan migrate`

### Views Not Found
- Run: `php artisan view:clear`
- Check view file names match controller references

### 419 Token Mismatch
- Clear sessions: `php artisan cache:clear`
- Run: `php artisan config:clear`

### Missing Migrations
- Run: `php artisan migrate:fresh` (Warning: resets database)
- Or: `php artisan migrate`

## Performance Tips

- Use `php artisan optimize` for production
- Enable query caching for reports
- Index frequently queried columns
- Use pagination for large datasets

## Security Notes

- All passwords are hashed using bcrypt
- CSRF protection on all POST requests
- SQL injection prevention with Eloquent ORM
- XSS protection with Blade templating
- HTTP only session cookies

## License

This project is provided as-is for educational purposes.

## Support

For issues or questions:
1. Check Laravel documentation: https://laravel.com/docs
2. Review the code comments
3. Check `.env` configuration
4. Verify all dependencies are installed

---

**Last Updated**: 2026-05-28
**Laravel Version**: 12.0+
**PHP Version**: 8.2+
