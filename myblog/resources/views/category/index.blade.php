@extends('layouts.app')

@section('content')
    <div style="background-image: url('{{ asset('images/fondoCategoria.jpg') }}'); background-size: cover; background-position: center;" class="min-h-screen relative">            
        <div class="container mx-auto max-w-5xl px-6 py-12">

        @if(session('message'))
            <div class="bg-white rounded full w-fit p-6 text-gray-600 animate-fadeOut fixed bottom-7 right-3 border">
                <p>{{session('message')}}</p>
            </div>
        @endif

        @if(!isset($category))
            @php
                $categories = [
                    ['nombre' => 'Instrumentos de Cuerda', 'slug' => 'Cuerda', 'imagen' => asset('images/categoriaCuerda.png'),'descripcion'=>'Producen sonido mediante la vibración de sus cuerdas: guitarra, violín, arpa, chelo, etc.'],
                    ['nombre' => 'Instrumentos Electrónicos', 'slug' => 'Electrónico', 'imagen' => asset('images/categoriaElectr.png'), 'descripcion'=>'Generan sonido a través de circuitos eléctricos y tecnología digital: sintetizadores, teclados, samplers, etc'],
                    ['nombre' => 'Instrumentos de Percusión', 'slug' => 'Percusión', 'imagen' => asset('images/categoriaPerc.png'), 'descripcion'=>'Producen sonido al ser golpeados, sacudidos o frotados: baterías, maracas, xilófonos, cajas, etc. '],
                    ['nombre' => 'Instrumentos de Viento', 'slug' => 'Viento', 'imagen' => asset('images/categoriaViento.png'), 'descripcion'=>'Funcionan mediante la vibración del aire dentro del instrumento: flauta, clarinete, trompeta, saxofón, trombón, etc.']
                ];
            @endphp

            <x-category :categories="$categories"/>
        @else

                    <div class="bg-gray-300 rounded-full w-fit px-6 py-2 mb-6 flex justify-center shadow-md">
                        <p class="text-lg text-gray-700 font-semibold">{{ $category }} ({{ count($posts) }})</p>
                    </div>

                    <div class="mt-6">
                        <x-post :posts="$posts"></x-post>
                    </div>
                </div>
        
        @endif
    </div>
    @else
        <h2 class="text-2xl font-bold mt-6 mb-4">Posts en la categoría: {{ $category }}</h2>

        <div>
            <x-post :posts="$posts"></x-post>
        </div>
    @endif
    
@endsection
