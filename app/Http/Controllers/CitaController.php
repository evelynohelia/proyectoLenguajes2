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
     * @return string
     */
    public function destroy(Cita $cita)
    {
        $cita->delete();
        return "Borrado Exitosamente";
    }

    public function getCitasAgendadasProfesional($idProfesional){
        $profesionalID = Profesional::find($idProfesional);
        $personaProfesional = Persona::where('id',$profesionalID['persona_id'])->get()->first();
        $servicios = Servicio::where('profesional_id',$profesionalID['id'])->get();
        $arrayCitas = [];

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
                        "profesional"=>[
                            "nombres"=>$personaProfesional['nombres'],
                            "apellidos"=>$personaProfesional['apellidos']
                        ],
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

    public function getCitasAgendadasCliente($idCliente){
        $clienteID = Cliente::find($idCliente);
        $citas = Cita::where('id_cliente',$clienteID['id'])->get();
        $arrayCitas = [];
        foreach ($citas as $cita){
            $turno = Turno::where('id',$cita['id_turno'])->get()->first();
            $servicio = Servicio::where('id',$turno['id_servicio'])->get()->first();
            $profesional = Profesional::where('id',$servicio['profesional_id'])->get()->first();
            $persona = Persona::where('id',$profesional['persona_id'])->get()->first();
            $array = [
                "id"=>$cita["id"],
                "turno"=>$turno,
                "profesional"=>[
                    "nombres"=>$persona['nombres'],
                    "apellidos"=>$persona['apellidos']
                ],
                "cliente"=>[
                    "nombres"=>$clienteID['nombres'],
                    "apellidos"=>$clienteID['apellidos']
                ],
                "descripcion"=> $cita["descripcion"],
                "estado"=> $cita["estado"],
                "servicio"=>$servicio,
                "acceso_cliente"=> $cita["acceso_cliente"],
                "acceso_profesional"=> $cita["acceso_profesional"],
            ];
            array_push($arrayCitas,$array);

        }
        return $arrayCitas;
    }

    public function getCitasPendientesProfesional($idProfesional){
        $profesionalID = Profesional::find($idProfesional);
        $personaProfesional = Persona::where('id',$profesionalID['persona_id'])->get()->first();
        $servicios = Servicio::where('profesional_id',$profesionalID['id'])->get();
        $arrayCitas = [];

        foreach ($servicios as $servicio){
            $turnos_servicio = Turno::where('id_servicio',$servicio['id'])->get();
            foreach ($turnos_servicio as $turno_servicio){
                $cita = Cita::where('id_turno',$turno_servicio['id'])->get()->first();
                if($cita && $cita['estado']=="Pendiente"){
                    $cliente = Cliente::where('id',$cita['id_cliente'])->get()->first();
                    $persona = Persona::where('id',$cliente['persona_id'])->get()->first();
                    $array = [
                        "id"=>$cita["id"],
                        "profesional"=>[
                            "nombres"=>$personaProfesional['nombres'],
                            "apellidos"=>$personaProfesional['apellidos']
                        ],
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

    public function deleteCitaCliente($citaID){
        $cita = Cita::find($citaID);
        $cita->update(['acceso_cliente' => "borrador"]);
        return "updated:  $cita";
    }

    public function deleteCitaProfesional($citaID){
        $cita = Cita::find($citaID);
        $cita->update(['acceso_profesional' => "borrador"]);
        return "updated:  $cita";
    }


    public function changeStatus($idCita, Request $request){
        $status = $request['status'];
        $cita = Cita::find($idCita);
        $cita->update(['estado' => $status]);
        return "updated:  $cita";
    }

}
