@extends('menu')
@section('contenido')
        <div class="container">
            <div class="container mt-3">
                <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="text-center">
                                <h2 style="font-weight: 900">Laravel proyecto listar e insertar</h2>
                            </div>
                            <div class=" mb-3 mt-3" style="margin-bottom: 3rem">
                                <a class="btn btn-success" href="{{ route('posts.create') }}"> Crear nuevo Publicación</a>
                            </div>
                        </div>
                    </div>
                    {{-- benjamin condicional si eliminamos desde controlador  --}}
                    @if ($message = Session::get('eliminar'))
                        <script>
                        Swal.fire(
                            'Eliminado!',
                            'Tu publicación ha sido eliminada.',
                            'Correctamente'
                            )
                        </script>
                    @endif
                    {{--benjamin condicional si editar desde controlador  --}}
                    @if ($message = Session::get('editar'))
                    <script>
                    Swal.fire(
                        'Editado!',
                        'Tu publicación ha sido editada.',
                        'Correctamente'
                        )
                    </script>
                @endif
                    {{--benjamin condicional si crear desde controlador  --}}
                    @if ($message = Session::get('crear'))
                    <script>
                    Swal.fire(
                        'Creado!',
                        'Tu publicación ha sido creada.',
                        'Correctamente'
                        )
                    </script>
                @endif
                    <table class="table table-light">
                        <thead class="thead-light">
                        <tr>
                            <th>Código</th>
                            <th>Imagen</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th width="280px">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td><img src="{{ Storage::url($post->image) }}" height="130" width="250" alt="" /></td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td>
                                <form action="{{ route('posts.destroy',$post->id) }}" method="POST" class="formulario-eliminar">
                    
                                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Editar</a>
                
                                   
                                    {{-- método de formulario laravel eliminar --}}
                                    @method('DELETE')
                                     @csrf
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                
                    {!! $posts->links() !!}
        </div>

@endsection
