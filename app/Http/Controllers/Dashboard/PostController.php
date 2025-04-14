<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Category::create([
        //     'title' => 'Category 1',
        //     'slug' => 'category-1',
        // ]);
        

        // Post::create([
        //     'title' => 'Post 1',
        //     'slug' => 'post-1',
        //     'content' => 'Content of post 1',
        //     'description' => 'Test description',
        //     'image' => 'https://example.com/image.jpg',
        //   //  'posted' => 'not',
        //     'category_id' => 1,
        // ]); 

        // $posts = Post::find(2);
        // $posts->title = 'Updated Titulo 2';
        // $posts->save();

        // return response('hola mundo', 200)
        //     ->header('Content-Type', 'text/plain');
            

        // return response()->json([
        //     'name' => 'PostController',
        //     'description' => 'Controller for managing posts',
        // ]);

         $posts = Post::find(2);
         dd($posts->category->title);

         


                return 'index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
