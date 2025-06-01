<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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
        ]);

        $posterPath = $request->file('poster')->store('posters', 'public');

        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'habilitated' => $request->input('habilitated'),
            'poster' => $posterPath,
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
        ]);

        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
            $post->poster = $posterPath;
        }

        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'habilitated' => $request->input('habilitated'),
        ]);

        $post->save();

        return redirect()->route('posts.index')->with('message', 'Post actualizado con éxito.');
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('message', 'Post eliminado.');
    }
}
