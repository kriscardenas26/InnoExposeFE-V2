<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\ValidacionRedSocial;
use Illuminate\Support\Facades\DB;
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
        $usuario = auth()->user()->id;
        $consulta = DB::table('roles')->where('name', 'Cliente')->first()->id;
        $esTrabajador = DB::table('model_has_roles')
                    ->where('role_id', $consulta)
                    ->where('user_id', $usuario);
        $buscarpor=$request->get('buscarpor');
        $galerias=RedSocial::where('nombreRS','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);
        $galeriaU = RedSocial::where('idUsuario','=', $usuario )->paginate($this::PAGINACION);
        return view('redsocial.index', compact('galerias','buscarpor','galeriaU','esTrabajador'))
        ->with('i', (request()->input('page', 1) - 1) * $galerias->perPage());
    }

    public function estado($id)
    {
        $galerias = RedSocial::FindOrFail($id);
        if($galerias['estado'] == true){
            $galerias['estado'] = false;
        }else{
            $galerias['estado'] = true;
        }
        $galerias->update(); 
        return redirect()->route('redsocials.index')
        ->with('success', 'Estado de la red social actualizado correctamente');
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
        $request['estado'] = false;
        $request->validate([
            'nombreRS' => ['required', 'regex:/^[A-Z0-9][A-Za-z0-9\s]*$/'],
            'link' => 'required|url',
            'tipoRS' => 'required|in:Facebook,Instagram,TikTok',
            'servicio_id' => 'required|exists:servicios,id',
        ], [
            'nombreRS.required' => 'El campo nombre es obligatorio.',
            'nombreRS.regex' => 'El campo nombre debe comenzar con una letra mayúscula o número y no puede contener caracteres especiales.',
            'link.required' => 'El campo enlace es obligatorio.',
            'link.url' => 'El enlace debe ser una URL válida (por ejemplo, "http://ejemplo.com").',
            'tipoRS.required' => 'El campo tipo de red social es obligatorio.',
            'tipoRS.in' => 'El tipo de red social seleccionado no es válido.',
            'servicio_id.required' => 'Debes seleccionar un servicio asociado.',
            'servicio_id.exists' => 'El servicio seleccionado no es válido.',
        ]);
        // $jsonData = request()->json()->all();
        $galeria = $request->all();
        $email = "innoexpose@gmail.com";
        $nombreRS = $request->input('nombreRS'); // Asumiendo que el nombre del servicio se encuentra en el campo 'nombreS' del formulario
        $messages = "Es necesario hacer una revisión para la validación del estado del perfil $nombreRS.";
        $url = env('APP_URL');
        $newLink = "http://127.0.0.1:8000/redsocials/";
        Mail::to($email)->send(new ValidacionRedSocial($email, $messages, $newLink, $nombreRS));
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
        $usuarioss = auth()->user()->id;
        $consulta = DB::table('roles')->where('name', 'Cliente')->first()->id;
        $esTrabajador = DB::table('model_has_roles')
                    ->where('role_id', $consulta)
                    ->where('model_id', $usuarioss);
        $galeria = RedSocial::find($id);
        $temas = Servicio::pluck('nombreS','id');
        return view('redsocial.edit', compact('galeria', 'temas', 'esTrabajador'));
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
            'nombreRS' => ['required', 'regex:/^[A-Z0-9][A-Za-z0-9\s]*$/'],
            'link' => 'required|url',
            'tipoRS' => 'required|in:Facebook,Instagram,TikTok',
            'servicio_id' => 'required|exists:servicios,id',
        ], [
            'nombreRS.required' => 'El campo nombre es obligatorio.',
            'nombreRS.regex' => 'El campo nombre debe comenzar con una letra mayúscula o número y no puede contener caracteres especiales.',
            'link.required' => 'El campo enlace es obligatorio.',
            'link.url' => 'El enlace debe ser una URL válida (por ejemplo, "http://ejemplo.com").',
            'tipoRS.required' => 'El campo tipo de red social es obligatorio.',
            'tipoRS.in' => 'El tipo de red social seleccionado no es válido.',
            'servicio_id.required' => 'Debes seleccionar un servicio asociado.',
            'servicio_id.exists' => 'El servicio seleccionado no es válido.',
        ]);
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
