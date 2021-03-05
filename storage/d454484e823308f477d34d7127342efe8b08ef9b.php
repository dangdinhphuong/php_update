
<?php $__env->startSection('title', 'Thêm Danh sách'); ?>
<?php $__env->startSection('main-content'); ?>

<!-- Pie Chart -->
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <?php echo flash();
        ?>
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <form action="<?php echo e(BASE_URL.'admin/categories/save'); ?>" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Categoryes</label>
                    <input type="text" class="form-control" name="age" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter categoryes">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
        <!-- Card Body -->

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH O:\xampp\htdocs\PHP2\Assment\app\views\backend/cates/add-new.blade.php ENDPATH**/ ?>