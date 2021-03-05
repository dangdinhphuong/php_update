@extends('layouts.main')
@section('title', 'Sửa sản phẩm')
@section('main-content')
<!-- {{var_dump($editPro)}} -->
<!-- Pie Chart -->
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-12">
        <!-- Card Header - Dropdown -->

        <form action="{{BASE_URL.'admin/san-pham/update?id='.$_GET['id']}}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <a href="{{BASE_URL.'admin/san-pham/view'}}" class="btn btn-warning">Quay lại</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            <div class="d-flex justify-content-around">
                <div>
                    <div class="form-group">

                    <label for="exampleInputEmail1">Sinh Năm</label> <br>
                        <select name="id_cate" id="">
                           
                            @foreach ($cates as $item)
                            <option value="{{$item->id}}" @if($editPro->id_cate == $item->id){{"selected"}}@endif >{{$item->age}} </option>
                            @endforeach
                        </select>
                        <p style="color:red;"> @if(isset($_SESSION['err_edit']['id_cate'])||!empty($_SESSION['err_edit']['id_cate'])) {{$_SESSION['err_edit']['id_cate']}} @endif</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$editPro->name}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                        <p style="color:red;"> @if(isset($_SESSION['err_edit']['name'])||!empty($_SESSION['err_edit']['name'])) {{$_SESSION['err_edit']['name']}} @endif</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Avatar</label>
                        <input type="file" class="form-control" name="image" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <input type="hidden" value="{{$editPro->images}}" name="images">
                        <img src="{{IMAGE_URL}}{{'/'. $editPro->images}}" alt="" style="width:80px">
                        <p style="color:red;"> @if(isset($_SESSION['err_edit']['image'])||!empty($_SESSION['err_edit']['image'])) {{$_SESSION['err_edit']['image']}} @endif</p>
                    </div>

                </div>
                <div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tỉnh Thành</label> <br>
                        <select name="id_hometown" id="">

                            @foreach ($hometown as $item)
                            <option @if($editPro->id == $item->id){{"selected"}}@endif value="{{$item->id}}">Tỉnh {{$item->name}}</option>
                            @endforeach
                        </select>
                        <p style="color:red;"> @if(isset($_SESSION['id_hometown']['price'])||!empty($_SESSION['id_hometown']['price'])) {{$_SESSION['id_hometown']['price']}} @endif</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="number" step="0.01" class="form-control" name="price" value="{{$editPro->price}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
                        <p style="color:red;"> @if(isset($_SESSION['err_edit']['price'])||!empty($_SESSION['err_edit']['price'])) {{$_SESSION['err_edit']['price']}} @endif</p>
                    </div>
                 
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ảnh mô tả</label>
                        <!-- <input type="file"  class="form-control" name="images_phu" multiple="multiple" > -->
                        <input multiple="multiple" name="files[]" class="form-control" size="141" type="file" />
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Description2</label> <br>
                <textarea name="description" id="mytextarea2" width:100̀% cols="100" rows="30"> {{$editPro->description}}</textarea>
                <p style="color:red;"> @if(isset($_SESSION['err_edit']['price'])||!empty($_SESSION['err_edit']['price'])) {{$_SESSION['err_edit']['price']}} @endif</p>
            </div>
        </form>

        <!-- Card Body -->

    </div>
</div>

@endsection

@section('page-script')
<script type="text/javascript">
    tinymce.init({
        selector: "#mytextarea2"
    });
</script>
@endsection