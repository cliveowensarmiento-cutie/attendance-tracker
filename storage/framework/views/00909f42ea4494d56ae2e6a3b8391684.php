

<?php $__env->startSection('title', 'Students'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <h1 class="mb-4">Students</h1>
        <a href="<?php echo e(route('students.create')); ?>" class="btn btn-primary mb-3">+ Add Student</a>

        <?php if($students->count() == 0): ?>
            <div class="alert alert-info">No students found. <a href="<?php echo e(route('students.create')); ?>">Add one now</a></div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roll Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($student->name); ?></td>
                                <td><?php echo e($student->email); ?></td>
                                <td><?php echo e($student->roll_number); ?></td>
                                <td>
                                    <a href="<?php echo e(route('students.edit', $student)); ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="<?php echo e(route('attendance.student-report', $student)); ?>" class="btn btn-sm btn-info">Report</a>
                                    <form method="POST" action="<?php echo e(route('students.destroy', $student)); ?>" style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
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

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\attendance_tracker\resources\views/students_index.blade.php ENDPATH**/ ?>