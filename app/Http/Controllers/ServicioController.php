<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Servicio;
use App\Models\Subcategoria;
use App\Models\Categoria;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        $usuario = auth()->user()->id;
        $consulta = DB::table('roles')->where('name', 'Cliente')->first()->id;
        $esTrabajador = DB::table('model_has_roles')
                    ->where('role_id', $consulta)
                    ->where('user_id', $usuario);
        $buscarpor=$request->get('buscarpor');
        $galerias=Servicio::where('nombreS','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);
        $galeriaU = Servicio::where('idUsuario','=', $usuario )->paginate($this::PAGINACION);
        return view('servicio.index', compact('galerias','buscarpor','galeriaU','esTrabajador'))
        ->with('i', (request()->input('page', 1) - 1) * $galerias->perPage());
    }
    public function estado($id)
    {
        $galerias = Servicio::FindOrFail($id);
        if($galerias['estado'] == true){
            $galerias['estado'] = false;
        }else{
            $galerias['estado'] = true;
        }
        $galerias->update(); 
        return redirect()->route('servicios.index')
        ->with('success', 'Estado del servicio actualizado correctamente');
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
        $categorias  = Categoria::pluck('nombreC','id');
        $subcategorias = Subcategoria::all(); // Obtén una colección de modelos Subcategoria

        return view('servicio.create', compact('galeria', 'temas', 'categorias', 'subcategorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['estado'] = false;
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
        $usuarioss = auth()->user()->id;
        $consulta = DB::table('roles')->where('name', 'Cliente')->first()->id;
        $esTrabajador = DB::table('model_has_roles')
                    ->where('role_id', $consulta)
                    ->where('model_id', $usuarioss);
        $galeria = Servicio::find($id);
        $temas = Persona::pluck('nombreP','id');
        $categorias = Categoria::pluck('nombreC','id');
        $subcategorias = Subcategoria::all();
        return view('servicio.edit', compact('galeria', 'temas', 'categorias', 'subcategorias', 'esTrabajador'));
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
        return redirect()->route('servicios.index')
            ->with('success', 'Servicio eliminado correctamente');
    }
}