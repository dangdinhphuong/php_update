
<?php $__env->startSection('title', 'Thêm sản phẩm'); ?>
<?php $__env->startSection('main-content'); ?>

<!-- Pie Chart -->
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-12">
        <!-- Card Header - Dropdown -->

        <form action="<?php echo e(BASE_URL.'admin/san-pham/save'); ?>" method="post" enctype="multipart/form-data">


            <div class="d-flex justify-content-around">
                <div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kind of food</label> <br>
                        <select name="id_cate" id="">
                            <option value=""> ---Chọn--- </option>
                            <?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?>"><?php echo e(($item->age)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <p style="color:red;"> <?php if(isset($_SESSION['err_pro']['id_cate'])||!empty($_SESSION['err_pro']['id_cate'])): ?> <?php echo e($_SESSION['err_pro']['id_cate']); ?> <?php endif; ?></p>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">name of food</label>
                        <input type="text" class="form-control" name="name" value=" <?php if(isset( $_SESSION['value']['name'])||!empty( $_SESSION['value']['name'])): ?> <?php echo e($_SESSION['value']['name']); ?> <?php endif; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                        <p style="color:red;"> <?php if(isset($_SESSION['err_pro']['name'])||!empty($_SESSION['err_pro']['name'])): ?> <?php echo e($_SESSION['err_pro']['name']); ?> <?php endif; ?></p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Food photo</label>
                        <input type="file" class="form-control" name="images" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <p style="color:red;"> <?php if(isset($_SESSION['err_pro']['images'])||!empty($_SESSION['err_pro']['images'])): ?> <?php echo e($_SESSION['err_pro']['images']); ?> <?php endif; ?></p>
                    </div>
                   
                </div>
                <div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">where production</label> <br>
                        <select name="id_hometown" id="">
                            <option value=""> ---Select a province--- </option>
                            <?php $__currentLoopData = $hometown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?>">Tỉnh <?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <p style="color:red;"> <?php if(isset($_SESSION['err_pro']['id_hometown'])||!empty($_SESSION['err_pro']['id_hometown'])): ?> <?php echo e($_SESSION['err_pro']['id_hometown']); ?> <?php endif; ?></p>
                    </div>
                   
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="number" step="0.01" class="form-control"value="<?php if(isset( $_SESSION['value']['price'])||!empty( $_SESSION['value']['price'])): ?> <?php echo e($_SESSION['value']['price']); ?> <?php endif; ?>" name="price" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
                        <p style="color:red;"> <?php if(isset($_SESSION['err_pro']['price'])||!empty($_SESSION['err_pro']['price'])): ?> <?php echo e($_SESSION['err_pro']['price']); ?> <?php endif; ?></p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Photo describes the food</label>
                        <!-- <input type="file"  class="form-control" name="images_phu" multiple="multiple" > -->
                        <input multiple="multiple" name="files[]" class="form-control" size="141" type="file" />
                    </div>
                   
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label> <br>
                    <textarea name="description" id="mytextarea" cols="30" rows="10"><?php if(isset( $_SESSION['value']['description'])||!empty( $_SESSION['value']['description'])): ?> <?php echo e($_SESSION['value']['description']); ?> <?php endif; ?></textarea>
                    <p style="color:red;"> <?php if(isset($_SESSION['err_pro']['description'])||!empty($_SESSION['err_pro']['description'])): ?> <?php echo e($_SESSION['err_pro']['description']); ?> <?php endif; ?></p>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- Card Body -->

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<script type="text/javascript">
    tinymce.init({
        selector: "#mytextarea"
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH O:\xampp\htdocs\PHP2\Assment\app\views\backend/product/add-new.blade.php ENDPATH**/ ?>