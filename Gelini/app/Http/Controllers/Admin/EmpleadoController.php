<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/*si no es empleado es Empleado*/
use Illuminate\Support\Facades\DB;
use App\Models\empleado;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
      
      $buscar= $request->get('buscar');
      
      $empleados = DB::table('empleados as e')
            ->join('contrato as c', 'e.contrato', '=', 'c.id')
            ->join('departamentos as d', 'e.departamento', '=', 'd.id')
            ->join('cargos as ca', 'e.cargo', '=', 'ca.id')
            ->join('obras as obr', 'e.obra', '=', 'obr.id') 
            ->select('e.*','d.descripcion as departamentos','c.descripcion as contrato','ca.descripcion as cargo',
            'obr.Nombre as obra')
            ->where('cedula','like','%'.$buscar.'%')
            ->orwhere('nombres','like','%'.$buscar.'%')
            ->orwhere('apellidos','like','%'.$buscar.'%')
            ->orwhere('genero','like','%'.$buscar.'%')
            ->orderby('e.id','desc')
            ->paginate(7);
           /* ->get();
            */
            
        /* carpeta admin/ capeta empleados / archivo .php index*/
     /*   return view('admin.empleados.index', array('empleados' => $empleados));*/
     return view('admin.empleados.index',compact('empleados','buscar'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $seleccargos=DB::table('cargos')->select('*')->get(); 
        $cargos = array();
        foreach($seleccargos as $carg){
            $cargos["$carg->id"] = $carg->descripcion;
        }

        $selectbanco=DB::table('bancos')->select('*')->get(); 
        $bancos = array();
        foreach($selectbanco as $banc){
            $bancos["$banc->id"] = $banc->nombre_banco;
        }
         
        $genero =[
            'H'=>'Hombre',
            'M' =>'Mujer'
            
        ];

        $estado_servicio=[
            'A'=>'Activo: tiene contrato vigente',
            'P' =>'Pasivo: no tiene contrato vigente por ahora'
        ];

        $carga =[
            '0'=>'NO tiene',
            '1' =>'1 Hijo',
            '2' =>'2 Hijos',
            '3' =>'3 Hijos',
            '4' =>'4 Hijos',
            '5' =>'5 Hijos'
            
        ];

        $estados=[
            'A'=>'Acumulación Anual',
            'M' =>'Mensualizado',
        ];

        $selectobra =DB::table('obras')->select('*')->get(); 
        $obra = array();
        foreach($selectobra as $ob){
            $obra["$ob->id"] = $ob->Nombre;
        }

        $selectdepar =DB::table('departamentos')->select('*')->get(); 
        $departamento = array();
        foreach($selectdepar as $depar){
            $departamento["$depar->id"] = $depar->descripcion;
        }

        $selectcontrato=DB::table('contrato')->select('*')->get(); 
        $contrato = array();
        foreach($selectcontrato as $contra){
            $contrato["$contra->id"] = $contra->descripcion;
        }

       
        return view('admin.empleados.create',compact('bancos','cargos','estado_servicio','genero','carga','estados','obra','departamento','contrato'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cedula' =>'numeric|unique:empleados|required|digits_between:10,10',
            'nombres' =>'required | regex:/^[\pL\s\-]+$/u',
            'apellidos' =>'required | regex:/^[\pL\s\-]+$/u',
            'fechanacimiento' =>'required',
            'email' =>'required|unique:empleados',
            'telefono' =>'numeric|unique:empleados|required|digits_between:10,10',
            'genero' =>'required',
            'cargas' =>'required',
            'fingreso' =>'required',
            'fsalida' =>'required',
            /*foraneas*/
            'cargo' =>'required',
            'obra' =>'required',
            'banco' =>'required',
            'departamento' =>'required',
            'contrato' =>'required',
            'decimo3_estado' =>'required',
            'decimo4_estado' =>'required',
            'fondoreserva_estado' =>'required',
    ]);
        $empleado = empleado::create($request->all());

        return redirect()->route('admin.empleados.index',$empleado);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show( empleado $empleado)
    {

        $empleados = DB::table('empleados as e')
        ->join('contrato as c', 'e.contrato', '=', 'c.id')
        ->join('departamentos as d', 'e.departamento', '=', 'd.id')
        ->join('cargos as ca', 'e.cargo', '=', 'ca.id')
        ->join('obras as obr', 'e.obra', '=', 'obr.id')  


        ->select('e.*','d.descripcion as departamentos','c.descripcion as contrato','ca.descripcion as cargo',
        'obr.Nombre as obra')

            ->get();
      
        
        return view('admin.empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(empleado $empleado)
    {

        $genero =[
            'H'=>'Hombre',
            'M' =>'Mujer'            
        ]; 

        $carga =[
            '0'=>'NO tiene',
            '1' =>'1 Hijo',
            '2' =>'2 Hijos',
            '3' =>'3 Hijos',
            '4' =>'4 Hijos',
            '5' =>'5 Hijos'
            
        ];

        $estado_servicio=[
            'A'=>'Activo: tiene contrato vigente',
            'P' =>'Pasivo: no tiene contrato vigente por ahora'
        ];

        $estados=[
            'A'=>'Acumulación Anual',
            'M' =>'Mensualizado',
        ];
        
        $seleccargos=DB::table('cargos')->select('*')->get(); 
        $cargos = array();
        foreach($seleccargos as $carg){
            $cargos["$carg->id"] = $carg->descripcion;
        }


        $selectobra =DB::table('obras')->select('*')->get(); 
        $obra = array();
        foreach($selectobra as $ob){
            $obra["$ob->id"] = $ob->Nombre;
        }

        $selectdepar =DB::table('departamentos')->select('*')->get(); 
        $departamento = array();
        foreach($selectdepar as $depar){
            $departamento["$depar->id"] = $depar->descripcion;
        }

        $selectcontrato=DB::table('contrato')->select('*')->get(); 
        $contrato = array();
        foreach($selectcontrato as $contra){
            $contrato["$contra->id"] = $contra->descripcion;
        }

        $selectbanco=DB::table('bancos')->select('*')->get(); 
        $bancos = array();
        foreach($selectbanco as $banc){
            $bancos["$banc->id"] = $banc->nombre_banco;
        }

        return view('admin.empleados.edit',compact('empleado','bancos','cargos','estado_servicio','genero','estados','carga','obra','departamento','contrato'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, empleado $empleado)
    {
        $request->validate([
            'cedula' =>"numeric|unique:empleados,cedula,$empleado->id|required|digits_between:10,10",
            'nombres' =>'required | regex:/^[\pL\s\-]+$/u',
            'apellidos' =>'required | regex:/^[\pL\s\-]+$/u',
            'fechanacimiento' =>'required',
            'email' =>"required|unique:empleados,email,$empleado->id",
            'telefono' =>"numeric|unique:empleados,telefono,$empleado->id|required|digits_between:10,10",
            'genero' =>'required',
            'cargas' =>'required',
            'fingreso' =>'required',
            'fsalida' =>'required',
            'cargo' =>'required',
            'obra' =>'required',
            'banco' =>'required',
            'departamento' =>'required',
            'contrato' =>'required'
    ]);
            $empleado->update($request->all());

            return redirect()->route('admin.empleados.index',$empleado)->with('informacion','EMPLEADO ACTUALIZADO CON EXITO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('admin.empleados.index')->with('informacion','EMPLEADO ELIMINADO CON EXITO');
    }
}
