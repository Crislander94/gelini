<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/*si no es empleado es Empleado*/
use Illuminate\Support\Facades\DB;
use App\Models\empleado;
use App\Models\departamento;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        /*
        $empleados=DB::table('empleado')->select('*')->get(); 
        return view('admin.empleados.index', compact('empleados'));
        */
        $empleados = empleado::all();

        $empleados = DB::table('empleados as e')
        ->join('departamentos as d','d.id','=','e.departamento')
        ->select('e.*','d.descripcion as departamento')
        ->get();

        /* carpeta admin/ capeta empleados / archivo .php index*/
        return view('admin.empleados.index', array('empleados'=>$empleados));
        
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

        $genero =[
            'h'=>'Hombre',
            'm' =>'Mujer',
            
        ];

        $carga =[
            'ncargas'=>'NO tiene',
            'carga1' =>'1 Hijo',
            'carga2' =>'2 Hijos',
            'carga3' =>'3 Hijos',
            'carga4' =>'4 Hijos',
            'carga5' =>'5 Hijos',
            
        ];

        $selectobra =DB::table('obras')->select('*')->get(); 
        $obra = array();
        foreach($selectobra as $ob){
            $obra["$ob->id"] = $ob->Nombre;
        }

        $selectdepar =DB::table('departamento')->select('*')->get(); 
        $departamento = array();
        foreach($selectdepar as $depar){
            $departamento["$depar->id"] = $depar->descripcion;
        }

        $selectcontrato=DB::table('contrato')->select('*')->get(); 
        $contrato = array();
        foreach($selectcontrato as $contra){
            $contrato["$contra->id"] = $contra->descripcion;
        }



        return view('admin.empleados.create',compact('cargos','genero','carga','obra','departamento','contrato'));

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
            'cedula' =>'numeric|required|digits_between:10,10',
            'nombre' =>'required |regex:/^[\pL\s\-]+$/u',
            'apellido' =>'required |regex:/^[\pL\s\-]+$/u',
            'fnacimiento' =>'required',
            'email' =>'required',
            'telefono' =>'numeric|required|digits_between:10,10',
            'genero' =>'required',
            'cargas' =>'required',
            'fingreso' =>'required',
            'fsalida' =>'required',
            /*foraneas*/
            'cargo' =>'required',
          /*  'sueldo' =>'required', */
         /*   'obra' =>'required', */
            'departamento' =>'required',
            'contrato' =>'required'
    ]);
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show( empleado $empleado)
    {
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
        return view('admin.empleados.edit',compact('empleado'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(empleado $empleado)
    {
        //
    }
}
