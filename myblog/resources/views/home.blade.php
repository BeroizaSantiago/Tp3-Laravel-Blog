@extends('layouts.app')

@section('content')
    <div class="w-full relative">
        <img src="{{ asset('images/hero.jpg') }}" alt="Hero" class="w-full h-[500px] object-cover">        
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <p class="text-white text-2xl font-bold">
                Alguna frase
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto mt-12 mb-12 space-y-12"> 
        <x-post :posts="$posts" :home="true"/> 
    </div>
@endsection