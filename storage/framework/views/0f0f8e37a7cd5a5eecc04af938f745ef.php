

<?php $__env->startSection('title', 'My Profile'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h1 class="mb-4">My Profile</h1>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Profile Information</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Name:</strong>
                    </div>
                    <div class="col-md-8">
                        <?php echo e($user->name); ?>

                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Email:</strong>
                    </div>
                    <div class="col-md-8">
                        <?php echo e($user->email); ?>

                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Member Since:</strong>
                    </div>
                    <div class="col-md-8">
                        <?php echo e($user->created_at->format('F j, Y')); ?>

                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Last Updated:</strong>
                    </div>
                    <div class="col-md-8">
                        <?php echo e($user->updated_at->format('F j, Y \a\t g:i A')); ?>

                    </div>
                </div>

                <hr>

                <a href="<?php echo e(route('profile.edit')); ?>" class="btn btn-primary">Edit Profile</a>
                <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary">Back to Dashboard</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\attendance_tracker\resources\views/profile_show.blade.php ENDPATH**/ ?>