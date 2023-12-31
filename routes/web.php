<?php

use Illuminate\Support\Facades\Route;
//agregamos los siguientes controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CalificacionController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\RedSocialController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\SubCategoriaController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\ArticulosClienteController;
use App\Http\Controllers\AlimentosClienteController;
use App\Http\Controllers\OficiosClienteController;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ContactController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('sobrenosotros', function () {
    return view('sobrenosotros');
})->name('sobrenosotros');


Route::get('/articulos',[ArticulosClienteController::class, 'index'])->name('ArticulosCliente');
Route::post('/calificaciones', [CalificacionController::class, 'store'])->name('calificaciones.store');
Route::get('/calificaciones', 'CalificacionController@index')->name('calificaciones');
Route::get('/servicios/{servicioId}/promedio', [CalificacionController::class, 'calcularPromedioCalificaciones'])->name('servicios.promedio');

Route::get('/alimentos',[AlimentosClienteController::class, 'index'])->name('AlimentosCliente');
Route::get('/oficios',[OficiosClienteController::class, 'index'])->name('OficiosCliente');

Route::post('/contactos', [ContactController::class, 'store'])
        ->middleware(['auth', 'verified'])
        ->name('contact.store');


Route::get('contactanos', function () {
    return view('contactanos');
})->name('contactanos');

Route::get('blog', function () {
    return view('blog');
})->name('blog');

Route::get('guiasytutoriales', function () {
    return view('guiasytutoriales');
})->name('guiasytutoriales');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::get('gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('index', function () {
    return view('index');
})->name('index');

Route::get('login', function () {
    return view('login');
})->name('login');

Route::get('single', function () {
    return view('single');
})->name('single');

Route::get('team', function () {
    return view('team');
})->name('team');


Route::get('/', function () {
    return view('index');
});
Route::get('nuevo', function () {
    return view('auth/redireccionamiento');
});


Auth::routes(['verify' => true]);
//y creamos un grupo de rutas protegidas para los controladores con la verificacion 
Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('categorias', App\Http\Controllers\CategoriaController::class);
    Route::resource('personas', App\Http\Controllers\PersonaController::class);
    Route::resource('subcategorias', App\Http\Controllers\SubCategoriaController::class);
    Route::resource('servicios', App\Http\Controllers\ServicioController::class);
    Route::resource('redsocials', App\Http\Controllers\RedSocialController::class);
    Route::resource('imagens', App\Http\Controllers\ImagenController::class);
    Route::resource('direccions', App\Http\Controllers\DireccionController::class);
    // Route::get('/servicios/{servicioId}/calificar', [CalificacionController::class, 'calificar'])->name('servicios.prueba');

    // Route::post('/calificaciones', [CalificacionController::class, 'store'])->name('calificaciones.store');

    // Route::get('/servicios/{servicioId}/promedio', [App\Http\Controllers\CalificacionController::class, 'promedio'])->name('servicios.promedio');
    Route::get('servicios/estado/{id}', [App\Http\Controllers\ServicioController::class, 'estado'])->name('servicios.estado');
    Route::get('imagens/estado/{id}', [App\Http\Controllers\ImagenController::class, 'estado'])->name('imagens.estado');
    Route::get('redsocials/estado/{id}', [App\Http\Controllers\RedSocialController::class, 'estado'])->name('redsocials.estado');
});