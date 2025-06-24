<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\EditRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listCategories = Category::orderBy('created_at', 'desc')->paginate(5);

        return view('dashboard.category.index', compact('listCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category(); //para que no de error en el formulario de crear
        return view('dashboard.category.create', compact('category'));
    }

    /** 
     * Store a newly created resource in storage.
     */
    //public function store(Request $request)
    public function store(StoreRequest $request)   //utilizando un metodo FormValidation
    {


      
        
        Category::create($request->validated());
        return redirect()->route('category.index')->with('status', 'Categoria creada correctamente');

       
    }

    /**
     * Display the specified resource.
     */



    public function show(Category $category)
    {
        
        return view('dashboard.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

       
        return view('dashboard.category.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Category $category)
    {
        
        $category->update($request->validated());

        //return redirect()->route('post.index');
        return to_route('category.index')->with('status','Categoria Actualizada!'); //hace lo mismo que la linea de arriba pero es mas corta la sintaixs (a partir de laravel 10)
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //dd( "Eliminando el post: " . $post->title);
        $category->delete();
        return to_route('category.index')->with([
            'status' => 'Categoria Eliminada!',
            'deleted' => true
        ]);
    }
}
