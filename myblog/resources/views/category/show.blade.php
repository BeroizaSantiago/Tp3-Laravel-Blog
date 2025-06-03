@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 shadow rounded">
        <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>

        <img src="{{ asset('storage/' . $post->poster) }}" alt="Imagen del post" class="mb-4 max-w-full h-auto rounded">

        <p class="text-gray-700 mb-2"><strong>Categoría:</strong> {{ $post->category }}</p>
        <p class="text-gray-700 mb-2"><strong>Habilitado:</strong> {{ $post->habilitated ? 'Sí' : 'No' }}</p>

        <div class="mt-4">
            <p class="text-gray-800 whitespace-pre-line">{{ $post->content }}</p>
        </div>

        <a href="{{ route('posts.index') }}" class="inline-block mt-6 text-blue-600 bg-red-500"> Volver a la lista</a>
    </div>
@endsection
