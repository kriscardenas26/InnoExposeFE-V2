<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use App\Models\Persona;
use App\Models\Servicio;
use Illuminate\Http\Request;

class DireccionController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-direccion|crear-direccion|editar-direccion|borrar-direccion')->only('index');
         $this->middleware('permission:crear-direccion', ['only' => ['create','store']]);
         $this->middleware('permission:editar-direccion', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-direccion', ['only' => ['destroy']]);
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
        $galerias=Direccion::where('nombreD','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);
        return view('direccion.index', compact('galerias','buscarpor'))
        ->with('i', (request()->input('page', 1) - 1) * $galerias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galeria = new Direccion();
        $temas = Persona::pluck('nombreP','id');
        $temas1 = Servicio::pluck('nombreS','id');
        return view('direccion.create', compact('galeria', 'temas', 'temas1'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Direccion::$rules);
        $galeria = $request->all();
        Direccion::create($galeria);
        return redirect()->route('direccions.index')
            ->with('success', 'Dirección creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $galeria = Direccion::find($id);
        return view('direccion.show', compact('galeria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galeria = Direccion::find($id);
        $temas = Persona::pluck('nombreP','id');
        $temas1 = Servicio::pluck('nombreS','id');
        return view('direccion.edit', compact('galeria', 'temas', 'temas1'));
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
        $galeria = Direccion::findOrFail($id);
        $galeria->nombreD  = $request->get('nombreD');
        $galeria->persona_id  = $request->get('persona_id');
        $galeria->servicio_id  = $request->get('servicio_id');
        $galeria->update(); 
        return redirect()->route('direccions.index')
            ->with('success', 'Dirección actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeria = Direccion::FindOrFail($id);
        $galeria->delete();
        return redirect()->route('direccions.index')
            ->with('success', 'Dirección eliminada correctamente');
    }

}
