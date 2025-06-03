@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Crear nuevo post</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="title" class="block font-bold">Título:</label>
            <input type="text" name="title" id="title" class="border w-full p-2" required>
        </div>

        <div class="mb-4">
            <label for="content" class="block font-bold">Contenido:</label>
            <textarea name="content" id="content" rows="4" class="border w-full p-2" required></textarea>
        </div>

        <div class="mb-4">
            <label for="habilitated" class="block font-bold">¿Habilitado?</label>
            <select name="habilitated" id="habilitated" class="border w-full p-2" required>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="category" class="block font-bold">Categoria:</label>
            <select name="category" id="category" class="border w-full p-2" required>
                <option value="1">Categoría 1</option>
                <option value="2">Categoría 2</option>
                <option value="3">Categoría 3</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="poster" class="block font-bold">Imagen del post:</label>
            <input type="file" name="poster" id="poster" class="border p-2" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Crear</button>
    </form>
@endsection
