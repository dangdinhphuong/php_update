@extends('layout.main')
@section('title', 'Moschino2')
@section('main-content')
@php

$timestamp = strtotime($order_detail[0]->order->date);
$total=$timestamp+86400;
$total2=date("Y-m-d H:i:s", $total);
@endphp
<div id="content" class="site-content" style="margin-bottom: 30px;">
    <div id="primary" class="">
        <main id="main" class="site-main" role="main" style="position: relative; height: -1px!important;">
                <a href="{{BASE_URL.'order'}}" class="btn btn-primary" style="color:#fff">Quay lại</a>
               <!-- @if($order_detail[0]->order->status==0)

               @endif -->
                <a href="{{BASE_URL.'update_order'}}" class="btn btn-danger" style="color:#fff">Hủy đơn hàng</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Images</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Into money</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php

                        $totalPrice=0;
                        @endphp
                        @foreach($order_detail as $item)
                        @php
                        $total=$item->price*$item->quantity;
                        $totalPrice+=$total;
                        @endphp

                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td><img src="{{IMAGE_URL}}/{{$item->images_sp}}" style="width: 30%;  " alt="{{IMAGE_URL}}/{{$item->images}}"></td>
                            <td>{{$item->name_sp}}</td>
                            <td>{{number_format($item->price)}} VNĐ</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{number_format($item->price*$item->quantity)}} VNĐ</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="2">expired: <b>{{$total2}}</b> </td>
                            <!-- <td></td> -->
                            <td>Trading code: <b>{{$order_detail[0]->order->name}}</b> </td>
                            <!-- <td></td> -->
                            <!-- <td></td> -->
                            <td class="table-dark" colspan="3">Total money: <b>{{number_format($totalPrice)}} VNĐ</b> </td>
                        </tr>
                    </tbody>
                </table>

        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->

 
    <!-- #secondary -->
</div>

@endsection
@section('page-script')
<script>

</script>
@endsection