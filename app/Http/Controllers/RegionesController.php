<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;

class RegionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regiones = Region::get();

        return view('adminRegiones', ['regiones'=>$regiones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formAgregarRegion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regNombre = $request->input('regNombre');
        $region = new Region;
        $region->regNombre = $regNombre;
        $region->save();

        return redirect('adminRegiones')->with('agregarConfirmado', 'La region '.$regNombre.' ha sido agregada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($regID)
    {
        $Region = Region::find($regID);

        return view('formEliminarRegion', ['region'=>$Region]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($regID)
    {
        $Region = Region::find($regID);

        return view('formModificarRegion', ['region'=>$Region]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $regID = $request->input('regID');
        $regNombre = $request->input('regNombre');

        $Region = Region::find($regID);
        $Region->regNombre = $regNombre;
        $Region->save();

        return redirect('adminRegiones')->with('agregarConfirmado', 'La region '.$regNombre.' ha sido modificada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($regID)
    {
        $Region = Region::find($regID);
        $regNombre = $Region->regNombre;
        $Region->delete();

        return redirect('adminRegiones')->with('agregarConfirmado', 'La region '.$regNombre.' ha sido eliminada satisfactoriamente');

    }
}
