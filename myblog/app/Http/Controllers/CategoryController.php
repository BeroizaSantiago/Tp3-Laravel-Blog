<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function getIndex()
    {
        $posts = Post::all();
        return view('category.index', compact('posts'));
    }

    public function getShow(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        return view('category.show', ['post' => $post]);
    }

    public function getCreate()
    {
        return view('category.create');
    }

    public function getEdit(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        return view('category.edit', ['post' => $post]);
    }

    public function editData(Request $request, $id) {
        //dd($request->all());
        //Trae el post
        $post = DB::table('posts')->where('id', $id)->first();
        //Collect transforma los datos de una colección y except no toma en cuenta _token, _method y confirm
        //(los agrega laravel para el submit pq los necesita pero pueden generar un error si no se excluyen. Confirm viene del submit)
        //Reject excluye los datos que son iguales a los de la bd ($post)
        //toArray() está pq collect es de laravel y la bd espera lenguaje php
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
    }
}
