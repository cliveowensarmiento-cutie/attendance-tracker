

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <h1 class="mb-4">Dashboard</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Students</h5>
                        <p class="card-text display-4"><?php echo e(\App\Models\Student::count()); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Today's Records</h5>
                        <p class="card-text display-4"><?php echo e(\App\Models\Attendance::where('date', today())->count()); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Present Today</h5>
                        <p class="card-text display-4"><?php echo e(\App\Models\Attendance::where('date', today())->where('status', 'present')->count()); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Absent Today</h5>
                        <p class="card-text display-4"><?php echo e(\App\Models\Attendance::where('date', today())->where('status', 'absent')->count()); ?></p>
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
                        <a href="<?php echo e(route('students.index')); ?>" class="btn btn-primary btn-block w-100 mb-2">View Students</a>
                        <a href="<?php echo e(route('attendance.index')); ?>" class="btn btn-success btn-block w-100 mb-2">Mark Attendance</a>
                        <a href="<?php echo e(route('attendance.report')); ?>" class="btn btn-info btn-block w-100">View Reports</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Today's Summary</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Date:</strong> <?php echo e(today()->format('l, F j, Y')); ?></p>
                        <p><strong>Present:</strong> <?php echo e(\App\Models\Attendance::where('date', today())->where('status', 'present')->count()); ?></p>
                        <p><strong>Absent:</strong> <?php echo e(\App\Models\Attendance::where('date', today())->where('status', 'absent')->count()); ?></p>
                        <p><strong>Late:</strong> <?php echo e(\App\Models\Attendance::where('date', today())->where('status', 'late')->count()); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\attendance_tracker\resources\views/dashboard.blade.php ENDPATH**/ ?>