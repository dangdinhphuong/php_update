@extends('layouts.main')
@section('title', 'Sửa Danh sách')
@section('main-content')
<!-- Pie Chart -->
<!-- {{var_dump($model->age)}} -->

<div class="col-xl-12 col-lg-12">
@php echo flash();
        @endphp
<a href="{{BASE_URL}}admin/categories/view" class="btn">Quay lại</a>
    <div class="card shadow mb-4">
    
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <form action="{{BASE_URL}}admin/categories/update" method="post">
            <input type="hidden" name="id" value="{{$model->id}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Categoryes</label>
                        <input type="text" class="form-control" name="age" value="{{$model->age}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Categoryes">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                
            </form>
        </div>
        <!-- Card Body -->

    </div>
</div>

@endsection