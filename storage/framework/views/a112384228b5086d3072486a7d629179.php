

<?php $__env->startSection('title', 'Attendance Report'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <h1 class="mb-4">Attendance Report</h1>

        <?php if($students->count() == 0): ?>
            <div class="alert alert-info">No students found.</div>
        <?php else: ?>
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
                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $total = $student->attendance->count();
                                $present = $student->attendance->where('status', 'present')->count();
                                $absent = $student->attendance->where('status', 'absent')->count();
                                $late = $student->attendance->where('status', 'late')->count();
                                $percentage = $total > 0 ? round(($present / $total) * 100, 2) : 0;
                            ?>
                            <tr>
                                <td><?php echo e($student->name); ?></td>
                                <td><?php echo e($student->roll_number); ?></td>
                                <td><?php echo e($total); ?></td>
                                <td><span class="badge bg-success"><?php echo e($present); ?></span></td>
                                <td><span class="badge bg-danger"><?php echo e($absent); ?></span></td>
                                <td><span class="badge bg-warning text-dark"><?php echo e($late); ?></span></td>
                                <td>
                                    <?php if($percentage >= 75): ?>
                                        <span class="badge bg-success"><?php echo e($percentage); ?>%</span>
                                    <?php elseif($percentage >= 50): ?>
                                        <span class="badge bg-warning text-dark"><?php echo e($percentage); ?>%</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger"><?php echo e($percentage); ?>%</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('attendance.student-report', $student)); ?>" class="btn btn-sm btn-info">View Details</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\attendance_tracker\resources\views/attendance_report.blade.php ENDPATH**/ ?>