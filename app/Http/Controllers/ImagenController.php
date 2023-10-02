<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-imagen|crear-imagen|editar-imagen|borrar-imagen')->only('index');
         $this->middleware('permission:crear-imagen', ['only' => ['create','store']]);
         $this->middleware('permission:editar-imagen', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-imagen', ['only' => ['destroy']]);
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
        $galerias=Imagen::where('fileName','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);
        return view('imagen.index', compact('galerias','buscarpor'))
        ->with('i', (request()->input('page', 1) - 1) * $galerias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galeria = new Imagen();
        $temas = Servicio::pluck('nombreS','id');
        return view('imagen.create', compact('galeria', 'temas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Imagen::$rules);
        $galeria = $request->all();
        if($imagen = $request->file('urlImage')) {
            $rutaGuardarImg = 'imagenes/';
            $imagenGaleria = date('YmdHis'). "." .$imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenGaleria);
            $galeria['urlImage'] = "$imagenGaleria";
        }
        Imagen::create($galeria);
        return redirect()->route('imagens.index')
            ->with('success', 'Imagen creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $galeria = Imagen::find($id);
        return view('imagen.show', compact('galeria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galeria = Imagen::find($id);
        $temas = Servicio::pluck('nombreS','id');
        return view('imagen.edit', compact('galeria', 'temas'));
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
        $galeria = Imagen::findOrFail($id);
        $galeria->fileName  = $request->get('fileName');
        $galeria->servicio_id  = $request->get('servicio_id');
        if($request->hasFile('urlImage')){
            $file = $request->imagen;
            $file->move(public_path(). '/imagenes', $file->getClientOriginalName());
            $galeria->imagen = $file->getClientOriginalName();
        }

    $galeria->update(); 
        return redirect()->route('imagens.index')
            ->with('success', 'Imagen actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
   
        $galeria = Imagen::FindOrFail($id);

       if (file_exists('imagenes/' . $galeria['urlImage']) and !empty($galeria['urlImage'])) {
           unlink('imagenes/' . $galeria['urlImage']);
       }
       $galeria->delete();
       return redirect()->route('imagens.index')
           ->with('success', 'Imagen eliminada correctamente');
   }
}
