<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class SubCategoriaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-subcategoria|crear-subcategoria|editar-subcategoria|borrar-subcategoria')->only('index');
         $this->middleware('permission:crear-subcategoria', ['only' => ['create','store']]);
         $this->middleware('permission:editar-subcategoria', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-subcategoria', ['only' => ['destroy']]);
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
        $galerias=Subcategoria::where('nombreSC','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);
        return view('subcategoria.index', compact('galerias','buscarpor'))
        ->with('i', (request()->input('page', 1) - 1) * $galerias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galeria = new Subcategoria();
        $temas = Categoria::pluck('nombreC','id');
        return view('subcategoria.create', compact('galeria', 'temas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(SubCategoria::$rules);
        $galeria = $request->all();
        SubCategoria::create($galeria);
        return redirect()->route('subcategorias.index')
            ->with('success', 'SubCategoria creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $galeria = SubCategoria::find($id);

        return view('subcategoria.show', compact('galeria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galeria = SubCategoria::find($id);
        $temas = Categoria::pluck('nombreC','id');
        return view('subcategoria.edit', compact('galeria', 'temas'));
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
        $galeria = SubCategoria::findOrFail($id);
        $galeria->nombreSC  = $request->get('nombreSC');
        $galeria->categoria_id  = $request->get('categoria_id');

    $galeria->update(); 
        return redirect()->route('subcategorias.index')
            ->with('success', 'SubCategoria actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeria = SubCategoria::FindOrFail($id);
       $galeria->delete();
       return redirect()->route('subcategorias.index')
           ->with('success', 'SubCategoria eliminada correctamente');
   }
}
