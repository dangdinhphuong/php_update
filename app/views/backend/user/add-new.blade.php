@extends('layouts.main')
@section('title', 'Thêm thông tin người dùng')
@section('main-content')

<!-- Pie Chart -->
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-12">
        <!-- Card Header - Dropdown -->
        @php echo flash();
        @endphp
       
           
       
            <form action="{{BASE_URL.'admin/user/save'}}" method="post" enctype="multipart/form-data" >


                <div class="d-flex justify-content-around">
                    <div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chức vụ</label> <br>
                           <select name="id_role" id="">
                           <option value="">  ---Chọn chức vụ ---  </option>
                           @foreach ($role as $item)
                           <option value="{{$item->id}}">{{$item->name}}</option>
                           @endforeach
                           </select>
                           <p style="color:red;"> @if(isset($_SESSION['err']['id_role'])||!empty($_SESSION['err']['id_role'])) {{$_SESSION['err']['id_role']}} @endif</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên</label>
                            <input type="text" class="form-control" name="name" v id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                            <p style="color:red;"> @if(isset($_SESSION['err']['name'])||!empty($_SESSION['err']['name'])) {{$_SESSION['err']['name']}} @endif</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ảnh</label>
                            <input type="file" class="form-control" name="images" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <p style="color:red;"> @if(isset($_SESSION['err']['images'])||!empty($_SESSION['err']['images'])) {{$_SESSION['err']['images']}} @endif</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">SĐT</label>
                            <input type="text" class="form-control" name="phone"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter phone, VD:0976594507">
                            <p style="color:red;"> @if(isset($_SESSION['err']['phone'])||!empty($_SESSION['err']['phone'])) {{$_SESSION['err']['phone']}} @endif</p>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter address">
                            <p style="color:red;"> @if(isset($_SESSION['err']['address'])||!empty($_SESSION['err']['address'])) {{$_SESSION['err']['address']}} @endif</p>
                        </div>                     
                        <div class="form-group">
                            <label for="exampleInputEmail1">email</label> <br>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <p style="color:red;"> @if(isset($_SESSION['err']['email'])||!empty($_SESSION['err']['email'])) {{$_SESSION['err']['email']}} @endif</p>

                        </div>   
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mật Khẩu</label> <br>
                            <input type="password" class="form-control" name="password" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter password">
                            <p style="color:red;"> @if(isset($_SESSION['err']['password'])||!empty($_SESSION['err']['password'])) {{$_SESSION['err']['password']}} @endif</p>
                        </div>  
                        <div class="form-group">
                            <label for="exampleInputEmail1">Xác nhận mật khẩu</label> <br>
                            <input type="password" class="form-control" name="password_confin" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Confirm password">
                            <p style="color:red;"> @if(isset($_SESSION['err']['password_confin'])||!empty($_SESSION['err']['password_confin'])) {{$_SESSION['err']['password_confin']}} @endif</p>
                        </div>                   
                    </div>
                </div>
                <button  type="submit" class="btn btn-primary">Submit</button>
            </form>
      
        <!-- Card Body -->

    </div>
</div>

@endsection