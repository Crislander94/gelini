<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Historial;
use App\Models\RolPago;
use App\Models\DetalleRolPago;
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
        return view('roles.menuRolPago');
        
        
    
        
    
    
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
        ->select('empleados.id','cargos.descripcion','historial.dias_trabajados','historial.dias_ausencia') //ojo con el sueldo
        ->get();

        $rolpago=new RolPago;
        $detallerolpago=new DetalleRolPago;
        foreach($inforEmpleado as $infor){
            $rolpago->fecha_registro=date('y-m-d');
            $rolpago->mes=date('m');
            $rolpago->estado=date('C');
            $rolpago->empleado=$infor->id;
            $rolpago->save();
            //INICIALIZAR VARIABLES
            $vsueldo=420;
            $vmultasfaltas=0;
            $vcargo='';
            $vprestamos=0;

            $vfaltas=$infor->dias_ausencia;
            $vcargo=strtoupper($infor->descripcion); 
            if($vcargo == "OFICIAL"){
                $vmultasfaltas=$vfaltas*20;
            }elseif($vcargo == "MAESTRO"){
                $vmultasfaltas=$vfaltas*30;
            }
            
            $vsueldo=$vsueldo-$vmultasfaltas;
            $vfondosreserva=$vsueldo*(0.0833);
            $viess=$vsueldo*(0.0945);
            $vingresos=$vsueldo+$vfondosreserva;
            $vegresos=$viess;
            $vplatatotal=$vingresos+$vegresos;

            $detallerolpago->sueldo=420;  //mucho ojito con esto
            $detallerolpago->total_ingresos=$vingresos;
            $detallerolpago->total_egresos=$vegresos;
            $detallerolpago->seguridad_social=$viess;
            $detallerolpago->total_pagar=$vplatatotal;
            $detallerolpago->rolpago_id=$rolpago->id;
            $detallerolpago->save();
        }

        return $detallerolpago->all();
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
        $rolespago=DB::table('rolpago')
        ->join('detalle_rol','rolpago.id','=','detalle_rol.rolpago_id')
        ->join('empleados','rolpago.empleado','=','empleados.id')
        //->join('cargos','empleados.cargo','=','cargos.id')
        ->select('empleado.id','empleado.nombres','empleado.apellidos','empleado.')
        ->get();


        /*$inforEmpleado=DB::table('empleados')
        ->join('historial','empleados.id','=','historial.empleado_id')
        ->join('cargos','empleados.cargo','=','cargos.id')
        ->select('empleados.id','cargos.descripcion','historial.dias_trabajados','historial.dias_ausencia') //ojo con el sueldo
        ->get();*/

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
