<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de administración | ServiHogar</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex">

        <!-- Sidebar -->
        <aside class="w-64 bg-slate-900 text-white hidden md:flex md:flex-col">
            <div class="px-6 py-5 border-b border-slate-700">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                    <img src="{{ asset('imagenes/logo-servihogar.png') }}"
                        alt="Logo ServiHogar"
                        class="h-12 w-auto bg-white rounded-lg p-1">

                    <div>
                        <h1 class="text-xl font-bold leading-tight">
                            <span class="text-blue-300">Servi</span><span class="text-green-300">Hogar</span>
                        </h1>

                        <p class="text-sm text-slate-300">
                            Panel administrador
                        </p>
                    </div>
                </a>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                   class="block px-4 py-2 rounded-lg hover:bg-slate-700">
                    Dashboard
                </a>

                <a href="{{ route('admin.services.index') }}"
                   class="block px-4 py-2 rounded-lg hover:bg-slate-700">
                    Servicios
                </a>

                <a href="{{ route('admin.categories.index') }}"
                   class="block px-4 py-2 rounded-lg hover:bg-slate-700">
                    Categorías
                </a>

                <a href="{{ route('admin.technicians.index') }}"
                   class="block px-4 py-2 rounded-lg hover:bg-slate-700">
                    Técnicos
                </a>

                <a href="{{ route('admin.bookings.index') }}"
                   class="block px-4 py-2 rounded-lg hover:bg-slate-700">
                    Solicitudes
                </a>

                <a href="{{ route('admin.payments.index') }}"
                   class="block px-4 py-2 rounded-lg hover:bg-slate-700">
                   Pagos
                </a>

                <a href="{{ route('admin.reviews.index') }}"
                    class="block px-4 py-2 rounded-lg hover:bg-slate-700">
                    Reseñas
                </a>

                <a href="{{ route('admin.users.index') }}"
                   class="block px-4 py-2 rounded-lg hover:bg-slate-700">
                    Usuarios
                </a>

            </nav>

            <div class="px-4 py-4 border-t border-slate-700">
                <a href="{{ route('dashboard') }}"
                   class="block px-4 py-2 rounded-lg text-sm text-slate-300 hover:bg-slate-700">
                    Ir al panel cliente
                </a>
            </div>
        </aside>

        <!-- Contenido principal -->
        <div class="flex-1 flex flex-col">

            <!-- Header -->
            <header class="bg-white shadow-sm px-6 py-4 flex justify-between items-center">
                <div>
                    <h2 class="text-lg font-semibold">@yield('title', 'Administración')</h2>
                    <p class="text-sm text-gray-500">Gestión general del sistema</p>
                </div>

                <div class="text-sm text-gray-600">
                    Administrador
                </div>
            </header>

            <!-- Contenido -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>