<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\Servicio;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Turno::all();//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $turno = new Turno;
        $ser=$request["servicioid"];
        $turno->create($request->all());
            return $ser;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function show(Turno $turno)
    {

        return $turno;//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turno $turno)
    {
        $turno->update($request->all());
        return "Turno Actualizado"; //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turno = Turno::find($id);
        $turno->delete();
        return "Borrado Exitosamente"; //
    }
}
