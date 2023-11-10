<!-- Primera parte copiada -->
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">SubCategorias</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @can('crear-subcategoria')
                        <a class="btn btn-warning" href="{{ route('subcategorias.create') }}">Crear nueva</a>
                        @endcan
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
                    <div class="table-responsive">
                        <table class="table table-striped mt-2">
                            <thead style="background-color:#14a3bb">

                                <th style="color:#fff;">No</th>
                                <th style="color:#fff;">Categoría</th>
                                <th style="color:#fff;"> Nombre</th>
                                <th style="color:#fff;">Acciones</th>
                                <th></th>

                            </thead>
                            <tbody>
                                @foreach ($galerias as $galeria)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $galeria->Categoria->nombreC }}</td>
                                    <td>{{ $galeria->nombreSC }}</td>
                                
                                    <td>
                                        <form action="{{ route('subcategorias.destroy',$galeria->id) }}" class="formulario-eliminar" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('subcategorias.show',$galeria->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                            @can('editar-subcategoria')
                                            <a class="btn btn-sm btn-success" href="{{ route('subcategorias.edit',$galeria->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('borrar-subcategoria')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
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
            {!! $galerias->links() !!}
        </div>
    </div>
    </div>
    @endsection
    <script>
    function confirmarEliminacion(id) {
        if (confirm("¿Estás seguro de que deseas eliminar este servicio?")) {
            document.getElementById('formulario-eliminar-' + id).submit();
        }
    }
</script>

    