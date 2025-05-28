<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <nav class="bg-blue-600 p-4 text-white">
        <ul class="flex space-x-4">
            <li><a href="{{ url('/') }}" class="hover:underline">Home</a></li>
            <li><a href="{{ url('/category') }}" class="hover:underline">Categorías</a></li>
            <li><a href="{{ url('/category/create') }}" class="hover:underline">Crear</a></li>
            <li><a href="{{ url('/category/edit') }}" class="hover:underline">Editar</a></li>
            <li><a href="{{ url('/login') }}" class="hover:underline">Login</a></li>
        </ul>
    </nav>

    <div class="container mx-auto mt-8">
        @yield('content')
    </div>
</body>
</html>
