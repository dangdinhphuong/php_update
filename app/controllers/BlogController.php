<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Blog;
use App\Models\Role;
use App\Controllers\BaseController;

class BlogController extends BaseController
{
   


    public function index($action)
    {


        if ($action == "view") {
            $blog = Blog::all();
            // $blog->load('user');
            $this->render('blog.index', compact('blog'));
        } elseif ($action == "add") {
            $this->render('blog.add-new');
        } elseif ($action == "edit") {         
            $id = $_GET['id'];
            $model = Blog::find($id);
           if ($model) {
                $this->render('blog.edit', compact('model'));
            } else {
                header('location: ' . BASE_URL . 'admin/blog/view');
                die;
            }
        } else if ($action == "delete") {

            $id = $_GET['id'];
            $model = Blog::find($id);

            if (!$model) {
                header('location: ' . BASE_URL . 'admin/blog/view?messeger=xoa that bai');
                die;
            }

            $model->delete();
            header('location: ' . BASE_URL . 'admin/blog/view');
            die;
        } 

    }
    public function save_blog(){

        if (isset($_POST) && !empty($_POST)) {
            $_POST['created_at'] = date('Y-m-d H:i:s');
            $_POST['updated_at'] = date('Y-m-d H:i:s');
            $model = new Blog();
            $model->fill($_POST);
            $model->save();
            header('location: ' . BASE_URL . 'admin/blog/add');
            die;
        }
    }
    public function update_blog()
    {
        if (isset($_POST) && !empty($_POST)) {

            $id = $_GET['id'];
            $model = Blog::find($id);
            if (!$model) {
                header('location: ' . BASE_URL . 'admin/blog/view?messnger=sửa thất bại');
                die;
            }
            $_POST['updated_at'] = date('Y-m-d H:i:s');
            $model->fill($_POST);
            $model->save();
            header('location: ' . BASE_URL . 'admin/blog/view');
            die;
        } 
        
    }
}
