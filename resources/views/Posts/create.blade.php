<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Crear Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Post</div>
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
                    <form action="{{url('/posts')}}" method="post" class="mx-auto">
                     {{csrf_field()}}
                        <div class="form-group">
                            <label for="titulo_entrada">Título</label>
                            <input type="text" class="form-control" id="titulo_entrada" name="titulo_entrada" value="{{ old('titulo_entrada') }}">
                        </div>
                        <div class="form-group">
                            <label for="post_contenido">Contenido</label>
                            <textarea class="form-control" id="post_contenido" name="post_contenido" rows="3">{{ old('post_contenido') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="post_imagen">Imagen</label>
                            <input type="text" class="form-control" id="post_imagen" name="post_imagen" value="{{ old('post_imagen') }}">
                        </div>
                        <div class="form-group">
                            <label for="fec_pub">Fecha de Publicación</label>
                            <input type="datetime-local" class="form-control" id="fec_pub" name="fec_pub" value="{{ old('fec_pub') }}">
                        </div>
                        <div class="form-group">
                            <label for="estatus">Estatus</label>
                            <input type="number" class="form-control" id="estatus" name="estatus" value="{{ old('estatus') }}">
                        </div>
                        <div class="form-group">
                            <label for="id_categoria">Categoría</label>
                            <input type="number" class="form-control" id="id_categoria" name="id_categoria" value="{{ old('id_categoria') }}">
                        </div>
                        <div class="form-group">
                            <label for="id_etiqueta">Etiqueta</label>
                            <input type="number" class="form-control" id="id_etiqueta" name="id_etiqueta" value="{{ old('id_etiqueta') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
