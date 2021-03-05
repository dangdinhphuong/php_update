
<?php $__env->startSection('title', 'Chi tiết hóa đơn'); ?>
<?php $__env->startSection('main-content'); ?>
<!-- <?php echo e(var_dump($products[0]->category->age)); ?> -->
<a href="<?php echo e(BASE_URL.'admin/order/view'); ?>"class="btn btn-primary">Quay lại</a>
<table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sản phẩm </th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá thuê</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thời gian sử dụng</th>
                            <th scope="col">Tạm tính</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $order_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($loop->iteration); ?></th>
                            <td> <img src="<?php echo e(IMAGE_URL); ?><?php echo e('/'. $item->images_sp); ?>" alt="" style="width: 150px; height: 200px; "></td>
                            <td><?php echo e($item->name_sp); ?></td>
                            <td><?php echo e(number_format($item->price)); ?> VNĐ</td>
                            <td><?php echo e($item->quantity); ?></td>
                            <td><?php echo e($item->order->time); ?> giờ</td>                          
                            <td><?php echo e(number_format($item->price*$item->quantity)); ?> VNĐ</td>
                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                           <th class="table-dark"></th>
                            <th class="table-dark"></th>
                            <th class="table-dark"></th>
                            <th class="table-dark"></th>
                            <th class="table-dark"></th>
                            <th class="table-dark"></th>
                            <th scope="col" class="table-dark">Tổng tiền : <b><?php echo e(number_format($item->order->total_momney)); ?> VNĐ</b></th>
                            
                        </tr>


                    </tbody>
                </table>
<style>
    .alert-warning {
        color: #856404;
        background-color: #030303d4;
        border-color: #ffeeba;
        position: fixed;
        top: 0;
        height: 100%;
        width: 100%;
        z-index: 1000;
        right: 0;
    }

    #myDIV {
        margin-bottom: 20px;
    }

    /* .btn {
        border: none;
        outline: none;
        padding: 10px 16px;
        background-color: #f1f1f1;
        cursor: pointer;
        font-size: 18px;
    } */

    /* Style the active class, and buttons on mouse-over */
    .active,
    .btn:hover {
        background-color: #666;
        color: white !important;
    }
</style>
<!-- <div id="myDIV">
    <?php if($totalPage>1): ?>
    <a href="<?php echo e(BASE_URL.'admin/san-pham/view?page=1'); ?>" class="btn button2 <?php if (!isset($_GET['page']) || $_GET['page'] == 1) echo "active" ?>">1</a>
    <?php for($i = 2; $i <= $totalPage; $i++): ?> <a href="<?php echo e(BASE_URL.'admin/san-pham/view?page='.$i); ?>" class="btn button2 <?php if (isset($_GET['page']) && $_GET['page'] == $i) echo "active" ?>"><?php echo e($i); ?></a>
        <?php endfor; ?>
        <?php endif; ?>
</div> -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH O:\xampp\htdocs\PHP2\Assment\app\views\backend/order/detail.blade.php ENDPATH**/ ?>