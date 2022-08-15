<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>AYA</title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>


    </style>
    <?php echo \Livewire\Livewire::styles(); ?>

</head>

<body class="c-app" style="background-image:url(<?php echo e(url('images/shok.jpeg')); ?>);
                                        background-size:cover;background-attachment:fixed;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm fixed-top">
            <div class="container">
                <h3>
                    <a class="navbar-brand" href="<?php echo e(route('home.index')); ?>" style="color:white">
                        AYA
                    </a>
                </h3>
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item" style="color:white">
                        Welcome
                    </li>
                <?php else: ?>
                    <li class="nav-item" style="color:white">
                        Welcome <?php echo e(Auth::user()->fname); ?> <?php echo e(Auth::user()->lname); ?>

                    </li>
                <?php endif; ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li>
                                <div class="dropdown">
                                    <button type="button" class="btn-res dropdown-toggle" data-toggle="dropdown">
                                        Restaurant
                                    </button>
                                    <div class="dropdown-menu">
                                        <?php $__currentLoopData = DB::table('resturents')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resturent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a class="dropdown-item"
                                                href="<?php echo e(route('restaurant.index', [$resturent->id, $resturent->ResName, 1])); ?>"><?php echo e($resturent->ResName); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('aboutus.show')); ?>">
                                    About Us
                                </a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('feedback.show')); ?>">
                                    Feedback
                                </a>
                            </li>
                            <li>
                                <div>
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                        class="d-none" style="margin-right:100%">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
        </nav>

        <main class="py-6">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    <?php echo \Livewire\Livewire::scripts(); ?>

</body>

<footer class="text-center text-white" style="background-color:rgb(151, 103, 69)">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="mb-4">
            <a class="btn btn-outline-light btn-floating m-1"
                href="https://www.youtube.com/channel/UCaF6XM0JtEZRhRf5PjwK3yQ" role="button"><i
                    class="bi bi-youtube"></i></a>
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/youssef.ahmad.52056"
                role="button"><i class="bi bi-facebook"></i></a>

            <!-- Twitter -->
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.twitter.com/amirelhalabi1"
                role="button"><i class="bi bi-twitter"></i></a>
            <!-- Google -->
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.google.com/" role="button"><i
                    class="bi bi-google"></i></a>

            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/alaa.a.nasr"
                role="button"><i class="bi bi-instagram"></i></a>

            <!-- Linkedin -->
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/in/alaa-a-nasr"
                role="button"><i class="bi bi-linkedin"></i></a>

            <!-- Github -->
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.github.com/Alaanasr0" role="button"><i
                    class="bi bi-github"></i></a>
        </section>
        <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 Copyright:
        <a class="text-white" href="https://aya.com/">AYA.com</a>
    </div>
    <!-- Copyright -->
</footer>


</html>
<?php /**PATH C:\Users\siham\Documents\AYA\resources\views/layouts/app.blade.php ENDPATH**/ ?>