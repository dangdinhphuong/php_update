@extends('layouts.main')
@section('title', 'Danh sách Bài viết') 
@section('main-content')
<!-- {{var_dump($products)}} -->
    <table class="table table-hovered">
        <thead>
            <th>STT</th>
            <th>Tên bài viết</th>
            <th>Chi tiết</th>
            <th>Action</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($blog as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>   
                    <td>{{$item->name}}</td>        
                    <td><a href="{{BASE_URL}}blog/detail?id={{$item->id}}"class="btn btn-success">Chi tiết</a></td>
                    <td>
                    <a href="{{BASE_URL}}admin/blog/edit?id={{$item->id}}">Sửa</a>
                    <a href="{{BASE_URL}}admin/blog/delete?id={{$item->id}}">Xóa</a>                
                </td>
                </tr>                
            @endforeach
        </tbody>
    </table>
@endsection