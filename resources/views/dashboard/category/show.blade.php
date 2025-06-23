@extends('dashboard.master')






@section('content')
 <a href="{{route("category.index")}}"  class="btn btn-light ">Listado</a>
@endsection

@section('morecontent')
    <div class="container mt-5">
    <h1>Show POST</h1>
     @include('dashboard.category._form',['task'=>'show'])

   
</div>
@endsection