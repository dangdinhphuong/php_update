@extends('layouts.main')
@section('title', 'Thêm Danh sách')
@section('main-content')

<!-- Pie Chart -->
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        @php echo flash();
        @endphp
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <form action="{{ BASE_URL.'admin/categories/save' }}" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Categoryes</label>
                    <input type="text" class="form-control" name="age" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter categoryes">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
        <!-- Card Body -->

    </div>
</div>

@endsection