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
    public function index(Request $request)
    {
        //
        /*SELECT e.id, e.nombres, e.apellidos, h.dias_trabajados,dr.sueldo,dr.total_ingresos,
        dr.seguridad_social,dr.total_egresos,dr.total_pagar
        FROM empleados e
        INNER JOIN historial h ON h.empleado_id=e.id
        INNER JOIN rolpago r ON r.empleado=e.id
        INNER JOIN detalle_rol dr ON dr.rolpago_id=r.id
        WHERE month(r.fecha_registro)='4'*/

        $buscar= $request->get('buscar');
        $rolespago=DB::table('empleados as e')
        ->join('historial as h','h.empleado_id','=','e.id')
        ->join('rolpago as r','r.empleado','=','e.id')
        ->join('detalle_rol as dr','dr.rolpago_id','=','r.id')
        ->select('e.id','e.cedula','e.nombres','e.apellidos','h.dias_trabajados','dr.sueldo','dr.fondo_reserva','dr.total_ingresos','dr.seguridad_social','dr.total_egresos','dr.total_pagar')
        ->where('e.cedula','like','%'.$buscar.'%')
        ->orwhere('e.nombres','like','%'.$buscar.'%')
        ->orwhere('e.apellidos','like','%'.$buscar.'%')
        ->get();


        //return $rolespago->all();
        return view('roles_pago.indexRolPago',compact('rolespago','buscar'));
        //return "roles/create para creae roles de pago o roles/show para ver los generados";
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
            $vplatatotal=$vingresos-$vegresos;

            $detallerolpago->sueldo=420;  //mucho ojito con esto
            $detallerolpago->fondo_reserva=$vfondosreserva;
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
        //->join('historial','rolpago.','=','')
        //->join('cargos','empleados.cargo','=','cargos.id')
        ->select('empleados.id','empleados.nombres','empleados.apellidos','rolpago.fecha_registro',/*'historial.dias_trabajados',*/'detalle_rol.sueldo','detalle_rol.total_ingresos','detalle_rol.seguridad_social','detalle_rol.total_egresos','detalle_rol.total_pagar')
        ->get();
        return $rolespago->all();


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
    public function destroy(Request $request)
    {
        //$request->
    }
}
