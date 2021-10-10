@extends('menu')
@section('contenido')
    <div class="container mt-2">
    
    <div class="row">
        <div class="col-lg-12 mt-2">
            <div class="text-center mb-2">
                <h2 style="font-weight: 900">Añadir Nueva Publicación</h2>
            </div>
            <div class="" style="margin-bottom: 1rem">
                <a class="btn btn-warning" href="{{ route('posts.index') }}"> Atrás</a>
            </div>
        </div>

    </div>
                {{-- benjamin alert --}}
                @if (count($errors)>0)
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                           <li> {{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {{-- fin alerta benjamin --}}
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="titulo de la publicación">
                </div>
            </div>
            <div class="mt-3  col-md-12">
                <div class="form-group">
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Descripción De Publicación"></textarea>
                </div>
            </div>        
            <div class="mt-3 col-md-12">
                <div class="form-group">
                    <strong>Imagen De Publicación:</strong>
                    <input type="file" name="image" class="form-control" placeholder="Imagen">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        </div>
    </form>
@endsection
