@extends('layouts.main')
@section('title', 'Chi tiết hóa đơn')
@section('main-content')
<!-- {{var_dump($products[0]->category->age)}} -->
<a href="{{BASE_URL.'admin/order/view'}}"class="btn btn-primary">Quay lại</a>
<table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sản phẩm </th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá thuê</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thời gian sử dụng</th>
                            <th scope="col">Tạm tính</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order_detail as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td> <img src="{{IMAGE_URL}}{{'/'. $item->images_sp }}" alt="" style="width: 150px; height: 200px; "></td>
                            <td>{{ $item->name_sp}}</td>
                            <td>{{number_format($item->price)}} VNĐ</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->order->time}} giờ</td>                          
                            <td>{{number_format($item->price*$item->quantity)}} VNĐ</td>
                        </tr>

                        @endforeach
                        <tr>
                           <th class="table-dark"></th>
                            <th class="table-dark"></th>
                            <th class="table-dark"></th>
                            <th class="table-dark"></th>
                            <th class="table-dark"></th>
                            <th class="table-dark"></th>
                            <th scope="col" class="table-dark">Tổng tiền : <b>{{number_format($item->order->total_momney)}} VNĐ</b></th>
                            
                        </tr>


                    </tbody>
                </table>
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

    /* .btn {
        border: none;
        outline: none;
        padding: 10px 16px;
        background-color: #f1f1f1;
        cursor: pointer;
        font-size: 18px;
    } */

    /* Style the active class, and buttons on mouse-over */
    .active,
    .btn:hover {
        background-color: #666;
        color: white !important;
    }
</style>
<!-- <div id="myDIV">
    @if($totalPage>1)
    <a href="{{BASE_URL.'admin/san-pham/view?page=1'}}" class="btn button2 <?php if (!isset($_GET['page']) || $_GET['page'] == 1) echo "active" ?>">1</a>
    @for($i = 2; $i <= $totalPage; $i++) <a href="{{BASE_URL.'admin/san-pham/view?page='.$i}}" class="btn button2 <?php if (isset($_GET['page']) && $_GET['page'] == $i) echo "active" ?>">{{$i}}</a>
        @endfor
        @endif
</div> -->
@endsection
@section('page-script')

@endsection