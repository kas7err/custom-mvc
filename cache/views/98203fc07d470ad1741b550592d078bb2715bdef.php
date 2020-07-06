

<?php $__env->startSection('content'); ?>


<h3>All Pictures</h3>

<table class="table my-5">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Url</th>
            <th scope="col">Display</th>
            <th scope="col">Created At</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $pictures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($pic->id); ?></th>
            <td><?php echo e($pic->url); ?></td>
            <td>
                <img src="<?php echo e($pic->url); ?>" style="width:50px;height:50px;
                    background-repeat:no-repeat;
                    background-position: center;
                    background-image:url(image.jpg);
                    background-size: cover;" alt="">
            </td>
            <td><?php echo e($pic->created_at); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon3.1\www\pictures-task\app\Views/pictures.blade.php ENDPATH**/ ?>