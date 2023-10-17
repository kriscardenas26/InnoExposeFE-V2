<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calificacion;
use App\Models\Servicio;

class CalificacionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nota' => 'required|integer|min:1|max:5',
            'servicio_id' => 'required|exists:servicios,id',
        ]);
        $calificacion = new Calificacion([
            'nota' => $request->nota,
            'servicio_id' => $request->servicio_id,
        ]);
        $calificacion->save();
        return redirect()->back();
    }

    public function promedio($servicioId)
    {
        $promedio = Calificacion::where('servicio_id', $servicioId)->avg('nota');
        $servicio = Servicio::find($servicioId);

        return view('servicio.detalle', compact('servicio', 'promedio'));
    }

    public function calificar($servicioId)
    {
        $servicio = Servicio::findOrFail($servicioId);
        return view('calificacion.prueba', compact('servicio'));
    }

}

