
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InnoExpose</title>
    
    <!-- Favicon -->
    <link href="img/Logo Icono.svg" rel="icon1.png">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <!-- Bootstrap 5 Stylesheet -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styleLogin.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6">

                <div class="card">
                    <div class="iconoBack d-flex justify-content-start mt-3 ms-2">
                        <button href="index.html" class="btn btn-outline-secondary" type="button">
                          <i class="fa fa-chevron-left" aria-hidden="true" ></i>

                        </button>
                    </div>

                    <div class="logoContainer d-flex justify-content-center">
                        <img src="img/Logo Icono.svg" width="100" alt="" srcset="">
                    </div>
                    <div class="card-body">
                        <h2 class="card-title text-center">Iniciar Sesión</h2>
                        <form id="login-form">
                            <div class="mb-3">
                                <label for="username" class="form-label">Nombre de usuario</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <!-- Botón para alternar la visibilidad de la contraseña -->
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fa fa-eye" id="eyeIcon" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block BotonIngresar">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Agrega los enlaces a los archivos de Bootstrap JS y jQuery (necesarios para Bootstrap) -->
    <script src="ruta-a-bootstrap/js/jquery.min.js"></script>
    <script src="ruta-a-bootstrap/js/bootstrap.min.js"></script>
    <!-- Agrega tu archivo JavaScript personalizado (si es necesario) -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const passwordInput = document.getElementById("password");
            const togglePasswordButton = document.getElementById("togglePassword");
            const eyeIcon = document.getElementById("eyeIcon");

            togglePasswordButton.addEventListener("click", function () {
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    eyeIcon.classList.remove("fa-eye");
                    eyeIcon.classList.add("fa-eye-slash");
                } else {
                    passwordInput.type = "password";
                    eyeIcon.classList.remove("fa-eye-slash");
                    eyeIcon.classList.add("fa-eye");
                }
            });
        });
    </script>
</body>
</html>
