
<?php $__env->startSection('title', 'Moschino2'); ?>
<?php $__env->startSection('main-content'); ?>
<?php

$timestamp = strtotime($order_detail[0]->order->date);
$total=$timestamp+86400;
$total2=date("Y-m-d H:i:s", $total);
?>
<div id="content" class="site-content" style="margin-bottom: 30px;">
    <div id="primary" class="">
        <main id="main" class="site-main" role="main" style="position: relative; height: -1px!important;">
                <a href="<?php echo e(BASE_URL.'order'); ?>" class="btn btn-primary" style="color:#fff">Quay lại</a>
               <!-- <?php if($order_detail[0]->order->status==0): ?>

               <?php endif; ?> -->
                <a href="<?php echo e(BASE_URL.'update_order'); ?>" class="btn btn-danger" style="color:#fff">Hủy đơn hàng</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Images</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Into money</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $totalPrice=0;
                        ?>
                        <?php $__currentLoopData = $order_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $total=$item->price*$item->quantity;
                        $totalPrice+=$total;
                        ?>

                        <tr>
                            <th scope="row"><?php echo e($loop->iteration); ?></th>
                            <td><img src="<?php echo e(IMAGE_URL); ?>/<?php echo e($item->images_sp); ?>" style="width: 30%;  " alt="<?php echo e(IMAGE_URL); ?>/<?php echo e($item->images); ?>"></td>
                            <td><?php echo e($item->name_sp); ?></td>
                            <td><?php echo e(number_format($item->price)); ?> VNĐ</td>
                            <td><?php echo e($item->quantity); ?></td>
                            <td><?php echo e(number_format($item->price*$item->quantity)); ?> VNĐ</td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td colspan="2">expired: <b><?php echo e($total2); ?></b> </td>
                            <!-- <td></td> -->
                            <td>Trading code: <b><?php echo e($order_detail[0]->order->name); ?></b> </td>
                            <!-- <td></td> -->
                            <!-- <td></td> -->
                            <td class="table-dark" colspan="3">Total money: <b><?php echo e(number_format($totalPrice)); ?> VNĐ</b> </td>
                        </tr>
                    </tbody>
                </table>

        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->

 
    <!-- #secondary -->
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<script>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH O:\xampp\htdocs\PHP2\Assment\app\views\frontend/order/detail.blade.php ENDPATH**/ ?>