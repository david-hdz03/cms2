<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostsModel;
use Illuminate\Support\Facades\DB;


class PostsController extends Controller
{
    /**
     * Muestra una lista de todos los posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::SELECT("SELECT * FROM posts");
        return view('Posts.index', array('posts'=>$posts));
    }

    /**
     * Muestra el formulario para crear un nuevo post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Posts.create');
    }

    /**
     * Almacena un nuevo post en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posts = new PostsModel();
        $posts->titulo_Entrada = $request["titulo_entrada"];
        $posts->post_contenido = $request["post_contenido"];
        $posts->post_imagen = $request["post_imagen"];
        $posts->fec_pub = date("Y-m-d H:i:s");
        $posts->fec_creacion = date("Y-m-d H:i:s");
        $posts->estatus = $request["estatus"];
        $posts->id_categoria = $request["id_categoria"];
        $posts->id_etiqueta = $request["id_etiqueta"];
        
        $posts->save();
        return redirect('posts')->with('Mensaje','Registro creado');
    }

    /**
     * Muestra el post especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = PostModel::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Muestra el formulario para editar el post especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = PostsModel::findOrFail($id);
        return View('Posts.edit',compact('post'));
    }

    /**
     * Actualiza el post especificado en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $postRequest = request()->except(['_token', '_method']);
        PostsModel::where('id', '=', $id)->update($postRequest);
        return redirect('posts')->with('Mensaje','Actualización realizada al registro');
    }

    /**
     * Elimina el post especificado de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PostsModel::destroy($id);
        return redirect('posts')->with('Mensaje','Registro eliminado');
    }
}
