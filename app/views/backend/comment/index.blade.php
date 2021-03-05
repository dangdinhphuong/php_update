@extends('layouts.main')
@section('title', 'Danh sách sản phẩm')
@section('main-content')
<!-- {{var_dump($products[0]->category->age)}} -->
@php echo flash();
        @endphp
<table class="table table-hovered">
    <thead>
        <th>STT</th>
        <th>Photo of product</th>
        <th>Name of product</th>
        <th>Date</th>
        <th>Status</th>
        <th colspan="2">Action</th>
       
    </thead>
    <tbody>

        @foreach ($comment as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td><img src="{{IMAGE_URL}}{{'/'. $item->products->images}}" alt="" style="width:80px"> </td>
            <td>{{$item->products->name}}</td>
            <td> {{$item->date}}</td>
            
            <td>
            @if($item->status==1)Show 
            @else Hidden
            @endif
            </td>
           
            <td><a href="{{BASE_URL}}admin/comment/detail?id={{$item->id}}" class="btn btn-success">Chi tiết</a></td>
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
<div id="myDIV">
    @if($totalPage>1)
    <a href="{{BASE_URL.'admin/san-pham/view?page=1'}}" class="btn button2 <?php if (!isset($_GET['page']) || $_GET['page'] == 1) echo "active" ?>">1</a>
    @for($i = 2; $i <= $totalPage; $i++) <a href="{{BASE_URL.'admin/san-pham/view?page='.$i}}" class="btn button2 <?php if (isset($_GET['page']) && $_GET['page'] == $i) echo "active" ?>">{{$i}}</a>
        @endfor
        @endif
</div>
@endsection
@section('page-script')

@endsection