<!-- Primera parte copiada -->
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Servicios</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @can('crear-servicio')
                        <a class="btn btn-warning" href="{{ route('servicios.create') }}">Crear nueva</a>
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
                                <th style="color:#fff;">Nombre</th>
                                <th style="color:#fff;">Logo</th>
                                <th style="color:#fff;">Encargado</th>
                                <th style="color:#fff;">Categoría</th>
                                <th style="color:#fff;">Subcategoría</th>
                                @can('habilitar-servicio')
                                <th style="color:#fff;">Estado</th>
                                @endcan
                                <th style="color:#fff;">Acciones</th>

                                <th></th>

                            </thead>
                            <tbody>
                                @can('borrar-usuario')
                                @foreach ($galerias as $galeria)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $galeria->nombreS }}</td>
                                    {{-- <td>{{ $galeria->imagen }}</td> --}}
                                    <td>
                                        <img class="rounded-circle" src="{{asset('/imagenes/'.$galeria->urlImage)}}" alt="{{$galeria->imagenes}}" width="100" height="100">
                                    </td>
                                    <td>{{ $galeria->Persona->nombreP }}</td>
                                    <td>{{ $galeria->Subcategoria->Categoria->nombreC}}</td>
                                    <td>{{ $galeria->Subcategoria->nombreSC}}</td>
                                    @can('habilitar-servicio')
                                    @if ($galeria->estado == false)
                                        <td>
                                            <a class="btn btn-sm btn-danger"
                                                href="{{ route('servicios.estado', $galeria->id) }}">Inactivo</a>
                                        </td>
                                    @endif
                                    @if ($galeria->estado == true)
                                        <td>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('servicios.estado', $galeria->id) }}">Activo</a>

                                        </td>
                                    @endif
                                    @endcan
                                    <td>
                                        <form action="{{ route('servicios.destroy',$galeria->id) }}" class="formulario-eliminar" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('servicios.show',$galeria->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                            @can('editar-servicio')
                                            <a class="btn btn-sm btn-success" href="{{ route('servicios.edit',$galeria->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('borrar-servicio')
                                            <a class="btn btn-sm btn-danger btn-link" href="javascript:void(0)" onclick="confirmarEliminacion({{ $galeria->id }})">
                                                <i class="fa fa-fw fa-trash"></i> 
                                            </a>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endcan
                                @can('ver-contenido')
                                @if($esTrabajador)
                                @foreach ($galeriaU as $galeria)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $galeria->nombreS }}</td>
                                    {{-- <td>{{ $galeria->imagen }}</td> --}}
                                    <td>
                                        <img class="rounded-circle" src="{{asset('/imagenes/'.$galeria->urlImage)}}" alt="{{$galeria->imagenes}}" width="100" height="100">
                                    </td>
                                    <td>{{ $galeria->Persona->nombreP }}</td>
                                    <td>{{ $galeria->Subcategoria->Categoria->nombreC}}</td>
                                    <td>{{ $galeria->Subcategoria->nombreSC}}</td>
                                    @can('habilitar-servicio')
                                    @if ($galeria->estado == 0)
                                        <td>
                                            <a class="btn btn-sm btn-danger"
                                                href="{{ route('servicios.estado', $galeria->id) }}">Inactivo</a>
                                        </td>
                                    @endif
                                    @if ($galeria->estado == 1)
                                        <td>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('servicios.estado', $galeria->id) }}">Activo</a>

                                        </td>
                                    @endif
                                    @endcan
                                    <td>
                                        <form action="{{ route('servicios.destroy',$galeria->id) }}" class="formulario-eliminar" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('servicios.show',$galeria->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                            @can('editar-servicio')
                                            <a class="btn btn-sm btn-success" href="{{ route('servicios.edit',$galeria->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('borrar-servicio')
                                            <a class="btn btn-sm btn-danger btn-link" href="javascript:void(0)" onclick="confirmarEliminacion({{ $galeria->id }})">
                                                <i class="fa fa-fw fa-trash"></i> 
                                            </a>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                                @endcan
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