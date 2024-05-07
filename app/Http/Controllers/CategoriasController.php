<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriasModel;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorias = DB::SELECT("SELECT * FROM categorias");
        return view('Categorias.index', array('categorias'=>$categorias));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('Categorias.create');
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
        $categorias = new CategoriasModel();
        $categorias->nombreCategoria = $request["NombreCategoria"];
        $categorias->Descripcion = $request["Descripcion"];
        $categorias->FechaCreacion = date("Y-m-d H:i:s");
        $categorias->UsuarioCreador ="Panchito";
        $categorias->save();
        return redirect('categorias')->with('Mensaje','Registro creado');
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
        $categoria = CategoriasModel::findOrFail($id);
        return View('Categorias.edit',compact('categoria'));
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
        $categoriaRequest = request()->except(['_token', '_method']);
        CategoriasModel::where('id', '=', $id)->update($categoriaRequest);
        return redirect('categorias')->with('Mensaje','Actualización realizada al registro');
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
        CategoriasModel::destroy($id);
        return redirect('categorias')->with('Mensaje', 'Registro eliminado');
    }
}
