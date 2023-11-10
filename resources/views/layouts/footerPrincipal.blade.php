    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-6 col-md-6 mb-5">
                <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0" style="font-size: 40px; line-height: 40px;">
                    <span class="text-white">InnoExpose</span>
                </a>
                <p>InnoExpose es el trampolín que necesitas para destacarte y prosperar en este nuevo paradigma empresarial. 
                    ¡Es tu momento de brillar y alcanzar el éxito! 
                    Únete a nosotros y descubre una forma más directa, rápida y segura de promocionarte. 
                    El futuro de los emprendedores comienza aquí."</p>
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
                <h3 class="text-primaryF mb-4">Encuéntranos</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2"><i class="fa fa-street-view mr-2"></i>Dirección</a>
                    <p>Nicoya, Guanacaste, CR</p>
                    <a class="text-white mb-2"><i class="fa fa-envelope mr-2"></i>Correo Electrónico</a>
                    <p>InnoExpose@gmail.com</p>
                    <a class="text-white mb-2"><i class="fa fa-phone mr-2"></i>Teléfono</a>
                    <p>+506 8800 8800</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-5">
                <h3 class="text-primaryF mb-4">Accesos rápidos</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2" href="about"><i class="fa fa-angle-right mr-2"></i>Sobre Nosotros</a>
                    <a class="text-white mb-2" href="class"><i class="fa fa-angle-right mr-2"></i>Tutoriales</a>
                    <a class="text-white mb-2" href="class"><i class="fa fa-angle-right mr-2"></i>Artículos</a>
                    <a class="text-white mb-2" href="class"><i class="fa fa-angle-right mr-2"></i>Oficios</a>
                    <a class="text-white mb-2" href="class"><i class="fa fa-angle-right mr-2"></i>Alimentos</a>
                    @if(Gate::forUser(Auth::user())->denies('ver-vista'))
                    <a class="text-white mb-2" href="{{ route('login') }}"><i class="fa fa-angle-right mr-2"></i>Iniciar Sesión</a>
                    <a class="text-white mb-2" href="{{ route('register') }}"><i class="fa fa-angle-right mr-2"></i>Registrarse</a>
                    @endif

                    @can('ver-vista') 
                    <a class="text-white mb-2" href="{{ route('home') }}"><i class="fa fa-angle-right mr-2"></i>Admin</a>
                    <a class="text-white mb-2" href="{{ url('logout') }}" onclick="event.preventDefault(); localStorage.clear(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt mr-2"></i>Logout
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                        {{ csrf_field() }}
                    </form>
                    @endcan
                </div>
            </div>
        </div>
        <div class="container-fluid pt-5" style="border-top: 1px solid rgba(23, 162, 184, .2);;">
            <p class="m-0 text-center text-white">
                &copy; <a class="text-primaryF font-weight-bold" href="#">InnoExpose</a>Todos los derechos reservados
            </p>
        </div>
    </div>

    
    <!-- Footer End -->