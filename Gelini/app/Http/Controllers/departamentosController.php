<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EmpleadoControllers;


use Illuminate\Support\Facades\DB;
use App\Models\departamento;
use App\Models\empleado;
use Illuminate\Http\Request;

class departamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        
        $empleados = DB::table('empleados as e')
            ->join('departamento as d', 'e.departamento', '=', 'd.id')
            ->select('e.*','d.descripcion as departamento')
            ->get();

        $keyword = $request->get('search');
        $perPage = 25;
        
        if (!empty($keyword)) {
            $departamentos = departamento::where('descripcion', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $departamentos = departamento::latest()->paginate($perPage);
        }

        

        return view('departamentos.index', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('departamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        departamento::create($requestData);

        return redirect('departamentos')->with('flash_message', 'departamento added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $departamento = departamento::findOrFail($id);

        return view('departamentos.show', compact('departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $departamento = departamento::findOrFail($id);

        return view('departamentos.edit', compact('departamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $departamento = departamento::findOrFail($id);
        $departamento->update($requestData);

        return redirect('departamentos')->with('flash_message', 'departamento updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        departamento::destroy($id);

        return redirect('departamentos')->with('flash_message', 'departamento deleted!');
    }
}
