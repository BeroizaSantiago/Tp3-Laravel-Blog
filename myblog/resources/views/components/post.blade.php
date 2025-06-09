@props(['posts', 'home' => false])

<div class=" {{ $posts->isNotEmpty() ? 'grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6' : 'min-h-[800px]' }}">
    @if($posts->isEmpty())
        <div class="w-full flex justify-center text-xl">
            <p class="p-3 font-bold">¡Todavía no hay posts!</p>
        </div>
        <div class="flex justify-center">
            <a href="{{ Auth::check() ? url('/category/create') : url('/register')}}"><x-button type="button" class="bg-blue-600 hover:bg-blue-700 hover:cursor-pointer text-white m-2 mr-0 px-4 py-2 rounded-full w-24" text="Crear"></x-button></a>
        </div>
    @else
        @foreach($posts as $post)
            <div class="border pt-4 p-6 rounded shadow-lg bg-white relative"> 
                <div class="pb-3">
                    <h5 class="p-1 text-gray-400 rounded-full w-1/5 bg-gray-100 flex justify-center align-center"> {{ $post->user->name }} </h5>
                </div>

                <a href="{{ route('category.show', $post->id) }}">
                    <img src="{{ asset('storage/' . $post->poster) }}" alt="Imagen del post" class="w-full h-64 object-cover rounded mb-4">
                </a>    

                @if($home)
                    <a href="{{ url('/posts?category=' . $post->category) }}"><p class="hover:underline text-md font-semibold text-gray-600 uppercase tracking-wide mb-2">{{ $post->category }}</p></a>
                @else
                    <p class="text-md font-semibold text-gray-600 uppercase tracking-wide mb-2">{{ $post->category }}</p>
                @endif

                <h2 class="text-3xl font-extrabold text-blue-500 hover:text-orange-500 transition duration-300">
                    <a href="{{ route('category.show', $post->id) }}">{{ $post->title }}</a>
                </h2>

                <p class="text-gray-700 text-lg flex-grow font-serif {{ $home ? 'pb-4' : 'pb-14' }}">
                    {{ Str::limit($post->content, 300, '...') }}
                </p> 

                <p class="absolute bottom-2 right-4 text-gray-500 text-sm opacity-70">
                    {{ $post->created_at->format('d M Y') }}
                </p>

                @if(!$home)
                    @if(Auth::check())
                        @if($post->user_id === auth()->id())
                            <div class="absolute bottom-6 pt-8">
                                <a href="{{ route('category.delete', $post->id) }}"><button type="button" class="text-white bg-red-600 p-2 mr-1 rounded w-20 hover:bg-red-700">Eliminar</button></a>
                                <a href="{{ route('category.edit', $post->id) }}"><button type="button" class="text-white bg-green-700 p-2 rounded w-20 hover:bg-green-800">Editar</button></a>
                            </div>
                        @endif
                    @endif
                @endif
            </div>
        @endforeach
    @endif
</div>