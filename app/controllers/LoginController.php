<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function __construct()
    {
    }
    public function index()
    {
        $this->render('login.login');
        die;
    }
    public function singin_client()
    {
        $this->render_fontend('login.singin');
        die;
    }
    public function singup_client()
    {
        $this->render_fontend('login.singup');
        die;
    }

    public function postLogin_admin()
    {
        if (isset($_POST) && !empty($_POST['email']) && !empty($_POST['password'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $email_data = User::where('email', $email)->first();
            if ($email_data != false) {
                if (password_verify($password, $email_data->password)) {
                    $email_data->load('role_name');
                    if ($email_data->role_name->id_role != 1) {
                        $_SESSION["AUTH"] = [
                            'id_role' => $email_data->role_name->id_role,
                            'role' => $email_data->role_name->name,
                            'id' => $email_data->id,
                            'name' => $email_data->name,
                            'images' => $email_data->images,
                            'phone' => $email_data->phone,
                            'address' => $email_data->address,
                            'email' => $email_data->email,
                            'created_at' => $email_data->created_at,
                            'date_up' => $email_data->date_up,
                        ];
                    } else {

                        header('location:' . BASE_URL . 'login_admin?messenger=Tài khoản không đủ điều kiện sử dụng login này');
                    }

                    // BaseController::var_dump($_SESSION["AUTH"]);
                    if (isset($_SESSION['REQUEST_URI']) && !empty($_SESSION['REQUEST_URI'])) {
                        header('location:' . $_SESSION['REQUEST_URI']);
                    } else {
                        header('location:' . BASE_URL . 'admin/categories/view');
                    }
                } else {

                    header('location:' . BASE_URL . 'login_admin?messenger=mật khẩu không chính xác');
                }
            } else {
                header('location:' . BASE_URL . 'login_admin?messenger=tài khaon không đúng');
                die;
            }
        }
    }
    public function post_login_client($action)
    {
        $data = $_POST;
        if ($action == "singin") {
            if (isset($_POST) && !empty($_POST['email']) && !empty($_POST['password'])) {

                $email = $_POST['email'];
                $password = $_POST['password'];
                $email_data = User::where('email', $email)->first();
                if ($email_data != false) {

                    if (password_verify($password, $email_data->password)) {
                        $email_data->load('role_name');
                        if ($email_data->role_name->id_role == 1) {

                            $_SESSION["AUTH_CLIENT"] = [
                                'id_role' => $email_data->role_name->id_role,
                                'role' => $email_data->role_name->name,
                                'id' => $email_data->id,
                                'name' => $email_data->name,
                                'images' => $email_data->images,
                                'phone' => $email_data->phone,
                                'address' => $email_data->address,
                                'email' => $email_data->email,
                                'created_at' => $email_data->created_at,
                                'date_up' => $email_data->date_up,
                            ];
                            // BaseController::var_dump( $_SESSION["AUTH_CLIENT"]);
                            // BaseController::var_dump($_SERVER);
                            if (isset($_SESSION['REQUEST_URI_CLIENT']) && !empty($_SESSION['REQUEST_URI_CLIENT'])) {

                                if ($_SESSION['REQUEST_URI_CLIENT'] != "/PHP2/Assment/post_login_client/singin") {
                                    $REQUEST_URI = $_SESSION['REQUEST_URI_CLIENT'];
                                    unset($_SESSION['REQUEST_URI_CLIENT']);
                                    header('location:' . $REQUEST_URI);
                                    die;
                                } else {
                                    header('location:' . BASE_URL . 'home');
                                }
                                
                            } else {
                                header('location:' . BASE_URL . 'home');
                            }
                        } else {
                            $err["acc"] = "The account is not eligible to use this login information";
                            $this->render_fontend('login.singin', ['err' => $err, 'data' => $data]);
                            die;
                            // header('location:' . BASE_URL . 'login_client?messenger=Tài khoản không đủ điều kiện sử dụng login này');
                        }
                    } else {
                        $err['pass'] = "incorrect password";
                        $this->render_fontend('login.singin', ['err' => $err, 'data' => $data]);
                        die;
                        // header('location:' . BASE_URL . 'login_client?messenger=mật khẩu không chính xác');
                    }
                } else {
                    $err['email'] = "Unregistered email";
                    $this->render_fontend('login.singin', ['err' => $err, 'data' => $data]);
                    die;
                    // header('location:' . BASE_URL . 'login_client?messenger=tài khaon không đúng');
                    // die;
                }
            }
        } elseif ($action == "singup") {

            $data = $_POST;
            $email = User::where('email', $data['email'])->first();
            if ($email == false) {
                if ($data['password'] == $data['password2']) {
                    unset($data["password2"]);
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    $data['id_role'] = 2;
                    $model = new User();
                    $model->fill($data);
                    $model->save();
                    header('location: ' . BASE_URL . 'login_client');
                    die;
                } else {
                    $err['password'] = "Password confirmation is incorrect";
                    $this->render_fontend('login.singup', ['err' => $err, 'data' => $data]);
                    die;
                }
            } elseif ($email == true) {

                $err['email'] = "Email already exists";
                $this->render_fontend('login.singup', ['err' => $err, 'data' => $data]);
                die;
            }
            // BaseController::var_dump($data);
        }
    }
    public function logout_client()
    {
        unset($_SESSION["AUTH_CLIENT"]);

        header('location: ' . BASE_URL . 'home');
    }
    public function logout_admin()
    {
        unset($_SESSION["AUTH"]);

        header('location: ' . BASE_URL . 'home');
    }
}
