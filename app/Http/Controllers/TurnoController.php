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
        return Turno::all();
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
        $turno->create($request->all());
        return "turno creado"; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function show(Turno $turno)
    {
        return $turno;
    }

    public function buscarTurnoProfesional($id_profesional){
        $turnos= Turno::all();
        $turnos1 = [];
        foreach ($turnos as $turno){
            $servicios=Servicio::where('id',$turno['id_servicio'])->get();
            if(count($servicios)>1){
                foreach ($servicios as $servicio){
                    if($servicios['profesional_id']==$id_profesional){
                        array_push($turnos1,$turno);
                    }
                }
            }
            else if(count($servicios)==1){
                
                
                
                if($servicios[0]['profesional_id']==$id_profesional){
                    
                    array_push($turnos1,$turno);
                }
            }
            


        }
        //return $turnos1;
        return $turnos1;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $turno=Turno::find($id);
        $turno->update($request->all());
        return $turno;
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
        return "Borrado Exitosamente"; 
    }
}
