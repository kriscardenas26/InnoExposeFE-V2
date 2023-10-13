<style> 
    body, html {
      margin: 0;
      padding: 0;
      background: linear-gradient(351deg, rgba(0,57,79,1) 0%, rgba(40,164,167,1) 46%, rgba(0,57,79,1) 100%);
    background-size: cover;

    }
    
    #miDiv {
      position: relative; /* Posición relativa para poder posicionar elementos hijos */
      width: 100vw; /* Ancho del div al 100% del ancho de la ventana */
      height: 100vh; /* Alto del div al 100% del alto de la ventana */
    }
    
    #miDiv img {
      width: 100%; /* Ancho de la imagen al 100% del div */
      height: 100%; /* Alto de la imagen al 100% del div */
      object-fit: cover; /* Ajuste de la imagen para cubrir el div */
    }
    
    img {
      width: 100%; /* Ancho de la imagen al 100% del div */
      height: 100%; /* Alto de la imagen al 100% del div */
      object-fit: cover; /* Ajuste de la imagen para cubrir el div */
    }
    
    #miCuadro {
      position: absolute; /* Posición absoluta para superponer el cuadro sobre la imagen */
      top: 50%; /* Posición vertical en el centro del div padre */
      left: 50%; /* Posición horizontal en el centro del div padre */
      transform: translate(-50%, -50%); /* Centrar el cuadro correctamente en el centro */
      width: 500px; /* Ancho del cuadro */
      height: 400px; /* Alto del cuadro */
      background-color: rgba(240, 240, 240, 0); /* Utiliza un valor de opacidad (0 a 1) en el cuarto valor de rgba para hacer el cuadro transparente */
      /* Puedes agregar otros estilos de diseño para el cuadro aquí */
      
    }
    #miCuadro img {
      display: flex; /* Utilizamos Flexbox para centrar la imagen */
      justify-content: flex-start; /* Centramos horizontalmente la imagen */
      align-items: flex-start; /* Centramos verticalmente la imagen arriba */
      margin-top: -120px; /* Ajustamos el margen superior negativo para mover la imagen hacia arriba */
      margin-left: 180px;
      /* Puedes agregar otros estilos de diseño para el cuadro aquí */
      max-width: 25%; /* Ancho máximo de la imagen al 100% del div */
      max-height: 25%; /* Alto máximo de la imagen al 100% del div */
      object-fit: contain; /* Ajuste de la imagen para mantener su relación de aspecto */
    }
    
    
      /* Media query para dispositivos móviles con un ancho máximo de 768px */
    @media screen and (max-width: 768px) {
      #miCuadro {
        width: 80%; /* Cambia el ancho del cuadro para adaptarse a pantallas más pequeñas */
      }
    }
    @media (max-width: 768px) {
      #miCuadro img {
        position: static; /* Cambiar la posición a estática para que la imagen fluya con el contenido */
        max-width: 25%; /* Ancho máximo del 100% para que la imagen se ajuste al ancho del div */
        max-height: 25%; /* Alto máximo del 100% para que la imagen se ajuste al alto del div */
        margin-top: -120px; /* Eliminar el margen superior */
        margin-left: 120; /* Eliminar el margen izquierdo */
      }
    }
    
      </style>
    
    
    
    

    <div id="miCuadro">
      
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>Recuperar contraseña </title>
    
        <!-- General CSS Files -->
        <link href="{{ asset('../../../img/Logo Icono.svg') }}" rel="icon">
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    
        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('web/css/components.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
        <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    
    @section('title')
        Recuperar contraseña
    @endsection
    
        <div class="card ">
           
    
            <img class="mt-3"  src="{{ asset('../../../img/Logo Icono.svg') }}" alt="" height="80" width="80">
            <div class="card-body">

                <h2 class="card-title text-center mb-3">Recuperar contraseña</h2>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group mt-4">
                        <label for="email">Correo electrónico</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               name="email" tabindex="1" value="{{ old('email') }}" autofocus required>
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-5" tabindex="4">
                        Enviar link
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="mt-5 text-muted text-center">
            Recordó la información de su cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
        </div>
    </div>