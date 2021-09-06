<?php

namespace App\Http\Controllers;

use App\Models\Profesional;
use Illuminate\Http\Request;
use App\Models\Persona;
use Illuminate\Support\Facades\DB;


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
     * @return \Illuminate\Http\Response
     */
    public function show($profesional)
    {
        return Profesional::findOrFail($profesional);
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

    public function get3Personas(){
        $personas = Profesional::with('Persona')->orderBy(DB::raw('RAND()'))->take(3)->get();
        return $personas;
    }

    public function getPersonsaProfesional($id) {
        return Profesional::with('Persona')->where('id', $id)->get();
    }
}
