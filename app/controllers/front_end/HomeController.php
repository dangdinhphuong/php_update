<?php

namespace App\Controllers\Front_end;

use App\Models\Category;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Buy;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Description;
use App\Models\User;

class HomeController extends BaseController
{
    function __construct()
    
    {   // BaseController::var_dump($_SESSION['REQUEST_URI_CLIENT']);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order = Order::all();
        
        foreach($order as $item){
            $timestamp = strtotime($item->date);
            $timestamp2 = strtotime(date('Y-m-d H:i:s'));
                        $total=$timestamp+86400;
            if($total<$timestamp2){
            //    echo date('Y-m-d H:i:s').'--'.$item->date.'=>'.$item->id; 
            //    echo"<br>";
               $id=$item->id;
               $model = Order::find($id);
           $data['status']=2;
            $model->fill( $data);
            $model->save();
           
            }
        }
      
     //  BaseController::var_dump($timestamp);

        

        if (isset($_SESSION["AUTH_CLIENT"])) {
            $cart = Buy::where("id-user", $_SESSION["AUTH_CLIENT"]['id'])->get();
            $cart->load('product');
            if (!isset($_SESSION["buy"])) {
                $_SESSION["buy"] = [];
            }
            for ($b = 0; $b < count($cart); $b++) {
                $_SESSION["buy"]['id'][$b] = $cart[$b]->product->id;
            }          
        }
    }
    //start product
    public function home()
    {
        $pagenumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
        $pagesize = isset($_GET['size']) == true ? $_GET['size'] : 12;
        $offset = ($pagenumber - 1) * $pagesize;
        $cates = Category::all();
        $pro = Product::where("status", '0')->orderByDesc('price')->take($pagesize)->skip($offset)->get();
        $product = Product::where("status", '0')->get();
        $total = intval(ceil(count($product)));
        $totalPage = ceil($total / $pagesize);
        $this->render_fontend('home.index', ["pro" => $pro, 'cates' => $cates, 'totalPage' => $totalPage, 'offset' => $offset, 'total' => $total]);
    }
    public function filter()
    {
        $pagenumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
        $pagesize = isset($_GET['size']) == true ? $_GET['size'] : 8;
        $offset = ($pagenumber - 1) * $pagesize;
        $keyword = isset($_GET['key']) == true ? $_GET['key'] : "";
        $orderby = isset($_GET['orderby']) == true ? $_GET['orderby'] : "0";
        $sort = isset($_GET['sort']) == true ? $_GET['sort'] : "desc";

        if ($orderby != "0" && $keyword != "") {
            if ($sort == "desc") {
                $pro = Product::where("id_cate", $orderby)->where("name", "like", "%$keyword%")->orderByDesc('price')
                    ->take($pagesize)
                    ->skip($offset)
                    ->get();
                // $totalPage = intval(ceil(Product::where("name", "like", "%$keyword%")->count()/$pagesize));
                $total = intval(ceil(Product::where("id_cate", $orderby)->where("name", "like", "%$keyword%")->count()));
                $totalPage = ceil($total / $pagesize);
            } else if ($sort == "casc") {
                $pro = Product::where("id_cate", $orderby)->where("name", "like", "%$keyword%")->orderBy('price')
                    ->take($pagesize)
                    ->skip($offset)
                    ->get();
                // $totalPage = intval(ceil(Product::where("name", "like", "%$keyword%")->count()/$pagesize));
                $total = intval(ceil(Product::where("id_cate", $orderby)->where("name", "like", "%$keyword%")->count()));
                $totalPage = ceil($total / $pagesize);
            }
        } else if ($orderby != "0") {
            if ($sort == "desc") {
                $pro = Product::where("id_cate", $orderby)->orderByDesc('price')
                    ->take($pagesize)
                    ->skip($offset)
                    ->get();
                // $totalPage = intval(ceil(Product::where("name", "like", "%$keyword%")->count()/$pagesize));
                $total = intval(ceil(Product::where("id_cate", $orderby)->count()));
            } else if ($sort == "casc") {
                $pro = Product::where("id_cate", $orderby)->orderBy('price')
                    ->take($pagesize)
                    ->skip($offset)
                    ->get();
                // $totalPage = intval(ceil(Product::where("name", "like", "%$keyword%")->count()/$pagesize));
                $total = intval(ceil(Product::where("id_cate", $orderby)->count()));
            }
        } else if ($keyword != "") {
            if ($sort == "desc") {
                $pro = Product::where("name", "like", "%$keyword%")->orderByDesc('price')
                    ->take($pagesize)
                    ->skip($offset)
                    ->get();
                // $totalPage = intval(ceil(Product::where("name", "like", "%$keyword%")->count()/$pagesize));
                $total = intval(ceil(Product::where("name", "like", "%$keyword%")->count()));
            } elseif ($sort == "casc") {
                $pro = Product::where("name", "like", "%$keyword%")->orderBy('price')
                    ->take($pagesize)
                    ->skip($offset)
                    ->get();
                // $totalPage = intval(ceil(Product::where("name", "like", "%$keyword%")->count()/$pagesize));
                $total = intval(ceil(Product::where("name", "like", "%$keyword%")->count()));
            }
        } else if ($sort == "desc") {
            $pro = Product::orderByDesc('price')
                ->take($pagesize)
                ->skip($offset)
                ->get();
            // $totalPage = intval(ceil(Product::where("name", "like", "%$keyword%")->count()/$pagesize));
            $total = intval(ceil(Product::orderByDesc('price')->count()));
        } else if ($sort == "casc") {
            $pro = Product::orderBy('price')
                ->take($pagesize)
                ->skip($offset)
                ->get();
            // $totalPage = intval(ceil(Product::where("name", "like", "%$keyword%")->count()/$pagesize));
            $total = intval(ceil(Product::orderBy('price')->count()));
        } else {
            $pro = Product::orderByDesc('updated_at')->take($pagesize)->skip($offset)->get();
            $total = intval(ceil(Product::count()));
        }


        $totalPage = ceil($total / $pagesize);
        $cates = Category::all();

        $this->render_fontend('home.filter', ["pro" => $pro, 'cates' => $cates, 'totalPage' => $totalPage, 'offset' => $offset, 'total' => $total]);
    }
    public function detail()
    {
        $id = $_GET["id"];
       
        $pro = Product::find($id);
        $pro->load('category', 'hometown');
        $com = Comment::where('id_pro',$id)->where('status',1)->take(4)->get();
        $com->load('user');
         // BaseController::var_dump($com[0]->user);
        if ($pro) {
            $id = $_GET['id'];
            $Description = Description::where("id_pro", $id)->get();
            // BaseController::var_dump($pro->id_cate );
            $same_kind = Product::where('id', '!=', $id)->where('id_cate', $pro->id_cate)->orderByDesc('updated_at')->take(4)->get();
            // BaseController::var_dump($same_kind);
            $this->render_fontend('detail.index', ["pro" => $pro, 'same_kind' => $same_kind, "Description" => $Description,'com'=>$com]);
        }
         else {
            header('location:' . BASE_URL . 'home');
            die;
        }
    }
    public function comment(){
        
        if(isset($_POST)&&!empty($_POST['comment'])){
            $id = $_POST["id"];
            $pro = Product::find($id);
            if ($pro) {
                $data['id_pro']= $id;
                $data['id_user']= $_SESSION["AUTH_CLIENT"]['id'];
                $data['comment']=$_POST['comment'];
                $data['date']=date('Y-m-d H:i:s');
              //  BaseController::var_dump($data);
            $model = new Comment();
            $model->fill($data);
            $model->save();
            header('location: ' . $_SERVER["HTTP_REFERER"]);
            die;
            }

        }else{
            header('location: ' . $_SERVER["HTTP_REFERER"]);
            die;
        }
    }
    // end product
    // start blog
    public function blog()
    {
        $blog = Blog::orderByDesc('updated_at')->get();
        // BaseController::var_dump($blog);
        $this->render_fontend('blog.blog', ["blog" => $blog]);
    }
    public function blog_detail()
    {
        $id = $_GET['id'];
        $blog = Blog::orderByDesc('updated_at')->limit(4)->get();
        $detail_blog = Blog::find($id);
        //BaseController::var_dump($detail->description);
        $this->render_fontend('blog.detail', ["blog" => $blog, "detail_blog" => $detail_blog]);
    }
    //end blog

    public function add_products($id)
    {

        $buy = Buy::where("id-product", $id)->get();
        $product = Product::find($id);
        $product->load('category');
        $product = $product->toArray();
        // kiểm tra trong giỏ hàng xem đã có sản phẩm này hay chưa ?

        if (isset($buy[0])) {
            $quantity = $buy[0]->quantity + 1;
            $id = $buy[0]->id;
            $model = Buy::find($id);
            $data['quantity'] = $quantity;
        } else {
            $quantity = 1;
            $data['quantity'] = $quantity;
            $data['id-product'] = $id;
            $data['id-user'] = $_SESSION["AUTH_CLIENT"]['id'];
            $model = new Buy();
        }
        $model->fill($data);
        $model->save();

        if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
            header('location:' . $_SERVER['HTTP_REFERER']);
        } else {
            header('location:' . BASE_URL . 'home');
        }
    }
    public function cart()
    {
        $cart = Buy::where("id-user", $_SESSION["AUTH_CLIENT"]['id'])->get();
        $cart->load('product');

        $this->render_fontend('add_pro.index', ['cart' => $cart]);
    }
    public function confirm()
    {
        $cart = Buy::where("id-user", $_SESSION["AUTH_CLIENT"]['id'])->get();
        $cart->load('product');
        if(count($cart)>0){
        $this->render_fontend('add_pro.confirm', ['cart' => $cart]);
        }
        else{
            header('location: ' . BASE_URL . 'cart');
            die;
        }
    }
    public function pay()
    {
        if (isset($_POST) && !empty($_POST)) {
            $pro = Buy::where("id-user", $_SESSION["AUTH_CLIENT"]['id'])->get();
            $pro->load('product');
            $totalPrice = 0;
            foreach ($pro as $item) {
                $total = $item->product->price * $item->quantity;
                $totalPrice += $total;
                // echo$item->id ;
            }
             // BaseController::var_dump(1);
            $data['time'] = 24;
            $name=uniqid();
            $data['name'] = $name;
            $data['total_momney'] = $totalPrice;
            $data['id-user'] = $_SESSION["AUTH_CLIENT"]['id'];
            $data['date'] = date('Y-m-d H:i:s');
            $model = new Order();
            $model->fill($data);
            $model->save();
            $order = Order::where('name', "$name")->take(1)->get(); // lấy id
            $pro = Buy::where("id-user", $_SESSION["AUTH_CLIENT"]['id'])->get();
            $pro->load('product');
            foreach ($pro as $item) {
                    $db['order_id'] = $order[0]->id;
                    $db['quantity']=$item->quantity;
                    $db['images_sp'] =$item->product->images;
                    $db['name_sp'] =$item->product->name;
                    $db['price'] =$item->product->price;
                    $model = new Order_detail();
                    $model->fill($db);
                    $model->save();
                    $pro_buy = Buy::find($item->id); // lấy toàn bộ data bẳng BUy
                    $pro_buy->delete();// xóa data trong  bảng buy
                    // BaseController::var_dump($db);
            }
            header('location:' . BASE_URL . 'order_detail?id='.$order[0]->id);
        


            // $name = 
            // 
            // $data['name'] = $name;
            // $data['id-user'] = $_SESSION["AUTH_CLIENT"]['id'];
            // $data['total_momney'] = $_POST['total_momney'];
            // $data['date'] = date('Y-m-d H:i:s');

            // $order = Order::where('name', "$name")->take(1)->get(); // lấy id
            //  // lấy id_pro
            // $pro->load('product');
            //BaseController::var_dump($pro);
            //     foreach ($pro as $item) {
            //         //    var_dump($item->product->id);
            //         $db['order_id'] = $order[0]->id;
            //         $db['id_pro'] = $item->product->id;
            //         $model = new Order_detail();
            //         $model->fill($db);
            //         $model->save();
            //     }
            //     foreach ($pro as $item) {
            //         $pro_buy = Buy::find($item->id); // lấy toàn bộ data bẳng BUy
            //         $pro_buy->delete();
            //     }
            //     unset($_SESSION["buy"]);
            //     header('location:' . BASE_URL . 'cart');
            //     die;
            // } else {
            //     header('location:' . BASE_URL . 'home');
            //     die;
        }
    }
    public function cart_delete()
    {

        $id = $_GET['id'];

        $pro_buy = Buy::where('id-product', $id)->get(); // lấy toàn bộ data theo id
        //   BaseController::var_dump($pro_buy);

        if ($pro_buy[0]->id != "") {
            $pro = Buy::find($pro_buy[0]->id);
            $pro->delete();
        }
        //  
        if (isset($_SESSION["buy"]) && !empty($_SESSION["buy"]['id'])) {
            for ($a = 0; $a < count($_SESSION["buy"]['id']); $a++) {
                if ($_SESSION["buy"]['id'][$a] == $id) {
                    // echo "thanh cong--" . $id;
                    unset($_SESSION["buy"]['id'][$a]);
                }
            }
        }
        header('location:' . BASE_URL . 'cart');
        die;
    }
    public function order()
    {
        $order = Order::where("id-user", $_SESSION["AUTH_CLIENT"]['id'])->get();
        //BaseController::var_dump($order);
        $this->render_fontend('order.index', ['order' => $order]);
    }
    public function order_detail()
    {
        $id = $_GET['id'];
        $order_detail = Order_detail::where("order_id", $id)->get();
        $order_detail->load('order');
        // BaseController::var_dump($order_detail);
        $this->render_fontend('order.detail', ['order_detail' => $order_detail]);
    }
    public function error_404()
    {
        $this->render_fontend('error_404.index');
    }
    public function update_cart()
    {
        if (isset($_POST) && !empty($_POST)) {
            for ($a = 0; $a < count($_POST['id']); $a++) {
                $id = $_POST['id'][$a];
                $model = Buy::find($id);
                $data['quantity'] = $_POST['quantity'][$a];
                $model->fill($data);
                $model->save();
            }
            header('location: ' . BASE_URL . 'cart');
            die;
        } else {
            header('location: ' . BASE_URL . 'cart');
            die;
        }
    }
    public function contact(){
        $this->render_fontend('contact.index');
    }
}
