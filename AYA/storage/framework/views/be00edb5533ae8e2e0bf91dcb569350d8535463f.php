
<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['select'])) {
        $p = $_POST['select'];
        print_r($p);
    }
}
?>
<?php $__env->startSection('content'); ?>
    <div class="min-vh-100 d-flex flex-column 
                justify-content-between">
        <div class="container" style="margin-top: 70px;">
            <div class="row">
                <div class="col">
                    <div class="jumbotron" style="margin-bottom: 100px;margin-right:60%">
                        <img src=" <?php echo e(url(glob("images/pics/$resName.*")[0])); ?>" style="margin-left:38%" width="130px"
                            alt="">
                    </div>
                </div>
                <div class="col" style="padding-left: 45%">
                    <a href="<?php echo e(route('reservation.index', [$resID, $resName])); ?>" class="btnLBP"
                        style="background-color: chocolate;margin-left:1%;display: inline-block">Reserve Your Table</a>
                    
                    <?php if($curr == 0): ?>
                        <a href="<?php echo e(route('restaurant.index', [$resID, $resName, 1])); ?>" class="btnLBP"
                            style="background-color: rgb(210, 183, 30)">Change to LBP</a>
                    <?php endif; ?>
                    <?php if($curr == 1): ?>
                        <a href="<?php echo e(route('restaurant.index', [$resID, $resName, 0])); ?>" class="btnUSD"
                            style="background-color: rgb(39, 100, 44)">Change to USD</a>
                    <?php endif; ?>

                </div>
            </div>
            <div class="row">
                <div class="col">

                    <form action="<?php echo e(route('order.index') . '?redirect=' . $curr); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="resID" value="<?php echo e($resID); ?>">
                        <input type="hidden" name="resName" value="<?php echo e($resName); ?>">
                        <?php $__currentLoopData = $foods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu => $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <h4 style="color:white;width:max-content"><?php echo e($menu); ?></h4>
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
                                        Select
                                    </th>
                                </tr>
                                <?php $__currentLoopData = $food; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="jumbotron">
                                                <img src=" <?php echo e(url(glob("images/dishPics/$f->name.*")[0])); ?>" width="70px"
                                                    alt="">
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo e($loop->iteration); ?>

                                        </td>
                                        <td>
                                            <?php echo e($f->name); ?>

                                        </td>
                                        <td>
                                            <?php if($curr): ?>
                                                <?php echo e($f->price); ?> L.L.
                                            <?php else: ?>
                                                <?php echo e($f->price); ?> $
                                            <?php endif; ?>

                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="select[]"
                                                value="<?php echo e($f->id); ?>">
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <button type="submit" class="btnLogin" style="margin-top:4%;margin-left:65%">Submit</button>
                    </form>
                </div>
                <div class="col">
                    <img src=" <?php echo e(url('images/PizzaTower.gif')); ?>" style="margin-bottom:20px"
                        class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                        width="500px" alt="">
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\siham\Documents\AYA\resources\views/restaurant.blade.php ENDPATH**/ ?>