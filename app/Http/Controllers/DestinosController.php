<?php

namespace App\Http\Controllers;

use App\Destino;
use Illuminate\Http\Request;
use App\Region;

class DestinosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinos = Destino::with('relRegion')
                    ->get();
        return view('adminDestinos', ['destinos'=>$destinos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regiones = Region::get(); 

        return view('formAgregarDestino', ['regiones'=>$regiones]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $destNombre = $request->input('destNombre');
        $regID = $request->input('regID');
        $destPrecio = $request->input('destPrecio');
        $destAsientos = $request->input('destAsientos');
        $destDisponibles = $request->input('destDisponibles');
        $destActivo = $request->input('destActivo');

        $Destino = new Destino;
        $Destino->destNombre = $destNombre;
        $Destino->regID = $regID;
        $Destino->destPrecio = $destPrecio;
        $Destino->destAsientos = $destAsientos;
        $Destino->destDisponibles = $destDisponibles;
        $Destino->destActivo = $destActivo;
        $Destino->save();

        return redirect('adminDestinos')->with('agregarConfirmado', 'El destino '.$destNombre.' ha sido agregado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Destino  $destino
     * @return \Illuminate\Http\Response
     */
    public function show($destID)
    {
        $Destino = Destino::find($destID);
        $regiones = Region::get();

        return view('formEliminarDestino', ['destino'=>$Destino]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Destino  $destino
     * @return \Illuminate\Http\Response
     */
    public function edit($destID)
    {
        $Destino = Destino::find($destID);
        $regiones = Region::get();

        return view('formModificarDestino', ['destino'=>$Destino, 'regiones'=>$regiones]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Destino  $destino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $destNombre = $request->input('destNombre');
        $regID = $request->input('regID');
        $destPrecio = $request->input('destPrecio');
        $destAsientos = $request->input('destAsientos');
        $destDisponibles = $request->input('destDisponibles');
        $destActivo = $request->input('destActivo');
        $destID = $request->input('destID');

        $Destino = Destino::find($destID);
        $Destino->destNombre = $destNombre;
        $Destino->regID = $regID;
        $Destino->destPrecio = $destPrecio;
        $Destino->destAsientos = $destAsientos;
        $Destino->destDisponibles = $destDisponibles;
        $Destino->destActivo = $destActivo;
        $Destino->save();

        return redirect('adminDestinos')->with('agregarConfirmado', 'El destino '.$destNombre.' ha sido modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Destino  $destino
     * @return \Illuminate\Http\Response
     */
    public function destroy($destID)
    {
        $Destino = Destino::find($destID);
        $destNombre = $Destino->destNombre;
        $Destino->delete();

        return redirect('adminDestinos')->with('agregarConfirmado', 'El destino '.$destNombre.' ha sido eliminado satisfactoriamente');    }
}
