<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión | ServiHogar</title>

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
                    Accede a servicios confiables para tu hogar
                </h2>

                <p class="text-lg text-blue-100">
                    Solicita, agenda y da seguimiento a tus servicios desde una sola plataforma.
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
                        Iniciar sesión
                    </h2>

                    <p class="text-[#334155] mt-2">
                        Accede a tu cuenta para solicitar servicios
                    </p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

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
                            autofocus
                            autocomplete="username"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-[#2563EB] focus:ring-[#2563EB]"
                        >

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-[#1E3A8A] mb-2">
                            Contraseña
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-[#2563EB] focus:ring-[#2563EB]"
                        >

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input
                                id="remember_me"
                                type="checkbox"
                                name="remember"
                                class="rounded border-gray-300 text-[#2563EB] focus:ring-[#2563EB]"
                            >

                            <span class="ms-2 text-sm text-[#334155]">
                                Recordarme
                            </span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-[#2563EB] hover:underline">
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-[#2563EB] text-white py-3 rounded-xl hover:bg-[#1E3A8A] font-semibold transition"
                    >
                        Iniciar sesión
                    </button>

                    <p class="text-center text-sm text-[#334155]">
                        ¿No tienes cuenta?
                        <a href="{{ route('register') }}" class="text-[#16A34A] font-semibold hover:underline">
                            Regístrate aquí
                        </a>
                    </p>
                </form>

            </div>
        </section>

    </main>

</body>
</html>