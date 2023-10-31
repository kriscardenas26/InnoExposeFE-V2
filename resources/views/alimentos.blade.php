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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

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

    <!-- Card de la vista inicio del servicio por categoria -->
<div class="container">
    <div class="row">
        @foreach ($servicios as $servicio)
            @if ($servicio->estado)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $servicio->nombreS }}</h5>
                            <p class="card-text">{{ $servicio->descripcionS }}</p>
                            <form action="{{ route('calificaciones.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="servicio_id" value="{{ $servicio->id }}">
                                <div class="rating" data-servicio-id="{{ $servicio->id }}">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="star fas fa-star" data-rating="{{ $i }}"></i>
                                    @endfor
                                </div>
                                <p>
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
                                <h3>Días de Apertura</h3>
                                <p>Día de Apertura: {{ $servicio->diaI }}</p>
                                <p>Día de Cierre: {{ $servicio->diaF }}</p>
                                
                                <h3>Horas de Apertura</h3>
                                <p>Hora de Apertura: {{ $servicio->horaI }}</p>
                                <p>Hora de Cierre: {{ $servicio->horaF }}</p>
                                
                                <h3>Direcciones Asociadas</h3>
                                <ul>
                                    @foreach ($servicio->direcciones as $direccion)
                                        <li>{{ $direccion->nombreD }}</li>
                                        <!-- Otros detalles de la dirección -->
                                    @endforeach
                                </ul>
                                
                                <h3>Redes Sociales Asociadas</h3>
                                <ul>
                                    @foreach ($servicio->redesSociales as $redSocial)
                                        <li>{{ $redSocial->nombreRS }}</li>
                                        <li>{{ $redSocial->link }}</li>
                                        <!-- Otros detalles de la red social -->
                                    @endforeach
                                </ul>
                                
                                <h3>Fotos Asociadas</h3>
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
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
