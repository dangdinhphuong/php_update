
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
                            <div style="width:65%; box-shadow: 1px 1px 10px gray; margin:0 20px 0 0 ;    height: 500px;  overflow: scroll;">
                                <?php if(!isset($cart)|| count($cart)<=0): ?> <div class="alert alert-danger" role="alert">
                                    The cart is empty!
                            </div>
                            <?php elseif(isset($cart)|| count($cart)>0): ?>
                            <form action="<?php echo e(BASE_URL.'update_cart'); ?>" name="product_form" method="post">
                                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $total=$item->product->price*$item->quantity;
                                $totalPrice+=$total;
                                $dem+=$item->quantity;
                                ?>

                                <div class="d-flex ">
                                    <img src="<?php echo e(IMAGE_URL); ?>/<?php echo e($item->product->images); ?>" style="width: 30%;  " alt="<?php echo e(IMAGE_URL); ?>/<?php echo e($item->product->images); ?>">
                                    <div style="margin:10px">
                                        <p> <?php echo e($item->product->name); ?></p>
                                        <b style="font-size: 25px;"><b><?php echo e(number_format($item->product->price)); ?> VNĐ</b></b>
                                        <div class="quantity">
                                            <label for=""  id="">Số lượng</label>
                                            <input type="hidden" name="id[]" value="<?php echo e($item->id); ?>">
                                            <input type="number" step="1" min="1" max="" name="quantity[]" value="<?php echo e($item->quantity); ?>" title="Qty" class="input-text qty text times" size="4" />
                                        </div>
                                        <br>
                                        <a href="<?php echo e(BASE_URL); ?>cart/delete?id=<?php echo e($item->product->id); ?>">Xóa</a>
                                    </div>
                                </div>

                                <br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </form>
                            <?php endif; ?>
                        </div>

                        <div style=" width:35%; ">

                            <div style="margin:0 10px;padding:10px;box-shadow: 1px 1px 10px gray;">


                                <div class="form-row align-items-center">



                                    <div class="col-auto">
                                        <button id="submit" class="btn btn-danger">Update</button>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div style="margin:0 10px;padding:10px;box-shadow: 1px 1px 10px gray;">
                                <form action="<?php echo e(BASE_URL.'confirm'); ?>" method="get">
                                    <label for="">Số lượng sản phẩm: <b><?php echo e($dem); ?></b></label><br>
                                    <label for="">Tam tính : <b id="a1"><?php echo e(number_format($totalPrice)); ?> VNĐ</b></label>

                                    <hr>
                                    <label for="">Thành tiền : <b id="a2" style="font-size: 20px; color:red"><?php echo e(number_format($totalPrice)); ?> VNĐ</b></label>
                                   
                                    <div class="d-flex justify-content-center">

                                        <button type="submit" class="btn btn-success">Proceed to order</button>
                                    </div>
                                </form>
                            </div>
                            <br>

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
<script>
    $(document).ready(function() {

        $("#submit").on("click", function(e) {
            e.preventDefault();
            // alert("thanh cong");
            $("form[name='product_form']").trigger("submit");
        });

    });
</script>
<script>



    //     var times = document.querySelector(".times");

    //     var time = document.querySelector("#time");

    //     var Price2 = document.querySelector("#a2");
    //     var Price3 = document.querySelector("#a3");
    //     total = 0;
    //     total = times.value *\
    //     time.innerHTML = times.value;
    //   //  Price1.innerHTML = "$" + total;
    //     Price2.innerHTML = "$" + total;
    //     Price3.value = total;

    //     times.onchange = function() {
    //         if (times.value <= 0) {
    //             times.value = 1;
    //         }
    //         total = 0;
    //         total = times.value *\
    //         time.innerHTML = times.value;
    //         Price1.innerHTML = "$" + total;
    //         Price2.innerHTML = "$" + total;
    //         Price3.value = total;
    // }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH O:\xampp\htdocs\PHP2\Assment\app\views\frontend/add_pro/index.blade.php ENDPATH**/ ?>