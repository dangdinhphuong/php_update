<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Role;

class UserController extends BaseController
{
    function __construct()
    {
        $id = $_SESSION["AUTH"]['id'];
        $editUser = User::find($id);
        // BaseController::var_dump( $editUser['images']);
        $_SESSION["AUTH"]['images'] = $editUser['images'];
        $_SESSION["AUTH"]['name'] = $editUser['name'];
    }
    public function index($action)
    {


        if ($action == "view") {
            $pagenumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
            $pagesize = isset($_GET['size']) == true ? $_GET['size'] : 4;
            $offset = ($pagenumber - 1) * $pagesize;
            $users = User::where('id_role', '!=', 2)->orderByDesc('date_up')->take($pagesize)->skip($offset)->get();
            $product = User::where('id_role', '!=', 2)->get();
            $totalPage = intval(ceil(count($product) / $pagesize));
            $title['name'] = "Danh sách nhân viên công ty";
            $this->render('user.index', ['users' => $users, 'title' => $title, 'totalPage' => $totalPage, 'offset' => $offset]);
        } elseif ($action == 'view_kh') {
            $pagenumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
            $pagesize = isset($_GET['size']) == true ? $_GET['size'] : 4;
            $offset = ($pagenumber - 1) * $pagesize;
            $users = User::where('id_role', '=', 2)->orderByDesc('date_up')->take($pagesize)->skip($offset)->get();
            $product = User::where('id_role', '=', 2)->get();
            $totalPage = intval(ceil(count($product) / $pagesize));
            $title['name'] = "Danh sách Khách hàng";
            $this->render('user.index', ['users' => $users, 'title' => $title, 'totalPage' => $totalPage, 'offset' => $offset]);
        } else if ($action == "add") {
            $role = Role::all();
            $this->render('user.add-new', compact('role'));
        } elseif ($action == "detail") {
            $id = $_GET['id'];
            $role = Role::all();
            $editUser = User::find($id);
            $this->render('user.edit', ['editUser' => $editUser, 'role' => $role]);
            die;
        } elseif ($action == "delete") {
            $id = $_GET['id'];
            $model = User::find($id);
            if (!$model) {
                header('location: ' . BASE_URL . 'admin/user/view');
                die;
            }
            unlink(IMAGE_BE . $model['images']);

            $model->delete();
            header('location: ' . BASE_URL . 'admin/user/view');
            die;
        } elseif ($action == 'search') {
            $key = $_GET['keyword'];
            $pagenumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
            $pagesize = isset($_GET['size']) == true ? $_GET['size'] : 4;
            $offset = ($pagenumber - 1) * $pagesize;
            $users = User::where("name", "like", "%$key%")->where('id_role', '!=', 2)->orderByDesc('date_up')->take($pagesize)->skip($offset)->get();
            $product = User::where("name", "like", "%$key%")->where('id_role', '!=', 2)->get();
            $title['name'] = "Danh sách tìm kiếm nhân viên công ty";
            $totalPage = intval(ceil(count($product) / $pagesize));
            $this->render('user.search', ['users' => $users, 'title' => $title,  'totalPage' => $totalPage, 'offset' => $offset]);
        }
    }
    public function save_user()
    {
        $err = [];
        $pattern = [
            'phone' => '',
            'password' => '',
            'email' => '',
        ];
        if (isset($_POST) && !empty($_POST)) {
            unset($_SESSION['err']);
            $data = $_POST;
            $file = $_FILES['images'];
            $avatar = '';
            $pattern['email'] = "/^[a-z][a-z 0-9_\.]{5,32}@[a-z 0-9_\.]{2,}(\.[A-z 0-9]{2,4}){1,2}$/";
            $pattern['phone'] = "/^[0]{1}[0-9]{9,10}$/i";
            $pattern['password'] = "/^[a-z0-9]{6,}$/i";
            $product = User::where('email', $data["email"])->get();
            if ($data["id_role"] == "") {
                $err["id_role"] = "Vui lòng chọn chức vụ";
            }
            if ($data["name"] == "") {
                $err["name"] = "Vui lòng nhập tên";
            }
            if ($file['size'] > 0) {
                if ($file['type'] == 'image/png' || $file['type'] == 'image/jpg' || $file['type'] == 'image/jpeg') {
                    $avatar = "user/" . uniqid() . '-' . $file['name'];
                    move_uploaded_file($file['tmp_name'], IMAGE_BE . $avatar);
                    $data['images'] = $avatar;
                } else {
                    $err['images'] = "Ảnh của bạn sai định dạng. ";
                }
            } else {
                $err['images'] = "Bạn chưa nhập ảnh";
            }
            if ($data["phone"] == "") {
                $err["phone"] = "Vui lòng số điện thoại";
            }
            if (preg_match($pattern['phone'], $data["phone"]) == 0) {
                $err['phone'] = "Nhap phone ko dung";
            }
            if ($data["address"] == "") {
                $err["address"] = "Vui lòng địa chỉ";
            }
            if ($data["email"] == "") {
                $err["email"] = "Vui lòng email";
            }
            if (preg_match($pattern['email'], $data["email"]) == 0) {
                $err['email'] = "Nhap email ko dung";
            }
            if (!empty($product[0]['email'])) {
                $err["email"] = "Email đã tồn tại";
            }
            if ($data["password"] == "") {
                $err["password"] = "Vui lòng password";
            }
            if (strlen($data["password"]) < '4') {
                $err['password'] = "Mật khẩu phải chứa ít nhất 4 kí tự!";
            }
            if ($data["password"] != $data["password_confin"]) {
                $err["password"] = "Vui lòng password xác nhận";
            }
            if (!array_filter($err)) { //ko tồn tại lỗi => save
                unset($data["password_confin"]);
                $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
                $data["created_at"] = date('Y-m-d H:i:s');
                //BaseController::var_dump($data);
                $model = new User();
                $model->fill($data);
                $model->save();
                header('location: ' . BASE_URL . 'admin/user/view');
                die;
            } else {
                $_SESSION['err'] = $err;
                // BaseController::var_dump($_SESSION['err']);
                header('location: ' . BASE_URL . 'admin/user/add');
                die;
            }

            //  var_dump($err);
            //           BaseController::var_dump($aa);



        }
    }






    public function update_user()
    {
        // BaseController::var_dump($_POST);
        $err = [];
        if (isset($_POST) && !empty($_POST)) {
            unset($_SESSION['err_up']);
            $id =  $_POST['id'];
            $editUser = User::find($id);
            $file = $_FILES['images'];
            // $_POST['id'] = $id;
            $pattern['email'] = "/^[a-z][a-z 0-9_\.]{5,32}@[a-z 0-9_\.]{2,}(\.[A-z 0-9]{2,4}){1,2}$/";
            $pattern['phone'] = "/^[0]{1}[0-9]{9,10}$/i";
            $pattern['password'] = "/^[a-z0-9]{6,}$/i";
            $product = User::all();
            if ($_POST["id_role"] == "") {
                $err["id_role"] = "Vui lòng chọn chức vụ";
            }
            if ($_POST["name"] == "") {
                $err["name"] = "Vui lòng nhập tên";
            }
            if ($_POST["phone"] == "") {
                $err["phone"] = "Vui lòng số điện thoại";
            }
            if (preg_match($pattern['phone'], $_POST["phone"]) == 0) {
                $err['phone'] = "Nhap phone ko dung";
            }
            if ($_POST["address"] == "") {
                $err["address"] = "Vui lòng địa chỉ";
            }
            if ($_POST["email"] == "") {
                $err["email"] = "Vui lòng email";
            }
            if (preg_match($pattern['email'], $_POST["email"]) == 0) {
                $err['email'] = "Nhap email ko dung";
            }
            foreach ($product as $item) { // kiêm tra tên có tồn tại hay chưa
                if ($item->email == $_POST["email"]) {
                    if ($_POST['email'] != $editUser['email']) {
                        $err["email"] = "Email đã tồn tại";
                    }
                }
            }
            if ($file['size'] > 0) {
                if ($file['type'] == 'image/png' || $file['type'] == 'image/jpg' || $file['type'] == 'image/jpeg') {
                    if (isset($_POST['images']) && !empty($_POST['images'])) {
                        unlink(IMAGE_BE . $_POST['images']);
                    }
                    $avatar = "user/" . uniqid() . '-' . $file['name'];
                    move_uploaded_file($file['tmp_name'], IMAGE_BE . $avatar);
                    $_POST['images'] = $avatar;
                } else {
                    $err['images'] = "Ảnh của bạn sai định dạng. ";
                }
            } else {
                $_POST['images'] = $_POST['image'];
            }
            if (!array_filter($err)) {
                unset($_POST['image']);
                //BaseController::var_dump($_POST);
                $editUser->fill($_POST);
                $editUser->save();
                BaseController::setFlashSuccess("Sửa thành công");
                header('location: ' . $_SERVER["HTTP_REFERER"]);
                die;
            } else {
                $_SESSION['err_up'] = $err;
                header('location: ' . $_SERVER["HTTP_REFERER"]);
                die;
            }
        }
    }
    public function profile()
    {
        $id =  $_SESSION["AUTH"]['id'];
        $role = Role::all();
        $editUser = User::find($id);
        $this->render('user.edit', ['editUser' => $editUser, 'role' => $role]);
    }
   
}
