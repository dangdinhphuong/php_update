
<?php $__env->startSection('title', 'Moschino'); ?>
<?php $__env->startSection('main-content'); ?>

<div id="content" class="site-content">
    <div id="primary" class="content-area column two-thirds">
        <main id="main" class="site-main" role="main" style="height: 500px;  overflow: scroll;">
            <div class="grid bloggrid">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Mã hóa đơn</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Ngày đặt</th>
                            <th scope="col">Thời gian sử dụng</th>
                            <th scope="col">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $timestamp = strtotime($item->date);
                        $total=$timestamp+86400;
                        $total2=date("Y-m-d H:i:s", $total);
                        ?>
                        <tr>
                            <th scope="row"><?php echo e($loop->iteration); ?></th>
                            <td> <a href="<?php echo e(BASE_URL.'order_detail?id='.$item->id); ?>" style="text-decoration: none; color:blue;"><?php echo e($item->name); ?></a></td>
                            <td><?php echo e(number_format($item->total_momney)); ?> VNĐ</td>
                            <td><?php echo e($item->date); ?></td>
                            <td><?php echo e($total2); ?></td>
                            <td>
                                <?php if($item->status==0): ?>
                                Chờ giao dịch
                                <?php elseif($item->status==1): ?>
                                Thành công
                                <?php elseif($item->status==2): ?>
                                Hủy
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

            </div>
            <div class="clearfix">
            </div>
            <nav class="pagination"></nav>
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->

    <div id="secondary" class="column third">
        <div id="sidebar-1" class="widget-area" role="complementary">
            <aside id="text-6" class="widget widget_text">
                <div style="margin:0 10px;padding:10px;box-shadow: 1px 1px 10px gray;">
                    <h4 class="widget-title">Chú ý</h4>
                    <p>1.Hóa đơn có hiệu lực 24 giờ kể từ lúc mua</p>
                    <p>2.Kiểm tra mã hóa đơn trước khi ra quầy thanh toán</p>
                    <p>3.Kiểm tra lại hàng hóa trước khi ra về</p>

                </div>
            </aside>
        </div>
        <!-- .widget-area -->
    </div>
    <!-- #secondary -->
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<script>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH O:\xampp\htdocs\PHP2\Assment\app\views\frontend/order/index.blade.php ENDPATH**/ ?>