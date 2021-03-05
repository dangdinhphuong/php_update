
<?php $__env->startSection('title', 'Chi tiết thông tin người dùng'); ?>
<?php $__env->startSection('main-content'); ?>
<style>
    .ecBERL {
        display: flex;
        margin: 0px;
        background-image: url("<?php echo e(IMAGE_URL); ?><?php echo e('/'. $editUser->images); ?>");
        border: 1px solid rgb(204, 204, 204);
        border-radius: 50%;
        background-size: cover;
        background-position: center center;
        cursor: pointer;
    }

    .ghkuQJ {
        display: none;
    }
</style>
<div class="col-sm-12">
<?php echo flash();
        ?>
    <div class="card card-default">
        <div class="card-header">
            <div class="card-title">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;"><?php echo $__env->yieldContent('title', 'Dashboard'); ?></font>
                </font>
            </div>
        </div>
        <div class="card-body">
            <form action="<?php echo e(BASE_URL.'admin/update_profile?id='.$editUser->id); ?>" method="post" enctype="multipart/form-data">

                <div style="display: flex; justify-content: center; margin-bottom: 10px;">
                    <label class="sc-gNJABI ecBERL" style=" width: 84px; height: 84px;">
                        <input type="file" name="images" class="sc-yZwTr ghkuQJ">
                        <input type="hidden" value="<?php echo e($editUser->images); ?>" name="image">
                    </label>
                </div>

                <div class="form-group form-group-default"><label>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Họ và tên</font>
                        </font>
                    </label><input name="name" class="form-control" type="text" value="<?php echo e($editUser->name); ?>">
                </div>
                <div class="form-group form-group-default"><label>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Chức vụ</font>
                        </font>
                    </label>
                    <select  class="form-control" id="" disabled>
                        <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item->id); ?>" <?php if($editUser->id_role == $item->id): ?><?php echo e("selected"); ?><?php endif; ?> ><?php echo e($item->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group form-group-default"><label>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">E-mail</font>
                        </font>
                    </label><input name="email" class="form-control" type="text"  value="<?php echo e($editUser->email); ?>">
                </div>
                <div class="form-group form-group-default"><label>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Số điện thoại</font>
                        </font>
                    </label><input name="phone" class="form-control" type="text" value="<?php echo e($editUser->phone); ?>">
                </div>

                <div class="form-group form-group-default"><label>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Địa chỉ</font>
                        </font>
                    </label><input name="address" class="form-control" type="text" value="<?php echo e($editUser->address); ?>">
                </div>

                <div class="form-group form-group-default"><label>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Ngày Đăng ký</font>
                        </font>
                    </label><input  class="form-control" disabled  value="<?php echo e($editUser->created_at); ?>">
                </div>

                <button class="btn btn-primary btn-cons" type="submit">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Lưu</font>
                    </font>
                </button>
                <a class="btn btn-primary btn-cons" href="<?php echo e(BASE_URL.'admin/user/view'); ?>" type="submit">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Quay lại</font>
                    </font>
                </a>
                
            </form>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH O:\xampp\htdocs\PHP2\Assment\app\views\backend/user/profile.blade.php ENDPATH**/ ?>