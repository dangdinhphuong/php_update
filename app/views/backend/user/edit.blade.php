@extends('layouts.main')
@section('title', 'Chi tiết thông tin người dùng')
@section('main-content')
<style>
    .ecBERL {
        display: flex;
        margin: 0px;
        background-image: url("{{IMAGE_URL}}{{'/'. $editUser->images}}");
        border: 1px solid rgb(204, 204, 204);
        border-radius: 50%;
        background-size: cover;
        background-position: center center;
        cursor: pointer;
    }

    .ghkuQJ {
        display: none;
    }
</style>@php echo flash();
        @endphp
<div class="col-sm-12">
    <div class="card card-default">
        <div class="card-header">
            <div class="card-title">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">@yield('title', 'Dashboard')</font>
                </font>
            </div>
        </div>
        <div class="card-body">
            <form action="{{BASE_URL.'admin/user/update'}}" method="post" enctype="multipart/form-data">

                <div style="display: flex; justify-content: center; margin-bottom: 10px;">
                    <label class="sc-gNJABI ecBERL" style=" width: 84px; height: 84px;">
                        <input type="file" name="images" class="sc-yZwTr ghkuQJ">
                        <input type="hidden" value="{{$editUser->images}}" name="image">
                       
                    </label> 
                </div>

                <div class="form-group form-group-default"><label>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Họ và tên</font>
                            <input name="id" class="form-control" type="hidden" value="{{$editUser->id}}">
                        </font>
                    </label><input name="name" class="form-control" type="text" value="{{$editUser->name}}">
                    <p style="color:red;"> @if(isset($_SESSION['err_up']['name'])||!empty($_SESSION['err_up']['name'])) {{$_SESSION['err_up']['name']}} @endif</p>
                </div>
                <div class="form-group form-group-default"><label>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Chức vụ</font>
                        </font>
                    </label>
                    <select name="id_role" class="form-control" id="">
                        @foreach ($role as $item)
                        <option value="{{$item->id}}" @if($editUser->id_role == $item->id){{"selected"}}@endif >{{$item->name}}</option>
                        @endforeach
                    </select>
                    <p style="color:red;"> @if(isset($_SESSION['err_up']['id_role'])||!empty($_SESSION['err_up']['id_role'])) {{$_SESSION['err_up']['id_role']}} @endif</p>
                </div>
                <div class="form-group form-group-default"><label>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">E-mail</font>
                        </font>
                    </label><input name="email" class="form-control" type="text"  value="{{$editUser->email}}">
                    <p style="color:red;"> @if(isset($_SESSION['err_up']['email'])||!empty($_SESSION['err_up']['email'])) {{$_SESSION['err_up']['email']}} @endif</p>
                </div>
                <div class="form-group form-group-default"><label>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Số điện thoại</font>
                        </font>
                    </label><input name="phone" class="form-control" type="text" value="{{$editUser->phone}}">
                    <p style="color:red;"> @if(isset($_SESSION['err_up']['phone'])||!empty($_SESSION['err_up']['phone'])) {{$_SESSION['err_up']['phone']}} @endif</p>
                </div>

                <div class="form-group form-group-default"><label>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Địa chỉ</font>
                        </font>
                    </label><input name="address" class="form-control" type="text" value="{{$editUser->address}}">
                    <p style="color:red;"> @if(isset($_SESSION['err_up']['address'])||!empty($_SESSION['err_up']['address'])) {{$_SESSION['err_up']['address']}} @endif</p>
                </div>

                <div class="form-group form-group-default"><label>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Ngày Đăng ký</font>
                        </font>
                    </label><input  class="form-control" disabled  value="{{$editUser->created_at}}">
                </div>

                <button class="btn btn-primary btn-cons" type="submit">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Lưu</font>
                    </font>
                </button>
                <a class="btn btn-primary btn-cons" href="{{BASE_URL.'admin/user/view'}}" type="submit">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Quay lại</font>
                    </font>
                </a>
                
            </form>
        </div>
    </div>

</div>
@endsection