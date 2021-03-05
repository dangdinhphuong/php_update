@extends('layouts.main')
@section('title', 'Sửa chức vụ')
@section('main-content')
<!-- Pie Chart -->
<!-- {{var_dump($model->age)}} -->

<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <form action="{{BASE_URL.'admin/role/update?id='.$_GET['id']}}" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Mã chức vụ</label>
                    <input type="number" class="form-control" name="id_role" value="{{$model->id_role}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter id_role">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Chức vụ</label>
                    <input type="text" class="form-control" name="name" value="{{$model->name}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <!-- Card Body -->

    </div>
</div>

@endsection