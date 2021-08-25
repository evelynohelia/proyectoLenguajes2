<?php

namespace App\Http\Controllers;

use App\Models\Profesional;
use Illuminate\Http\Request;

class ProfesionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Profesional::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profesional = new Profesional;
        $profesional->create($request->all());
        return "Profesional Creado";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesional  $profesional
     * @return \Illuminate\Http\Response
     */
    public function show(Profesional $profesional)
    {
        return $profesional;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profesional  $profesional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profesional $profesional)
    {
        $profesional->update($request->all());
        return "Profesional Actualizado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $profesional
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profesional = Profesional::find($id);
        $profesional->delete();
        return "Borrado Exitosamente";
    }
}
