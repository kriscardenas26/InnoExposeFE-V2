@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                          
                                <div class="row">
                                    <div class="col-md-4 col-xl-4">
                                    
                                    <div class="card bg-c-blue order-card">
                                            <div class="card-block">
                                            <h5>Usuarios</h5>                                               
                                                @php
                                                 use App\Models\User;
                                                $cant_usuarios = User::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_usuarios}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/usuarios" class="text-white">Ver más</a></p>
                                            </div>                                            
                                        </div>                                    
                                    </div>
                                    
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-green order-card">
                                            <div class="card-block">
                                            <h5>Roles</h5>                                               
                                                @php
                                                use Spatie\Permission\Models\Role;
                                                 $cant_roles = Role::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-user-lock f-left"></i><span>{{$cant_roles}}</span></h2>
                                                @can('ver-rol')
                                                <p class="m-b-0 text-right"><a href="/roles" class="text-white">Ver más</a></p>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>                                                                
                                    
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5>Categorías</h5>                                               
                                                @php
                                                 use App\Models\Categoria;
                                                $cant_categorias = Categoria::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_categorias}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/categorias" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5>SubCategorías</h5>                                               
                                                @php
                                                 use App\Models\Subcategoria;
                                                $cant_personas = Subcategoria::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_personas}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/subcategorias" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5>Personas</h5>                                               
                                                @php
                                                 use App\Models\Persona;
                                                $cant_personas = Persona::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_personas}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/personas" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5>Servicios</h5>                                               
                                                @php
                                                 use App\Models\Servicio;
                                                $cant_personas = Servicio::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_personas}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/servicios" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5>Direcciones</h5>                                               
                                                @php
                                                 use App\Models\Direccion;
                                                $cant_personas = Direccion::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_personas}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/direccions" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5>Redes Sociales</h5>                                               
                                                @php
                                                 use App\Models\RedSocial;
                                                $cant_personas = RedSocial::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_personas}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/redsocials" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5>Imágenes</h5>                                               
                                                @php
                                                 use App\Models\Imagen;
                                                $cant_personas = Imagen::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_personas}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/imagens" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

