<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Correo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body.custom-background {
            background: linear-gradient(351deg, rgba(0, 57, 79, 1) 0%, rgba(40, 164, 167, 1) 46%, rgba(0, 57, 79, 1) 100%);
        }

        .card {
            background-color: rgba(255, 255, 255, 0.9);
            width: 100%;
            margin: 0 auto;
            padding: 96px;
        }

        .logoContainer img {
            margin-top: 1rem;
        }

        .BotonReenviar {
            margin-top: 2rem;
        }

        .BotonVolver {
            margin-top: 2rem;
        }

        .card-body form {
            margin-top: 3rem;
        }

        h1, h2, h3, h4, h5, h6 {
    font-weight: 700;
    font-family: "Handlee", cursive;
}

 .card-title .text-center{
    font-weight: 700;
    font-family: "Handlee", cursive;
 }
    .p .text-center{
        font-weight: 700;
    font-family: "nudito", sans;

    }
    .BotonReenviar {
        margin-top: 2rem;
        box-shadow: 0 2px 6px #95effd;
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .BotonReenviar:hover {
        background-color: #127a8d; /* Cambio de color al pasar el mouse por encima */
    }

    .BotonReenviar {
            margin-top: 2rem;
            box-shadow: 0 2px 6px #95effd;
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .BotonReenviar:hover {
            background-color: #127a8d;
        }

        .mensaje {
            margin-top: 1rem;
            display: none;
        }

        .card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(255, 255, 255, 0);
    width: 100%;
    margin: 0 auto;
    border-bottom: 0px solid rgb(255 255 255 / 13%)
}


    </style>

<script>
        function mostrarMensaje() {
            var mensaje = document.getElementById("mensaje");
            var botonReenviar = document.getElementById("botonReenviar");
            mensaje.style.display = "block";
            botonReenviar.style.display = "none"; 
        }
    </script>

</head>
<body class="custom-background">
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-7">
            <div class="card">
            <div class="card-header">
                <a href="{{ route('index') }}" class="btn btn-outline-info btn-sm float-left">
                    <i class="fas fa-chevron-left"></i> Atrás
                </a>
            </div>
                <div class="logoContainer d-flex justify-content-center mt-3">
                    <img src="/img/Logo1.png" width="100" alt="Logo" srcset="">
                </div>

                <div class="card-body">
                    <h2 class="card-title text-center">Verificar Correo Electrónico</h2>
                    <p class="text-center">Por favor, verifica tu dirección de correo electrónico.</p>
                    <p class="text-center">Si no has recibido el correo de verificación, puedes reenviarlo.</p>
                    <form id="verification-form" action="{{ route('verification.resend') }}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-center">
                        <button id="botonReenviar" type="submit" class="btn btn-primary BotonReenviar m-2" onclick="mostrarMensaje()">
                                Reenviar Verificación
                            </button>
                            <div id="mensaje" class="mensaje alert alert-success text-center">
                                Se ha enviado el correo de nuevo exitosamente
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
