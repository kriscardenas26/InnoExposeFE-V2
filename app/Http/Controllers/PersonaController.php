<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $usuario = auth()->user()->id;
        $consulta = DB::table('roles')->where('name', 'Cliente')->first()->id;
        $esTrabajador = DB::table('model_has_roles')
                    ->where('role_id', $consulta)
                    ->where('user_id', $usuario);
        $buscarpor=$request->get('buscarpor');
        $personas=Persona::where('nombreP','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);
        $personaU = Persona::where('idUsuario','=', $usuario )->paginate($this::PAGINACION);
        return view('persona.index', compact('personas','buscarpor','personaU','esTrabajador'))
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
        $request->validate([
            'nombreP' => ['required', 'regex:/^[A-ZÁÉÍÓÚÜ][a-zA-ZÁÉÍÓÚÜáéíóúü\s]*$/'],
            'apellido1' => ['required', 'regex:/^[A-ZÁÉÍÓÚÜ][a-zA-ZÁÉÍÓÚÜáéíóúü\s]*$/'],
            'apellido2' => ['required', 'regex:/^[A-ZÁÉÍÓÚÜ][a-zA-ZÁÉÍÓÚÜáéíóúü\s]*$/'],
            'tipoIdentificacion' => 'required|in:Nacional,Pasaporte,Nacionalizado',
            'cedulaP' => 'required|numeric',
        ], [
            'nombreP.required' => 'El campo nombre es obligatorio.',
            'nombreP.regex' => 'El campo nombre debe comenzar con una letra mayúscula y no puede contener números ni caracteres especiales.',
            'apellido1.required' => 'El primer apellido es obligatorio.',
            'apellido1.regex' => 'El primer apellido debe comenzar con una letra mayúscula y no puede contener números ni caracteres especiales.',
            'apellido2.required' => 'El segundo apellido es obligatorio.',
            'apellido2.regex' => 'El segundo apellido debe comenzar con una letra mayúscula y no puede contener números ni caracteres especiales.',
            'tipoIdentificacion.required' => 'El campo tipo de identificación es obligatorio.',
            'tipoIdentificacion.in' => 'El tipo de identificación seleccionado no es válido.',
            'cedulaP.required' => 'El campo cédula es obligatorio.',
            'cedulaP.numeric' => 'La cédula debe ser un número.',
        ]);
        

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
        $usuarioss = auth()->user()->id;
        $consulta = DB::table('roles')->where('name', 'Cliente')->first()->id;
        $esTrabajador = DB::table('model_has_roles')
                    ->where('role_id', $consulta)
                    ->where('model_id', $usuarioss);
        $persona = Persona::find($id);

        return view('persona.edit', compact('persona', 'esTrabajador'));
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
        $request->validate([
            'nombreP' => ['required', 'regex:/^[A-ZÁÉÍÓÚÜ][a-zA-ZÁÉÍÓÚÜáéíóúü\s]*$/'],
            'apellido1' => ['required', 'regex:/^[A-ZÁÉÍÓÚÜ][a-zA-ZÁÉÍÓÚÜáéíóúü\s]*$/'],
            'apellido2' => ['required', 'regex:/^[A-ZÁÉÍÓÚÜ][a-zA-ZÁÉÍÓÚÜáéíóúü\s]*$/'],
            'tipoIdentificacion' => 'required|in:Nacional,Pasaporte,Nacionalizado',
            'cedulaP' => 'required|numeric',
        ], [
            'nombreP.required' => 'El campo nombre es obligatorio.',
            'nombreP.regex' => 'El campo nombre debe comenzar con una letra mayúscula y no puede contener números ni caracteres especiales.',
            'apellido1.required' => 'El primer apellido es obligatorio.',
            'apellido1.regex' => 'El primer apellido debe comenzar con una letra mayúscula y no puede contener números ni caracteres especiales.',
            'apellido2.required' => 'El segundo apellido es obligatorio.',
            'apellido2.regex' => 'El segundo apellido debe comenzar con una letra mayúscula y no puede contener números ni caracteres especiales.',
            'tipoIdentificacion.required' => 'El campo tipo de identificación es obligatorio.',
            'tipoIdentificacion.in' => 'El tipo de identificación seleccionado no es válido.',
            'cedulaP.required' => 'El campo cédula es obligatorio.',
            'cedulaP.numeric' => 'La cédula debe ser un número.',
        ]);
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
