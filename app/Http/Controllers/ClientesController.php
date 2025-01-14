<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['cliente']= clientes::paginate(1);
        return view('clientes.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clientes.create');
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
        $campos=[
            'Nombre' => 'required|string|max:100',
            'Apellido' => 'required|string|max:100',
            'Usuario' => 'required|string|max:100',
            'Correo' => 'required|email',
            'Contraseña' => 'required|string|max:25',
            'Direccion' => 'required|string|max:110',
            'Telefono' => 'required|digits:8',
            'FechaNacimiento' => 'required|date'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Contraseña.required'=> 'La contraseña es requerida',
            'Direccion.required'=> 'La direccion es requerida',
            'FechaNacimiento.required'=> 'La fecha de nacimiento es requerida',
            'Telefono.required'=> 'El numero debe contener 8 digitos'
        ];
        $this->validate($request, $campos,$mensaje);

        //$datosClientes = request()->all();
        $datosClientes = request()->except('_token');
        clientes::insert($datosClientes);
        //return response()->json($datosClientes);
        return redirect('clientes')->with('mensaje','clientes agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit(clientes $clientes)
    {
        //
        $clientes=clientes::findOrFail($id);

        return view('clientes.edit', compact('clientes') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, clientes $clientes)
    {
        //
        $campos=[
            'Nombre' => 'required|string|max:100',
            'Apellido' => 'required|string|max:100',
            'Usuario' => 'required|string|max:100',
            'Correo' => 'required|email',
            'Contraseña' => 'required|string|max:25',
            'Direccion' => 'required|string|max:110',
            'Telefono' => 'required|digits:8',
            'FechaNacimiento' => 'required|date'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Contraseña.required'=> 'La contraseña es requerida',
            'Direccion.required'=> 'La direccion es requerida',
            'FechaNacimiento.required'=> 'La fecha de nacimiento es requerida',
            'Telefono.required'=> 'El numero debe contener 8 digitos'
        ];
        $this->validate($request, $campos,$mensaje);

        //
        $datosClientes = request()->except(['_token','_method']);
        clientes::where('id','=',$id)->update($datosClientes);
        
        $clientes=clientes::findOrFail($id);
        //return view('clientes.edit', compact('clientes') );
        return redirect('clientes')->with('mensaje','Cliente Modificado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(clientes $clientes)
    {
        //
        clientes::destroy($id);
        return redirect('clientes')->with('mensaje','Cliente borrado');
    }
}
