@extends('layouts.app')

@section('content')

    <h1 class="text-2xl font-bold">Editando categoría con ID: {{ $post->id }}</h1>

    <div>
        <form action="{{route('category.update', $post->id)}}" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" id="title" value="{{$post->title}}" required>
            <div>
            <img src="{{ asset('storage/' . $post->poster) }}" alt="Imagen del post">
                <input type="file" name="poster" id="poster" value="{{$post->poster}}">
            </div>
            <textarea name="content" id="content" required>{{ $post->content }}</textarea><br>
            <input type="button" name="cancel" value="Cancelar" onclick="window.history.back()">
            <input type="submit" name="confirm" value="Confirmar">
            @csrf
            @method('PUT')
        </form>
    </div>

@endsection
