@extends('layouts.main')
@section('title', 'Danh sách order')
@section('main-content')
<!-- {{var_dump($products[0]->category->age)}} -->
<table class="table table-hovered">
    <thead>
        <th>STT</th>
        <th>Mã hóa đơn</th>
        <th>Khách hàng</th>
        <th>Tổng hóa đơn</th>
        <th>Ngày đặt</th>
    </thead>
    <tbody>

        @foreach ($order as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td><a href="{{BASE_URL.'admin/order/detail?id='.$item->id}}">{{$item->name}}</a> </td>
            <td>{{$item->user->name}}</td>
            <td>{{number_format($item->total_momney)}} VNĐ</td>
            <td>{{$item->date}}</a></td>
         
        </tr>
        @endforeach
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