@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Listado de categorías</h1>

     @if(session('message'))
        <div>
            <p>{{session('message')}}</p>
        </div>
    @endif

    @foreach ($posts as $unPost)
        <div>
            <h4>{{$unPost->id}} {{$unPost->title}}</h4>
            <div>
                <img src="{{ asset('storage/' . $unPost->poster) }}" alt="Imagen post" class="w-full max-w-[700px] aspect-[16/9] object-contain rounded-md ">            </div>
            <p>{{$unPost->content}}</p>
        </div>
    @endforeach

@endsection
