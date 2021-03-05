
<?php $__env->startSection('title', 'Moschino'); ?>
<?php $__env->startSection('main-content'); ?>
<?php
$totalPrice = 0;
$dem=0
?>
<div id="content" class="site-content">
    <div id="primary" class="content-area column full">
        <main id="main" class="site-main" role="main">
            <div id="container">
                <div id="content" role="main">
                    <nav class="woocommerce-breadcrumb" itemprop="breadcrumb"><a href="<?php echo e(BASE_URL); ?>">Home</a></nav>
                    <div itemscope itemtype="http://schema.org/Product" class="product">
                        <div class="images d-flex" style="width:100%;">
                            <div style="width:100%; box-shadow: 1px 1px 10px gray; margin:0 20px 0 0 ;    height: 500px;  overflow: scroll;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product Images</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $total=$item->product->price*$item->quantity;
                                        $totalPrice+=$total;

                                        ?>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td><img src="<?php echo e(IMAGE_URL); ?>/<?php echo e($item->product->images); ?>" style="width: 30%;  " alt="<?php echo e(IMAGE_URL); ?>/<?php echo e($item->product->images); ?>"></td>
                                            <td><?php echo e($item->product->name); ?></td>
                                            <td><?php echo e(number_format($item->product->price)); ?> VNĐ</td>
                                            <td><?php echo e($item->quantity); ?></td>
                                            <td><?php echo e(number_format($item->product->price*$item->quantity)); ?> VNĐ</td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <!-- <td></td> -->
                                            <td class="table-dark" colspan="2">Tổng tiền: <b><?php echo e(number_format($totalPrice)); ?> VNĐ</b> </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <form action="<?php echo e(BASE_URL.'pay'); ?>" method="post">
                                    <input type="hidden" name="test">
                                    <div class="d-flex justify-content-center">

                                        <button type="submit" class="btn btn-success">Purchase</button>
                                    </div>
                                </form>
                            </div>

                            

                        </div>

                    </div>
                </div>
            </div>
        </main>
        <!-- #main -->
    </div>

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('page-script'); ?>
   
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH O:\xampp\htdocs\PHP2\Assment\app\views\frontend/add_pro/confirm.blade.php ENDPATH**/ ?>