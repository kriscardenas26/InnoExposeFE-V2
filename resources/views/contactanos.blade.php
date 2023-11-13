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
    <div class="container-fluid mb-5 bg-primary">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Contáctanos</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="index">Inicio</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">Contáctanos</p>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <div class="container py-5">
        <div class="row pt-5">
            <div class="col-lg-12">
                <div class="d-flex flex-column text-left mb-3">
                    <p class="section-title pr-5"><span class="pr-2">Contáctanos</span></p>
                    <h1 class="mb-3">Nuestra sección de contactos para ti</h1>
                </div>
                <div class="textogeneral">
                    <p>
                        ¿Tienes preguntas, sugerencias o necesitas asistencia? Estamos aquí para ayudarte. En nuestra sección de Contacto, ponemos a tu disposición diversas formas de comunicarte con nosotros.
                        Tu opinión es importante para nosotros, y queremos asegurarnos de que tengas una experiencia óptima en InnoExpose.
                    <p>
                        Puedes utilizar el formulario de contacto para enviarnos un mensaje directo, y nuestro equipo de soporte te responderá en breve. 
                        <a style="font-weight: bold; color: #17a2b8;">Solo recuerda que necesitas estar registrado en nuestro sistema y verificar tu correo electrónico para poder usar el formulario de contacto.</a> </p>
                    <p>También puedes encontrar información de contacto detallada para comunicarte con nosotros por teléfono o correo electrónico si lo prefieres.</p>
                    <p>
                        En InnoExpose, valoramos tu retroalimentación y estamos comprometidos a brindarte el mejor servicio posible. No dudes en ponerte en contacto con nosotros en cualquier momento. ¡Esperamos escucharte pronto y poder ayudarte en lo que necesites!
                    </p>
                </div>
                <div class="mb-5">
                    <div class="row">
                        <div class="col-lg-6">
                            <img class="img-fluid rounded mb-4" src="img/Contacto.jpg" alt="Image">
                        </div>
                        <div class="col-lg-6">
                            <div class="card p-4 shadow">
                                <div class="card-header2">
                                    <h5 class="card-title">Formulario de Contacto</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('contact.store') }}" method="POST" id="contact-form">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <label for="name">Nombre</label>
                                                    <input type="text" class="form-control bg-light border-0" name="name" placeholder="Escriba su nombre" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <label for="email">Correo Electrónico</label>
                                                    <input type="email" class="form-control bg-light border-0" name="email" placeholder="Tu correo electrónico" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <label for="subject">Asunto</label>
                                                    <input type="text" class="form-control bg-light border-0" name="subject" placeholder="Asunto" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <label for="message">Mensaje</label>
                                                    <textarea class="form-control bg-light border-0" placeholder="Deja tu mensaje aquí" name="message" style="height: 100px" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                            @if(!auth()->check())
                                                <div class="alert alert-warning mt-2 col-12">
                                                    Debes estar registrado con una cuenta para usar este formulario de contacto.
                                                 </div>
                                            @endif
                                                @if (auth()->check() && !auth()->user()->hasVerifiedEmail())
                                                <div class="alert alert-warning mt-2 col-12">
                                                    Debes verificar tu correo electrónico antes de ponerte en contacto.
                                                </div>
                                                <div class="mt-2 col-12">
                                                    <a href="{{ route('verification.notice') }}" class="btn btn-primary w-100 py-3">
                                                        Verificar correo electrónico
                                                    </a>
                                                </div>
                                                @endif
                                                <div class="mt-2 col-12" {{ (auth()->check() && auth()->user()->hasVerifiedEmail()) ? '' : ' style=display:none;' }}>
                                                    <button class="btn btn-primary w-100 py-3" id="Enviar" type="submit">
                                                        Enviar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tarjetas de contacto -->
                <div class="contact-section">
                    <div class="contact-item">
                        <i class="fa fa-phone"></i>
                        <p>Número de teléfono</p>
                        <p>+506 8800 8800</p>
                    </div>
                    <div class="contact-item">
                        <i class="fa fa-street-view"></i>
                        <p>Ubicación</p>
                        <p>Nicoya, Guanacaste, CR</p>
                    </div>
                    <div class="contact-item">
                        <i class="fa fa-envelope"></i>
                        <p>Correo electrónico</p>
                        <p>innoexpose@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('#contact-form').addEventListener('submit', function (e) {
            e.preventDefault(); // Evitar que el formulario se envíe normalmente

            // Mostrar una Sweet Alert de confirmación
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¿Deseas enviar este formulario?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sí, enviar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, enviar el formulario

                    // Obtener los datos del formulario
                    var formData = new FormData(this);

                    // Enviar el formulario usando AJAX
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('contact.store') }}',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            // Mostrar una Sweet Alert de éxito
                            Swal.fire({
                                title: '¡Formulario enviado!',
                                text: 'Tu formulario ha sido enviado correctamente.',
                                icon: 'success',
                            }).then(function () {
                                // Recargar la página una vez que el usuario haga clic en "OK"
                                location.reload();
                            });
                        },
                        error: function (error) {
                            // Manejar el error si hay algún problema al enviar el formulario
                            console.error('Error al enviar el formulario:', error);
                            Swal.fire({
                                title: 'Error',
                                text: 'Hubo un problema al enviar el formulario. Por favor, inténtalo de nuevo más tarde.',
                                icon: 'error',
                            });
                        }
                    });
                }
            });
        });
 });
</script>






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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


</body>

</html>