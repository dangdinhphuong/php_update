
<?php $__env->startSection('title', 'Thêm thông tin người dùng'); ?>
<?php $__env->startSection('main-content'); ?>

<!-- Pie Chart -->
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-12">
        <!-- Card Header - Dropdown -->
        <?php echo flash();
        ?>
       
           
       
            <form action="<?php echo e(BASE_URL.'admin/user/save'); ?>" method="post" enctype="multipart/form-data" >


                <div class="d-flex justify-content-around">
                    <div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chức vụ</label> <br>
                           <select name="id_role" id="">
                           <option value="">  ---Chọn chức vụ ---  </option>
                           <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                           <p style="color:red;"> <?php if(isset($_SESSION['err']['id_role'])||!empty($_SESSION['err']['id_role'])): ?> <?php echo e($_SESSION['err']['id_role']); ?> <?php endif; ?></p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên</label>
                            <input type="text" class="form-control" name="name" v id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                            <p style="color:red;"> <?php if(isset($_SESSION['err']['name'])||!empty($_SESSION['err']['name'])): ?> <?php echo e($_SESSION['err']['name']); ?> <?php endif; ?></p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ảnh</label>
                            <input type="file" class="form-control" name="images" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <p style="color:red;"> <?php if(isset($_SESSION['err']['images'])||!empty($_SESSION['err']['images'])): ?> <?php echo e($_SESSION['err']['images']); ?> <?php endif; ?></p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">SĐT</label>
                            <input type="text" class="form-control" name="phone"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter phone, VD:0976594507">
                            <p style="color:red;"> <?php if(isset($_SESSION['err']['phone'])||!empty($_SESSION['err']['phone'])): ?> <?php echo e($_SESSION['err']['phone']); ?> <?php endif; ?></p>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter address">
                            <p style="color:red;"> <?php if(isset($_SESSION['err']['address'])||!empty($_SESSION['err']['address'])): ?> <?php echo e($_SESSION['err']['address']); ?> <?php endif; ?></p>
                        </div>                     
                        <div class="form-group">
                            <label for="exampleInputEmail1">email</label> <br>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <p style="color:red;"> <?php if(isset($_SESSION['err']['email'])||!empty($_SESSION['err']['email'])): ?> <?php echo e($_SESSION['err']['email']); ?> <?php endif; ?></p>

                        </div>   
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mật Khẩu</label> <br>
                            <input type="password" class="form-control" name="password" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter password">
                            <p style="color:red;"> <?php if(isset($_SESSION['err']['password'])||!empty($_SESSION['err']['password'])): ?> <?php echo e($_SESSION['err']['password']); ?> <?php endif; ?></p>
                        </div>  
                        <div class="form-group">
                            <label for="exampleInputEmail1">Xác nhận mật khẩu</label> <br>
                            <input type="password" class="form-control" name="password_confin" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Confirm password">
                            <p style="color:red;"> <?php if(isset($_SESSION['err']['password_confin'])||!empty($_SESSION['err']['password_confin'])): ?> <?php echo e($_SESSION['err']['password_confin']); ?> <?php endif; ?></p>
                        </div>                   
                    </div>
                </div>
                <button  type="submit" class="btn btn-primary">Submit</button>
            </form>
      
        <!-- Card Body -->

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH O:\xampp\htdocs\PHP2\Assment\app\views\backend/user/add-new.blade.php ENDPATH**/ ?>