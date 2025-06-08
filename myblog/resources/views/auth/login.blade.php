<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo</label>
            <x-text-input id="email" name="email" type="email" required autofocus autocomplete="username"
                class="block w-[390px] border border-gray-400 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500" />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-500" />
        </div>


        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
            <x-text-input id="password" name="password" type="password" required autocomplete="current-password"
                class="block w-[390px] border border-gray-400 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500" />
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-500" />
        </div>


        <div class="flex items-center justify-between text-sm mb-5">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" name="remember"
                    class="border-gray-300 text-orange-600 focus:ring-orange-500 rounded">
                <span class="ml-2 text-gray-700">Recordarme</span>
            </label>

            @if (Route::has('password.request'))
            <a class="text-orange-600 hover:underline" href="{{ route('password.request') }}">
                ¿Olvidaste tu contraseña?
            </a>
            @endif
        </div>


        <div class="flex justify-center">
            <x-primary-button class="bg-orange-600 hover:bg-orange-700 text-white py-2 px-6 rounded-md font-bold">
                ENTRAR
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>