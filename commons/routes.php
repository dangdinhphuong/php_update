<?php

use App\Controllers\Front_end\HomeController;
use App\Controllers\ProductController;
use App\Controllers\CategoryController;
use App\Controllers\OrderController;
use App\Controllers\LoginController;
use App\Controllers\UserController;
use App\Controllers\RoleController;
use App\Controllers\BlogController;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;

$router = new RouteCollector();

$router->filter('auth_admin', function () {

    $_SESSION['REQUEST_URI'] = $_SERVER['REQUEST_URI'];
    if (!isset($_SESSION["AUTH"]) || empty($_SESSION["AUTH"]) || $_SESSION["AUTH"]['id_role'] <= 1) {
        header('location: ' . BASE_URL . 'login_admin');
        die;
    }
});
$router->filter('auth_client', function () {

    $_SESSION['REQUEST_URI_CLIENT'] = $_SERVER['REQUEST_URI'];
    if (!isset($_SESSION["AUTH_CLIENT"]) || empty($_SESSION["AUTH_CLIENT"]) || $_SESSION["AUTH_CLIENT"]['id_role'] != 1) {
        header('location: ' . BASE_URL . 'login_client');
        die;
    }
});
//start phân quyền
$router->filter('GD', function () {
    if (isset($_SESSION["AUTH"]['id_role']) && $_SESSION["AUTH"]['id_role'] < 200) {
        header('location: ' . BASE_URL . 'admin/access');
        die;
    }
});
$router->filter('SP', function () {
    if (isset($_SESSION["AUTH"]['id_role']) && $_SESSION["AUTH"]['id_role'] < 101) {
        var_dump($_SESSION["AUTH"]['id_role']);
        die;
    }
});
$router->filter('AD', function () {
    if (isset($_SESSION["AUTH"]['id_role']) && $_SESSION["AUTH"]['id_role'] < 199) {
        var_dump($_SESSION["AUTH"]['id_role']);
        die;
    }
});
$router->filter('DT', function () {
    if (isset($_SESSION["AUTH"]['id_role']) && $_SESSION["AUTH"]['id_role'] < 100) {
        var_dump($_SESSION["AUTH"]['id_role']);
        die;
    }
});
//end phân quyền

//start url admin
$router->group(['prefix' => 'admin'], function ($router) { //nhóm prefix là có chung các tiền tố trên url là admin
    $router->group(['prefix' => 'order', 'before' => 'auth_admin'], function ($router) { //nhóm prefix là có chung các tiền tố trên url là categories
        $router->get('/{action}', [OrderController::class, "index"], ["before" => "DT"]);   
    });
    $router->get('comment/{action}', [ProductController::class, "comment"], ["before" => "DT"]);
    $router->post('update', [ProductController::class, "update"], ["before" => "DT"]);
    $router->group(['prefix' => 'categories', 'before' => 'auth_admin'], function ($router) { //nhóm prefix là có chung các tiền tố trên url là categories
        $router->get('/{action}', [CategoryController::class, "categories"], ["before" => "DT"]);
        $router->post('/save', [CategoryController::class, "save_cate"], ["before" => "DT"]);
        $router->post('/update', [CategoryController::class, "update_cate"], ["before" => "DT"]);
    });
    $router->group(['prefix' => 'san-pham', 'before' => 'auth_admin'], function ($router) { //nhóm prefix là có chung các tiền tố trên url là san-pham
        $router->get('/{action}', [ProductController::class, "index"], ["before" => "DT"]);
        $router->post('/save', [ProductController::class, "save_pro"], ["before" => "DT"]);
        $router->post('/update', [ProductController::class, "update_pro"], ["before" => "DT"]);
    });
    $router->group(['prefix' => 'role', 'before' => 'auth_admin'], function ($router) { //nhóm prefix là có chung các tiền tố trên url là role
        $router->get('/{action}', [RoleController::class, "index"], ['before' => 'AD']);
        $router->post('/save', [RoleController::class, "save_role"], ['before' => 'AD']);
        $router->post('/update', [RoleController::class, "update_role"], ['before' => 'AD']);
    });
    $router->group(['prefix' => 'blog', 'before' => 'auth_admin'], function ($router) { //nhóm prefix là có chung các tiền tố trên url là blog
        $router->get('/{action}', [BlogController::class, "index"], ['before' => 'SP']);
        $router->post('/save', [BlogController::class, "save_blog"], ['before' => 'SP']);
        $router->post('/update', [BlogController::class, "update_blog"], ['before' => 'SP']);
    });
    $router->group(['prefix' => 'user', 'before' => 'auth_admin'], function ($router) { //nhóm prefix là có chung các tiền tố trên url là user
        $router->get('/{action}', [UserController::class, "index"], ['before' => 'GD']);
        $router->post('/save', [UserController::class, "save_user"], ['before' => 'GD']);
        $router->post('/update', [UserController::class, "update_user"], ['before' => 'GD']);
    });

    $router->get('access', [CategoryController::class, "access"]);// trang thông báo ko được phép truy cập
    $router->get('profile', [UserController::class, "profile"]);
    $router->post('/update_profile', [UserController::class, "update_profile"],);
});
//end url admin

//start client
$router->get('/', [HomeController::class, "home"]);
$router->get('contact', [HomeController::class, "contact"]);
$router->get('home', [HomeController::class, "home"]);
$router->get('order_detail', [HomeController::class, "order_detail"], ['before' => 'auth_client']);
$router->get('order', [HomeController::class, "order"], ['before' => 'auth_client']);
$router->get('detail', [HomeController::class, "detail"]);
$router->get('filter', [HomeController::class, "filter"]);
$router->get('cart', [HomeController::class, "cart"], ['before' => 'auth_client']);
$router->get('confirm', [HomeController::class, "confirm"], ['before' => 'auth_client']);
$router->post('comment', [HomeController::class, "comment"], ['before' => 'auth_client']);
$router->post('update_cart', [HomeController::class, "update_cart"], ['before' => 'auth_client']);
$router->get('add/{id}', [HomeController::class, "add_products"], ['before' => 'auth_client']);
$router->get('cart/delete', [HomeController::class, "cart_delete"], ['before' => 'auth_client']);
$router->post('pay', [HomeController::class, "pay"], ['before' => 'auth_client']);
$router->group(['prefix' => 'blog'], function ($router) { //nhóm prefix là có chung các tiền tố trên url là blog
    $router->get('', [HomeController::class, "blog"], ['before' => 'auth']);
    $router->get('/detail', [HomeController::class, "blog_detail"], ['before' => 'auth']);
});
// end client

// Start singin admin
$router->get('/login_admin', [LoginController::class, 'index']);
$router->post('/post-login', [LoginController::class, 'postLogin_admin']);
// end singin admin

// start singin client
$router->get('/login_client', [LoginController::class, 'singin_client']);
$router->get('/singup_client', [LoginController::class, 'singup_client']);
$router->post('/post_login_client/{action}', [LoginController::class, 'post_login_client']);
// start singin client


$router->get('/logout_client', [LoginController::class, 'logout_client']);
$router->get('/logout_admin', [LoginController::class, 'logout_admin']);


$router->get('error_404', [HomeController::class, "error_404"]);

$dispatcher = new Dispatcher($router->getData());
try {
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
} catch (HttpRouteNotFoundException $ex) {
    header('location: ' . BASE_URL . 'error_404');
    die;
}


// Print out the value returned from the dispatched function
echo $response;
