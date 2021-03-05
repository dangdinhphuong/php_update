<?php

use App\Controllers\Front_end\BaseController;

session_start();


$url = isset($_GET['url']) == true
    ? $_GET['url'] : "/";
// var_dump($_SESSION["AUTH"]['id_role']);
// die;
 function flash(){
    if(isset($_SESSION['flash'])){
        ?>
        <div id="alert" class="alert alert-<?php echo $_SESSION['flash']['type'] ?>" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            <strong><?php print_r($_SESSION['flash']['message']); ?></strong>
        </div>
        <?php
        unset($_SESSION['flash']);
    }
}
require_once './commons/utils.php';
require_once './vendor/autoload.php';
require_once './config/database.php';
require_once './commons/routes.php'; // chứa các use và biến khởi tạo đối tượng-- và xử lý url



