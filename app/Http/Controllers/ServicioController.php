<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Subcategoria;
use App\Models\Categoria;
use App\Models\Persona;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-servicio|crear-servicio|editar-servicio|borrar-servicio')->only('index');
         $this->middleware('permission:crear-servicio', ['only' => ['create','store']]);
         $this->middleware('permission:editar-servicio', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-servicio', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const PAGINACION=10;
    public function index(Request $request)
    {
        $buscarpor=$request->get('buscarpor');
        $galerias=Servicio::where('nombreS','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);
        return view('servicio.index', compact('galerias','buscarpor'))
        ->with('i', (request()->input('page', 1) - 1) * $galerias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galeria = new Servicio();
        $temas = Persona::pluck('nombreP','id');
        $temas1 = Categoria::pluck('nombreC','id');
        $temas2 = Subcategoria::pluck('nombreSC','id');
        return view('servicio.create', compact('galeria', 'temas', 'temas1', 'temas2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Servicio::$rules);
        $galeria = $request->all();
        Servicio::create($galeria);
        return redirect()->route('servicios.index')
            ->with('success', 'Servicio creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $galeria = Servicio::find($id);
        return view('servicio.show', compact('galeria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galeria = Servicio::find($id);
        $temas = Persona::pluck('nombreP','id');
        $temas1 = Categoria::pluck('nombreC','id');
        $temas2 = Subcategoria::pluck('nombreSC','id');
        return view('servicio.edit', compact('galeria', 'temas', 'temas1', 'temas2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $galeria = Servicio::findOrFail($id);
        $galeria->nombreS  = $request->get('nombreS');
        $galeria->cedulaS  = $request->get('cedulaS');
        $galeria->descripcionS  = $request->get('descripcionS');
        $galeria->diaI  = $request->get('diaI');
        $galeria->diaF  = $request->get('diaF');
        $galeria->horaI  = $request->get('horaI');
        $galeria->horaF  = $request->get('horaF');
        $galeria->persona_id  = $request->get('persona_id');
        $galeria->subcategoria_id  = $request->get('subcategoria_id');
        $galeria->categoria_id  = $request->get('categoria_id');
        $galeria->update(); 
        return redirect()->route('servicios.index')
            ->with('success', 'Servicio actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeria = Servicio::FindOrFail($id);
        $galeria->delete();
        return redirect()->route('galerias.index')
            ->with('success', 'Servicio eliminado correctamente');
    }
}
