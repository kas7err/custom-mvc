

<?php $__env->startSection('content'); ?>

<?php if(isset($_SESSION['user'])): ?>
<h2>Welcome <?php echo e(ucfirst($_SESSION['user'])); ?></h2>
<?php endif; ?>


<div class="row mt-5">
    <div class="col-md-6">
        <div class="wrp">
            <h3>MY Pictures</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Url</th>
                        <th scope="col">Display</th>
                        <th scope="col">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $user->pictures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($pic->id); ?></th>
                        <td><a href="/pictures/show/<?php echo e($pic->id); ?>"><?php echo e(substr($pic->url,0,20)); ?></a></td>
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
        </div>
    </div>
    <div class="col-md-6">
        <div class="form__one">
            <h3>Upload new image</h3>
            <form action="/pictures/create" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="user_id" class="form-control" value="<?php echo e($user->id); ?>">
                </div>
                <div class="form-group">
                    <input type="file" name="image" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Upload</button>
                </div>
            </form>
        </div>
        <div class="form_two">
            <h3>Change email</h3>
            <form action="/users/updateEmail" method="post">
                <div class="form-group">
                    <input type="hidden" name="user_id" class="form-control" value="<?php echo e($user->id); ?>">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" value="<?php echo e($user->email); ?> " required="required">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon3.1\www\pictures-task\app\Views/users/profile.blade.php ENDPATH**/ ?>