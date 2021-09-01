<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Persona;
use App\Models\Profesional;
use App\Models\Servicio;
use App\Models\Turno;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cita::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cita = new Cita;
        $cita->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(Cita $cita)
    {
        return $cita;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cita $cita)
    {
        $cita->update($request->all());
        return "Update Succesfull";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cita $cita)
    {
        $cita->delete();
        return "Borrado Exitosamente";
    }

    public function getCitasAgendadasProfesional($idProfesional){
        $profesionalID = Profesional::find($idProfesional);
        $servicios = Servicio::where('profesional_id',$profesionalID['id'])->get();
        $arrayCitas = [];

//        $turnos= [];
//        foreach ($servicios as $servicio){
//            $turnos_servicio = Turno::where('id_servicio',$servicio['id'])->get();
//            foreach ($turnos_servicio as $turno_servicio){
//                array_push($turnos,$turno_servicio);
//            }
//        }
//        $citas= [];
//
//        foreach ($turnos as $turno){
//            $cita = Cita::where('id_turno',$turno['id'])->get()->first();
//            if($cita) array_push($citas,$cita);
//        }
//
//        $arrayCitas = [];
//        foreach ($citas as $cita){
//            $array =[
//                "id"=>$cita["id"]
//            ];
//            array_push($arrayCitas,$array);
//        }
        foreach ($servicios as $servicio){
            $turnos_servicio = Turno::where('id_servicio',$servicio['id'])->get();
            foreach ($turnos_servicio as $turno_servicio){
                $cita = Cita::where('id_turno',$turno_servicio['id'])->get()->first();
                if($cita){
                    $cliente = Cliente::where('id',$cita['id_cliente'])->get()->first();
                    $persona = Persona::where('id',$cliente['persona_id'])->get()->first();
                    $array = [
                        "id"=>$cita["id"],
                        "turno"=>$turno_servicio,
                        "cliente"=>[
                            "nombres"=>$persona['nombres'],
                            "apellidos"=>$persona['apellidos']
                        ],
                        "descripcion"=> $cita["descripcion"],
                        "estado"=> $cita["estado"],
                        "servicio"=>$servicio,
                        "acceso_cliente"=> $cita["acceso_cliente"],
                        "acceso_profesional"=> $cita["acceso_profesional"],
                    ];
                    array_push($arrayCitas,$array);
                }
            }
        }
        return $arrayCitas;
    }
}
