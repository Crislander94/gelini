<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Obra;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ObrasController extends Controller
{
    public function __construct()
    {
        $date = carbon::now();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
 
  public function index(Request $request)
    {
        $obras = obra::all();
        
        $keyword = $request->get('search');
        $perPage = 2;

        if (!empty($keyword)) {
            $obras = Obra::where('Nombre', 'LIKE', "%$keyword%")
                ->orWhere('Descripcion', 'LIKE', "%$keyword%")
                ->orWhere('Estado', 'LIKE', "%$keyword%")
                ->orWhere('Fecha_Inicio', 'LIKE', "%$keyword%")
                ->orWhere('Fecha_Fin', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $obras = Obra::latest()->paginate($perPage);
        }
        
        return view('obras.index', compact('obras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('obras.create');
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
        
        Obra::create($requestData);

        return redirect('obras')->with('flash_message', 'Obra added!');
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
        $obra = Obra::findOrFail($id);

        return view('obras.show', compact('obra'));
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
        $obra = Obra::findOrFail($id);

        return view('obras.edit', compact('obra'));
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
        
        $obra = Obra::findOrFail($id);
        $obra->update($requestData);

        return redirect('obras')->with('flash_message', 'Obra updated!');
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
        Obra::destroy($id);

        return redirect('obras')->with('flash_message', 'Obra deleted!');
    }
}
