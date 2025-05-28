<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getIndex()
    {
        return view('category.index');
    }

    public function getShow($id)
    {
        return view('category.show', ['id' => $id]);
    }

    public function getCreate()
    {
        return view('category.create');
    }

    public function getEdit($id)
    {
        return view('category.edit', ['id' => $id]);
    }
}
