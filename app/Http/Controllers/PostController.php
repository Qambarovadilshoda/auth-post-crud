<?php

namespace App\Http\Controllers;

use id;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\StorePostEditRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $user = Auth::user();

        if ($user) {
            $uploadedImage =  $this->uploadImage($request->file('image'));
            $post = new Post();
            $post->user_id = $user->id;
            $post->title = $request->title;
            $post->context = $request->context;
            $post->image = $uploadedImage;
            $post->save();

            return redirect()->route('posts.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with('user')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit(string $id)
    {
        $user = Auth::user();
        $post = Post::findOrFail($id);
        
        if ($user->id != $post->user_id) {
            
            return view('posts.edit', compact('post'));
        }else{
            return redirect()->route('posts.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostEditRequest $request, string $id)
    {
        $user = Auth::user();
        $post = Post::findOrFail($id);

        if ($user->id != $post->user_id) {
            return redirect()->route('posts.index');
        }


        if ($request->hasFile('image')) {
            if ($post->image) {
                $this->deleteImage($post->image);
            }

            $post->image = $this->uploadImage($request->file('image'));
        }
        $post->title = $request->title;
        $post->context = $request->context;

        $post->save();

        return redirect()->route('posts.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        $post = Post::findOrFail($id);
        if ($user->id != $post->user_id) {
            return redirect()->route('posts.index');
        }
        $this->deleteImage($post->image);
        $post->delete();
        return redirect()->route('posts.index');
    }
    public function uploadImage($image){
        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $uploadImage = $image->storeAs('images', $fileName, 'public');
        return $uploadImage;
    }
    public function deleteImage($image){
        @unlink(storage_path('app/public/' . $image)) ;
    }
}
