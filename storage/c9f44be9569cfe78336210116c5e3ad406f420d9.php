
<?php $__env->startSection('title', 'Moschino'); ?>
<?php $__env->startSection('main-content'); ?>
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

    .btn {
        border: none;
        outline: none;
        padding: 10px 16px;
        background-color: #f1f1f1;
        cursor: pointer;
        font-size: 18px;
    }

    /* Style the active class, and buttons on mouse-over */
    .active,
    .btn:hover {
        background-color: #666;
        color: white !important;
    }
</style>
<div id="content" class="site-content">
    <div id="primary" class="content-area column full">
        <main id="main" class="site-main" role="main">
            <p class="woocommerce-result-count">
                Showing 12 of <?php echo e($total); ?> results
            </p>

            <form class="form-inline woocommerce-ordering" action="<?php echo e(BASE_URL.'filter'); ?>" method="GET">
                <div class="form-group mb-2">
                    <input type="search" class="form-control" <?php if(isset($_GET['key'])): ?> value="<?php echo e($_GET['key']); ?>" <?php endif; ?> name="key" placeholder="Enter search">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <select name="orderby" class="form-control">
                        <option value="0" <?php if(!isset($_GET['orderby'])||$_GET['orderby']==0): ?> selected="selected" <?php endif; ?>>Categoryes</option>
                        <?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cate->id); ?>" <?php $id = $cate->id ?> <?php if(isset($_GET['orderby'])&&$_GET['orderby']==$id): ?> selected="selected" <?php endif; ?> class="aaaaaa"><?php echo e($cate->age); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <select name="sort" class="form-control">
                        <option value="casc" <?php if(!isset($_GET['sort'])||$_GET['sort']=="casc"): ?> selected="selected" <?php endif; ?>>Sort price incrementally</option>                      
                        <option value="desc" <?php if(isset($_GET['sort'])&&$_GET['sort']=="desc"): ?> selected="selected" <?php endif; ?> class="aaaaaa">Descending price arrangement</option>
                      

                    </select>
                </div>
                <button type="submit" class="btn mb-1" style="color: #fff; background-color:#0069D9; ">Filter</button>


            </form>
            <ul class="products">
                <?php $count = 0 ?>

                <?php $__currentLoopData = $pro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $count++ ?>

                <?php if($count % 4 == 0): ?>
                <li class="last product">
                    <a href="<?php echo e(BASE_URL); ?>detail?id=<?php echo e($item->id); ?>">
                        <img src="<?php echo e(IMAGE_URL); ?><?php echo e('/'. $item->images); ?>" alt="" style="height: 330px;">
                        <h3><?php echo e($item->name); ?></h3>
                        <span class="price"><span class="amount">$<?php echo e($item->price); ?></span></span>
                    </a>
                    <a href="<?php echo e(BASE_URL.'add/'.$item->id); ?>" class="single_add_to_cart_button button alt">Add to cart</a>
               
                </li>
                <?php else: ?>
                <li class="product">
                    <a href="<?php echo e(BASE_URL); ?>detail?id=<?php echo e($item->id); ?>">
                        <img src="<?php echo e(IMAGE_URL); ?><?php echo e('/'. $item->images); ?>" alt="" style="height: 330px;">
                        <h3><?php echo e($item->name); ?></h3>
                        <span class="price"><span class="amount">$<?php echo e($item->price); ?></span></span>
                    </a>
                    <a href="<?php echo e(BASE_URL.'add/'.$item->id); ?>" class="single_add_to_cart_button button alt">Add to cart</a>                 
                </li>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->
</div>



<div id="myDIV">
    <?php if($totalPage>1): ?>
    <a href="<?php echo e(BASE_URL.'home?page=1'); ?>" class="btn button2 <?php if (!isset($_GET['page']) || $_GET['page'] == 1) echo "active" ?>">1</a>
    <?php for($i = 2; $i <= $totalPage; $i++): ?> <a href="<?php echo e(BASE_URL.'home?page='.$i); ?>" class="btn button2 <?php if (isset($_GET['page']) && $_GET['page'] == $i) echo "active" ?>"><?php echo e($i); ?></a>
        <?php endfor; ?>
        <?php endif; ?>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH O:\xampp\htdocs\PHP2\Assment\app\views\frontend/home/filter.blade.php ENDPATH**/ ?>