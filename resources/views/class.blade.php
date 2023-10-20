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
    <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px;">
                <img src="img/Logo Icono.svg" width="80" height="" alt="">
                <span class="text-primary" style="color:#00394f ;">InnoExpose</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="index" class="nav-item nav-link active">Home</a>
                    <a href="about" class="nav-item nav-link">About</a>
                    <a href="class" class="nav-item nav-link">Classes</a>
                    <a href="team" class="nav-item nav-link">Teachers</a>
                    <a href="gallery" class="nav-item nav-link">Gallery</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="blog" class="dropdown-item">Blog Grid</a>
                            <a href="single" class="dropdown-item">Blog Detail</a>
                        </div>
                    </div>
                    <a href="contact" class="nav-item nav-link">Contact</a>
                </div>
                @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


   
    <!-- Header Start -->
    <div class="container-fluid mb-5 bg-primary" >
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Guias y Tutoriales</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
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
    
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqExample">
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
    <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0" style="font-size: 40px; line-height: 40px;">
                    <i class="flaticon-043-teddy-bear"></i>
                    <span class="text-white">KidKinder</span>
                </a>
                <p>Labore dolor amet ipsum ea, erat sit ipsum duo eos. Volup amet ea dolor et magna dolor, elitr rebum duo est sed diam elitr. Stet elitr stet diam duo eos rebum ipsum diam ipsum elitr.</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h3 class="text-primary mb-4">Get In Touch</h3>
                <div class="d-flex">
                    <h4 class="fa fa-map-marker-alt text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Address</h5>
                        <p>123 Street, New York, USA</p>
                    </div>
                </div>
                <div class="d-flex">
                    <h4 class="fa fa-envelope text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Email</h5>
                        <p>info@example.com</p>
                    </div>
                </div>
                <div class="d-flex">
                    <h4 class="fa fa-phone-alt text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Phone</h5>
                        <p>+012 345 67890</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h3 class="text-primary mb-4">Quick Links</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Classes</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Teachers</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Blog</a>
                    <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h3 class="text-primary mb-4">Newsletter</h3>
                <form action="">
                    <div class="form-group">
                        <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                            required="required" />
                    </div>
                    <div>
                        <button class="btn btn-primary btn-block border-0 py-3" type="submit">Submit Now</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container-fluid pt-5" style="border-top: 1px solid rgba(23, 162, 184, .2);;">
            <p class="m-0 text-center text-white">
                &copy; <a class="text-primary font-weight-bold" href="#">Your Site Name</a>. All Rights Reserved. Designed
                by
                <a class="text-primary font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
            </p>
        </div>
    </div>
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