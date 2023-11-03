<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Servicio; // Corrección: Cambiado de "Servico" a "Servicio"
use App\Models\Direccion;
use App\Models\RedSocial;
use App\Models\Imagen;

class AlimentosClienteController extends Controller
{
    public function index()
{
    // Obtén una lista de subcategorías que pertenecen a la categoría "Alimentos"
    $alimentosCategoria = Categoria::where('nombreC', 'Alimentos')->first();

    if ($alimentosCategoria) {
        $subcategorias = Subcategoria::where('categoria_id', $alimentosCategoria->id)->get();

        // Luego, puedes obtener los servicios que pertenecen a estas subcategorías
        $servicios = Servicio::whereIn('subcategoria_id', $subcategorias->pluck('id'))->get();

        // Obtén las direcciones, redes sociales e imágenes para cada servicio
        foreach ($servicios as $servicio) {
            $servicio->direcciones = Direccion::where('servicio_id', $servicio->id)->get();
            $servicio->redesSociales = RedSocial::where('servicio_id', $servicio->id)->get();
            $servicio->imagenes = Imagen::where('servicio_id', $servicio->id)->get();
        }
    } else {
        // La categoría "Alimentos" no existe en la base de datos
        $servicios = collect(); // O una variable vacía, dependiendo de tus necesidades
    }

    return view('alimentos', compact('subcategorias', 'servicios'));
}

}
