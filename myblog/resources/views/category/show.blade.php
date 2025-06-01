@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Mostrando la categoría con ID: {{ $post->id }}</h1>

    <div>
        <h4>{{$post->id}} {{$post->title}}</h4>
        <div>
            <img src="{{$post->poster}}" alt="alt">
        </div>
        <p>{{$post->content}}</p>
    </div>
    
@endsection
