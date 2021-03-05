<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Description;
use App\Models\Hometown;

class ProductController extends BaseController
{

    public function index($action)
    {
        //echo $action;
        //die;
        //BaseController::var_dump($_SERVER);
        $cates = Category::all();
        $hometown = Hometown::all();
        if ($action == "add") {

            $this->render('product.add-new', compact('cates', 'hometown'));
        } else if ($action == 'edit') {
            $id = $_GET['id'];
            $cates = Category::all();
            $hometown = Hometown::all();
            $editPro = Product::find($id);
            $this->render('product.edit', ['editPro' => $editPro, 'cates' => $cates, 'hometown' => $hometown]);
            die;
        } else if ($action == "delete") {
            $id = $_GET['id'];
            $model = Product::find($id);
            $model2 = Description::where('id_pro', $id)->get();
            // BaseController::var_dump(count($model2));
            if (!$model || !$model2) {
                header('location: ' . BASE_URL . 'admin/san-pham/view');
                die;
            }
            for ($a = 0; $a < count($model2); $a++) {
                $model2[$a]->delete();
                unlink(IMAGE_BE . $model2[$a]['name']);
            }
            unlink(IMAGE_BE . $model['images']);

            $model->delete();
            BaseController::setFlashSuccess("Xóa thành công");
            header('location: ' . BASE_URL . 'admin/san-pham/view');
            die;
        } else if ($action == "view") {
            $pagenumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
            $pagesize = isset($_GET['size']) == true ? $_GET['size'] : 5;
            $offset = ($pagenumber - 1) * $pagesize;
            $products = Product::orderByDesc('updated_at')->take($pagesize)->skip($offset)->get();
            $products->load('category');
            $product = Product::orderByDesc('updated_at')->get();
            $totalPage = intval(ceil(count($product) / $pagesize));
            $this->render('product.index', ['products' => $products, 'totalPage' => $totalPage, 'offset' => $offset]);
        }
    }
    public function save_pro()
    {   // BaseController::var_dump($_POST);
        $err = [];
        if (isset($_POST) && !empty($_POST)) {

            $data = $_POST;
            $file = $_FILES['images'];
            //  BaseController::var_dump($data);
            unset($_SESSION['err_pro']);
            unset($_SESSION['value']);
            $avatar = '';
            if ($data["id_cate"] == "") {
                $err["id_cate"] = "Vui lòng chọn loại thực phẩm";
            }
            if ($data["name"] == "") {
                $err["name"] = "Vui lòng Nhập tên";
            }
            if ($data["id_hometown"] == "") {
                $err["id_hometown"] = "Vui lòng chọn nơi sản xuất";
            }
            if ($data["price"] == "") {
                $err["price"] = "Vui lòng nhập giá sản phẩm";
            }
            if ($data["description"] == "") {
                $err["description"] = "Vui lòng nhập mô tả san phẩm";
            }
            if ($file['size'] > 0) {
                if ($file['type'] == 'image/png' || $file['type'] == 'image/jpg' || $file['type'] == 'image/jpeg') {
                    $avatar = "product/" . uniqid() . '--' . uniqid() . '--' . $file['name']; // uniqid() hàm tạo text ngẫu nhiên
                    move_uploaded_file($file['tmp_name'], IMAGE_BE . $avatar);
                    $data['images'] = $avatar;
                } else {
                    $err['images'] = "Ảnh của bạn sai định dạng. ";
                }
            } else {
                $err['images'] = "Bạn chưa nhập ảnh";
            }
            if ($data["price"] <= 0) {
                $err["price"] = "Vui lòng nhập giá là số dương";
            }
            if (is_int($data["price"]) != true) {
                $err["price"] = "Vui lòng nhập giá là số dương";
            }

            if (!array_filter($err)) {
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['updated_at'] = date('Y-m-d H:i:s');
                $model = new Product();
                $model->fill($data);
                $model->save();

                $model2 = Product::where('images', $data['images'])->get();
                //BaseController::var_dump($model2[0]->id);
                $count = 0;
                $name = $_FILES['files']['name'];
                $files = $_FILES['files'];

                if (count($name) > 0) { // thêm nhiều ảnh cho mô tả thông qua images của product
                    for ($a = 0; $a < count($name); $a++) {
                        $avatar = "description/" . uniqid() . '--' . uniqid() . '--' . $name[$a]; // uniqid() hàm tạo text ngẫu nhiên
                        move_uploaded_file($files['tmp_name'][$a], IMAGE_BE . $avatar);
                        $data['name'] = $avatar;
                        $data['id_pro'] = $model2[0]->id;
                        $add_images = new Description();
                        $add_images->fill($data);
                        $add_images->save();
                    }
                }
                BaseController::setFlashSuccess("Thêm thành công");
                header('location: ' . BASE_URL . 'admin/san-pham/view');
                die;
            } else {
                $_SESSION['err_pro'] = $err;
                $_SESSION['value'] = $data;

                header('location: ' . BASE_URL . 'admin/san-pham/add');
                die;
            }
        }
    }
    public function update_pro()
    {
        $err = [];
        $id = $_GET['id'];
        $editPro = Product::find($id);
        if (isset($_POST) && !empty($_POST)) {
            unset($_SESSION['err_edit']);
            $file = $_FILES['image'];
            $_POST['id'] = $id;
            $data = $_POST;
            unset($_SESSION['err_edit']);
            unset($_SESSION['value']);
            $avatar = '';

            if ($data["id_cate"] == "") {
                $err["id_cate"] = "Vui lòng chọn loại thực phẩm";
            }
            if ($data["name"] == "") {
                $err["name"] = "Vui lòng Nhập tên";
            }
            if ($data["id_hometown"] == "") {
                $err["id_hometown"] = "Vui lòng chọn nơi sản xuất";
            }
            if ($data["price"] == "") {
                $err["price"] = "Vui lòng nhập giá sản phẩm";
            }
            if ($data["description"] == "") {
                $err["description"] = "Vui lòng nhập mô tả san phẩm";
            }
            if ($file['size'] > 0) {
                if ($file['type'] == 'image/png' || $file['type'] == 'image/jpg' || $file['type'] == 'image/jpeg') {
                    unlink(IMAGE_BE . $_POST['images']);
                    $avatar = "product/" . uniqid() . '-' . $file['name'];
                    move_uploaded_file($file['tmp_name'], IMAGE_BE . $avatar);
                    $_POST['images'] = $avatar;
                } else {
                    $err['images'] = "Ảnh của bạn sai định dạng. ";
                }
            }
            // if ($data["price"]< 0) {
            //     $err["price"] = "Vui lòng nhập giá là số dương";
            // }

            if (!array_filter($err)) {
                $_POST['updated_at'] = date('Y-m-d H:i:s');

                $editPro->fill($_POST);
                $editPro->save();
                $name = $_FILES['files']['name'];
                $files = $_FILES['files'];
                // BaseController::var_dump($name[0]);
                if ($name[0] != "") { // thêm nhiều ảnh trong mô tả
                    $model2 = Description::where('id_pro', $id)->get();
                    if (count($model2) > 0) {
                        for ($a = 0; $a < count($model2); $a++) {
                            $model2[$a]->delete();
                            unlink(IMAGE_BE . $model2[$a]['name']);
                        }
                    }
                    for ($a = 0; $a < count($name); $a++) {
                        $avatar = "description/" . uniqid() . '--' . uniqid() . '--' . $name[$a]; // uniqid() hàm tạo text ngẫu nhiên
                        move_uploaded_file($files['tmp_name'][$a], IMAGE_BE . $avatar);
                        $data['name'] = $avatar;
                        $data['id_pro'] = $id;
                        $add_images = new Description();
                        $add_images->fill($data);
                        $add_images->save();
                    }
                }
                BaseController::setFlashSuccess("Sửa thành công");
                header('location: ' . BASE_URL . 'admin/san-pham/view');
                die;
            } else {
                $_SESSION['err_edit'] = $err;
                header('location: ' . $_SERVER["HTTP_REFERER"]);
                die;
            }
        }
    }
    public function comment($action)
    {
        if ($action == "view") {
            $pagenumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
            $pagesize = isset($_GET['size']) == true ? $_GET['size'] : 5;
            $offset = ($pagenumber - 1) * $pagesize;
            $comment= Comment::orderByDesc('date')->take($pagesize)->skip($offset)->get();
            $comment->load('products');
            $com= Comment::orderByDesc('date')->get();
            $totalPage = intval(ceil(count($com) / $pagesize));
            $this->render('comment.index', ['comment' => $comment, 'totalPage' => $totalPage, 'offset' => $offset]);
        }
        else if($action == "detail"){
              $id=$_GET['id'];
              $comment= Comment::find($id);
              $comment->load('products','user');
              $this->render('comment.edit', ['comment' => $comment]);
        }
    }
    public function update(){
        if (isset($_POST) && !empty($_POST)) {
             //BaseController::var_dump($_POST);
             $id=$_POST['id'];
             if(isset($_POST['status'])){
                 $data['status']=1;
             }
            else if(!isset($_POST['status'])){
                $data['status']=0;
             }
            $model = Comment::find($id);
            if (!$model) {
                BaseController::setFlashSuccess("capa nhat that bai");
                header('location:' . $_SERVER['HTTP_REFERER']);
                die;
            }

            $model->fill($data);
            $model->save();
            BaseController::setFlashSuccess("capa nhat thanh cong");
            header('location:' . $_SERVER['HTTP_REFERER']);
            die;
        }
    }
}
