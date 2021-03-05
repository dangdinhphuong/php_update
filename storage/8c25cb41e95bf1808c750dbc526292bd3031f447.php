
<?php $__env->startSection('title', 'Danh sách chức vụ'); ?> 
<?php $__env->startSection('main-content'); ?>
<!-- <?php echo e(var_dump($products)); ?> -->
    <table class="table table-hovered">
        <thead>
            <th>STT</th>
            <th>Mã chức vụ</th>
            <th>Tên chúc vụ</th>
            <th>Số lượng người dùng</th>
            <th>Danh sách</th>
            <th>Action</th>
            <th></th>
        </thead>
        <tbody>
            <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>   
                    <td><?php echo e($item->id_role); ?></td>        
                    <td><?php echo e($item->name); ?></td>
                    <td><?php echo e(count($item->user)); ?></td>
                    <?php if(count($item->user)>0): ?>
                    <td><a href="<?php echo e(BASE_URL); ?>admin/role/detail?id=<?php echo e($item->id); ?>"class="btn btn-success">Chi tiết</a></td>
                   <?php else: ?>
                   <td></td>
                    <?php endif; ?>

                    <td>
                    <?php if($item->status==0): ?>
                    <a href="<?php echo e(BASE_URL); ?>admin/role/edit?id=<?php echo e($item->id); ?>">Sửa</a>
                    <a href="<?php echo e(BASE_URL); ?>admin/role/delete?id=<?php echo e($item->id); ?>">Xóa</a>
                    <?php endif; ?>
                </td>
                </tr>                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH O:\xampp\htdocs\PHP2\Assment\app\views\backend/role/index.blade.php ENDPATH**/ ?>