@extends('dashboard.master')


@section('content') 
   
    <a href="{{route("post.create")}}"  class="btn btn-light">Nuevo</a>
@endsection

@section('morecontent')
    <h4 class="mt-3">Listado de los posts</h4>
        @if (session('status'))
            @if (session('deleted'))
                <div class="alert alert-danger">
            @else
                <div class="alert alert-success">
            @endif
                {{ session('status') }}
          
            </div>
        @endif

        @if(session('s_usuario'))
            <small class="text-primary">
                <i class="bi bi-person"></i>
               {{ session('s_usuario') }}
            </small>  
        @endif
        @if(session('s_email'))
            <small cass="text-muted">
                <i class="bi bi-envelope"></i>
               {{ session('s_email') }}
            </small>  
        @endif
            
    <div class="container-fluid mt-1">
        <div class="table-responsive ">
            <table class="table table-bordered  table-hover table-sm table-responsive">
                <thead class="table-dark">
                    <tr>
                        <th>Título</th>
                        <th>Slug</th>
                        {{-- <th>Contenido</th> --}}
                        <th>Descripción</th>
                        <th>Categoría</th>
                        <th>Publicado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listPosts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->slug }}</td>
                            {{-- <td>{{ $post->content }}</td> --}}
                            <td>{{ $post->description }}</td>
                            <td>{{ $post->category->title }}</td>
                            <td>{{ $post->posted }}</td>
                            <td>
                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-info btn-sm" title="Ver Detalle">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro que desea borrar este registro?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- Paginación --}}
            <div class="d-flex justify-content-center">
                {{ $listPosts->links('pagination::bootstrap-5') }}
                 {{-- {{ $listPosts->links() }} --}}
            </div>
        </div>
    </div>
@endsection