<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo e(BASE_URL.'home'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Poly Shop</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(BASE_URL.'home'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Quản lý sản phẩm
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-list-ul"></i>
            <span>Danh mục</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(BASE_URL); ?>admin/categories/view">Danh sách</a>
                <a class="collapse-item" href="<?php echo e(BASE_URL . 'admin/categories/add'); ?>">Tạo mới</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo e(BASE_URL); ?>admin/san-pham" data-toggle="collapse" data-target="#products"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-truck-moving"></i>
            <span>Sản phẩm</span>
        </a>
        <div id="products" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(BASE_URL . 'admin/san-pham'); ?>/view">Danh sách</a>
                <a class="collapse-item" href="<?php echo e(BASE_URL . 'admin/san-pham'); ?>/add">Tạo mới</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#role"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-user-friends"></i>
            <span>Role</span>
        </a>
        <div id="role" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(BASE_URL); ?>admin/role/view">Danh sách</a>
                <a class="collapse-item" href="<?php echo e(BASE_URL . 'admin/role/add'); ?>">Tạo mới</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo e(BASE_URL); ?>admin/blog/view" data-toggle="collapse" data-target="#blog"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-blog"></i>
            <span>blog</span>
        </a>
        <div id="blog" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(BASE_URL); ?>admin/blog/view">Danh sách</a>
                <a class="collapse-item" href="<?php echo e(BASE_URL . 'admin/blog/add'); ?>">Tạo mới</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-user-friends"></i>
            <span>User</span>
        </a>
        <div id="user" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(BASE_URL); ?>admin/user/view">Danh sách nhân viên</a>
                <a class="collapse-item" href="<?php echo e(BASE_URL); ?>admin/user/view_kh">Danh sách Khách hàng</a>
                <a class="collapse-item" href="<?php echo e(BASE_URL . 'admin/user/add'); ?>">Tạo mới</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo e(BASE_URL); ?>admin/order/view" data-toggle="collapse" data-target="#order"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-file-invoice"></i>
            <span>Bill</span>
        </a>
        <div id="order" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(BASE_URL); ?>admin/order/view">Danh sách</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo e(BASE_URL); ?>admin/order/view" data-toggle="collapse" data-target="#comment"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-file-invoice"></i>
            <span>Comment</span>
        </a>
        <div id="comment" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(BASE_URL); ?>admin/comment/view">Danh sách</a>
            </div>
        </div>
    </li>

</ul><?php /**PATH O:\xampp\htdocs\PHP2\Assment\app\views\backend/layouts/sidebar.blade.php ENDPATH**/ ?>