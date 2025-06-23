@extends('dashboard.master')






@section('content')
 <a href="{{route("post.index")}}"  class="btn btn-light ">Listado</a>
@endsection

@section('morecontent')
    <div class="container mt-5">
    <h1>Formulario</h1>
   
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
     
    <form action="{{route('post.store')}}" method="POST">
        @include('dashboard.post._form')
       
    </form>
</div>
@endsection