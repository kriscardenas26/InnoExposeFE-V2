<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KidKinder - Kindergarten Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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
</head>

<body>

    <!-- Navbar Start -->
@include('layouts.NavBarPrincipal')
    <!-- Navbar End -->


   
    <!-- Header Start -->
    <div class="container-fluid mb-5 bg-primary" >
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Guias y Tutoriales</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="Index">Inicio</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">Guías</p>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Detail Start -->
     <div class="container py-5">
        <div class="row pt-5">
            <div class="col-lg-12">
                <div class="d-flex flex-column text-left mb-3">
                    <p class="section-title pr-5"><span class="pr-2">Guías y Tutoriales</span></p>
                    <h1 class="mb-3"> Cómo Sacar el Máximo Provecho de InnoExpose</h1>
                    <div class="d-flex">
                        <p class="mr-3"><i class="fa fa-user text-primary"></i> Admin</p>
                        
                    </div>
                </div>
                <div class="mb-5">
                    <img class="img-fluid rounded w-100 mb-4" src="img/tutorial.png" alt="Image">
                    <p>
                        En nuestra sección de Guías y Tutoriales, te proporcionamos las herramientas esenciales para aprovechar al máximo InnoExpose. Si eres nuevo en nuestra plataforma o simplemente buscas consejos y trucos para utilizarla de manera eficaz, estás en el lugar correcto.
                    </p>
                    <p>
                        Nuestras guías paso a paso te ayudarán a navegar, encontrar servicios y productos, y conectar con los proveedores de manera sencilla. ¡Empieza a utilizar InnoExpose con confianza y descubre todas las oportunidades que tenemos para ofrecerte!
                    </p>
                    <h2 class=" mt-4 mb-4">¿Cómo puedo mostrar mi emprendimiento en InnoExpose?</h2>
                    <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/20p336BJ8M0?si=A3ut6-2fdLgoQNT_" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                     



                    <h3 class="mt-5 mb-4">¿Cómo puedo ver los servicos y productos que se ofrecen en InnoExpose?</h3>

                    <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/rxUF_5FMA04?si=ar3Gn9Hm2ihbLixq&amp;start=2" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="text-center">
            <h2>Preguntas Frecuentes</h2>
        </div>
        <div class="accordion mt-4" id="faqExample">
    
            <!-- Pregunta 1 -->
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                ¿Cómo puedo buscar servicios o productos específicos en InnoExpose?
                        </button>
                        
                    </h5>
                </div>
    
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#faqExample">
                    <div class="card-body">
                        Puedes ingresar a cada interfaz de servicios, y realizar un filtrados según la subcategoría, jajajaj mentira, no sé que poner en esta respuesta 
                    </div>
                </div>
            </div>
    
            <!-- Pregunta 2 -->
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                ¿Cómo puedo contactar a un proveedor de servicios o productos en InnoExpose?
                        </button>
                        
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqExample">
                    <div class="card-body">
                        Una vez que encuentres un proveedor que te interese, haz clic en su card para ver su información de contacto.
                         Puedes encontrar su número de teléfono, dirección y redes sociales para comunicarte con ellos.
                    </div>
                </div>
            </div>
    
            <!-- Pregunta 3 -->
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                ¿Cómo puedo publicar mi servicio o producto en InnoExpose como proveedor?
                        </button>
                        
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqExample">
                    <div class="card-body">
                        Para publicar tu servicio o producto, primero debes crear una cuenta de proveedor en InnoExpose. Una vez que tu cuenta sea aprobada,
                         podrás iniciar sesión y seguir las instrucciones proporcionadas para cargar la información y detalles de tu servicio o producto.
                    </div>
                </div>
            </div>
    
            <!-- Pregunta 4 -->
            <div class="card">
                <div class="card-header" id="headingFour">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                ¿Cómo puedo verificar la autenticidad y la calidad de los proveedores y sus servicios en InnoExpose?
                        </button>
                       
                    </h5>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faqExample">
                    <div class="card-body">
                        En InnoExpose, nos tomamos en serio la autenticidad y la calidad de nuestros proveedores. Antes de que un proveedor sea aprobado,
                        realizamos un proceso exhaustivo de verificación.
                    </div>
                </div>
            </div>
    
        </div>
    </div>



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