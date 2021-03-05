<?php

namespace App\Controllers;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\User;
use App\Models\Product;
use App\Models\Role;
use App\Controllers\BaseController;

class OrderController extends BaseController
{
   


    public function index($action)
    {


        if ($action == "view") {
            $order = Order::orderByDesc('date')->get();
            $order->load('user');
           // BaseController::var_dump($order);
            $this->render('order.index', compact('order'));
        } 
        else if($action == "detail"){
            $id= $_GET['id'];
            $order_detail = Order_detail::where("order_id", $id)->get();
            $order_detail->load('order');
            // BaseController::var_dump($order_detail);
            $this->render('order.detail', compact('order_detail'));
        }

    }
 
}
