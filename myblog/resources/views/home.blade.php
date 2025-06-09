@extends('layouts.app')

@section('content')
    <div class="w-full relative min-h-[500px] flex items-center justify-center">
        <img src="{{ asset('images/hero.jpg') }}" alt="Hero" class="w-full h-[500px] object-cover absolute inset-0">        
        <div class="w-full absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <p class="text-gray-200 text-4xl font-bold text-center px-4">
                ¡Donde las cuerdas, las teclas y los tambores cuentan historias!      
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto mt-12 mb-12 space-y-12"> 
        <x-post :posts="$posts" :home="true"/> 
    </div>
@endsection