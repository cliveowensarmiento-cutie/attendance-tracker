@echo off
echo ========================================
echo  Attendance Tracker - Setup Script
echo ========================================
echo.

echo Creating necessary directories...
if not exist "resources\views\auth" mkdir resources\views\auth
if not exist "resources\views\students" mkdir resources\views\students
if not exist "resources\views\attendance" mkdir resources\views\attendance
echo [OK] Directories created

echo.
echo Running Laravel setup...
echo.

echo [1/5] Installing PHP dependencies...
call composer install
if errorlevel 1 goto error

echo.
echo [2/5] Generating application key...
call php artisan key:generate
if errorlevel 1 goto error

echo.
echo [3/5] Running database migrations...
call php artisan migrate
if errorlevel 1 goto error

echo.
echo [4/5] Installing Node dependencies...
call npm install
if errorlevel 1 goto error

echo.
echo [5/5] Building frontend assets...
call npm run build
if errorlevel 1 goto error

echo.
echo ========================================
echo  Setup Complete!
echo ========================================
echo.
echo Next steps:
echo   1. Start XAMPP (ensure MySQL is running)
echo   2. Run: php artisan serve
echo   3. Visit: http://localhost:8000
echo   4. Register a new account
echo.
echo Optional: Seed sample data with:
echo   php artisan db:seed --class=AttendanceSeeder
echo.
pause
exit /b 0

:error
echo.
echo [ERROR] Setup failed! Check the error message above.
pause
exit /b 1
