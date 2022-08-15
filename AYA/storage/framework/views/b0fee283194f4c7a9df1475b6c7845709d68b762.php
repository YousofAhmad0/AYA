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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <style>


    </style>
</head>

<body class="c-app" style="background-image:url(<?php echo e(url('images/home2.jpg')); ?>);
                                        background-size:cover;background-attachment:fixed;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm fixed-top">
            <div class="container">
                <h3>
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        AYA
                    </a>
                </h3>
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                        Welcome
                    </li>
                <?php else: ?>
                    <li class="nav-item">
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
                            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('reservation.index')); ?>">
                                    To Reservation
                                </a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('reservation.index')); ?>">
                                    To Reservation
                                </a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('reservation.index')); ?>">
                                    To Reservation
                                </a>
                            </li>

                            <div>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                    class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-6">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="cardLogin" style="margin-top:100px">
                            <div class="card-header" style="color:white; text-align: center;font-size:30px">
                                <?php echo e(__('Login')); ?>

                            </div>

                            <div class="card-body">
                                <form method="POST" action="<?php echo e(route('login')); ?>">
                                    <?php echo csrf_field(); ?>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end"
                                            style="color:white"><?php echo e(__('Email Address')); ?></label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                style="background-color: rgb(189, 128, 84)" name="email"
                                                value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-form-label text-md-end"
                                            style="color:white"><?php echo e(__('Password')); ?></label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                style="background-color: rgb(189, 128, 84)" name="password" required
                                                autocomplete="current-password">

                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                                <label class="form-check-label" style="color:white" for="remember">
                                                    <?php echo e(__('Remember Me')); ?>

                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btnLogin">
                                                <?php echo e(__('Login')); ?>

                                            </button>

                                            <?php if(Route::has('password.request')): ?>
                                                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>"
                                                    style="color:darkgrey">
                                                    <?php echo e(__('Forgot Your Password?')); ?>

                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
<?php /**PATH C:\Users\siham\Documents\AYA\resources\views/auth/login.blade.php ENDPATH**/ ?>