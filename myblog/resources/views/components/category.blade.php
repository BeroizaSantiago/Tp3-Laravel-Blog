<h1 class="text-3xl font-bold text-center text-gray-800 mb-8 pt-12">Categorías</h1>

<div class="w-full max-w-3xl mx-auto px-4 py-10 flex flex-col items-center">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
        @foreach($categories as $cat)
            <div class="border p-4 rounded-xl shadow-lg bg-white flex flex-col items-center gap-4 max-w-sm w-full h-full transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                

                <img src="{{ $cat['imagen'] }}" alt="{{ $cat['nombre'] }}" class="w-full h-48 object-cover rounded-t-lg shadow-md">

                <div class="flex flex-col justify-between items-center text-center h-full w-full gap-3">
                    <div class="grow">
                        <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $cat['nombre'] }}</h2>
                        <p class="text-md text-gray-600">{{ $cat['descripcion'] }}</p>
                    </div>

                    <x-button type="button"
                        text="Más detalles"
                        class="px-5 py-2 bg-blue-600 text-white text-md font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-200 border border-blue-800 shadow-md"
                        onclick="window.location.href='{{ url('/posts?category=' . $cat['slug']) }}'"/>
                </div>
            </div>
        @endforeach
    </div>
</div>