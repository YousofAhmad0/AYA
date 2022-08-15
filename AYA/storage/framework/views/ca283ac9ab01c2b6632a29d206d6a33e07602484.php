<?php $__env->startSection('content'); ?>
    <div class="min-vh-100 d-flex flex-column 
                justify-content-between">

        <div class="row" style="margin-top:10%; width:100%">
            <div class="col">
                <img src=" <?php echo e(url('images/allFood.gif')); ?>"
                    class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                    width="500px" alt="">
            </div>
            <div class="col-md-7">

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">
                                Restaurant name
                            </th>
                            <th scope="col">
                                Location
                            </th>
                            <th scope="col">
                                Rate
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $userData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td><a class="btn btn-outline-warning"
                                        href="<?php echo e(route('restaurant.index', [$user->id, $user->ResName, 1])); ?>"><?php echo e($user->ResName); ?></a>
                                </td>

                                <td><?php echo e($user->Location); ?></td>
                                <td><?php echo e($user->Rate); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </tbody>

                </table>
            </div>
            <div class="col">

                <img src=" <?php echo e(url('images/allFood.gif')); ?>"
                    class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                    width="500px" alt="">

            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\siham\Documents\AYA\resources\views/home.blade.php ENDPATH**/ ?>