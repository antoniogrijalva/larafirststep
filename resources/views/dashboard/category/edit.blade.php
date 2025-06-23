@extends('dashboard.master')






@section('content')
 <a href="{{route("category.index")}}"  class="btn btn-light ">Listado</a>
@endsection

@section('morecontent')
    <div class="container mt-5">
    <h1>Editar Category</h1>
   
    {{-- identificar si hay errores de validacion --}}
    {{-- 
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
     --}}
     @include('dashboard.fragment._errors-form')
     
    <form action="{{ route('category.update', ['category' => $category->id ?? null]) }}" method="POST" >
        @method('PATCH')
        
        @include('dashboard.category._form',['task'=>'edit'])

       
    </form>
</div>
@endsection