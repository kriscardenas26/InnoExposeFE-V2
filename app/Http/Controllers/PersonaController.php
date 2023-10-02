<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-persona|crear-persona|editar-persona|borrar-persona')->only('index');
         $this->middleware('permission:crear-persona', ['only' => ['create','store']]);
         $this->middleware('permission:editar-persona', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-persona', ['only' => ['destroy']]);
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
        $personas=Persona::where('nombreP','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);
        
        return view('persona.index', compact('personas','buscarpor'))
        ->with('i', (request()->input('page', 1) - 1) * $personas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $persona = new Persona();
        return view('persona.create', compact('persona'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Persona::$rules);

        $persona = Persona::create($request->all());

        return redirect()->route('personas.index')
            ->with('success', 'Persona creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona = Persona::find($id);

        return view('persona.show', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona = Persona::find($id);

        return view('persona.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        request()->validate(Persona::$rules);
        $persona->update($request->all());
        return redirect()->route('personas.index')
            ->with('success', 'Persona actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Persona::find($id)->delete();

        return redirect()->route('personas.index')
            ->with('success', 'Persona eliminada correctamente');
    }
}
