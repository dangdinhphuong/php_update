
<?php $__env->startSection('title', 'Danh sách Bài viết'); ?> 
<?php $__env->startSection('main-content'); ?>
<!-- <?php echo e(var_dump($products)); ?> -->
    <table class="table table-hovered">
        <thead>
            <th>STT</th>
            <th>Tên bài viết</th>
            <th>Chi tiết</th>
            <th>Action</th>
            <th></th>
        </thead>
        <tbody>
            <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>   
                    <td><?php echo e($item->name); ?></td>        
                    <td><a href="<?php echo e(BASE_URL); ?>blog/detail?id=<?php echo e($item->id); ?>"class="btn btn-success">Chi tiết</a></td>
                    <td>
                    <a href="<?php echo e(BASE_URL); ?>admin/blog/edit?id=<?php echo e($item->id); ?>">Sửa</a>
                    <a href="<?php echo e(BASE_URL); ?>admin/blog/delete?id=<?php echo e($item->id); ?>">Xóa</a>                
                </td>
                </tr>                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH O:\xampp\htdocs\PHP2\Assment\app\views\backend/blog/index.blade.php ENDPATH**/ ?>