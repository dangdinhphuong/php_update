@extends('layout.main')
@section('title', 'Moschino')
@section('main-content')
<style>
    .alert-warning {
        color: #856404;
        background-color: #030303d4;
        border-color: #ffeeba;
        position: fixed;
        top: 0;
        height: 100%;
        width: 100%;
        z-index: 1000;
        right: 0;
    }

    #myDIV {
        margin-bottom: 20px;
    }

    .btn {
        border: none;
        outline: none;
        padding: 10px 16px;
        background-color: #f1f1f1;
        cursor: pointer;
        font-size: 18px;
    }

    /* Style the active class, and buttons on mouse-over */
    .active,
    .btn:hover {
        background-color: #666;
        color: white !important;
    }
</style>
<div id="content" class="site-content">
    <div id="primary" class="content-area column full">
        <main id="main" class="site-main" role="main">
            <p class="woocommerce-result-count">
                Showing 12 of {{$total}} results
            </p>

            <form class="form-inline woocommerce-ordering" action="{{BASE_URL.'filter'}}" method="GET">
                <div class="form-group mb-2">
                    <input type="search" class="form-control" @isset($_GET['key']) value="{{$_GET['key']}}" @endisset name="key" placeholder="Enter search">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <select name="orderby" class="form-control">
                        <option value="0" @if(!isset($_GET['orderby'])||$_GET['orderby']==0) selected="selected" @endif>Categoryes</option>
                        @foreach($cates as $cate)
                        <option value="{{$cate->id}}" <?php $id = $cate->id ?> @if(isset($_GET['orderby'])&&$_GET['orderby']==$id) selected="selected" @endif class="aaaaaa">{{$cate->age}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <select name="sort" class="form-control">
                        <option value="casc" @if(!isset($_GET['sort'])||$_GET['sort']=="casc") selected="selected" @endif>Sort price incrementally</option>                      
                        <option value="desc" @if(isset($_GET['sort'])&&$_GET['sort']=="desc") selected="selected" @endif class="aaaaaa">Descending price arrangement</option>
                      

                    </select>
                </div>
                <button type="submit" class="btn mb-1" style="color: #fff; background-color:#0069D9; ">Filter</button>


            </form>
            <ul class="products">
                <?php $count = 0 ?>

                @foreach($pro as $item)
                <?php $count++ ?>

                @if($count % 4 == 0)
                <li class="last product">
                    <a href="{{BASE_URL}}detail?id={{$item->id}}">
                        <img src="{{IMAGE_URL}}{{'/'. $item->images}}" alt="" style="height: 330px;">
                        <h3>{{$item->name}}</h3>
                        <span class="price"><span class="amount">${{$item->price}}</span></span>
                    </a>
                    <a href="{{BASE_URL.'add/'.$item->id}}" class="single_add_to_cart_button button alt">Add to cart</a>
               
                </li>
                @else
                <li class="product">
                    <a href="{{BASE_URL}}detail?id={{$item->id}}">
                        <img src="{{IMAGE_URL}}{{'/'. $item->images}}" alt="" style="height: 330px;">
                        <h3>{{$item->name}}</h3>
                        <span class="price"><span class="amount">${{$item->price}}</span></span>
                    </a>
                    <a href="{{BASE_URL.'add/'.$item->id}}" class="single_add_to_cart_button button alt">Add to cart</a>                 
                </li>
                @endif
                @endforeach
            </ul>
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->
</div>



<div id="myDIV">
    @if($totalPage>1)
    <a href="{{BASE_URL.'home?page=1'}}" class="btn button2 <?php if (!isset($_GET['page']) || $_GET['page'] == 1) echo "active" ?>">1</a>
    @for($i = 2; $i <= $totalPage; $i++) <a href="{{BASE_URL.'home?page='.$i}}" class="btn button2 <?php if (isset($_GET['page']) && $_GET['page'] == $i) echo "active" ?>">{{$i}}</a>
        @endfor
        @endif
</div>


@endsection
@section('page-script')

@endsection