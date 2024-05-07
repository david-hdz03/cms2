<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EtiquetasModel;
use Illuminate\Support\Facades\DB;

class EtiquetasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $etiquetas = DB::SELECT("SELECT * FROM etiquetas");
        return view('Etiquetas.index', array('etiquetas'=>$etiquetas));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('Etiquetas.create');
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
        $etiquetas = new EtiquetasModel();
        $etiquetas->nombreEtiqueta = $request["NombreEtiqueta"];
        $etiquetas->Descripcion = $request["Descripcion"];
        $etiquetas->FechaCreacion = date("Y-m-d H:i:s");
        $etiquetas->UsuarioCreador ="Panchito";
        $etiquetas->save();
        return redirect('etiquetas')->with('Mensaje','Registro creado');
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
        $etiqueta = EtiquetasModel::findOrFail($id);
        return View('Etiquetas.edit',compact('etiqueta'));
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
        $etiquetaRequest = request()->except(['_token', '_method']);
        EtiquetasModel::where('id', '=', $id)->update($etiquetaRequest);
        return redirect('etiquetas')->with('Mensaje','Actualización realizada al registro');
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
        EtiquetasModel::destroy($id);
        return redirect('etiquetas')->with('Mensaje','Registro eliminado');
    }
}
