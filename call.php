<?php
use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\CategoryController;
use App\Controllers\LoginController;
use App\Controllers\UserController;
use App\Controllers\RoleController;

$role = new RoleController();
$home = new HomeController();
$pro = new ProductController();
$login = new LoginController();
$cate = new CategoryController();
$user = new UserController();





// xử lý url
$url = isset($_GET['url']) == true
    ? $_GET['url'] : "/";

function UrlProcess() // chuyển url thành mảng
{
    if (isset($_GET['url'])) {
        return explode('/', filter_var(trim($_GET['url'], '/')));
        // đảm bảo url không chứa dấu cách, ký tự đặc biệt
    }
}
$arr = UrlProcess();
// xử lý controller
if($arr==null){
    $arr='/';
}
// var_dump($arr);
// die;


// unset($_SESSION["add_products"]);