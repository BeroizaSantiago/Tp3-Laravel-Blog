@extends('layouts.app')

@section('content')

    <h1 class="text-2xl font-bold">Editando categoría con ID: {{ $post->id }}</h1>

    <div>
        
    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('category.edit', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block font-bold">Título:</label>
            <input type="text" name="title" id="title" class="border w-full p-2" value="{{ $post->title }}" required>
        </div>

        <div class="mb-4">
            <label for="content" class="block font-bold">Contenido:</label>
            <textarea name="content" id="content" rows="4" class="border w-full p-2" required>{{ $post->content }}</textarea>
        </div>

        <div class="mb-4">
            <label for="habilitated" class="block font-bold">¿Habilitado?</label>
            <select name="habilitated" id="habilitated" class="border w-full p-2" required>
                <option value="1" {{ $post->habilitated ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ !$post->habilitated ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="category" class="block font-bold">Categoria:</label>
            <select name="category" id="category" class="border w-full p-2" required>
                <option value="1" {{ $post->category === '1' ? 'selected' : ''}}>Categoría 1</option>
                <option value="2" {{ $post->category === '2' ? 'selected' : ''}}>Categoría 2</option>
                <option value="3" {{ $post->category === '3' ? 'selected' : ''}}>Categoría 3</option>
            </select>
        </div>

        <div class="mb-4">
            <img src="{{ asset('storage/' . $post->poster) }}" alt="Imagen del post">
            <label for="poster" class="block font-bold">Imagen del post:</label>
            <input type="file" name="poster" id="poster" class="border p-2">
        </div>

        <input type="button" value="Cancelar" onclick="window.history.back()">
        <input type="submit" value="Confirmar">    
    </form>
    </div>

@endsection
