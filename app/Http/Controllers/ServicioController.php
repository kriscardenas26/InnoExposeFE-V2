<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\ValidacionServicio;
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
        $request->validate([
            'nombreS' => ['required', 'regex:/^[A-Z][A-Za-z0-9\s]*$/'],
            'descripcionS' => 'required|max:100',
            'cedulaS' => ['nullable', 'regex:/^[0-9\s]*$/'],
            'horaI' => 'required|date_format:H:i',
            'horaF' => 'required|date_format:H:i|after:horaI',
            'categoria_id' => 'required|exists:categorias,id',
            'persona_id' => 'required|exists:personas,id',
            'diaI' => 'required|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo',
            'diaF' => 'required|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo',
        ], [
            'nombreS.required' => 'El campo nombre es obligatorio.',
            'nombreS.regex' => 'El campo nombre debe comenzar con una letra mayúscula y no puede contener números ni caracteres especiales.',
            'descripcionS.required' => 'El campo descripción es obligatorio.',
            'descripcionS.max' => 'La descripción no puede tener más de 100 caracteres.',
            'cedulaS.regex' => 'El campo cédula solo puede contener números.',
            'horaI.required' => 'El campo hora de apertura es obligatorio.',
            'horaI.date_format' => 'El campo hora de apertura debe tener un formato válido (HH:MM).',
            'horaF.required' => 'El campo hora de cierre es obligatorio.',
            'horaF.date_format' => 'El campo hora de cierre debe tener un formato válido (HH:MM).',
            'horaF.after' => 'La hora de cierre debe ser posterior a la hora de apertura.',
            'categoria_id.required' => 'Debes seleccionar una categoría.',
            'categoria_id.exists' => 'La categoría seleccionada no es válida.',
            'persona_id.required' => 'Debes seleccionar una persona encargada.',
            'persona_id.exists' => 'La persona encargada seleccionada no es válida.',
            'diaI.required' => 'El día de apertura es obligatorio.',
            'diaI.in' => 'El día de apertura debe ser Lunes, Martes, Miércoles, Jueves, Viernes, Sábado o Domingo.',
            'diaF.required' => 'El día de cierre es obligatorio.',
            'diaF.in' => 'El día de cierre debe ser Lunes, Martes, Miércoles, Jueves, Viernes, Sábado o Domingo.',
        ]);
        
        $galeria = $request->all();
        $email = "innoexpose@gmail.com";
        $nombreServicio = $request->input('nombreS'); // Asumiendo que el nombre del servicio se encuentra en el campo 'nombreS' del formulario
        $messages = "Es necesario hacer una revisión para la validación del estado del servicio $nombreServicio";
        $url = env('APP_URL');
        $newLink = "http://127.0.0.1:8000/servicios/";
        Mail::to($email)->send(new ValidacionServicio($email, $messages, $newLink, $nombreServicio));
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
        $request->validate([
            'nombreS' => ['required', 'regex:/^[A-Z][A-Za-z0-9\s]*$/'],
            'descripcionS' => 'required|max:100',
            'cedulaS' => ['nullable', 'regex:/^[0-9\s]*$/'],
            'horaI' => 'required|date_format:H:i',
            'horaF' => 'required|date_format:H:i|after:horaI',
            'categoria_id' => 'required|exists:categorias,id',
            'persona_id' => 'required|exists:personas,id',
            'diaI' => 'required|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo',
            'diaF' => 'required|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo',
        ], [
            'nombreS.required' => 'El campo nombre es obligatorio.',
            'nombreS.regex' => 'El campo nombre debe comenzar con una letra mayúscula y no puede contener números ni caracteres especiales.',
            'descripcionS.required' => 'El campo descripción es obligatorio.',
            'descripcionS.max' => 'La descripción no puede tener más de 100 caracteres.',
            'cedulaS.regex' => 'El campo cédula solo puede contener números.',
            'horaI.required' => 'El campo hora de apertura es obligatorio.',
            'horaI.date_format' => 'El campo hora de apertura debe tener un formato válido (HH:MM).',
            'horaF.required' => 'El campo hora de cierre es obligatorio.',
            'horaF.date_format' => 'El campo hora de cierre debe tener un formato válido (HH:MM).',
            'horaF.after' => 'La hora de cierre debe ser posterior a la hora de apertura.',
            'categoria_id.required' => 'Debes seleccionar una categoría.',
            'categoria_id.exists' => 'La categoría seleccionada no es válida.',
            'persona_id.required' => 'Debes seleccionar una persona encargada.',
            'persona_id.exists' => 'La persona encargada seleccionada no es válida.',
            'diaI.required' => 'El día de apertura es obligatorio.',
            'diaI.in' => 'El día de apertura debe ser Lunes, Martes, Miércoles, Jueves, Viernes, Sábado o Domingo.',
            'diaF.required' => 'El día de cierre es obligatorio.',
            'diaF.in' => 'El día de cierre debe ser Lunes, Martes, Miércoles, Jueves, Viernes, Sábado o Domingo.',
        ]);
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