<?php
  
namespace App\Http\Controllers;
   
use App\Models\Post;
use Illuminate\Http\Request;
  
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['posts'] = Post::orderBy('id','asc')->paginate(3);
    
        return view('posts.index', $data);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // benjamin
            $campos=[
            'title' => 'required|max:60',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:4048',
            'description' => 'required|max:600',
            ];
    
            $mensaje=[
                'title.required'=>'El título es requerido',
                'title.max'=>'El título no puede pasar de 60 caracteres',
                'description.required'=>'La descripción es requerido',
                'description.max'=>'La descripción no puede pasar de 600 caracteres',
                'image.required'=>'La foto es requerida',
                'image.image'=>'Elija una imagen',
                'image.mimes'=>'Solo aceptamos formatos: jpg, png, jpeg, gif y svg',
                'image.max'=>'La imagen no debe superar los 4048 kilobytes.'
            ];
            $this->validate($request, $campos, $mensaje);

            // benjamin fin
        $path = $request->file('image')->store('public/images');
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $path;
        $post->save();
     
        return redirect()->route('posts.index')
                        ->with('crear','La publicación se ha creado correctamente');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
            // benjamin
            $campos=[
                'title' => 'required|max:60',
                'description' => 'required|max:600',
                ];
        
                $mensaje=[
                    'title.required'=>'El título es requerido',
                    'title.max'=>'El título no puede pasar de 60 caracteres',
                    'description.required'=>'La descripción es requerido',
                    'description.max'=>'La descripción no puede pasar de 600 caracteres',
                ];
                $this->validate($request, $campos, $mensaje);
    
                // benjamin fin
        $post = Post::find($id);
        if($request->hasFile('image')){
            // $request->validate([
            //   'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            // ]);
            // benjamin
            $campos=[
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:4048',
                ]; 
                $mensaje=[
                    'image.required'=>'La foto es requerida',
                    'image.image'=>'Elija una imagen',
                    'image.mimes'=>'Solo aceptamos formatos: jpg, png, jpeg, gif y svg',
                    'image.max'=>'La imagen no debe superar los 4048 kilobytes.'
                ];
                $this->validate($request, $campos, $mensaje);
                // benjamin fin
            $path = $request->file('image')->store('public/images');
            $post->image = $path;
        }
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
    
        return redirect()->route('posts.index')
                        ->with('editar','Publicación actualizada correctamente');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
    
        return redirect()->route('posts.index')
                        ->with('eliminar','La publicación se ha eliminado correctamente');
    }
}