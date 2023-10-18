@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
    <h3 class="page__heading">Usuarios</h3>
  </div>
  <div class="section-body">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            @can('crear-usuario')
            <a class="btn btn-warning" href="{{ route('usuarios.create') }}">Nuevo</a>
            @endcan
            &nbsp;
            <form class="form-inline my-2 my-lg-0 float-right" role="search">
              <input name="buscarpor" class="form-control me-2" type="search" placeholder="Buscar nombre" aria-label="Search">
              &nbsp;
              <button class="btn btn-warning" type="text">Buscar</button>
            </form>

            <table class="table table-striped mt-2">
              <thead style="background-color:#14a3bb">
                <th style="display: none;">ID</th>
                <th style="color:#fff;">Nombre</th>
                <th style="color:#fff;">E-mail</th>
                <th style="color:#fff;">Rol</th>
                <th style="color:#fff;">Acciones</th>
              </thead>
              <tbody>
              @can('borrar-usuario')
                @foreach ($usuarios as $usuario)
                <tr>
                  <td style="display: none;">{{ $usuario->id }}</td>
                  <td>{{ $usuario->name }}</td>
                  <td>{{ $usuario->email }}</td>
                  <td>
                    @if(!empty($usuario->getRoleNames()))
                    @foreach($usuario->getRoleNames() as $rolNombre)
                    <h5><span class="badge badge-dark">{{ $rolNombre }}</span></h5>
                    @endforeach
                    @endif
                  </td>

                  <td>
                  @can('editar-usuario')
                    <a class="btn btn-sm btn-success" href="{{ route('usuarios.edit',$usuario->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                    @endcan

                    @can('borrar-usuario')
                    {!! Form::open(['method' => 'DELETE', 'route' => ['usuarios.destroy', $usuario->id], 'style' => 'display:inline']) !!}
                    {!! Form::button('<i class="fa fa-fw fa-trash"></i> ', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm formulario-eliminar']) !!}
                    {!! Form::close() !!}
                    @endcan
                  </td>
                </tr>
                @endforeach
                @endcan

                @can('ver-contenido')
                @if($esTrabajador)
                @foreach ($us as $uss) 
                <tr>
                  <td style="display: none;">{{ $uss->id }}</td>
                  <td>{{ $uss->name }}</td>
                  <td>{{ $uss->email }}</td>
                  <td>
                    @if(!empty($uss->getRoleNames()))
                    @foreach($uss->getRoleNames() as $rolNombre)
                    <h5><span class="badge badge-dark">{{ $rolNombre }}</span></h5>
                    @endforeach
                    @endif
                  </td>

                  <td>
                  @can('editar-usuario')
                    <a class="btn btn-sm btn-success" href="{{ route('usuarios.edit',$uss->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                    @endcan

                    @can('borrar-usuario')
                    {!! Form::open( ['method' => 'DELETE','route' => ['usuarios.destroy', $uss->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-sm formulario-eliminar' ]) !!}
                    {!! Form::close() !!}
                    @endcan
                  </td>
                </tr>
                @endforeach
                @endif
                @endcan
                
              </tbody>
            </table>
            <!-- Centramos la paginacion a la derecha -->
            <div class="pagination justify-content-end">
              {!! $usuarios->links() !!}
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('eliminar') == 'ok')
<script>
  Swal.fire(
    'Eliminado!',
    'El usuario se elimino correctamente.',
    'success'
  )
</script>
@endif


<script>
  $('.formulario-eliminar').submit(function(e) {
    e.preventDefault();
    Swal.fire({
      title: 'Usted se encuentra a punto de borrar un usuario',
      text: "¿Está seguro de eliminar este usuario?",
      icon: 'warning',
      showCancelButton: true,
      cancelButtonText: 'Cancelar',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    })
  });
</script>
@endsection