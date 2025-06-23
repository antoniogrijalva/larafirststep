@extends('dashboard.master')


@section('content') 
   
    <a href="{{route("category.create")}}"  class="btn btn-light">Nuevo</a>
@endsection

@section('morecontent')
    <h4 class="mt-3">Listado de Categorias</h4>

    <div class="container-fluid">
        <div class="table-responsive ">
            <table class="table table-bordered  table-hover table-sm table-responsive">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Slug</th>
                       
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listCategories as $categories)
                        <tr>
                            <td>{{ $categories->id }}</td>
                            <td>{{ $categories->title }}</td>
                            <td>{{ $categories->slug }}</td>
                           
                            <td>
                                <a href="{{ route('category.show', $categories->id) }}" class="btn btn-info btn-sm" title="Ver Detalle">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('category.edit', $categories->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                <form action="{{ route('category.destroy', $categories->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro que desea borrar este registro?');">
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
                {{ $listCategories->links('pagination::bootstrap-5') }}
                 {{-- {{ $listPosts->links() }} --}}
            </div>
        </div>
    </div>
@endsection