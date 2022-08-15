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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="color:white; text-align: center;font-size:30px">
                        Your order was succesfully submitted, it will be delivered to you as soon as posible!
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <u>Order details:</u>
                            </li>
                            <li class="list-group-item">
                                Restaurant name: <?php echo e($resName); ?>

                            </li>
                            <li class="list-group-item">
                                Description: <?php echo e($desc); ?>

                            </li>
                            <li class="list-group-item">
                                Total price: <?php echo e($totalPrice); ?>

                            </li>
                            <li class="list-group-item">
                                Address: <?php echo e($address); ?>

                            </li>
                        </ul>
                        <a class="btnLogin" href="<?php echo e(route('home.index')); ?>">Back to
                            orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
<?php /**PATH C:\Users\siham\Documents\AYA\resources\views/orderInfo.blade.php ENDPATH**/ ?>