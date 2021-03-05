@extends('layout.main')
@section('title', 'Moschino')
@section('main-content')
@php
$totalPrice = 0;
$dem=0
@endphp
<div id="content" class="site-content">
    <div id="primary" class="content-area column full">
        <main id="main" class="site-main" role="main">
            <div id="container">
                <div id="content" role="main">
                    <nav class="woocommerce-breadcrumb" itemprop="breadcrumb"><a href="{{BASE_URL}}">Home</a></nav>
                    <div itemscope itemtype="http://schema.org/Product" class="product">
                        <div class="images d-flex" style="width:100%;">
                            <div style="width:65%; box-shadow: 1px 1px 10px gray; margin:0 20px 0 0 ;    height: 500px;  overflow: scroll;">
                                @if(!isset($cart)|| count($cart)<=0) <div class="alert alert-danger" role="alert">
                                    The cart is empty!
                            </div>
                            @elseif(isset($cart)|| count($cart)>0)
                            <form action="{{BASE_URL.'update_cart'}}" name="product_form" method="post">
                                @foreach($cart as $item)
                                @php
                                $total=$item->product->price*$item->quantity;
                                $totalPrice+=$total;
                                $dem+=$item->quantity;
                                @endphp

                                <div class="d-flex ">
                                    <img src="{{IMAGE_URL}}/{{$item->product->images}}" style="width: 30%;  " alt="{{IMAGE_URL}}/{{$item->product->images}}">
                                    <div style="margin:10px">
                                        <p> {{$item->product->name}}</p>
                                        <b style="font-size: 25px;"><b>{{number_format($item->product->price)}} VNĐ</b></b>
                                        <div class="quantity">
                                            <label for=""  id="">Số lượng</label>
                                            <input type="hidden" name="id[]" value="{{$item->id}}">
                                            <input type="number" step="1" min="1" max="" name="quantity[]" value="{{$item->quantity}}" title="Qty" class="input-text qty text times" size="4" />
                                        </div>
                                        <br>
                                        <a href="{{BASE_URL}}cart/delete?id={{$item->product->id}}">Xóa</a>
                                    </div>
                                </div>

                                <br>
                                @endforeach
                            </form>
                            @endif
                        </div>

                        <div style=" width:35%; ">

                            <div style="margin:0 10px;padding:10px;box-shadow: 1px 1px 10px gray;">


                                <div class="form-row align-items-center">



                                    <div class="col-auto">
                                        <button id="submit" class="btn btn-danger">Update</button>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div style="margin:0 10px;padding:10px;box-shadow: 1px 1px 10px gray;">
                                <form action="{{BASE_URL.'confirm'}}" method="get">
                                    <label for="">Số lượng sản phẩm: <b>{{$dem}}</b></label><br>
                                    <label for="">Tam tính : <b id="a1">{{number_format($totalPrice) }} VNĐ</b></label>

                                    <hr>
                                    <label for="">Thành tiền : <b id="a2" style="font-size: 20px; color:red">{{number_format($totalPrice) }} VNĐ</b></label>
                                   
                                    <div class="d-flex justify-content-center">

                                        <button type="submit" class="btn btn-success">Proceed to order</button>
                                    </div>
                                </form>
                            </div>
                            <br>

                        </div>

                    </div>

                </div>
            </div>
    </div>
    </main>
    <!-- #main -->
</div>

@endsection
@section('page-script')
<script>
    $(document).ready(function() {

        $("#submit").on("click", function(e) {
            e.preventDefault();
            // alert("thanh cong");
            $("form[name='product_form']").trigger("submit");
        });

    });
</script>
<script>



    //     var times = document.querySelector(".times");

    //     var time = document.querySelector("#time");

    //     var Price2 = document.querySelector("#a2");
    //     var Price3 = document.querySelector("#a3");
    //     total = 0;
    //     total = times.value *\
    //     time.innerHTML = times.value;
    //   //  Price1.innerHTML = "$" + total;
    //     Price2.innerHTML = "$" + total;
    //     Price3.value = total;

    //     times.onchange = function() {
    //         if (times.value <= 0) {
    //             times.value = 1;
    //         }
    //         total = 0;
    //         total = times.value *\
    //         time.innerHTML = times.value;
    //         Price1.innerHTML = "$" + total;
    //         Price2.innerHTML = "$" + total;
    //         Price3.value = total;
    // }
</script>
@endsection