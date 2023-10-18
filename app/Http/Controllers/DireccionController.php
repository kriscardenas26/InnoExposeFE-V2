<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Direccion;
use App\Models\Persona;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $usuario = auth()->user()->id;
        $consulta = DB::table('roles')->where('name', 'Cliente')->first()->id;
        $esTrabajador = DB::table('model_has_roles')
                    ->where('role_id', $consulta)
                    ->where('user_id', $usuario);
        $buscarpor=$request->get('buscarpor');
        $galerias=Direccion::where('nombreD','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);
        $galeriaU = Direccion::where('idUsuario','=', $usuario )->paginate($this::PAGINACION);
        return view('direccion.index', compact('galerias','buscarpor','galeriaU','esTrabajador'))
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
        $request->validate([
            'persona_id' => 'required|exists:personas,id',
            'servicio_id' => 'required|exists:servicios,id',
            'nombreD' => 'required|max:100',
        ],[
            'persona_id.required' => 'Debes seleccionar una persona encargada.',
            'persona_id.exists' => 'La persona encargada seleccionada no es válida.',
            'servicio_id.required' => 'Debes seleccionar un servicio.',
            'servicio_id.exists' => 'El servicio seleccionado no es válido.',
            'nombreD.required' => 'El campo dirección es obligatorio.',
            'nombreD.max' => 'La dirección no puede tener más de 100 caracteres.',
        ]);
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
        $usuarioss = auth()->user()->id;
        $consulta = DB::table('roles')->where('name', 'Cliente')->first()->id;
        $esTrabajador = DB::table('model_has_roles')
                    ->where('role_id', $consulta)
                    ->where('model_id', $usuarioss);
        $galeria = Direccion::find($id);
        $temas = Persona::pluck('nombreP','id');
        $temas1 = Servicio::pluck('nombreS','id');
        return view('direccion.edit', compact('galeria', 'temas', 'temas1','esTrabajador'));
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
        $request->validate([
            'persona_id' => 'required|exists:personas,id',
            'servicio_id' => 'required|exists:servicios,id',
            'nombreD' => 'required|max:100',
        ],[
            'persona_id.required' => 'Debes seleccionar una persona encargada.',
            'persona_id.exists' => 'La persona encargada seleccionada no es válida.',
            'servicio_id.required' => 'Debes seleccionar un servicio.',
            'servicio_id.exists' => 'El servicio seleccionado no es válido.',
            'nombreD.required' => 'El campo dirección es obligatorio.',
            'nombreD.max' => 'La dirección no puede tener más de 100 caracteres.',
        ]);
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
