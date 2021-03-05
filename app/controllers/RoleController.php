<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Role;
use App\Controllers\BaseController;

class RoleController extends BaseController
{
   


    public function index($action)
    {


        if ($action == "view") {
            $role = Role::all();
            $role->load('user');
            $this->render('role.index', compact('role'));
        } elseif ($action == "add") {
            $this->render('role.add-new');
        } elseif ($action == "edit") {         
            $id = $_GET['id'];
            $model = Role::find($id);
           if ($model) {
                $this->render('role.edit', compact('model'));
            } else {
                header('location: ' . BASE_URL . 'admin/role/view');
                die;
            }
        } else if ($action == "delete") {

            $id = $_GET['id'];
            $model = Role::find($id);

            if (!$model) {
                header('location: ' . BASE_URL . 'admin/role/view?messeger=xoa that bai');
                die;
            }

            $model->delete();
            header('location: ' . BASE_URL . 'admin/role/view');
            die;
        } else if($action == "detail"){
            $id = $_GET['id'];
            
            $role_user=User::where("id_role",$id)->get();
            $this->render('role.list_user', compact('role_user'));
        }

    }
    public function save_role(){

        if (isset($_POST) && !empty($_POST)) {

            $model = new Role();
            $model->fill($_POST);
            $model->save();
            header('location: ' . BASE_URL . 'admin/role/view');
            die;
        }
    }
    public function update_role()
    {
        if (isset($_POST) && !empty($_POST)) {

            $id = $_GET['id'];
            $model = Role::find($id);
            if (!$model) {
                header('location: ./chuc-vu?role="" && sửa thất bại');
                die;
            }

            $model->fill($_POST);
            $model->save();
            header('location: ' . BASE_URL . 'admin/role/view');
            die;
        } 
        
    }
}
