

<?php $__env->startSection('content'); ?>

<?php if(isset($_SESSION['user'])): ?>
<h2>Dashboard</h2>
<?php endif; ?>


<h3>Latest 5 Users</h3>
<table class="table my-5">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">User Name</th>
            <th scope="col">Number of pictures</th>
            <th scope="col">Created At</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($user->id); ?></th>
            <td><a href="/admin/userPictures/<?php echo e($user->id); ?>"><?php echo e($user->name); ?></a></td>
            <td><?php echo e($user->pictures->count()); ?></td>
            <td><?php echo e($user->created_at); ?></td>
            <td>
                <a href="/admin/deleteUser/<?php echo e($user->id); ?>">
                    <i class="fa fa-trash-o"></i>
                </a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon3.1\www\pictures-task\app\Views/admin/users.blade.php ENDPATH**/ ?>