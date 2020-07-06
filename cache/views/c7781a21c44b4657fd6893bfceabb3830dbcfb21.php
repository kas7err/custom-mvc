<?php $__env->startSection('content'); ?>

<?php if(isset($_SESSION['user'])): ?>
<h2>Welcome <?php echo e(ucfirst($_SESSION['user'])); ?></h2>
<?php endif; ?>


<h3>Latest Pictures</h3>
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
            <td><a href="/pictures/show/<?php echo e($pic->id); ?>"><?php echo e($pic->url); ?></a></td>
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

<?php if(!isset($_SESSION['user'])): ?>
<div class="row">
    <div class="col-md-4">
        <form action="/home/login" method="post">
            <h2 class="text-center">Log in</h2>
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Log in</button>
            </div>
            <div class="clearfix">
                <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
            </div>
        </form>
    </div>


    <div class="col-md-4">
        <form action="/home/register" method="post">
            <h2 class="text-center">Register</h2>

            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Username" required="required">
            </div>

            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required="required">
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required="required">
            </div>

            <div class="form-group">
                <input type="password" name="repeat_password" class="form-control" placeholder="Repeat Password"
                    required="required">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
        </form>
    </div>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon3.1\www\pictures-task\app\Views/index.blade.php ENDPATH**/ ?>