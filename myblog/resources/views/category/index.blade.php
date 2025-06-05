@extends('layouts.app')

@section('content')

    <h1 class="text-2xl font-bold">Listado de categorías</h1>

     @if(session('message'))
        <div>
            <p>{{session('message')}}</p>
        </div>
    @endif
    
    <x-post :posts="$posts">
    </x-post>

@endsection
