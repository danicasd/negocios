<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios | ServiHogar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-[#F8FAFC] text-[#334155]">

<header class="bg-white shadow-sm sticky top-0 z-50">
    <nav class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="/" class="flex items-center gap-3">
            <img src="{{ asset('imagenes/logo-servihogar.png') }}" alt="ServiHogar" class="h-10">
            <div>
                <h1 class="text-2xl font-bold text-[#1E3A8A]">
                    Servi<span class="text-[#16A34A]">Hogar</span>
                </h1>
                <p class="text-xs text-[#334155]">Tu hogar en buenas manos</p>
            </div>
        </a>

        <div class="hidden md:flex items-center gap-8">
            <a href="/" class="hover:text-[#2563EB]">Inicio</a>
            <a href="/servicios" class="text-[#2563EB] font-semibold">Servicios</a>
            <a href="/#como-funciona" class="hover:text-[#2563EB]">Cómo funciona</a>
            <a href="/login" class="hover:text-[#2563EB]">Iniciar sesión</a>
            <a href="/register" class="bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A]">
                Registrarse
            </a>
        </div>
    </nav>
</header>

<section class="py-16">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-10">
            <span class="inline-block bg-blue-100 text-[#2563EB] px-4 py-2 rounded-full text-sm font-semibold mb-4">
                Catálogo de servicios
            </span>

            <h2 class="text-4xl font-bold text-[#0F172A] mb-4">
                Servicios disponibles
            </h2>

            <p class="text-[#334155] max-w-2xl mx-auto">
                Explora los servicios que puedes solicitar para tu hogar. Consulta precios base y elige el que necesitas.
            </p>
        </div>

        <!-- Catálogo de servicios -->
<section class="pb-16">
    <div class="max-w-7xl mx-auto px-6">

        <!-- PLOMERÍA -->
        <h3 class="text-2xl font-bold text-[#1E3A8A] mb-6">Plomería</h3>

        <div class="grid md:grid-cols-4 gap-6 mb-12">

            <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition text-center">
                <h4 class="text-xl font-bold mb-2">Reparación de fugas</h4>
                <p class="text-[#334155] mb-3">Baños, cocinas, lavabos y tuberías.</p>
                <p class="font-bold text-[#16A34A] mb-4">Desde $350</p>
                <a href="/login"
                class="inline-block bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A] font-semibold transition">
                    Solicitar servicio
                </a>
            </div>

            <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition text-center">
                <h4 class="text-xl font-bold mb-2">Destape de drenaje</h4>
                <p class="text-[#334155] mb-3">Lavabos, fregaderos y tuberías.</p>
                <p class="font-bold text-[#16A34A] mb-4">Desde $450</p>
                <a href="/login"
                class="inline-block bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A] font-semibold transition">
                    Solicitar servicio
                </a>
            </div>

            <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition text-center">
                <h4 class="text-xl font-bold mb-2">Instalación de grifos</h4>
                <p class="text-[#334155] mb-3">Llaves y mezcladoras.</p>
                <p class="font-bold text-[#16A34A] mb-4">Desde $400</p>
                <a href="/login"
                class="inline-block bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A] font-semibold transition">
                    Solicitar servicio
                </a>
            </div>

            <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition text-center">
            <h4 class="text-xl font-bold mb-2">Reparación de WC</h4>
            <p class="text-[#334155] mb-3">Fugas, tanque, descarga y fallas comunes.</p>
            <p class="font-bold text-[#16A34A] mb-4">Desde $450</p>
            <a href="/login"
                class="inline-block bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A] font-semibold transition">
                    Solicitar servicio
                </a>
</div>
        </div>

        <!-- ELECTRICIDAD -->
        <h3 class="text-2xl font-bold text-[#1E3A8A] mb-6">Electricidad</h3>

        <div class="grid md:grid-cols-3 gap-6 mb-12">

            <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition text-center">
                <h4 class="text-xl font-bold mb-2">Instalación de contactos</h4>
                <p class="text-[#334155] mb-3">Contactos y apagadores.</p>
                <p class="font-bold text-[#16A34A] mb-4">Desde $350</p>
                <a href="/login"
                class="inline-block bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A] font-semibold transition">
                    Solicitar servicio
                </a>
            </div>

            <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition text-center">
                <h4 class="text-xl font-bold mb-2">Instalación de lámparas</h4>
                <p class="text-[#334155] mb-3">Lámparas y focos decorativos.</p>
                <p class="font-bold text-[#16A34A] mb-4">Desde $400</p>
                <a href="/login"
                class="inline-block bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A] font-semibold transition">
                    Solicitar servicio
                </a>
            </div>

            <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition text-center">
                <h4 class="text-xl font-bold mb-2">Revisión de apagones</h4>
                <p class="text-[#334155] mb-3">Diagnóstico básico eléctrico.</p>
                <p class="font-bold text-[#16A34A] mb-4">Desde $500</p>
                <a href="/login"
                class="inline-block bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A] font-semibold transition">
                    Solicitar servicio
                </a>
            </div>
        </div>

        <!-- LIMPIEZA -->
        <h3 class="text-2xl font-bold text-[#1E3A8A] mb-6">Limpieza</h3>

        <div class="grid md:grid-cols-3 gap-6 mb-12">

            <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition text-center">
                <h4 class="text-xl font-bold mb-2">Limpieza básica</h4>
                <p class="text-[#334155] mb-3">Limpieza general del hogar.</p>
                <p class="font-bold text-[#16A34A] mb-4">Desde $500</p>
                <a href="/login"
                class="inline-block bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A] font-semibold transition">
                    Solicitar servicio
                </a>
            </div>

            <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition text-center">
                <h4 class="text-xl font-bold mb-2">Limpieza profunda</h4>
                <p class="text-[#334155] mb-3">Cocina, baño y áreas difíciles.</p>
                <p class="font-bold text-[#16A34A] mb-4">Desde $800</p>
                <a href="/login"
                class="inline-block bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A] font-semibold transition">
                    Solicitar servicio
                </a>
            </div>

            <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition text-center">
                <h4 class="text-xl font-bold mb-2">Limpieza post obra</h4>
                <p class="text-[#334155] mb-3">Polvo, residuos y acabados.</p>
                <p class="font-bold text-[#16A34A] mb-4">Desde $1200</p>
                <a href="/login"
                class="inline-block bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A] font-semibold transition">
                    Solicitar servicio
                </a>
            </div>
        </div>

        <!-- SOPORTE TÉCNICO -->
<h3 class="text-2xl font-bold text-[#1E3A8A] mb-6">Soporte técnico</h3>

<div class="grid md:grid-cols-3 gap-6 mb-12">

    <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition text-center">
        <h4 class="text-xl font-bold mb-2">Mantenimiento de computadora</h4>
        <p class="text-[#334155] mb-3">Limpieza, optimización y revisión general.</p>
        <p class="font-bold text-[#16A34A] mb-4">Desde $350</p>
        <a href="/login"
                class="inline-block bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A] font-semibold transition">
                    Solicitar servicio
                </a>
    </div>

    <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition text-center">
        <h4 class="text-xl font-bold mb-2">Formateo e instalación</h4>
        <p class="text-[#334155] mb-3">Sistema operativo y configuración básica.</p>
        <p class="font-bold text-[#16A34A] mb-4">Desde $500</p>
        <a href="/login"
                class="inline-block bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A] font-semibold transition">
                    Solicitar servicio
                </a>
    </div>

    <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition text-center">
        <h4 class="text-xl font-bold mb-2">Configuración WiFi</h4>
        <p class="text-[#334155] mb-3">Router, internet y red doméstica.</p>
        <p class="font-bold text-[#16A34A] mb-4">Desde $400</p>
       <a href="/login"
                class="inline-block bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A] font-semibold transition">
                    Solicitar servicio
                </a>
    </div>

</div>

<!-- CÁMARAS -->
<h3 class="text-2xl font-bold text-[#1E3A8A] mb-6">Cámaras</h3>

<div class="grid md:grid-cols-4 gap-6 mb-12">

    <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition text-center">
        <h4 class="text-xl font-bold mb-2">Instalación de cámara</h4>
        <p class="text-[#334155] mb-3">Montaje y configuración básica.</p>
        <p class="font-bold text-[#16A34A] mb-4">Desde $700</p>
        <a href="/login"
                class="inline-block bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A] font-semibold transition">
                    Solicitar servicio
                </a>
    </div>

    <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition text-center">
        <h4 class="text-xl font-bold mb-2">Kit de cámaras</h4>
        <p class="text-[#334155] mb-3">Instalación de sistema múltiple.</p>
        <p class="font-bold text-[#16A34A] mb-4">Desde $1500</p>
        <a href="/login"
                class="inline-block bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A] font-semibold transition">
                    Solicitar servicio
                </a>
    </div>

    <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition text-center">
        <h4 class="text-xl font-bold mb-2">Configuración de app</h4>
        <p class="text-[#334155] mb-3">Acceso remoto y monitoreo móvil.</p>
        <p class="font-bold text-[#16A34A] mb-4">Desde $350</p>
        <a href="/login"
                class="inline-block bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A] font-semibold transition">
                    Solicitar servicio
                </a>
    </div>

    <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition text-center">
        <h4 class="text-xl font-bold mb-2">Revisión de sistema de seguridad</h4>
        <p class="text-[#334155] mb-3">Diagnóstico de cámaras, conexiones y funcionamiento.</p>
        <p class="font-bold text-[#16A34A] mb-4">Desde $600</p>
        <a href="/login"
                class="inline-block bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A] font-semibold transition">
                    Solicitar servicio
                </a>
    </div>

</div>

<!-- MANTENIMIENTO GENERAL -->
<h3 class="text-2xl font-bold text-[#1E3A8A] mb-6">Mantenimiento general</h3>

<div class="grid md:grid-cols-4 gap-6 mb-12">

    <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition text-center">
        <h4 class="text-xl font-bold mb-2">Reparaciones menores</h4>
        <p class="text-[#334155] mb-3">Ajustes y arreglos básicos del hogar.</p>
        <p class="font-bold text-[#16A34A] mb-4">Desde $400</p>
        <a href="/login"
                class="inline-block bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A] font-semibold transition">
                    Solicitar servicio
                </a>
    </div>

    <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition text-center">
        <h4 class="text-xl font-bold mb-2">Armado de muebles</h4>
        <p class="text-[#334155] mb-3">Ensamble de muebles nuevos.</p>
        <p class="font-bold text-[#16A34A] mb-4">Desde $450</p>
        <a href="/login"
                class="inline-block bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A] font-semibold transition">
                    Solicitar servicio
                </a>
    </div>

    <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition text-center">
        <h4 class="text-xl font-bold mb-2">Instalación de repisas</h4>
        <p class="text-[#334155] mb-3">Montaje seguro en muro.</p>
        <p class="font-bold text-[#16A34A] mb-4">Desde $350</p>
        <a href="/login"
                class="inline-block bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A] font-semibold transition">
                    Solicitar servicio
                </a>
    </div>

    <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition text-center">
    <h4 class="text-xl font-bold mb-2">Pintura básica por habitación</h4>
    <p class="text-[#334155] mb-3">Aplicación de pintura interior en una habitación estándar.</p>
    <p class="font-bold text-[#16A34A] mb-4">Desde $1000</p>
    <a href="/login"
                class="inline-block bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A] font-semibold transition">
                    Solicitar servicio
                </a>
</div>

</div>

    </div>
</section>
    </div>
</section>

<footer class="bg-[#1E3A8A] text-white py-8">
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between gap-6">
        <div>
            <h2 class="text-2xl font-bold">Servi<span class="text-[#16A34A]">Hogar</span></h2>
            <p class="text-blue-100">Tu hogar en buenas manos.</p>
        </div>

        <div class="text-blue-100">
            <p>Contacto: contacto@servihogar.com</p>
            <p>Teléfono: 55 1234 5678</p>
            <p>© 2026 ServiHogar. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>

<script>
    lucide.createIcons();
</script>

</body>
</html>