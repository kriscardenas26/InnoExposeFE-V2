<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
    @can('ver-usuario') 
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
    @endcan
    @can('ver-rol') 
    <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
    @endcan
    @can('ver-categoria') 
    <a class="nav-link" href="/categorias">
        <i class=" fas fa-blog"></i><span>Categorías</span>
    </a>
    @endcan
    @can('ver-subcategoria') 
    <a class="nav-link" href="/subcategorias">
        <i class=" fas fa-blog"></i><span>Subcategorias</span>
    </a>
    @endcan
    @can('ver-persona') 
    <a class="nav-link" href="/personas">
        <i class=" fas fa-blog"></i><span>Personas</span>
    </a>
    @endcan
    @can('ver-servicio') 
    <a class="nav-link" href="/servicios">
        <i class=" fas fa-blog"></i><span>Servicios</span>
    </a>
    @endcan
    @can('ver-redsocial') 
    <a class="nav-link" href="/redsocials">
        <i class=" fas fa-blog"></i><span>Redes Sociales</span>
    </a>
    @endcan
    @can('ver-imagen') 
    <a class="nav-link" href="/imagens">
        <i class=" fas fa-blog"></i><span>Imágenes</span>
    </a>
    @endcan
    @can('ver-direccion') 
    <a class="nav-link" href="/direccions">
        <i class=" fas fa-blog"></i><span>Direcciones</span>
    </a>
    @endcan
</li>
