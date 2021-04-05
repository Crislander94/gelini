<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Historial;
use App\Models\RolPago;
use Illuminate\Http\Request;

class RolPagoGenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        
        
    
        
    
    
            //return view('roles.generarRolPago');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $inforEmpleado=DB::table('empleados')
        ->join('historial','empleados.id','=','historial.empleado_id')
        ->join('cargos','empleados.cargo','=','cargos.id')
        ->select('empleados.id','historial.dias_trabajados')
        ->get();

        $rolpago=new RolPago;
        foreach($inforEmpleado as $infor){
            $rolpago->fecha_registro=date('yyyy-mm-dd');
            $rolpago->mes=date('m');
            $rolpago->empleado=$infor->id;
            $rolpago->save();
        }
        return $rolpago->all();
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
