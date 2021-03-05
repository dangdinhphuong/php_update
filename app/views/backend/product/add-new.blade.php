@extends('layouts.main')
@section('title', 'Thêm sản phẩm')
@section('main-content')

<!-- Pie Chart -->
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-12">
        <!-- Card Header - Dropdown -->

        <form action="{{BASE_URL.'admin/san-pham/save'}}" method="post" enctype="multipart/form-data">


            <div class="d-flex justify-content-around">
                <div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kind of food</label> <br>
                        <select name="id_cate" id="">
                            <option value=""> ---Chọn--- </option>
                            @foreach ($cates as $item)
                            <option value="{{$item->id}}">{{($item->age)}}</option>
                            @endforeach
                        </select>
                        <p style="color:red;"> @if(isset($_SESSION['err_pro']['id_cate'])||!empty($_SESSION['err_pro']['id_cate'])) {{$_SESSION['err_pro']['id_cate']}} @endif</p>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">name of food</label>
                        <input type="text" class="form-control" name="name" value=" @if(isset( $_SESSION['value']['name'])||!empty( $_SESSION['value']['name'])) {{ $_SESSION['value']['name']}} @endif" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                        <p style="color:red;"> @if(isset($_SESSION['err_pro']['name'])||!empty($_SESSION['err_pro']['name'])) {{$_SESSION['err_pro']['name']}} @endif</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Food photo</label>
                        <input type="file" class="form-control" name="images" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <p style="color:red;"> @if(isset($_SESSION['err_pro']['images'])||!empty($_SESSION['err_pro']['images'])) {{$_SESSION['err_pro']['images']}} @endif</p>
                    </div>
                   
                </div>
                <div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">where production</label> <br>
                        <select name="id_hometown" id="">
                            <option value=""> ---Select a province--- </option>
                            @foreach ($hometown as $item)
                            <option value="{{$item->id}}">Tỉnh {{$item->name}}</option>
                            @endforeach
                        </select>
                        <p style="color:red;"> @if(isset($_SESSION['err_pro']['id_hometown'])||!empty($_SESSION['err_pro']['id_hometown'])) {{$_SESSION['err_pro']['id_hometown']}} @endif</p>
                    </div>
                   
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="number" step="0.01" class="form-control"value="@if(isset( $_SESSION['value']['price'])||!empty( $_SESSION['value']['price'])) {{ $_SESSION['value']['price']}} @endif" name="price" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
                        <p style="color:red;"> @if(isset($_SESSION['err_pro']['price'])||!empty($_SESSION['err_pro']['price'])) {{$_SESSION['err_pro']['price']}} @endif</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Photo describes the food</label>
                        <!-- <input type="file"  class="form-control" name="images_phu" multiple="multiple" > -->
                        <input multiple="multiple" name="files[]" class="form-control" size="141" type="file" />
                    </div>
                   
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label> <br>
                    <textarea name="description" id="mytextarea" cols="30" rows="10">@if(isset( $_SESSION['value']['description'])||!empty( $_SESSION['value']['description'])) {{ $_SESSION['value']['description']}} @endif</textarea>
                    <p style="color:red;"> @if(isset($_SESSION['err_pro']['description'])||!empty($_SESSION['err_pro']['description'])) {{$_SESSION['err_pro']['description']}} @endif</p>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- Card Body -->

    </div>
</div>

@endsection
@section('page-script')
<script type="text/javascript">
    tinymce.init({
        selector: "#mytextarea"
    });
</script>
@endsection