<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse | ServiHogar</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#F8FAFC]">

    <main class="min-h-screen grid md:grid-cols-2">

        <!-- Lado izquierdo -->
        <section class="hidden md:flex bg-[#1E3A8A] text-white p-12 flex-col justify-between">
            <div>
                <a href="/" class="flex items-center gap-3">
                    <img src="{{ asset('imagenes/logo-servihogar.png') }}" alt="ServiHogar" class="h-14 bg-white rounded-xl p-1">
                    <div>
                        <h1 class="text-3xl font-bold">
                            Servi<span class="text-[#16A34A]">Hogar</span>
                        </h1>
                        <p class="text-blue-100">Tu hogar en buenas manos</p>
                    </div>
                </a>
            </div>

            <div>
                <h2 class="text-5xl font-bold leading-tight mb-6">
                    Crea tu cuenta y solicita servicios fácilmente
                </h2>

                <p class="text-lg text-blue-100">
                    Regístrate para cotizar, agendar y dar seguimiento a tus servicios del hogar.
                </p>
            </div>

            <p class="text-blue-100 text-sm">
                © 2026 ServiHogar. Todos los derechos reservados.
            </p>
        </section>

        <!-- Lado derecho -->
        <section class="flex items-center justify-center px-6 py-12">
            <div class="w-full max-w-md">

                <div class="text-center mb-8">
                    <a href="/">
                        <img src="{{ asset('imagenes/logo-servihogar.png') }}" alt="ServiHogar" class="h-20 mx-auto mb-4">
                    </a>

                    <h2 class="text-3xl font-bold text-[#1E3A8A]">
                        Crear cuenta
                    </h2>

                    <p class="text-[#334155] mt-2">
                        Regístrate para solicitar servicios en ServiHogar
                    </p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Nombre -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-[#1E3A8A] mb-2">
                            Nombre completo
                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-[#2563EB] focus:ring-[#2563EB]"
                        >

                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-[#1E3A8A] mb-2">
                            Correo electrónico
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="username"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-[#2563EB] focus:ring-[#2563EB]"
                        >

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Contraseña -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-[#1E3A8A] mb-2">
                            Contraseña
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-[#2563EB] focus:ring-[#2563EB]"
                        >

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirmar contraseña -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-[#1E3A8A] mb-2">
                            Confirmar contraseña
                        </label>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-[#2563EB] focus:ring-[#2563EB]"
                        >

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-[#2563EB] text-white py-3 rounded-xl hover:bg-[#1E3A8A] font-semibold transition"
                    >
                        Crear cuenta
                    </button>

                    <p class="text-center text-sm text-[#334155]">
                        ¿Ya tienes cuenta?
                        <a href="{{ route('login') }}" class="text-[#16A34A] font-semibold hover:underline">
                            Inicia sesión aquí
                        </a>
                    </p>
                </form>

            </div>
        </section>

    </main>

</body>
</html>