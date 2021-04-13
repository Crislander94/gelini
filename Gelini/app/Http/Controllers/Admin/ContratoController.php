<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contrato;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       $contratos = contrato::all();
       
        return view('admin.contratos.index',compact('contratos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contratos.create');
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
            'descripcion' => 'required  | regex:/^[\pL\s\-]+$/u'
       ]);
      $contrato= contrato::create($request->all());
      return redirect()->route('admin.contratos.index',$contrato)->with('informacion','CONTRATO CREADO CON EXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(contrato $contrato)
    {
        return view('admin.contratos.show',compact('contrato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(contrato $contrato)
    {
        return view('admin.contratos.edit',compact('contrato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,contrato $contrato)
    {
        $request->validate([
            'descripcion' => 'required  | regex:/^[\pL\s\-]+$/u'
       ]);
       $contrato->update($request->all());

       return redirect()->route('admin.contratos.index',$contrato)->with('informacion','CONTRATO ACTUALIZADO CON EXITO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(contrato $contrato)
    {
        $contrato->delete();
        return redirect()->route('admin.contratos.index')->with('informacion','CONTRATO ELIMINADO CON EXITO');
    }
}
