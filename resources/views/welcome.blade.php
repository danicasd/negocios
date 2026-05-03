<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiHogar | Tu hogar en buenas manos</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-[#F8FAFC] text-[#334155]">

<!-- Navbar -->
<header class="bg-white shadow-sm sticky top-0 z-50">
    <nav class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="/" class="flex items-center gap-3">
            <img src="{{ asset('imagenes/logo-servihogar.png') }}" alt="Logo ServiHogar" class="h-12 w-auto">

            <div>
                <h1 class="text-2xl font-bold text-[#1E3A8A]">
                    Servi<span class="text-[#16A34A]">Hogar</span>
                </h1>

                <p class="text-xs text-[#334155]">Tu hogar en buenas manos</p>
            </div>
        </a>

        <div class="space-x-6 hidden md:flex items-center">
            <a href="/" class="hover:text-[#2563EB]">Inicio</a>
            <a href="/servicios" class="hover:text-[#2563EB]">Servicios</a>
            <a href="#como-funciona" class="hover:text-[#2563EB]">Cómo funciona</a>
            <a href="/login" class="hover:text-[#2563EB]">Iniciar sesión</a>

            <a href="/register"
               class="bg-[#2563EB] text-white px-5 py-2 rounded-xl hover:bg-[#1E3A8A]">
                Registrarse
            </a>
        </div>
    </nav>
</header>

<!-- Hero -->
<section class="bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-12 items-center">

        <div>
            <span class="inline-block bg-blue-100 text-[#2563EB] px-4 py-2 rounded-full text-sm font-semibold mb-5">
                Servicios confiables para tu hogar
            </span>

            <h2 class="text-5xl font-bold leading-tight text-[#0F172A] mb-6">
                Tu hogar en buenas manos
            </h2>

            <p class="text-lg mb-8">
                En ServiHogar puedes solicitar servicios de plomería, electricidad,
                limpieza, soporte técnico y mantenimiento de forma rápida,
                sencilla y segura.
            </p>

            <div class="flex flex-wrap gap-4">
                <a href="/login"
                   class="bg-[#2563EB] text-white px-6 py-3 rounded-xl hover:bg-[#1E3A8A] font-semibold">
                    Solicitar servicio
                </a>

                <a href="#como-funciona"
                   class="border border-[#2563EB] text-[#2563EB] px-6 py-3 rounded-xl hover:bg-blue-50 font-semibold">
                    Ver cómo funciona
                </a>
            </div>
        </div>

        <div class="bg-white rounded-3xl p-10 shadow-md border border-blue-100 text-center">
            <img src ="{{ asset('imagenes/promo.png') }}" class="w-full h-[350px] object-cover"
                 alt="ServiHogar"
                 class="h-48 mx-auto mb-6">

            <h3 class="text-2xl font-bold text-[#1E3A8A] mb-3">
                Soluciones rápidas y profesionales
            </h3>

            <p>
                Agenda servicios para tu casa con proveedores confiables
                y seguimiento desde la plataforma.
            </p>
        </div>

    </div>
</section>

<!-- Servicios principales -->
<section id="servicios" class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-3xl font-bold text-center text-[#0F172A] mb-3">
            Servicios principales
        </h2>

        <p class="text-center mb-10">
            Elige el servicio que necesitas y cotiza en pocos pasos.
        </p>

        <div class="grid md:grid-cols-3 gap-6">

            <!-- Card -->
            <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition-all duration-300 text-center">
                <div class="mb-4 flex justify-center text-[#2563EB]">
                    <i data-lucide="droplets" class="w-10 h-10"></i>
                </div>

                <h3 class="text-xl font-bold text-[#1E3A8A] mb-2">Plomería</h3>
                <p>Reparación de fugas, tuberías, baños e instalaciones.</p>
            </div>

            <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition-all duration-300 text-center">
                <div class="mb-4 flex justify-center text-[#16A34A]">
                    <i data-lucide="lightbulb" class="w-10 h-10"></i>
                </div>

                <h3 class="text-xl font-bold text-[#1E3A8A] mb-2">Electricidad</h3>
                <p>Instalación de contactos, lámparas y revisiones.</p>
            </div>

            <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition-all duration-300 text-center">
                <div class="mb-4 flex justify-center text-[#2563EB]">
                    <i data-lucide="brush-cleaning" class="w-10 h-10"></i>
                </div>

                <h3 class="text-xl font-bold text-[#1E3A8A] mb-2">Limpieza</h3>
                <p>Limpieza general, profunda y para espacios específicos.</p>
            </div>

            <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition-all duration-300 text-center">
                <div class="mb-4 flex justify-center text-[#16A34A]">
                    <i data-lucide="monitor" class="w-10 h-10"></i>
                </div>

                <h3 class="text-xl font-bold text-[#1E3A8A] mb-2">Soporte técnico</h3>
                <p>Mantenimiento de computadoras, redes y configuración.</p>
            </div>

            <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition-all duration-300 text-center">
                <div class="mb-4 flex justify-center text-[#2563EB]">
                    <i data-lucide="cctv" class="w-10 h-10"></i>
                </div>

                <h3 class="text-xl font-bold text-[#1E3A8A] mb-2">Cámaras</h3>
                <p>Instalación de cámaras de seguridad para casa o negocio.</p>
            </div>

            <div class="group bg-[#F8FAFC] p-8 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] hover:shadow-lg transition-all duration-300 text-center">
                <div class="mb-4 flex justify-center text-[#16A34A]">
                    <i data-lucide="wrench" class="w-10 h-10"></i>
                </div>

                <h3 class="text-xl font-bold text-[#1E3A8A] mb-2">Mantenimiento</h3>
                <p>Servicios preventivos y correctivos para el hogar.</p>
            </div>

        </div>
    </div>
</section>

<!-- Servicios populares -->
<section class="py-16 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-3xl font-bold text-center text-[#0F172A] mb-3">
            Servicios populares
        </h2>

        <p class="text-center mb-10">
            Los servicios más solicitados por nuestros clientes.
        </p>

        <div class="grid md:grid-cols-3 gap-6">

            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <h3 class="text-xl font-bold text-[#1E3A8A] mb-2">Reparación de fugas</h3>
                <p class="mb-4">Atención para fugas en baños, cocinas y tuberías.</p>
                <p class="font-bold text-[#16A34A] mb-4">Desde $350</p>
                <a href="/login" class="text-[#2563EB] font-semibold">Solicitar servicio →</a>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <h3 class="text-xl font-bold text-[#1E3A8A] mb-2">Instalación eléctrica</h3>
                <p class="mb-4">Colocación de contactos, lámparas y apagadores.</p>
                <p class="font-bold text-[#16A34A] mb-4">Desde $400</p>
                <a href="/login" class="text-[#2563EB] font-semibold">Solicitar servicio →</a>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <h3 class="text-xl font-bold text-[#1E3A8A] mb-2">Limpieza profunda</h3>
                <p class="mb-4">Limpieza detallada para casa u oficina.</p>
                <p class="font-bold text-[#16A34A] mb-4">Desde $500</p>
                <a href="/login" class="text-[#2563EB] font-semibold">Solicitar servicio →</a>
            </div>

        </div>
    </div>
</section>

<!-- Cómo funciona -->
<section id="como-funciona" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-3xl font-bold text-center text-[#0F172A] mb-3">
            ¿Cómo funciona ServiHogar?
        </h2>

        <p class="text-center mb-10">
            Solicita un servicio en pocos pasos.
        </p>

        <div class="grid md:grid-cols-3 gap-6 text-center">

            <div class="p-8 rounded-2xl bg-[#F8FAFC] shadow-sm">
                <div class="text-5xl mb-4">1️⃣</div>
                <h3 class="text-xl font-bold text-[#1E3A8A] mb-2">Elige un servicio</h3>
                <p>Selecciona la categoría que necesitas.</p>
            </div>

            <div class="p-8 rounded-2xl bg-[#F8FAFC] shadow-sm">
                <div class="text-5xl mb-4">2️⃣</div>
                <h3 class="text-xl font-bold text-[#1E3A8A] mb-2">Cotiza y agenda</h3>
                <p>Obtén precio estimado y fecha disponible.</p>
            </div>

            <div class="p-8 rounded-2xl bg-[#F8FAFC] shadow-sm">
                <div class="text-5xl mb-4">3️⃣</div>
                <h3 class="text-xl font-bold text-[#1E3A8A] mb-2">Confirma</h3>
                <p>Recibe seguimiento desde la plataforma.</p>
            </div>

        </div>
    </div>
</section>

<!-- Opiniones -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-[#0F172A] mb-3">
            Opiniones de clientes
        </h2>

        <p class="text-center text-[#334155] mb-10">
            Experiencias de personas que confiaron en ServiHogar.
        </p>

        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-[#F8FAFC] p-6 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] transition-all duration-300">
                <p class="text-[#334155] mb-4">
                    “Solicité una reparación de fuga y el proceso fue rápido y claro.”
                </p>
                <h4 class="font-bold text-[#1E3A8A]">Mariana G.</h4>
                <p class="text-sm text-[#16A34A]">Plomería</p>
            </div>

            <div class="bg-[#F8FAFC] p-6 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] transition-all duration-300">
                <p class="text-[#334155] mb-4">
                    “Me gustó ver el precio base antes de solicitar el servicio.”
                </p>
                <h4 class="font-bold text-[#1E3A8A]">Carlos R.</h4>
                <p class="text-sm text-[#16A34A]">Electricidad</p>
            </div>

            <div class="bg-[#F8FAFC] p-6 rounded-2xl shadow-sm border border-transparent hover:border-[#2563EB] transition-all duration-300">
                <p class="text-[#334155] mb-4">
                    “La plataforma es sencilla y me ayudó a encontrar el servicio que necesitaba.”
                </p>
                <h4 class="font-bold text-[#1E3A8A]">Andrea L.</h4>
                <p class="text-sm text-[#16A34A]">Limpieza</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-16 bg-[#F8FAFC]">
    <div class="max-w-4xl mx-auto px-6 text-center">

        <h2 class="text-3xl font-bold text-[#0F172A] mb-4">
            ¿Necesitas ayuda en casa?
        </h2>

        <p class="mb-8">
            Solicita servicios confiables de forma rápida y sencilla.
        </p>

        <a href="/servicios"
           class="bg-[#2563EB] text-white px-8 py-3 rounded-xl hover:bg-[#1E3A8A] font-semibold">
            Ver servicios disponibles
        </a>
    </div>
</section>

<!-- Footer -->
<footer class="bg-[#1E3A8A] text-white py-8">
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between gap-6">

        <div>
            <h2 class="text-2xl font-bold">
                Servi<span class="text-[#16A34A]">Hogar</span>
            </h2>
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