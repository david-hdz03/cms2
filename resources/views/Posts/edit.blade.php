<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Editar Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Post</div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('posts.update', $post->id) }}">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label for="titulo_entrada">Título</label>
                            <input type="text" class="form-control" id="titulo_entrada" name="titulo_entrada" value="{{ $post->titulo_entrada }}">
                        </div>
                        <div class="form-group">
                            <label for="post_contenido">Contenido</label>
                            <textarea class="form-control" id="post_contenido" name="post_contenido" rows="3">{{ $post->post_contenido }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="post_imagen">Imagen</label>
                            <input type="text" class="form-control" id="post_imagen" name="post_imagen" value="{{ $post->post_imagen }}">
                        </div>
                        <div class="form-group">
                            <label for="fec_pub">Fecha de Publicación</label>
                            <input type="datetime-local" class="form-control" id="fec_pub" name="fec_pub" value="{{ $post->fec_pub->format('Y-m-d\TH:i') }}">
                        </div>
                        <div class="form-group">
                            <label for="estatus">Estatus</label>
                            <input type="number" class="form-control" id="estatus" name="estatus" value="{{ $post->estatus }}">
                        </div>
                        <div class="form-group">
                            <label for="id_categoria">Categoría</label>
                            <input type="number" class="form-control" id="id_categoria" name="id_categoria" value="{{ $post->id_categoria }}">
                        </div>
                        <div class="form-group">
                            <label for="id_etiqueta">Etiqueta</label>
                            <input type="number" class="form-control" id="id_etiqueta" name="id_etiqueta" value="{{ $post->id_etiqueta }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
