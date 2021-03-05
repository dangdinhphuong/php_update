
<?php $__env->startSection('title'); ?>
<?php echo e($title['name']); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<!-- <?php echo e(var_dump($users)); ?> -->
<!-- <?php echo e(var_dump($users[0]->role_name)); ?> -->
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
<table class="table table-hovered">
    <thead>
        <th>STT</th>
        <th>name</th>
        <th>images</th>
        <th>Chức vụ</th>
        <th>Action</th>
        <th></th>
    </thead>
    <tbody>

        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <!-- <td><?php echo e($item->category->name); ?></td> -->
            <td><?php echo e($item->name); ?></td>
            <td><img src="<?php echo e(IMAGE_URL); ?><?php echo e('/'. $item->images); ?>" alt="" style="width:80px"> </td>
            <td><?php echo e($item->role_name->name); ?></td>

            <td>
                <a href="<?php echo e(BASE_URL); ?>admin/user/detail?id=<?php echo e($item->id); ?>" class="btn btn-success">Chi tiết</a>
                <a href="<?php echo e(BASE_URL); ?>admin/user/delete?id=<?php echo e($item->id); ?>" class="btn btn-danger">Xóa</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div id="myDIV">
    <?php if($totalPage>1): ?>
    <a href="<?php echo e(BASE_URL.'admin/user/search?keyword='.$_GET['keyword'].'&page=1'); ?>" class="btn button2 <?php if (!isset($_GET['page']) || $_GET['page'] == 1) echo "active" ?>">1</a>
    <?php for($i = 2; $i <= $totalPage; $i++): ?> <a href="<?php echo e(BASE_URL.'admin/user/search?keyword='.$_GET['keyword'].'&page='.$i); ?>" class="btn button2 <?php if (isset($_GET['page']) && $_GET['page'] == $i) echo "active" ?>"><?php echo e($i); ?></a>
        <?php endfor; ?>
        <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH O:\xampp\htdocs\PHP2\Assment\app\views\backend/user/search.blade.php ENDPATH**/ ?>