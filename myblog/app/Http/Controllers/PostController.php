<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('category.index', compact('posts'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'habilitated' => 'required|boolean',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|integer',
        ]);

        $posterPath = $request->file('poster')->store('posters', 'public');
        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'habilitated' => $request->input('habilitated'),
            'poster' => $posterPath,
            'category' => $request->input('category'),
            'user_id' => auth()->id()
        ]);

        return redirect()->route('posts.index')->with('message', 'Post creado con éxito.');
    }

    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('category.show', compact('post'));
    }

    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('category.edit', compact('post'));
    }

    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'habilitated' => 'required|boolean',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|integer', 
        ]);

        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
            $post->poster = $posterPath;
        }

        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'habilitated' => $request->input('habilitated'),
            'category' => $request->input('category'),
        ]);

        $post->save();

        return redirect()->route('category.index')->with('message', 'Post actualizado con éxito.');
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('message', 'Post eliminado.');
    }

     /*public function editData(Request $request, $id) {
        $post = Post::findOrFail($id);         //DB::table('posts')->where('id', $id)->first();
        
        $updatedData = collect($request->except('_token', '_method', 'confirm'))
        ->reject(fn($formValue, $dbValue) => $post->$dbValue == $formValue)
        ->toArray();

        if(!empty($updatedData)) {
            if(array_key_exists('poster', $updatedData)) {
                $file = $request->file('poster');
                $filePath = $file->store('posters', 'public');
                Storage::disk('public')->delete($post->poster);
                $updatedData['poster'] = $filePath;
            }
            $updatedData['updated_at'] = now();
            $result = DB::table('posts')->where('id', $id)->update($updatedData);
            $message = $result ? "El post se actualizó correctamente" : "Error al actualizar el post";
        } else {
            $message = "No se ingresaron cambios";
        }

        return redirect()->route('category.index')->with('message', $message);
    }*/
}
