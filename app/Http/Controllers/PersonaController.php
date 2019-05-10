<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use Datatables;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if( $request->nombre != ''){
            $personas = Persona::where('nombre', 'LIKE', '%'.$request->nombre)->get();
        }else{
            $personas = Persona::all();
        }
        
        if($request->ajax()){
            return Datatables::of($personas)->addColumn('accion', function($row){
                $boton = "<button data-id=".$row->id." class='btn btn-primary editar'>Editar</button>";
                $boton = $boton."<button data-id=".$row->id." class='btn btn-danger eliminar'>Eliminar</button>";
                return $boton;
            })->rawColumns(['accion'])->make(true);
        }

        return view('personas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('personas.edit', compact('persona'));
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
            'nombre'=>'required',
            'apellido'=>'required',
            'edad'=>'required|integer'
        ]);

        $persona = Persona::find($id);
        $persona->nombre = $request->get('nombre');
        $persona->apellido = $request->get('apellido');
        $persona->edad = $request->get('edad');
        $persona->dni = $request->get('dni');
        $persona->save();
        return redirect('/personas')->with('success', 'Persona actualizada correctamente!');
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
        return response()->json(['success' => "Registro eliminado correctamente!"]);
    }
}
