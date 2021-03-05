<?php
namespace App\Controllers;
use Jenssegers\Blade\Blade;

class BaseController{
    protected function render($viewFile, $viewData = []){
        $blade = new Blade('./app/views/backend', './storage');

        echo $blade->make($viewFile, $viewData)->render();
    }
    protected function render_fontend($viewFile, $viewData = []){
        $blade = new Blade('./app/views/frontend', './storage');
        echo $blade->make($viewFile, $viewData)->render();
    }
   static public function var_dump($a){
      echo"<pre>";
      var_dump($a);
      die;
    }
    public function setFlash($message, $type = 'danger'){
        $_SESSION['flash'] = array(
            'message' => $message,
            'type'    => $type
        );
    }

    public function setFlashSuccess($message){
        $this->setFlash($message, 'success');
        
    }

    public function setFlashError($message){
        $this->setFlash($message, 'danger');
    }

   

}


?>