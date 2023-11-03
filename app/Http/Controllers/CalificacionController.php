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

        // Redirige a donde desees después de guardar la calificación
        return redirect()->back();
    }

   


    public function calcularPromedioCalificaciones($servicioId)
    {
        // Obtén el servicio por su ID
        $servicio = Servicio::find($servicioId);
    
        if (!$servicio) {
            return response()->json(['promedio' => 0]); // Manejar el caso en el que el servicio no se encuentra
        }
    
        // Calcula el promedio de calificaciones para el servicio
        $promedio = Calificacion::where('servicio_id', $servicioId)->avg('nota');
    
        if ($promedio === null) {
            return response()->json(['promedio' => 0]); // Manejar el caso en el que no hay calificaciones
        }
    
        // Puedes redondear el promedio a un número específico de decimales si lo deseas
        $promedioRedondeado = round($promedio, 2);
    
        return response()->json(['promedio' => $promedioRedondeado]);
    }
    
}

