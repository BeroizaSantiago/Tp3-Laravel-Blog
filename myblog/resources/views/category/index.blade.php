@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Listado de categorías</h1>

     @if(session('message'))
        <div>
            <p>{{session('message')}}</p>
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($posts as $post)
            <div class="border p-4 rounded shadow-lg bg-white">
                <img src="{{ asset('storage/' . $post->poster) }}" alt="Imagen del post" class="w-full h-48 object-cover rounded mb-4">
                
                <h2 class="text-xl font-bold">
                    <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 hover:underline"> {{ $post->title }}</a>
                </h2>
                <p class="text-gray-700">{{ Str::limit($post->content, 100) }}</p>
            </div>
        @endforeach
    </div>

@endsection
