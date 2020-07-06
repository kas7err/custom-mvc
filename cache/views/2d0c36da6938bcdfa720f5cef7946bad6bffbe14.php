<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <title>MVC</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand" href="/">MVC</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pictures/index">Pictures</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/users/index">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/home/contactForm">Contact Us</a>
                    </li>
                    
                    <?php if(isset($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/home/profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/home/logout">Logout</a>
                    </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>

    </nav>
    <?php if(isset($_SESSION['message'])): ?>
    <div class="row session__message bg-danger text-white">
        <h2 class="py-4 text-center mx-auto"><?php echo e(ucfirst($_SESSION['message'])); ?></h2>
    </div>
    <?php echo e(\Core\Session::unset('message')); ?>

    <?php endif; ?>
    <div class="container my-4">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <div class="footer bg-dark text-white">
        <div class="container text-center py-3">
            <p class="m-0 pt-1">Custom MVC Project @</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function(){
            setTimeout(() => {
                $(".session__message").hide();
            }, 2000)
            
        });
    </script>
</body>

</html><?php /**PATH C:\laragon3.1\www\pictures-task\app\Views/layouts/app.blade.php ENDPATH**/ ?>