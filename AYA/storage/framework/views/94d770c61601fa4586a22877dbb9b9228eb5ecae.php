
<?php
$curr = request()->redirect;
?>
<?php $__env->startSection('content'); ?>
    <div class="min-vh-100 d-flex flex-column 
                justify-content-between">
        <div class="container" style="margin-top: 70px;">
            <div class="row justify-content-center">
                <div class="col-sm">
                    <form action="#" method="post">
                        <?php echo csrf_field(); ?>

                        <h5><?php echo e($resName); ?></h5>
                        <div>
                            <table class="table">

                                <tr>
                                    <th>

                                    </th>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Quantity
                                    </th>
                                    <th>
                                        Net Price
                                    </th>
                                </tr>
                                <?php $__currentLoopData = $foods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="jumbotron">
                                                <img src=" <?php echo e(url(glob("images/dishPics/$food->name.*")[0])); ?>"
                                                    width="70px" alt="">
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo e($loop->iteration); ?>

                                        </td>
                                        <td>
                                            <?php echo e($food->name); ?>

                                        </td>
                                        <td>
                                            <?php if($curr): ?>
                                                <?php echo e($food->price); ?> L.L.
                                            <?php else: ?>
                                                <?php echo e($food->price); ?> $
                                            <?php endif; ?>

                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input style="width:80px" class="form-control" type="number"
                                                    name="<?php echo e($food->id); ?>" value="<?php echo e($quantity[$food->id]); ?>" min="1">
                                            </div>
                                        </td>
                                        <td>
                                            <?php if($quantity): ?>
                                                <?php if($curr): ?>
                                                    <?php echo e($food->price * $quantity[$food->id]); ?> L.L.
                                                <?php else: ?>
                                                    <?php echo e($food->price * $quantity[$food->id]); ?> $
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if($curr): ?>
                                                    <?php echo e($food->price); ?> L.L.
                                                <?php else: ?>
                                                    <?php echo e($food->price); ?> $
                                                <?php endif; ?>
                                            <?php endif; ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>

                        </div>
                        <div>
                            <div class="form-group" style="display: inline-block">
                                <label for="text" style="color:white; font-size:30px;">Address: </label>
                                <input class="form-control" type="text" name="address" value="<?php echo e($address); ?>">
                            </div>
                            <div style="display: inline-block; float:right">
                                <?php if($curr): ?>
                                    <b>
                                        <p style="color:white; font-size:30px;">Total
                                            price: <?php echo e($totalPrice); ?> L.L.</p>
                                    </b>
                                <?php else: ?>
                                    <b>
                                        <p style="color:white; font-size:30px;">Total
                                            price: <?php echo e($totalPrice); ?> $</p>
                                    </b>
                                <?php endif; ?>
                            </div>

                        </div>
                        <div style="margin-top:2%">
                            <div style="display: inline-block;">
                                <button type=" submit" class="btnLogin"
                                    formaction="<?php echo e(route('order.update') . '?redirect=' . $curr); ?>"
                                    style="margin-top:4%">
                                    Update</button>
                            </div>
                            <div style="display: inline-block; float:right">
                                <button type="submit" class="btnLogin"
                                    formaction="<?php echo e(route('order.placeOrder') . '?redirect=' . $totalPrice . '&curr=' . $curr); ?>"
                                    style="margin-top:4%">Place Order</button>
                            </div>
                        </div>
                        <input type="hidden" name="resID" value="<?php echo e($resID); ?>">
                        <input type="hidden" name="resName" value="<?php echo e($resName); ?>">
                    </form>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\siham\Documents\AYA\resources\views/order.blade.php ENDPATH**/ ?>