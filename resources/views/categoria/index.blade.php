<!-- Primera parte copiada -->
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Categorías</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @can('crear-categoria')
                        <a class="btn btn-warning" href="{{ route('categorias.create') }}">Crear nueva</a>
                        @endcan
                        &nbsp;
                        <form class="form-inline my-2 my-lg-0 float-right" role="search">
                            <input name="buscarpor" class="form-control me-2" type="search" placeholder="Buscar nombre" aria-label="Search">
                            &nbsp;
                            <button class="btn btn-warning" type="text">Buscar</button>
                        </form>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive" >
                        <table class="table table-striped mt-2">
                            <thead style="background-color:#14a3bb">
                                <th style="color:#fff;">No</th>
                                <th style="color:#fff;">Nombre</th>
                                <th style="color:#fff;">Acciones</th>

                                <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $categoria->nombreC }}</td>

                                    <td>
                                        <form action="{{ route('categorias.destroy',$categoria->id) }}" class="formulario-eliminar" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('categorias.show',$categoria->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                            @can('editar-categoria')
                                            <a class="btn btn-sm btn-success" href="{{ route('categorias.edit',$categoria->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('borrar-categoria')
                                            <a class="btn btn-sm btn-danger btn-link" href="javascript:void(0)" onclick="confirmarEliminacion({{ $categoria->id }})">
                                                <i class="fa fa-fw fa-trash"></i> 
                                            </a>                                            
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $categorias->links() !!}
        </div>
    </div>
    </div>
    @endsection
    <script>
    function confirmarEliminacion(id) {
        if (confirm("¿Estás seguro de que deseas eliminar esta categoria?")) {
            document.getElementById('formulario-eliminar-' + id).submit();
        }
    }
</script>
    