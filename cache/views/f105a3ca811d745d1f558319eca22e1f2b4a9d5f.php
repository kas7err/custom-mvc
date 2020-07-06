

<?php $__env->startSection('content'); ?>


<h3>Show Picture</h3>

<div class="container text-center d-box">
    <div class="img_wrapper">
        <img src="<?php echo e($picture->url); ?>" style="width:150px;height:150px;
                                background-repeat:no-repeat;
                                background-position: center;
                                background-image:url(image.jpg);
                                background-size: cover;" alt="">
    </div>
    <?php if(isset($_SESSION['user']) && $picture->user->name == $_SESSION['user']): ?>
    <a class="btn btn-danger btn-md my-4" href="/pictures/destroy/<?php echo e($picture->id); ?>">DELETE</a>
    <?php endif; ?>
</div>

<?php if(count($picture->comments) > 0): ?>
<h3>Comments</h3>
<?php $__currentLoopData = $picture->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="comment">
    <h5>User: <?php echo e($comment->name); ?></h5>
    <p><?php echo e($comment->message); ?></p>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


<h3>Add Comment</h3>
<?php if(isset($_SESSION['user'])): ?>
<div class="row">
    <div class="col-md-4">
        <form action="/pictures/addComment" method="post">
            <div class="form-group">
                <input type="hidden" name="name" class="form-control" value="<?php echo e($_SESSION['user']); ?>">
                <input type="hidden" name="picture_id" class="form-control" value="<?php echo e($picture->id); ?>">
            </div>
            <div class="form-group">
                <textarea name="message" id="" cols="45" rows="4"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Comment</button>
            </div>
        </form>
    </div>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon3.1\www\pictures-task\app\Views/pictures/show.blade.php ENDPATH**/ ?>