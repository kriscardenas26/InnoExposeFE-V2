<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\ValidacionImagen;
use Illuminate\Support\Facades\DB;
use App\Models\Imagen;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $usuario = auth()->user()->id;
        $consulta = DB::table('roles')->where('name', 'Cliente')->first()->id;
        $esTrabajador = DB::table('model_has_roles')
                    ->where('role_id', $consulta)
                    ->where('user_id', $usuario);
        $buscarpor=$request->get('buscarpor');
        $galerias=Imagen::where('fileName','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);
        $galeriaU = Imagen::where('idUsuario','=', $usuario )->paginate($this::PAGINACION);
        return view('imagen.index', compact('galerias','buscarpor','galeriaU','esTrabajador'))
        ->with('i', (request()->input('page', 1) - 1) * $galerias->perPage());
    }

    public function estado($id)
    {
        $galerias = Imagen::FindOrFail($id);
        if($galerias['estado'] == true){
            $galerias['estado'] = false;
        }else{
            $galerias['estado'] = true;
        }
        $galerias->update(); 
        return redirect()->route('imagens.index')
        ->with('success', 'Estado de la imagen actualizado correctamente');
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
        $request['estado'] = false;
        $request->validate([
            'fileName' => ['required', 'max:30', 'regex:/^[A-Z][a-zA-Z0-9]*$/'],
            'servicio_id' => 'required|exists:servicios,id',
            'urlImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'fileName.required' => 'El campo nombre es obligatorio.',
            'fileName.max' => 'El campo nombre no puede tener más de 30 caracteres.',
            'fileName.regex' => 'El campo nombre debe comenzar con una letra mayúscula y solo puede contener letras y números.',
            'servicio_id.required' => 'Debes seleccionar un servicio asociado.',
            'servicio_id.exists' => 'El servicio seleccionado no es válido.',
            'urlImage.required' => 'Debes subir una imagen.',
            'urlImage.image' => 'El archivo debe ser una imagen válida.',
            'urlImage.mimes' => 'La imagen debe ser de tipo JPEG, PNG, JPG o GIF.',
            'urlImage.max' => 'La imagen no puede superar los 2MB de tamaño.',
        ]);
        
        $galeria = $request->all();
        if($imagen = $request->file('urlImage')) {
            $rutaGuardarImg = 'imagenes/';
            $imagenGaleria = date('YmdHis'). "." .$imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenGaleria);
            $galeria['urlImage'] = "$imagenGaleria";
        }
        $email = "innoexpose@gmail.com";
        $fileName = $request->input('fileName'); // Asumiendo que el nombre del servicio se encuentra en el campo 'nombreS' del formulario
        $messages = "Es necesario hacer una revisión para la validación del estado de la imagen con nombre de $fileName.";
        $url = env('APP_URL');
        $newLink = "http://127.0.0.1:8000/imagens/";
        Mail::to($email)->send(new ValidacionImagen($email, $messages, $newLink, $fileName));
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
        $usuarioss = auth()->user()->id;
        $consulta = DB::table('roles')->where('name', 'Cliente')->first()->id;
        $esTrabajador = DB::table('model_has_roles')
                    ->where('role_id', $consulta)
                    ->where('model_id', $usuarioss);
        $galeria = Imagen::find($id);
        $temas = Servicio::pluck('nombreS','id');
        return view('imagen.edit', compact('galeria', 'temas', 'esTrabajador'));
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
            'fileName' => ['required', 'max:30', 'regex:/^[A-Z][a-zA-Z0-9]*$/'],
            'servicio_id' => 'required|exists:servicios,id',
            'urlImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'fileName.required' => 'El campo nombre es obligatorio.',
            'fileName.max' => 'El campo nombre no puede tener más de 30 caracteres.',
            'fileName.regex' => 'El campo nombre debe comenzar con una letra mayúscula y solo puede contener letras y números.',
            'servicio_id.required' => 'Debes seleccionar un servicio asociado.',
            'servicio_id.exists' => 'El servicio seleccionado no es válido.',
            'urlImage.required' => 'Debes subir una imagen.',
            'urlImage.image' => 'El archivo debe ser una imagen válida.',
            'urlImage.mimes' => 'La imagen debe ser de tipo JPEG, PNG, JPG o GIF.',
            'urlImage.max' => 'La imagen no puede superar los 2MB de tamaño.',
        ]);
        $galeria = Imagen::findOrFail($id);
        $galeria->fileName  = $request->get('fileName');
        $galeria->servicio_id  = $request->get('servicio_id');
        if ($request->hasFile('urlImage')) {
            $file = $request->file('urlImage');
            $rutaGuardarImg = 'imagenes/';
            $imagenGaleria = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($rutaGuardarImg, $imagenGaleria);
            $galeria->urlImage = $imagenGaleria;
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
