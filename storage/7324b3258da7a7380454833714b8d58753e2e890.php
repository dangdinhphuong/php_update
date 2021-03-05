
<?php $__env->startSection('title', 'Sửa sản phẩm'); ?>
<?php $__env->startSection('main-content'); ?>
<!-- <?php echo e(var_dump($editPro)); ?> -->
<!-- Pie Chart -->
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-12">
        <!-- Card Header - Dropdown -->

        <form action="<?php echo e(BASE_URL.'admin/san-pham/update?id='.$_GET['id']); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <a href="<?php echo e(BASE_URL.'admin/san-pham/view'); ?>" class="btn btn-warning">Quay lại</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            <div class="d-flex justify-content-around">
                <div>
                    <div class="form-group">

                    <label for="exampleInputEmail1">Sinh Năm</label> <br>
                        <select name="id_cate" id="">
                           
                            <?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?>" <?php if($editPro->id_cate == $item->id): ?><?php echo e("selected"); ?><?php endif; ?> ><?php echo e($item->age); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <p style="color:red;"> <?php if(isset($_SESSION['err_edit']['id_cate'])||!empty($_SESSION['err_edit']['id_cate'])): ?> <?php echo e($_SESSION['err_edit']['id_cate']); ?> <?php endif; ?></p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo e($editPro->name); ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                        <p style="color:red;"> <?php if(isset($_SESSION['err_edit']['name'])||!empty($_SESSION['err_edit']['name'])): ?> <?php echo e($_SESSION['err_edit']['name']); ?> <?php endif; ?></p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Avatar</label>
                        <input type="file" class="form-control" name="image" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <input type="hidden" value="<?php echo e($editPro->images); ?>" name="images">
                        <img src="<?php echo e(IMAGE_URL); ?><?php echo e('/'. $editPro->images); ?>" alt="" style="width:80px">
                        <p style="color:red;"> <?php if(isset($_SESSION['err_edit']['image'])||!empty($_SESSION['err_edit']['image'])): ?> <?php echo e($_SESSION['err_edit']['image']); ?> <?php endif; ?></p>
                    </div>

                </div>
                <div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tỉnh Thành</label> <br>
                        <select name="id_hometown" id="">

                            <?php $__currentLoopData = $hometown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if($editPro->id == $item->id): ?><?php echo e("selected"); ?><?php endif; ?> value="<?php echo e($item->id); ?>">Tỉnh <?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <p style="color:red;"> <?php if(isset($_SESSION['id_hometown']['price'])||!empty($_SESSION['id_hometown']['price'])): ?> <?php echo e($_SESSION['id_hometown']['price']); ?> <?php endif; ?></p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="number" step="0.01" class="form-control" name="price" value="<?php echo e($editPro->price); ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
                        <p style="color:red;"> <?php if(isset($_SESSION['err_edit']['price'])||!empty($_SESSION['err_edit']['price'])): ?> <?php echo e($_SESSION['err_edit']['price']); ?> <?php endif; ?></p>
                    </div>
                 
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ảnh mô tả</label>
                        <!-- <input type="file"  class="form-control" name="images_phu" multiple="multiple" > -->
                        <input multiple="multiple" name="files[]" class="form-control" size="141" type="file" />
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Description2</label> <br>
                <textarea name="description" id="mytextarea2" width:100̀% cols="100" rows="30"> <?php echo e($editPro->description); ?></textarea>
                <p style="color:red;"> <?php if(isset($_SESSION['err_edit']['price'])||!empty($_SESSION['err_edit']['price'])): ?> <?php echo e($_SESSION['err_edit']['price']); ?> <?php endif; ?></p>
            </div>
        </form>

        <!-- Card Body -->

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
<script type="text/javascript">
    tinymce.init({
        selector: "#mytextarea2"
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH O:\xampp\htdocs\PHP2\Assment\app\views\backend/product/edit.blade.php ENDPATH**/ ?>