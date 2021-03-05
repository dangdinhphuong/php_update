
<?php $__env->startSection('title', 'Chi tiết thông tin người dùng'); ?>
<?php $__env->startSection('main-content'); ?>
<style>
    .ecBERL {
        display: flex;
        margin: 0px;
        background-image: url("<?php echo e(IMAGE_URL); ?><?php echo e('/'. $comment->products->images); ?>");
        border: 1px solid rgb(204, 204, 204);
        border-radius: 50%;
        background-size: cover;
        background-position: center center;
        cursor: pointer;
    }

    .ghkuQJ {
        display: none;
    }
</style><?php echo flash();
?>
<div class="col-sm-12">
    <div class="card card-default">
        <div class="card-header">
            <div class="card-title">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;"><?php echo $__env->yieldContent('title', 'Dashboard'); ?></font>
                </font>
            </div>
        </div>
        <div class="card-body">


            <div style="display: flex; justify-content: center; margin-bottom: 10px;">
                <label class="sc-gNJABI ecBERL" style=" width: 84px; height: 84px;">


                </label>
            </div>

            <div class="form-group form-group-default"><label>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Tên sản phẩm</font>
                    </font>
                </label>
                <input class="form-control" type="text" disabled value="<?php echo e($comment->products->name); ?>">
            </div>

            <div class="form-group form-group-default"><label>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Người đăng</font>
                    </font>
                </label>
                <input class="form-control" type="text" disabled value="<?php echo e($comment->user->name); ?>">
            </div>

            <div class="form-group form-group-default"><label>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Nội dung bình luận</font>
                    </font>
                </label>
                <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3"><?php echo e($comment->comment); ?></textarea>

            </div>
            <div class="form-check">
                <?php
                $dem=$comment->status;
                ?>
                <form action="<?php echo e(BASE_URL.'admin/update'); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo e($comment->id); ?>">
                    <input class="form-check-input" name="status" type="checkbox" value="1" id="defaultCheck2"  <?php if($dem==1): ?>checked <?php endif; ?> >
                    <label class="form-check-label" for="defaultCheck2">
                        Hiển thị
                    </label>
            </div>
            <button class="btn btn-primary btn-cons" type="submit">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Lưu</font>
                </font>
            </button>
            </form>
            <a class="btn btn-primary btn-cons" href="<?php echo e(BASE_URL); ?>admin/comment/view" type="submit">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Quay lại</font>
                </font>
            </a>

            
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH O:\xampp\htdocs\PHP2\Assment\app\views\backend/comment/edit.blade.php ENDPATH**/ ?>