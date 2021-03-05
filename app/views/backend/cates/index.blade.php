@extends('layouts.main')
@section('title', 'List categoryes')
@section('main-content')
<div id="ex3">
@php echo flash();
        @endphp
<table class="table table-hovered">
    <thead>
        
        <th>Categoryes</th>
        <th>number of products</th>
        <th>Action</th>
    </thead>
    <tbody>

        @foreach ($cates as $c)
        <tr>
           
            <td class="cate-name">{{($c->age)}}</td>
            <td>{{count($c->products)}}</td>
            <td>
                    <a href="{{BASE_URL}}admin/categories/edit?id={{$c->id}}">Edit</a> /
                    <a href="{{BASE_URL}}admin/categories/delete?id={{$c->id}}">Delete</a>
                </td>
        </tr>
        @endforeach
    </tbody>
    </div>
</table>
<style>
    #ex3 {

  width: 100%;
  height: 500px;
  overflow: auto;
}
</style>
@endsection