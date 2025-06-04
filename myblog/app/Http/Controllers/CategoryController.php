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
}
