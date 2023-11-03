<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Servicio;
use App\Models\Direccion;
use App\Models\RedSocial;
use App\Models\Imagen;

class AlimentosClienteController extends Controller
{
    public function index(Request $request)
{
    // Obtén una lista de subcategorías que pertenecen a la categoría "Alimentos"
    $alimentosCategoria = Categoria::where('nombreC', 'Alimentos')->first();

    if ($alimentosCategoria) {
        $subcategorias = Subcategoria::where('categoria_id', $alimentosCategoria->id)->get();

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
            $servicios = Servicio::with('direcciones', 'redesSociales', 'imagenes')->whereIn('subcategoria_id', $subcategorias->pluck('id'))->get();
        } else {
            // Obtén los servicios que coinciden con los filtros
            $servicios = $query->get();
        }
    } else {
        // La categoría "Alimentos" no existe en la base de datos
        $subcategorias = collect(); // Puedes definir una colección vacía
        $servicios = collect(); // También puedes definir una colección vacía
    }

    return view('alimentos', compact('subcategorias', 'servicios'));
}
}
