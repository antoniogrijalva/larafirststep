<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\EditRequest;
use App\Http\Requests\Post\StoreRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ejercicio 68. sesiones 
        session([ 
                's_usuario' => 'Jose Antonio Grijalva A.',
                's_email' => 'antoniogrijalvaamaya@gmail.com'
                ]); //para guardar una variable de sesion

        $listPosts = Post::with('category')->orderBy('created_at', 'desc')->paginate(5);

        return view('dashboard.post.index', compact('listPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$categories = Category::all();

        $categories = Category::pluck( 'id','title'); //solamente pasa el id y el title
        $post = new Post(); //para que no de error en el formulario de crear
        // $categories = Category::all();
        return view('dashboard.post.create', compact('categories', 'post'));
    }

    /** 
     * Store a newly created resource in storage.
     */
    //public function store(Request $request)
    public function store(StoreRequest $request)   //utilizando un metodo FormValidation
    {

         //validaciones opcion 2
        Post::create($request->validated());
        return redirect()->route('post.index')->with('status', 'Post creado correctamente');



       //dd($request->all()) ;
       /*
       Post::create([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'image' => $request->input('image'),
            'posted' => $request->input('posted'),
            'category_id' => $request->input('category_id')
        ]);
        */

        //validaciones con mensajes personalizados (opcion 1)
       /* $request->validate([
            'title' => 'required|min:5|max:100',
            'slug' => 'required',
            'description' => 'required',
            'content' => 'required'
        ], [
            'title.required' => 'El campo "título" es obligatorio',
            'title.min' => 'El campo título debe tener al menos 5 letras',
            'title.max' => 'El campo título no puede tener más de 100 caracteres',
            'slug.required' => 'El campo "slug" es obligatorio',
            'description.required' => 'El campo descripción es obligatorio',
            'content.required' => 'El campo contenido es obligatorio'
        ]);*/
      

        ///Post::create($request->all());

       
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $categories = Category::pluck( 'id','title'); //solamente pasa el id y el title
        return view('dashboard.post.show', compact('post','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        
         //$categories = Category::all();
        
        
        $categories = Category::pluck( 'id','title'); //solamente pasa el id y el title
        return view('dashboard.post.edit', compact('post','categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Post $post)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $uniqueName = $filename . '_' . $post->id . '.' . $extension;
            $file->move(public_path('uploads/post'), $uniqueName);
            $data['image'] = $uniqueName;
        }

        $post->update($data);

        //return redirect()->route('post.index');
        return to_route('post.index')->with('status',' "' . $post->title.'" Fue modificado!'); //hace lo mismo que la linea de arriba pero es mas corta la sintaixs (a partir de laravel 10)
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //dd( "Eliminando el post: " . $post->title);

        $post->delete();
        return to_route('post.index')->with(['status' =>'POST "'.$post->title.'", ha sido Eliminado',
        'deleted' => true,]
        ); //hace lo mismo que la linea de arriba pero es mas corta la sintaixs (a partir de laravel 10)
    }
}
