
<?php $__env->startSection('title', 'Danh sách order'); ?>
<?php $__env->startSection('main-content'); ?>
<!-- <?php echo e(var_dump($products[0]->category->age)); ?> -->
<table class="table table-hovered">
    <thead>
        <th>STT</th>
        <th>Mã hóa đơn</th>
        <th>Khách hàng</th>
        <th>Tổng hóa đơn</th>
        <th>Ngày đặt</th>
    </thead>
    <tbody>

        <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><a href="<?php echo e(BASE_URL.'admin/order/detail?id='.$item->id); ?>"><?php echo e($item->name); ?></a> </td>
            <td><?php echo e($item->user->name); ?></td>
            <td><?php echo e(number_format($item->total_momney)); ?> VNĐ</td>
            <td><?php echo e($item->date); ?></a></td>
         
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH O:\xampp\htdocs\PHP2\Assment\app\views\backend/order/index.blade.php ENDPATH**/ ?>