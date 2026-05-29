

<?php $__env->startSection('title', 'Mark Attendance'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <h1 class="mb-4">Mark Attendance</h1>

        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="<?php echo e(route('attendance.index')); ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="date" class="form-label">Select Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="<?php echo e($date); ?>">
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">Load</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Attendance for <?php echo e(\Carbon\Carbon::parse($date)->format('l, F j, Y')); ?></h5>
            </div>
            <div class="card-body">
                <?php if($students->count() == 0): ?>
                    <div class="alert alert-info">No students found.</div>
                <?php else: ?>
                    <form method="POST" action="<?php echo e(route('attendance.store')); ?>">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="date" value="<?php echo e($date); ?>">

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Roll Number</th>
                                        <th>Attendance Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $attendanceRecord = $attendance->get($student->id);
                                            $currentStatus = $attendanceRecord?->status ?? 'present';
                                        ?>
                                        <tr>
                                            <td><?php echo e($student->name); ?></td>
                                            <td><?php echo e($student->roll_number); ?></td>
                                            <td>
                                                <select class="form-select" name="attendance[<?php echo e($loop->index); ?>][student_id]" style="display:none;">
                                                    <option value="<?php echo e($student->id); ?>"></option>
                                                </select>
                                                <input type="hidden" name="attendance[<?php echo e($loop->index); ?>][student_id]" value="<?php echo e($student->id); ?>">
                                                <select class="form-select" name="attendance[<?php echo e($loop->index); ?>][status]">
                                                    <option value="present" <?php echo e($currentStatus === 'present' ? 'selected' : ''); ?>>Present</option>
                                                    <option value="absent" <?php echo e($currentStatus === 'absent' ? 'selected' : ''); ?>>Absent</option>
                                                    <option value="late" <?php echo e($currentStatus === 'late' ? 'selected' : ''); ?>>Late</option>
                                                </select>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Save Attendance</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\attendance_tracker\resources\views/attendance_index.blade.php ENDPATH**/ ?>