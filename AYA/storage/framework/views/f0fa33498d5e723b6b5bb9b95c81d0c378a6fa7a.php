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

        <main class="py-6">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="cardLogin" style="margin-top:100px">
                            <div class="card-header" style="color:white; text-align: center;font-size:30px">
                                <?php echo e(__('Login Or Register')); ?>

                            </div>

                            <div class="card-body" style="text-align: center">
                                <p style="color:white">If you have an account:</p>
                                <a class="btnLogin" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                <hr>
                                <p style="color:white">If you don't have an account:</p>
                                <a class="btnLogin" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
<?php /**PATH C:\Users\siham\Documents\AYA\resources\views/welcome.blade.php ENDPATH**/ ?>