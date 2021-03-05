@extends('layouts.main')
@section('title', 'Chi tiết thông tin người dùng')
@section('main-content')
<style>
    .ecBERL {
        display: flex;
        margin: 0px;
        background-image: url("{{IMAGE_URL}}{{'/'. $comment->products->images}}");
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


            <div style="display: flex; justify-content: center; margin-bottom: 10px;">
                <label class="sc-gNJABI ecBERL" style=" width: 84px; height: 84px;">


                </label>
            </div>

            <div class="form-group form-group-default"><label>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Tên sản phẩm</font>
                    </font>
                </label>
                <input class="form-control" type="text" disabled value="{{$comment->products->name}}">
            </div>

            <div class="form-group form-group-default"><label>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Người đăng</font>
                    </font>
                </label>
                <input class="form-control" type="text" disabled value="{{$comment->user->name}}">
            </div>

            <div class="form-group form-group-default"><label>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Nội dung bình luận</font>
                    </font>
                </label>
                <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3">{{$comment->comment}}</textarea>

            </div>
            <div class="form-check">
                @php
                $dem=$comment->status;
                @endphp
                <form action="{{BASE_URL.'admin/update'}}" method="post">
                <input type="hidden" name="id" value="{{$comment->id}}">
                    <input class="form-check-input" name="status" type="checkbox" value="1" id="defaultCheck2"  @if($dem==1)checked @endif >
                    <label class="form-check-label" for="defaultCheck2">
                        Hiển thị
                    </label>
            </div>
            <button class="btn btn-primary btn-cons" type="submit">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Lưu</font>
                </font>
            </button>
            </form>
            <a class="btn btn-primary btn-cons" href="{{BASE_URL}}admin/comment/view" type="submit">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Quay lại</font>
                </font>
            </a>

            
        </div>
    </div>

</div>
@endsection