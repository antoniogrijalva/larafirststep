@extends('master')


@section('content')
    <h1>Contact 1</h1>
    <p>{{$name}}</p>
    <p>Edad: <b>{{$edad}}</b></p>

    @if (str_contains($name, 'Antonio'))
        <p>Hola, te dicen Toño??</p>
    @else
        <p>tienes algun apodo?</p> 
    @endif
@endsection

@section('morecontent')
    <ul>
    @forelse (['Do','Re','Mi','Fa','Sol','La','Si'] as $item)
        <li>{{$item}}</li>    
    @empty
        <p>No hay notas musicales</p>
    @endforelse
@endsection
