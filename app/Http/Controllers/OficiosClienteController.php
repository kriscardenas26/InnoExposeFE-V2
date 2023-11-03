<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Servicio; // Corrección: Cambiado de "Servico" a "Servicio"
use App\Models\Direccion;
use App\Models\RedSocial;
use App\Models\Imagen;

class OficiosClienteController extends Controller
{
    public function index(Request $request)
{
    // Obtén una lista de subcategorías que pertenecen a la categoría "Oficios"
    $oficiosCategoria = Categoria::where('nombreC', 'Oficios')->first();

    if ($oficiosCategoria) {
        $subcategorias = Subcategoria::where('categoria_id', $oficiosCategoria->id)->get();

        // Inicializa la consulta de servicios
        $query = Servicio::whereIn('subcategoria_id', $subcategorias->pluck('id'));

        // Filtrar por nombre del servicio
        if ($request->has('nombre')) {
            $query->where('nombreS', 'like', '%' . $request->input('nombre') . '%');
        }

        // Filtrar por subcategoría
        if ($request->has('subcategoria_id')) {
            $query->where('subcategoria_id', $request->input('subcategoria_id'));
        }

        // Verifica si se debe restablecer los filtros
        if ($request->has('restablecer') && $request->input('restablecer') === 'true') {
            // No aplicar ningún filtro
            $servicios = Servicio::whereIn('subcategoria_id', $subcategorias->pluck('id'))->get();
        } else {
            // Obtén los servicios que coinciden con los filtros
            $servicios = $query->get();
        }

        // Obtén las direcciones, redes sociales e imágenes para cada servicio
        foreach ($servicios as $servicio) {
            $servicio->direcciones = Direccion::where('servicio_id', $servicio->id)->get();
            $servicio->redesSociales = RedSocial::where('servicio_id', $servicio->id)->get();
            $servicio->imagenes = Imagen::where('servicio_id', $servicio->id)->get();
        }
    } else {
        // La categoría "Oficios" no existe en la base de datos
        $subcategorias = collect(); // O una variable vacía, dependiendo de tus necesidades
        $servicios = collect(); // O una variable vacía, dependiendo de tus necesidades
    }

    return view('oficios', compact('subcategorias', 'servicios'));
}

}
