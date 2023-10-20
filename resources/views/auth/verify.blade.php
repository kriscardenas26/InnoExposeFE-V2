<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Correo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="ruta/a/bootstrap.min.css">
    <script src="ruta/a/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <div class="text-center mb-4"> <!-- Espacio para el logo -->
                    <img src="/img/Logo1.png" width="80" alt="Logo">
                    <h4 class="mt-3">InnoExpose</h4>
                    </div>
                    <h3 class="card-title">Verificar tu dirección de correo electrónico</h3>
                </div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Un nuevo enlace de verificación ha sido enviado a tu dirección de correo electrónico.
                        </div>
                    @endif
                    <p>Antes de continuar, por favor verifica tu dirección de correo electrónico. Si no has recibido el correo electrónico,</p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Reenviar la verificación</button>
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
