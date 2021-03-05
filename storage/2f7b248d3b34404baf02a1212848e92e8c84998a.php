
<?php $__env->startSection('title', 'List categoryes'); ?>
<?php $__env->startSection('main-content'); ?>
<div id="ex3">
<?php echo flash();
        ?>
<table class="table table-hovered">
    <thead>
        
        <th>Categoryes</th>
        <th>number of products</th>
        <th>Action</th>
    </thead>
    <tbody>

        <?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
           
            <td class="cate-name"><?php echo e(($c->age)); ?></td>
            <td><?php echo e(count($c->products)); ?></td>
            <td>
                    <a href="<?php echo e(BASE_URL); ?>admin/categories/edit?id=<?php echo e($c->id); ?>">Edit</a> /
                    <a href="<?php echo e(BASE_URL); ?>admin/categories/delete?id=<?php echo e($c->id); ?>">Delete</a>
                </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    </div>
</table>
<style>
    #ex3 {

  width: 100%;
  height: 500px;
  overflow: auto;
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH O:\xampp\htdocs\PHP2\Assment\app\views\backend/cates/index.blade.php ENDPATH**/ ?>