

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
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($user->id); ?></th>
            <td><?php echo e($user->name); ?></td>
            <td><?php echo e($user->pictures->count()); ?></td>
            <td><?php echo e($user->created_at); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<h3>Latest 5 Pictures</h3>
<table class="table my-5">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Url</th>
            <th scope="col">Display</th>
            <th scope="col">Author</th>
            <th scope="col">Created At</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $pictures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($pic->id); ?></th>
            <td><a href="/pictures/show/<?php echo e($pic->id); ?>"><?php echo e($pic->url); ?></a></td>
            <td>
                <img src="<?php echo e($pic->url); ?>" style="width:50px;height:50px;
                    background-repeat:no-repeat;
                    background-position: center;
                    background-image:url(image.jpg);
                    background-size: cover;" alt="">
            </td>
            <td><?php echo e($pic->user->name); ?></td>
            <td><?php echo e($pic->created_at); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon3.1\www\pictures-task\app\Views/admin/index.blade.php ENDPATH**/ ?>