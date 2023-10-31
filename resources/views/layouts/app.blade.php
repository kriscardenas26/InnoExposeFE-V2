@can('ver-usuario')
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 4.1.1 -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    <link href="//fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

@yield('page_css')
<!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/components.css')}}">
    @yield('page_css')


    @yield('css')
</head>
<body>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            @include('layouts.header')

        </nav>
        <div class="main-sidebar main-sidebar-postion">
            @include('layouts.sidebar')
        </div>
        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
        <footer class="main-footer">
            @include('layouts.footer')
        </footer>
    </div>
</div>

@include('profile.change_password')
@include('profile.edit_profile')

</body>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/iziToast.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>

<!-- Template JS File -->
<script src="{{ asset('web/js/stisla.js') }}"></script>
<script src="{{ asset('web/js/scripts.js') }}"></script>
<script src="{{ mix('assets/js/profile.js') }}"></script>
<script src="{{ mix('assets/js/custom/custom.js') }}"></script>
@yield('page_js')
@yield('scripts')
<script>
    let loggedInUser =@json(\Illuminate\Support\Facades\Auth::user());
    let loginUrl = '{{ route('login') }}';
    // Loading button plugin (removed from BS4)
    (function ($) {
        $.fn.button = function (action) {
            if (action === 'loading' && this.data('loading-text')) {
                this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
            }
            if (action === 'reset' && this.data('original-text')) {
                this.html(this.data('original-text')).prop('disabled', false);
            }
        };
    }(jQuery));
</script>
</html>
@endcan

@if(Gate::forUser(Auth::user())->denies('ver-vista'))
<!DOCTYPE html>
<html>
<head>
<title>Asignación de Rol</title>
<style>
  /* Center the div */
  body{
    background: linear-gradient(351deg, rgba(0,57,79,1) 0%, rgba(40,164,167,1) 46%, rgba(0,57,79,1) 100%);
    background-size: cover;
  }
  h1,h2,h3,h4,h5,h6{
    font-family: "Handlee", cursive;
    color: #6c757d;


  }
  p{
    font-family: "Nunito", sans-serif;
  }
  #container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  /* Position the image and text */
 #container img{
  margin-top:2rem; 
 }
  
  #overlay {
    position: relative;
    z-index: 1;
    text-align: center;
    
  }
  /* Style the close button */
  #close-btn {
    padding: 10px;
    font-size: 20px;
    color: white;
    margin-top: 1rem;
    margin-bottom:2rem;
    box-shadow: 0 2px 6px #95effd;
    background-color: #17a2b8;
    border-color: #17a2b8;
  }

  .card {
  width: 40%;
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  border: 1px solid rgba(0, 0, 0, 0.125);

}


</style>
</head>
<body>
  <div id="container">
  
  
        <div class="card ">
          
          <div id="overlay">
            <img  src="../img/Logo Icono.svg" width="90" height="90" alt="" srcset="">
            <h1 >¡Gracias por registrarte en InnoExpose!</h1>
            <p  style="
            color: #6c757d;
            margin:2rem; 
            ">
            
            
            Estamos revisando tu cuenta para garantizar la mejor experiencia posible. Por favor, ten un poco de paciencia mientras nuestros administradores procesan tu solicitud.¡Gracias por tu comprensión!</p>
            <button id="close-btn" onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">Volver al inicio</button>
                
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
              {{ csrf_field() }}
            </form>
        
          </div>  
        </div>
    
  </div>
</body>
</html>
@endif