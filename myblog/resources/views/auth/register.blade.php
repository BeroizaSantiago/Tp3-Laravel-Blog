<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
            <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                class="block w-full border border-gray-400 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500" />
            <x-input-error :messages="$errors->get('name')" class="mt-1 text-sm text-red-500" />
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo</label>
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                class="block w-full border border-gray-400 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500" />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-500" />
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
            <x-text-input id="password" type="password" name="password" required autocomplete="new-password"
                class="block w-[390px] border border-gray-400 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500" />
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-500" />
        </div>

        <div class="mb-5">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmar contraseña</label>
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                class="block w-[390px] border border-gray-400 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm text-red-500" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-orange-600 hover:text-orange-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500" href="{{ route('login') }}">
                ¿Ya tienes una cuenta?
            </a>

            <x-primary-button class="ms-4 bg-orange-600 hover:bg-orange-700 text-white py-2 px-6 rounded-md font-bold">
                Registrarse
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
