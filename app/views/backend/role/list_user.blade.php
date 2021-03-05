@extends('layouts.main')
@section('title', 'Thông tin Người dùng') 
@section('main-content')
<!-- {{var_dump($users)}} -->
<!-- {{var_dump($users[0]->role_name)}} -->
    <table class="table table-hovered">
        <thead>
            <th>STT</th>
            <th>name</th>
            <th>images</th>
            <th>Chức vụ</th>
            <th><a href="{{BASE_URL}}admin/role/view"  class="btn btn-danger">Quay lại</a></th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($role_user as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <!-- <td>{{$item->category->name}}</td> -->
                    <td>{{$item->name}}</td>
                    <td><img src="{{IMAGE_URL}}{{'/'. $item->images}}" alt="" style="width:80px">  </td>
                    <td>{{$item->role_name->name}}</td>
         
                </tr>                
            @endforeach
        </tbody>
    </table>
@endsection