<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;


class CategoryController extends BaseController
{
    //------------backend------------------
    public function categories($action)
    {
        if ($action == "view") {
            $cates = Category::all();
            $cates->load('products');
            $this->render('cates.index', compact('cates'));
        } else if ($action == "add") {
            $this->render('cates.add-new');
        } else if ($action == "edit") {
            $id = $_GET['id'];
            $model = Category::find($id);
            if ($model) {
                $this->render('cates.edit', compact('model'));
            } else {
                header('location: ' . BASE_URL . 'admin/categories/view');
                die;
            }
        } else if ($action == "delete") {
            // BaseController::var_dump(1);
            $id = $_GET['id'];
            $model = Category::find($id);
            if (!$model) {
                BaseController::setFlashError("Xóa thất bại");
                header('location: ' . BASE_URL . 'admin/categories/view');
                die;
            }
           else{
            $model->delete();
            BaseController::setFlashSuccess("Xóa thành công");
            header('location: ' . BASE_URL . 'admin/categories/view');
            $this->render('cates.index');
        }
        }
    }
    public function save_cate()
    {
        $err = '';
        if (isset($_POST) && !empty($_POST['age'])) {
            $cates = Category::all();
            foreach ($cates as $item) { // kiêm tra tên có tồn tại hay chưa
                if ($item->age == $_POST['age']) {
                    $err = "Tên loại đã tồn tại";
                }
            }
            if ($err == '') { //thực hiện khi $err rỗng
                $model = new Category();
                $model->fill($_POST);
                $model->save();
                BaseController::setFlashSuccess("Thêm thành công");
                header('location: ' . BASE_URL . 'admin/categories/view');
                die;
            }
        } elseif (empty($_POST['age'])) { // kiêm tra tên có rỗng hay ko
            $err = "Tên loại không được để rỗng";
        }

        BaseController::setFlashError($err);
        header('location: ' . BASE_URL . 'admin/categories/add');
        die;
    }






    public function update_cate()
    {    $err = '';
        if (isset($_POST) && !empty($_POST['age'])) {
            $id = $_POST['id'];
            $model = Category::find($id);
            $cates = Category::all();
            foreach ($cates as $item) { // kiêm tra tên có tồn tại hay chưa
                if ($item->age == $_POST['age']) {
                    if($_POST['age']!=$model['age']){
                        $err = "Tên loại đã tồn tại";
                    }
                }
            }

            if (!$model) {//tra id co ton tai hay ko
                $err = 'Sửa thất bại';
            }
            // BaseController::var_dump($err);
            if($err==""){
            $model->fill($_POST);
            $model->save();
            BaseController::setFlashSuccess("Sửa thành công");
            header('location: ' . BASE_URL . 'admin/categories/view');
            die;
        }
        } 
        elseif (empty($_POST['age'])) { // kiêm tra tên có rỗng hay ko
            $err = "Tên loại không được để rỗng";
        }
       // BaseController::var_dump();
        BaseController::setFlashError($err);
        header('location: ' .$_SERVER["HTTP_REFERER"]);
        die;
    }



    public function access()
    {
        $this->render('access.index',);
    }
}
