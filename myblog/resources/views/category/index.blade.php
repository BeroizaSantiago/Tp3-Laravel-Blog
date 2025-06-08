@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center backdrop-blur-md" style="background-image: url('{{ asset('images/fondoCategoria.webp') }}');">
    <div class="container mx-auto max-w-full px-6 py-12">

        @php
            $categories = [
                ['nombre' => 'Instrumentos de Cuerda', 'slug' => 'Cuerda', 'imagen' => asset('images/categoriaCuerda.png'), 'descripcion' => 'Producen sonido mediante la vibración de sus cuerdas: guitarra, violín, arpa, chelo, etc.'],
                ['nombre' => 'Instrumentos Electrónicos', 'slug' => 'Electrónico', 'imagen' => asset('images/categoriaElectr.png'), 'descripcion' => 'Generan sonido a través de circuitos eléctricos y tecnología digital: sintetizadores, teclados, samplers, etc.'],
                ['nombre' => 'Instrumentos de Percusión', 'slug' => 'Percusión', 'imagen' => asset('images/categoriaPerc.png'), 'descripcion' => 'Producen sonido al ser golpeados, sacudidos o frotados: baterías, maracas, xilófonos, cajas, etc.'],
                ['nombre' => 'Instrumentos de Viento', 'slug' => 'Viento', 'imagen' => asset('images/categoriaViento.png'), 'descripcion' => 'Funcionan mediante la vibración del aire dentro del instrumento: flauta, clarinete, trompeta, saxofón, trombón, etc.']
            ];
        @endphp

        @if(session('message'))
            <div class="p-4 mb-4 bg-green-100 border border-green-400 text-green-800 rounded">
                <p>{{ session('message') }}</p>
            </div>
            @php header("Cache-Control: no-cache, no-store, must-revalidate"); @endphp
        @endif

        @if(!isset($category))
            <x-category :categories="$categories"/>
        @else
            <h2 class="text-3xl font-black text-center text-white mt-6 mb-4 rounded-full"
                style="-webkit-text-stroke: 1px black; text-shadow: 10px 10px 20px black; font-family: Arial, sans-serif;">
                Resultados en la categoría: {{ $category }}
            </h2>

            <div class="shadow-md py-4 mb-6 flex flex-wrap justify-center gap-4">
                @foreach($categories as $cat)
                    <x-button type="button"
                        text="{{ $cat['nombre'] }}"
                        class="px-4 py-2 bg-gray-600 text-white text-md font-semibold rounded-lg hover:bg-blue-700 transition duration-200"
                        onclick="window.location.href='{{ url('/posts?category=' . $cat['slug']) }}'"/>
                @endforeach
            </div>

            <div class="bg-gray-300 rounded-full px-6 py-2 mb-3 flex justify-start shadow-md w-max">
                <p class="text-lg text-gray-700 font-semibold">Posts ({{ count($posts) }})</p>
            </div>

            <div class="w-full mx-auto mt-6 grid gap-6">
                <x-post :posts="$posts"/>
            </div>
        @endif
    </div>
</div>
@endsection