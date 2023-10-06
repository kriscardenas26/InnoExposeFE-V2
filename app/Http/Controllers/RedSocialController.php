<?php

namespace App\Http\Controllers;

use App\Models\RedSocial;
use App\Models\Servicio;
use Illuminate\Http\Request;

class RedSocialController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-redsocial|crear-redsocial|editar-redsocial|borrar-redsocial')->only('index');
         $this->middleware('permission:crear-redsocial', ['only' => ['create','store']]);
         $this->middleware('permission:editar-redsocial', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-redsocial', ['only' => ['destroy']]);
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
        $galerias=RedSocial::where('nombreRS','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);
        return view('redsocial.index', compact('galerias','buscarpor'))
        ->with('i', (request()->input('page', 1) - 1) * $galerias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galeria = new RedSocial();
        $temas = Servicio::pluck('nombreS','id');
        return view('redsocial.create', compact('galeria', 'temas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(RedSocial::$rules);
        // $jsonData = request()->json()->all();
        $galeria = $request->all();
        RedSocial::create($galeria);
        return redirect()->route('redsocials.index')
            ->with('success', 'Perfil de red social creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $galeria = RedSocial::find($id);
        return view('redsocial.show', compact('galeria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galeria = RedSocial::find($id);
        $temas = Servicio::pluck('nombreS','id');
        return view('redsocial.edit', compact('galeria', 'temas'));
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
        $galeria = RedSocial::findOrFail($id);
        $galeria->nombreRS  = $request->get('nombreRS');
        $galeria->tipoRS  = $request->get('tipoRS');
        $galeria->link  = $request->get('link');
        $galeria->servicio_id  = $request->get('servicio_id');
    $galeria->update(); 
        return redirect()->route('redsocials.index')
            ->with('success', 'Perfil de red social actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeria = RedSocial::FindOrFail($id);
       $galeria->delete();
   
       return redirect()->route('redsocials.index')
           ->with('success', 'Perfil de red social eliminado correctamente');
   }
}
