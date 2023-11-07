<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Servicio;
use App\Models\Direccion;
use App\Models\RedSocial;
use App\Models\Imagen;

class ArticulosClienteController extends Controller
{
    public function index(Request $request)
{
    // Obtén una lista de subcategorías que pertenecen a la categoría "Artículos"
    $articulosCategoria = Categoria::where('nombreC', 'Artículos')->first();

    if ($articulosCategoria) {
        $subcategorias = Subcategoria::where('categoria_id', $articulosCategoria->id)->get();

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

        if ($request->has('restablecer') && $request->input('restablecer') === 'true') {
            $servicios = $query->paginate(6); // Ajusta el número de elementos por página según tus necesidades
        } else {
            $servicios = $query->paginate(6); // Ajusta el número de elementos por página según tus necesidades
        }

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
