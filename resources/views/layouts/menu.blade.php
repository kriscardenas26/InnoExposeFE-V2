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
        <i class=" fas fa-book"></i><span>Categorías</span>
    </a>
    @endcan
    @can('ver-subcategoria') 
    <a class="nav-link" href="/subcategorias">
        <i class=" far fa-edit"></i><span>Subcategorias</span>
    </a>
    @endcan
    @can('ver-persona') 
    <a class="nav-link" href="/personas">
        <i class=" fas fa-id-card"></i><span>Personas</span>
    </a>
    @endcan
    @can('ver-servicio') 
    <a class="nav-link" href="/servicios">
        <i class=" fas fa-user-plus"></i><span>Servicios</span>
    </a>
    @endcan
    @can('ver-direccion') 
    <a class="nav-link" href="/direccions">
        <i class=" fas fa-map-marker-alt"></i><span>Direcciones</span>
    </a>
    @endcan
    @can('ver-redsocial') 
    <a class="nav-link" href="/redsocials">
        <i class=" far fa-thumbs-up"></i><span>Redes Sociales</span>
    </a>
    @endcan
    @can('ver-imagen') 
    <a class="nav-link" href="/imagens">
        <i class=" fas fa-images"></i><span>Imágenes</span>
    </a>
    @endcan
    <a class="nav-link" href="/">
        <i class=" "></i><span>Inicio</span>
    </a>
</li>
