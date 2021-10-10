@extends('menu')
@section('contenido')
        <div class="container mt-2">

                <div class="row">
                    <div class="col-lg-12 mt-2">
                        <div class="text-center mb-2">
                            <h2 style="font-weight: 900">Editar Publicación</h2>
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
                <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
            
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Titulo de publicación:</strong>
                                <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="titulo de la publicación">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Descripción de publicación:</strong>
                                <textarea class="form-control" style="height:75px" name="description" placeholder="Descripción de publicación">{{ $post->description }}</textarea>
                            </div>
                        </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Imagen de publicación:</strong>
                            <input type="file" name="image" class="form-control" placeholder="Post Title">
                        </div>
                        <div class="form-group">

                        <img src="{{ Storage::url($post->image) }}" height="200" width="200" alt="" />


                        </div>
                    </div>
                        
                        <button type="submit" class="btn btn-primary ml-3">Guardar</button>
                    
                    </div>
            
                </form>
        </div>
@endsection