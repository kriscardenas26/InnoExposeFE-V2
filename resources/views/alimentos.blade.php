<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <title>InnoExpose</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/Logo Icono.svg" rel="icon1">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

       <!-- Navbar Start -->
@include('layouts.NavBarPrincipal')
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Alimentos</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="index">Inicio</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">Alimentos</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white w-100 mb-3 wow fadeIn" data-wow-delay="0.1s" src="img/AlimentosVista.jpg" alt="">
                            <img class="img-fluid bg-white w-50 wow fadeIn" data-wow-delay="0.2s" src="img/AlimentosVista3.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white w-50 mb-3 wow fadeIn" data-wow-delay="0.3s" src="img/AlimentosVista5.jpg" alt="">
                            <img class="img-fluid bg-white w-100 wow fadeIn" data-wow-delay="0.4s" src="img/AlimentosVista4.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="section-title">
                        <p class="fs-5 fw-medium fst-italic text-primary">Encuentra aquí tus</p>
                        <h1 class="display-6">Alimentos Favoritos</h1>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-sm-4">
                            <img class="img-fluid bg-white w-100" src="img/FotoIndexMujer.png" alt="">
                        </div>
                        <div class="col-sm-8">
                            <h5>Amplia gama de alimentos</h5>
                            <p class="mb-0">Aquí podrás encontrar muchas opciones sin salir de casa.</p>
                        </div>
                    </div>
                    <div class="border-top mb-4"></div>
                    <div class="row g-3">
                        <div class="col-sm-8">
                            <h5>Alimentos naturales y comerciales</h5>
                            <p class="mb-0">Descubre lo mejor de los alimentos naturales y comerciales en un solo lugar. En nuestra tienda, encontrarás alimentos únicos de alta calidad. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!-- Fila con formularios y botones en la misma línea, centrados horizontalmente y verticalmente -->
<div class="d-flex justify-content-center align-items-center">
    <!-- Formulario de búsqueda por nombre -->
    <form method="GET" action="{{ route('AlimentosCliente') }}" class="form-inline">
        <div class="form-group">
            <input type="text" name="nombre" placeholder="Buscar por nombre" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <!-- Formulario de filtrado por subcategoría con diseño mejorado -->
    <form method="GET" action="{{ route('AlimentosCliente') }}" class="form-inline ml-2">
        <div class="form-group">
            <select name="subcategoria_id" class="form-control">
                <option value="">Filtrar por subcategoría</option>
                @foreach ($subcategorias as $subcategoria)
                    <option value="{{ $subcategoria->id }}">{{ $subcategoria->nombreSC }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Filtrar</button>
    </form>

    <!-- Formulario de restablecer filtros -->
    <form method="GET" action="{{ route('AlimentosCliente') }}" class="form-inline ml-2">
        <input type="hidden" name="restablecer" value="true">
        <button type="submit" class="btn btn-primary">Restablecer</button>
    </form>
</div>
<div class="my-4"></div>

<svg width="214" height="100" xmlns="http://www.w3.org/2000/svg">
  <!-- Rectángulo base -->
  <rect x="0" y="0" width="174" height="100" fill="#e6e6e6" />
  <!-- Hoyo en la parte izquierda con forma de flecha (un poco menos ancho) -->
  <polygon points="0,2 0,98 35,50" fill="#FFFFFF" />
  <!-- Punta de flecha a la derecha -->
  <polygon points="174,0 214,50 174,100" fill="#e6e6e6" />
  <!-- Círculo para el número -->
  <circle cx="50" cy="50" r="10" fill="#1e3064" />
  <!-- Texto en el centro con salto de línea y negrita -->
  <text x="107" y="50" font-family="Arial" font-size="16" font-weight="bold" fill="#1e3064" text-anchor="middle" dominant-baseline="middle">
    <tspan x="107" dy="-8">Ingreso de</tspan>
    <tspan x="107" dy="16">Solicitudes</tspan>
  </text>
  <!-- Número dentro del círculo -->
  <text x="50" y="50" font-family="Arial" font-size="12" font-weight="bold" fill="#e6e6e6" text-anchor="middle" dominant-baseline="middle" alignment-baseline="middle">2</text>
  <!-- Franja delgada en la parte inferior -->
  <line x1="0" y1="100" x2="174" y2="100" stroke="#1e3064" stroke-width="6" />
</svg>


<svg width="214" height="100" xmlns="http://www.w3.org/2000/svg">
  <rect x="0" y="0" width="174" height="100" fill="#e6e6e6" />
  <polygon points="0,2 0,98 35,50" fill="#FFFFFF" />
  <polygon points="174,0 214,50 174,100" fill="#e6e6e6" />
  <circle cx="50" cy="50" r="10" fill="#1e3064" />
    <text x="107" y="50" font-family="Arial" font-size="16" font-weight="bold" fill="#1e3064" text-anchor="middle" alignment-baseline="middle">Pendientes</text>
    <text x="50" y="50" font-family="Arial" font-size="12" font-weight="bold" fill="#e6e6e6" text-anchor="middle" dominant-baseline="middle" alignment-baseline="middle">2</text>
    <line x1="0" y1="100" x2="174" y2="100" stroke="#1e3064" stroke-width="6" />
</svg>

<svg width="214" height="100" xmlns="http://www.w3.org/2000/svg">
  <rect x="0" y="0" width="174" height="100" fill="#e6e6e6" />
  <polygon points="0,2 0,98 35,50" fill="#FFFFFF" />
  <polygon points="174,0 214,50 174,100" fill="#e6e6e6" />
  <circle cx="50" cy="50" r="10" fill="#1e3064" />
    <text x="115" y="50" font-family="Arial" font-size="16" font-weight="bold"fill="#1e3064" text-anchor="middle" alignment-baseline="middle">Dpto. Crédito</text>
    <text x="50" y="50" font-family="Arial" font-size="12" font-weight="bold" fill="#e6e6e6" text-anchor="middle" dominant-baseline="middle" alignment-baseline="middle">2</text>
    <line x1="0" y1="100" x2="174" y2="100" stroke="#1e3064" stroke-width="6" />
</svg>

<svg width="214" height="100" xmlns="http://www.w3.org/2000/svg">
  <rect x="0" y="0" width="174" height="100" fill="#e6e6e6" />
  <polygon points="0,2 0,98 35,50" fill="#FFFFFF" />
  <polygon points="174,0 214,50 174,100" fill="#e6e6e6" />
  <circle cx="50" cy="50" r="10" fill="#1e3064" />
  <text x="107" y="50" font-family="Arial" font-size="16" font-weight="bold"fill="#1e3064" text-anchor="middle" alignment-baseline="middle">Aprobados</text>
  <text x="50" y="50" font-family="Arial" font-size="12" font-weight="bold" fill="#e6e6e6" text-anchor="middle" dominant-baseline="middle" alignment-baseline="middle">2</text>
  <line x1="0" y1="100" x2="174" y2="100" stroke="#1e3064" stroke-width="6" />
</svg>

<svg width="214" height="100" xmlns="http://www.w3.org/2000/svg">
  <rect x="0" y="0" width="174" height="100" fill="#55FF50" />
  <polygon points="0,2 0,98 35,50" fill="#FFFFFF" />
  <polygon points="174,0 214,50 174,100" fill="#55FF50" />
  <circle cx="50" cy="50" r="10" fill="#05A100" />
  <text x="125" y="50" font-family="Arial" font-size="16" font-weight="bold" fill="#FFFFFF" text-anchor="middle" alignment-baseline="middle">Desembolsados</text>
  <text x="50" y="50" font-family="Arial" font-size="12" font-weight="bold" fill="#FFFFFF" text-anchor="middle" dominant-baseline="middle" alignment-baseline="middle">2</text>
  <line x1="0" y1="100" x2="174" y2="100" stroke="#05A100" stroke-width="6" />
</svg>

<svg width="214" height="100" xmlns="http://www.w3.org/2000/svg">
  <rect x="0" y="0" width="174" height="100" fill="#FF5050" />
  <polygon points="0,2 0,98 35,50" fill="#FFFFFF" />
  <polygon points="174,0 214,50 174,100" fill="#FF5050" />
  <circle cx="50" cy="50" r="10" fill="#D40000" />
  <text x="111" y="50" font-family="Arial" font-size="16" font-weight="bold" fill="#FFFFFF" text-anchor="middle" alignment-baseline="middle">Rechazados</text>
  <text x="50" y="50" font-family="Arial" font-size="12" font-weight="bold" fill="#FFFFFF" text-anchor="middle" dominant-baseline="middle" alignment-baseline="middle">2</text>
  <line x1="0" y1="100" x2="174" y2="100" stroke="#D40000" stroke-width="6" />
</svg>


    <!-- Card de la vista inicio del servicio por categoria -->
<div class="container mt-5">
    
    <div class="row d-flex">
        @foreach ($servicios as $servicio)
            @if ($servicio->estado)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        
                            <div class="">
                                <img src="{{ asset('/imagenes/' . $servicio->urlImage) }}" class="d-block w-100" width="100" height="200" alt="">
                            </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $servicio->nombreS }}</h5>
                            <p class="card-text">Subcategoría: {{ $servicio->subcategoria->nombreSC }}</p> 
                            <p class="card-text">{{ $servicio->descripcionS }}</p>
                            <form action="{{ route('calificaciones.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="servicio_id" value="{{ $servicio->id }}">
                                <div class="rating mb-3" data-servicio-id="{{ $servicio->id }}">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="star fas fa-star" data-rating="{{ $i }}"></i>
                                    @endfor
                                </div>
                                <p class="d-flex justify-content-around">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal{{ $servicio->id }}">Ver Más</a>
                                <a href="#"  class="btn btn-primary ver-promedio" data-toggle="modal" data-target="#promedioModal" data-servicio-id="{{ $servicio->id }}" data-promedio-route="{{ route('servicios.promedio', ['servicioId' => $servicio->id]) }}">Promedio de Calificación</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $servicios->links() }}
    </div>
</div>
<!-- Modal del promedio de la calificacion por servicio -->
<div class="modal fade" id="promedioModal" tabindex="-1" role="dialog" aria-labelledby="promedioModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header ">
                <h5 class="modal-title" id="promedioModalLabel">Promedio de Calificación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="promedioServicio"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
           <!-- Modal de la informacion del ver mas del servicio -->
@foreach ($servicios as $servicio)
                <div class="modal fade" id="modal{{ $servicio->id }}" tabindex="-1" role="dialog" aria-labelledby="modal{{ $servicio->id }}Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content text-center">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal{{ $servicio->id }}Label">Información del Servicio</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                                <div class="row d-flex justify-content-around mt-4 ">
                                    
                                    <div class="col-5 d-flex justify-content-end">  
                                        <div class="iconContainer">
                                            <img src="img/calendario.png" alt="">
                                        </div> 

                                    </div>
                                    <div class="col-7 text-left ">
                                        <h5>Días de Apertura</h5>
                                        <p>{{ $servicio->diaI }} a {{ $servicio->diaF }} </p>
                                        

                                    </div>
                                </div>
                                <hr width="50%">

                                <div class="row d-flex justify-content-around mt-4 ">
                                    <div class="col-5 d-flex justify-content-end">   
                                        <div class="iconContainer">
                                            <img src="img/paso-del-tiempo.png" alt="">
                                        </div> 

                                    </div>
                                    <div class="col-7 text-left">
                                        <h5>Horario</h5>
                                <p style="margin: 0;">Hora de Apertura: {{ $servicio->horaI }}</p>
                                <p style="margin: 0;">Hora de Cierre: {{ $servicio->horaF }}</p>

                                    </div>

                                </div>
                                @if ($servicio->direcciones->isNotEmpty())
                                <hr width="50%">
                                
                                <div class="row d-flex justify-content-around mt-4 ">
                                    <div class="col-5 d-flex justify-content-end">

                                        <div class="iconContainer">
                                            <img src="img/mapas-y-banderas.png" alt="">
                                        </div> 

                                    </div>

                                    <div class="col-7 remove-margin">
                                        <div class="text-left">
                                            <h5>Direcciones Asociadas</h5>
                                            <ul style="text-align: left;">
                                                @foreach ($servicio->direcciones as $direccion)
                                                    <li class="list-unstyled">{{ $direccion->nombreD }}</li>
                                                    <!-- Otros detalles de la dirección -->
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    


                                    </div>
                                    @endif
                                </div>
                                                                                     
                                
                                
                                @if ($servicio->redesSociales->where('estado', 1)->count() > 0)
                                    <h5 class="mt-4">Redes Sociales Asociadas</h5>
                                    <ul class="d-flex flex-wrap justify-content-center remove-padding">
                                        @foreach ($servicio->redesSociales as $redSocial)
                                            @if ($redSocial->estado === 1)
                                                <li class="list-unstyled m-2">
                                                    @if ($redSocial->tipoRS === 'Facebook')
                                                        <i class="fab fa-facebook" style="color: #3b5998;"></i>
                                                    @elseif ($redSocial->tipoRS === 'Instagram')
                                                        <i class="fab fa-instagram" style="color: #C13584;"></i>
                                                    @elseif ($redSocial->tipoRS === 'TikTok')
                                                        <i class="fab fa-tiktok" style="color: black;"></i>
                                                    @endif
                                                    <a href="{{ $redSocial->link }}" target="_blank">{{ $redSocial->nombreRS }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                                
                                @if ($servicio->imagenes->where('estado', 1)->count() > 0)
                                <h5 class="mt-4">Fotos Asociadas</h5>
                                <div id="carousel{{ $servicio->id }}" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($servicio->imagenes as $key => $imagen)
                                            <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                                                <img src="{{asset('/imagenes/'.$imagen->urlImage)}}" class="d-block w-100" width="100" height="200" alt="{{$imagen->imagenes}}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel{{ $servicio->id }}" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Anterior</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel{{ $servicio->id }}" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Siguiente</span>
                                    </a>
                                </div>
                                @endif
                            </div>
                            
                        </div>
                    </div>
                </div>
            @endforeach


<!-- Footer Start -->
@include('layouts.footerPrincipal')
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.rating .star').on('mouseenter', function() {
            // Cambiar el color de las estrellas a dorado al pasar el cursor
            $(this).prevAll().andSelf().addClass('fas').removeClass('far');
            $(this).nextAll().addClass('far').removeClass('fas');
        });

        $('.rating .star').on('click', function() {
            const servicioId = $(this).parent().data('servicio-id');
            const calificacion = $(this).data('rating');
            const form = $(this).closest('form');

            // Agregar la calificación como un campo en el formulario antes de enviarlo
            form.append('<input type="hidden" name="nota" value="' + calificacion + '">');

            // Mostrar la alerta antes de enviar el formulario
            Swal.fire({
                title: 'Calificación enviada',
                text: 'El usuario calificó el servicio con ' + calificacion + ' estrellas.',
                icon: 'success',
                timer: 3000, // Pausa de 3 segundos
                timerProgressBar: true,
                showConfirmButton: false,
                willClose: () => {
                    // Enviar el formulario después de la alerta
                    form.submit();
                }
            });
        });

        $('.rating').on('mouseleave', function() {
            // Restablecer el color de las estrellas a gris
            $(this).find('.star').addClass('far').removeClass('fas');
        });
    });
</script>
<style>
    .rating .star:hover {
        color: gold; /* Cambia el color de las estrellas a dorado cuando el cursor está encima */
    }
</style>
<script>
    $(document).ready(function() {
        $('.ver-promedio').on('click', function() {
            const servicioId = $(this).data('servicio-id');
            const promedioRoute = $(this).data('promedio-route');

            // Realiza una solicitud AJAX para obtener el promedio
            $.ajax({
                url: promedioRoute,
                method: 'GET',
                success: function(data) {
                    // Rellena el elemento promedioServicio con el valor del promedio
                    $('#promedioServicio').text('Promedio de Calificación: ' + data.promedio);
                    // Muestra el modal
                    $('#promedioModal').modal('show');
                },
                error: function() {
                    // Maneja errores si es necesario
                }
            });
        });
    });
</script>
 