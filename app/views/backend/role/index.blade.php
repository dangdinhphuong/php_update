@extends('layouts.main')
@section('title', 'Danh sách chức vụ') 
@section('main-content')
<!-- {{var_dump($products)}} -->
    <table class="table table-hovered">
        <thead>
            <th>STT</th>
            <th>Mã chức vụ</th>
            <th>Tên chúc vụ</th>
            <th>Số lượng người dùng</th>
            <th>Danh sách</th>
            <th>Action</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($role as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>   
                    <td>{{$item->id_role}}</td>        
                    <td>{{$item->name}}</td>
                    <td>{{count($item->user)}}</td>
                    @if(count($item->user)>0)
                    <td><a href="{{BASE_URL}}admin/role/detail?id={{$item->id}}"class="btn btn-success">Chi tiết</a></td>
                   @else
                   <td></td>
                    @endif

                    <td>
                    @if($item->status==0)
                    <a href="{{BASE_URL}}admin/role/edit?id={{$item->id}}">Sửa</a>
                    <a href="{{BASE_URL}}admin/role/delete?id={{$item->id}}">Xóa</a>
                    @endif
                </td>
                </tr>                
            @endforeach
        </tbody>
    </table>
@endsection