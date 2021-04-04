<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Historial;
use App\Http\Requests;

class RolPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        return view('roles.indexRolPago');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $empleadosS=DB::table('empleados')
        ->select('*')
        ->get(); 

        $empleados = array();
        foreach($empleadosS as $emple){
            $empleados["$emple->id"] = $emple->apellidos . ' ' . $emple->nombres;
        }

        /*$empleadostemp=array('id','nombres','apellidos');
        
            foreach($empleados as $empleado){
                $empleadotemp->id=$empleados::get('id');
                $empleadotemp->nombres=$empleados::get('nombres');
                $empleadotemp->apellidos=$empleados::get('apellidos');	
            }*/
        //$empleadostemp->save();
        return view('roles.crearRolPago',compact('empleados'));
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
        $historialt=new Historial;
        $historialt->fecha_registro=date('Y-m-d',time());
        $historialt->dias_trabajados=$request->input('dias_trabajados');
        $historialt->dias_ausencia=$request->input('dias_ausencia');
        $historialt->observacion=$request->input('observacion');
        $historialt->save();
        //Historial::insert($historialt);
        return $historialt->all();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
