<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Servicio; // Corrección: Cambiado de "Servico" a "Servicio"
use App\Models\Direccion;
use App\Models\RedSocial;
use App\Models\Imagen;


class ArticulosClienteController extends Controller
{
    public function index()
{
    // Obtén una lista de subcategorías que pertenecen a la categoría "Artículos"
    $articulosCategoria = Categoria::where('nombreC', 'Artículos')->first();

    if ($articulosCategoria) {
        $subcategorias = Subcategoria::where('categoria_id', $articulosCategoria->id)->get();

        // Luego, puedes obtener los servicios que pertenecen a estas subcategorías
        $servicios = Servicio::whereIn('subcategoria_id', $subcategorias->pluck('id'))->get();

        // Obtén las direcciones, redes sociales e imágenes para cada servicio
        foreach ($servicios as $servicio) {
            $servicio->direcciones = Direccion::where('servicio_id', $servicio->id)->get();
            $servicio->redesSociales = RedSocial::where('servicio_id', $servicio->id)->get();
            $servicio->imagenes = Imagen::where('servicio_id', $servicio->id)->get();
        }
    } else {
        // La categoría "Artículos" no existe en la base de datos
        $subcategorias = collect(); // Puedes definir una colección vacía
        $servicios = collect(); // También puedes definir una colección vacía
    }

    return view('articulos', compact('subcategorias', 'servicios'));
}

}