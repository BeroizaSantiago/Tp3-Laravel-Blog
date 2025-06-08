@props(['posts', 'home' => false])

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @if($posts->isEmpty())
        <div>
            <h4>¡Todavía no hay posts!</h4>
        </div>
    @else
        @foreach($posts as $post)
            <div class="border p-6 rounded shadow-lg bg-white relative"> 
                <a href="{{ route('category.show', $post->id) }}">
                    <img src="{{ asset('storage/' . $post->poster) }}" alt="Imagen del post" class="w-full h-64 object-cover rounded mb-4">
                </a>    

                <p class="text-md font-semibold text-gray-600 uppercase tracking-wide mb-2">{{ $post->category }}</p>

                <h2 class="text-3xl font-extrabold text-blue-500 hover:text-orange-500 transition duration-300">
                    <a href="{{ route('category.show', $post->id) }}">{{ $post->title }}</a>
                </h2>

                <p class="text-gray-700 text-lg flex-grow font-serif">
                    {{ Str::limit($post->content, 300, '...') }}
                </p> 

                <p class="absolute bottom-2 right-4 text-gray-400 text-sm opacity-70">
                    {{ $post->created_at->format('d M Y') }}
                </p>

                @if(!$home)
                    @if(Auth::check())
                        @if($post->user_id === auth()->id())
                            <div>
                                <a href="{{ route('category.delete', $post->id) }}"><button type="button" class="text-white bg-red-600 p-2 rounded">Eliminar</button></a>
                                <a href="{{ route('category.edit', $post->id) }}"><button type="button" class="text-white bg-green-700 p-2 rounded">Editar</button></a>
                            </div>
                        @endif
                    @endif

                @endif
            </div>
        @endforeach
    @endif
</div>