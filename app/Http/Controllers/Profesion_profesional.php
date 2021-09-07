<?php

namespace App\Http\Controllers;
use App\Models\Profesion_profesional;
use Illuminate\Http\Request;

class Profesion_profesionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Profesion_profesional::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prof_profe = new Profesion_profesional;
        $prof_profe->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesion_profesional  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Profesion_profesional $prof_profe)
    {
        return $prof_profe;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Profesion_profesional  $request
     * @param  \App\Models\Profesion_profesional  $prof_profe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profesion_profesional $prof_profe)
    {
        $prof_profe->update($request->all());
        return "Persona Actualizada";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prof_profe = Profesion_profesional::find($id);
        $prof_profe->delete();
        return "Borrado Exitosamente";
    } //
}
