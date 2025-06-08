@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto grid grid-cols-12 gap-6 m-6">
        <div class="col-span-8 bg-white p-8 shadow-lg rounded-lg">
            <h1 class="text-5xl font-extrabold mb-6 text-gray-800">{{ $post->title }}</h1>
            <img src="{{ asset('storage/' . $post->poster) }}" alt="Imagen del post" class="mb-6 w-full h-auto rounded-lg shadow-md">
            <p class="text-gray-800 text-lg ">{{ $post->content }}</p>
        </div>

        <div class="col-span-4 bg-gray-100 p-4 rounded-lg shadow">
            <h2 class="text-xl font-semibold mb-4">Posts Recientes</h2>
            @php
                $postRecientes = App\Models\Post::latest()->take(6)->get();
            @endphp
            @foreach($postRecientes as $postRecientes)
                <a href="{{ route('posts.show', $postRecientes->id) }}" class="block text-blue-600 mb-2">
                    {{ $postRecientes->title }}
                </a>
            @endforeach
        </div>
    </div>

@endsection