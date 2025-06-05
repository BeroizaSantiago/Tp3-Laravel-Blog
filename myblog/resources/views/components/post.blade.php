@props(['posts'])

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @if($posts->isEmpty())
        <div>
            <h4>¡Todavía no hay posts!</h4>
        </div>
    @else
        @foreach($posts as $post)
            <div class="border p-4 rounded shadow-lg bg-white">
                <img src="{{ asset('storage/' . $post->poster) }}" alt="Imagen del post" class="w-full h-48 object-cover rounded mb-4">    
                <h2 class="text-xl font-bold">
                <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 hover:underline"> {{ $post->title }} </a>
                </h2>
        @if(Auth::check())
            @if($post->user_id === auth()->id())
                <div>
                    <a href="{{ route('category.delete', $post->id) }}"><button type="button" class="text-white bg-red-600 p-2 rounded">Eliminar</button></a>
                    <a href="{{ route('category.edit', $post->id) }}"><button type="button" class="text-white bg-green-700 p-2 rounded">Editar</button></a>
                </div>
            @endif
        @endif
            </div>
        @endforeach
    @endif
</div>