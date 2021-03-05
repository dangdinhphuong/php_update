<?php

use App\Controllers\BaseController;

const BASE_URL = "/PHP2/Assment/";
const PUBLIC_URL = BASE_URL . 'public/';
const IMAGE_URL=BASE_URL . "uploads";
define('IMAGE_BE', $_SERVER["DOCUMENT_ROOT"] . BASE_URL . "uploads/");
const MENBER_ROLE=1;
const ADMIN_ROLE=200;
const AUTH='session_auth';
const THEME_ASSET_URL = PUBLIC_URL . 'theme/';
const THEME_FONTEND_URL = PUBLIC_URL . 'theme_fontend/';

function checkAUTH($role=MENBER_ROLE){
    if(!isset($_SESSION[AUTH])|| empty($_SESSION[AUTH])|| $_SESSION[AUTH]["role"]<$role){
        header('location:'.BASE_URL.'login');
    }
}
function checkLogin(){   
    $_SESSION['REQUEST_URI']=$_SERVER['REQUEST_URI'];
    if(!isset($_SESSION["AUTH_LOGIN"])|| empty($_SESSION["AUTH_LOGIN"])){
        header('location:'.BASE_URL.'login');
    }
}
?>



