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
                            <div style="width:100%; box-shadow: 1px 1px 10px gray; margin:0 20px 0 0 ;    height: 500px;  overflow: scroll;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product Images</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cart as $item)
                                        @php
                                        $total=$item->product->price*$item->quantity;
                                        $totalPrice+=$total;

                                        @endphp
                                        <tr>
                                            <th scope="row">1</th>
                                            <td><img src="{{IMAGE_URL}}/{{$item->product->images}}" style="width: 30%;  " alt="{{IMAGE_URL}}/{{$item->product->images}}"></td>
                                            <td>{{$item->product->name}}</td>
                                            <td>{{number_format($item->product->price)}} VNĐ</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>{{number_format($item->product->price*$item->quantity)}} VNĐ</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <!-- <td></td> -->
                                            <td class="table-dark" colspan="2">Tổng tiền: <b>{{number_format($totalPrice)}} VNĐ</b> </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <form action="{{BASE_URL.'pay'}}" method="post">
                                    <input type="hidden" name="test">
                                    <div class="d-flex justify-content-center">

                                        <button type="submit" class="btn btn-success">Purchase</button>
                                    </div>
                                </form>
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
   
    @endsection