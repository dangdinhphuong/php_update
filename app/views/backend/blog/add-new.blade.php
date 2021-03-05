@extends('layouts.main')
@section('title', 'Thêm Bài viết')
@section('main-content')

<!-- Pie Chart -->
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <form action="{{BASE_URL.'admin/blog/save'}}" method="post" style="width: 100%;">  
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên bài viết</label>
                        <textarea type="name" class="form-control" name="name"cols="30" rows="4"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mô tả</label>
                        <textarea type="name" class="form-control" name="detail"cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nội dung chi tiết</label>
                        <textarea type="name" id="mytextarea" class="form-control" name="description"cols="30" rows="20"></textarea>
                    </div>
                  
                   
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
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