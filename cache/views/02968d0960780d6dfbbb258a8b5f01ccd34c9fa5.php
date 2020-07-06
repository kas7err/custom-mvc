

<?php $__env->startSection('content'); ?>
<h3><?php echo e($user->name); ?> Pictures</h3>

<table class="table my-5">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Url</th>
            <th scope="col">Display</th>
            <th scope="col">Comments</th>
            <th scope="col">Created At</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $user->pictures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
            <td><?php echo e($pic->comments()->count()); ?></td>
            <td><?php echo e($pic->created_at); ?></td>
            <td>
                <a href="/admin/deletePicture/<?php echo e($pic->id); ?>">
                    <i class="fa fa-trash-o"></i>
                </a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon3.1\www\pictures-task\app\Views/admin/user_pictures.blade.php ENDPATH**/ ?>