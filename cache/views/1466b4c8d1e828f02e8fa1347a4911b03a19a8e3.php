

<?php $__env->startSection('content'); ?>

<?php if(isset($_SESSION['user'])): ?>
<h2>Welcome <?php echo e(ucfirst($_SESSION['user'])); ?></h2>
<?php endif; ?>


<h3>Listed Users</h3>

<table class="table my-5">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">User Name</th>
            <th scope="col">Number of pictures</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($user->id); ?></th>
            <td><?php echo e($user->name); ?></td>
            <td><?php echo e($user->pictures->count()); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon3.1\www\pictures-task\app\Views/users/index.blade.php ENDPATH**/ ?>