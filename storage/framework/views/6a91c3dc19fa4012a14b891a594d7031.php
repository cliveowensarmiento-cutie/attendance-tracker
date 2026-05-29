

<?php $__env->startSection('title', $student->name . ' - Attendance Report'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <h1 class="mb-4"><?php echo e($student->name); ?>'s Attendance Report</h1>

        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Classes</h5>
                        <p class="card-text display-5"><?php echo e($attendance->count()); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Present</h5>
                        <p class="card-text display-5 text-success"><?php echo e($attendance->where('status', 'present')->count()); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Absent</h5>
                        <p class="card-text display-5 text-danger"><?php echo e($attendance->where('status', 'absent')->count()); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Late</h5>
                        <p class="card-text display-5 text-warning"><?php echo e($attendance->where('status', 'late')->count()); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Attendance History</h5>
            </div>
            <div class="card-body">
                <?php if($attendance->count() == 0): ?>
                    <div class="alert alert-info">No attendance records found.</div>
                <?php else: ?>
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
                                <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($record->date->format('F j, Y')); ?></td>
                                        <td><?php echo e($record->date->format('l')); ?></td>
                                        <td>
                                            <?php if($record->status === 'present'): ?>
                                                <span class="badge bg-success">Present</span>
                                            <?php elseif($record->status === 'absent'): ?>
                                                <span class="badge bg-danger">Absent</span>
                                            <?php else: ?>
                                                <span class="badge bg-warning text-dark">Late</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <a href="<?php echo e(route('students.index')); ?>" class="btn btn-secondary mt-3">Back to Students</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\attendance_tracker\resources\views/attendance_student_report.blade.php ENDPATH**/ ?>