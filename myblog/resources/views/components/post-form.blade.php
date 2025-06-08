    @props(['post' => null])

    <div style="background-image: url('{{ asset('storage/posters/form-fondo.jpg') }}');">
        <div class="md:p-10 bg-red bg-gray/30 backdrop-brightness-50">
            <div class="w-full max-w-4xl mx-auto border md:rounded-md p-5 bg-white shadow-lg">
            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route($post ? 'category.edit' : 'posts.store', $post?->id) }}" method="POST" enctype="multipart/form-data" class="w-full p-2" name="upload-form">
                @csrf
                @if($post)
                    @method('PUT')
                @endif
                @if(!$post)
                    <h1 class="text-2xl font-bold mb-4">Crear nuevo post</h1>
                @endif

                <div class="mb-4">
                    <label for="title" class="block font-bold">Título</label>
                    <input type="text" name="title" id="title" class="border w-full p-2 rounded-md" value="{{ old('title', $post ? $post->title : '') }}" required>
                </div>

                <div class="mb-4">
                    <label for="content" class="block font-bold">Contenido</label>
                    <textarea name="content" id="content" rows="4" class="border w-full p-2 rounded-md" required>{{ old('content', $post ? $post->content : '') }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="category" class="block font-bold">Categoría</label>
                    <select name="category" id="category" class="border w-full p-2 rounded-md" required>
                        <option disabled {{ !$post ? 'selected' : ''}}>Seleccionar una opción</option>
                        <option value="Cuerda" {{ $post && $post->category === 'Cuerda' ? 'selected' : ''}}>Cuerda</option>
                        <option value="Electrónico" {{ $post && $post->category === 'Electrónico' ? 'selected' : ''}}>Electrónicos</option>
                        <option value="Percusión" {{ $post && $post->category === 'Percusión' ? 'selected' : ''}}>Percusión</option>
                        <option value="Viento" {{ $post && $post->category === 'Viento' ? 'selected' : ''}}>Viento</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="poster" class="block font-bold">Subir imagen</label>
                    <input type="file" name="poster" id="poster" class="mb-5 p-2 w-full rounded-md border border-[#6b7280]">
                    @if($post && $post->poster)
                        <div class="flex justify-center mb-4">
                            <img src="{{ asset('storage/' . $post->poster) }}" alt="Imagen del post" class="rounded-md shadow">
                        </div>
                    @endif
                </div>

                <div class="flex justify-end">
                    <x-button type="button" class="bg-red-600 hover:bg-red-700 hover:cursor-pointer text-white m-2 mr-0 px-4 py-2 rounded" text="Cancelar" onclick="window.history.back()">
                    </x-button>
                    @if($post)
                        <x-button type="submit" class="bg-green-700 hover:bg-green-800 hover:cursor-pointer text-white m-2 mr-0 px-4 py-2 rounded" text="Confirmar">
                        </x-button>
                    @else
                        <x-button type="submit" class="bg-blue-600 hover:bg-blue-700 hover:cursor-pointer text-white m-2 mr-0 px-4 py-2 rounded" text="Crear">
                        </x-button>
                    @endif
                </div>
            </form>
        </div>
    </div>