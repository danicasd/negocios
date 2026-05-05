<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <section class="bg-gradient-to-br from-blue-50 via-white to-green-50 py-14 ">
            <div class="max-w-7xl mx-auto px-6">
                <div class="max-w-3xl">
                    <span class="inline-block bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold mb-4 ">
                        Catálogo para clientes
                    </span>

                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                        ¿Qué necesita tu hogar hoy?
                    </h1>

                    <p class="text-lg text-gray-600">
                        Elige un servicio, revisa el precio base y cotiza en segundos.
                    </p>
                </div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto px-6 py-10">
            <!-- Filtros visuales -->
            <div class="flex flex-wrap gap-3 mb-10">
                <button class="bg-blue-600 text-white px-5 py-2 rounded-full font-semibold shadow-sm">
                    Todos
                </button>
                <button class="bg-white text-gray-700 px-5 py-2 rounded-full font-semibold border hover:border-blue-500 hover:text-blue-600 transition">
                    Plomería
                </button>
                <button class="bg-white text-gray-700 px-5 py-2 rounded-full font-semibold border hover:border-blue-500 hover:text-blue-600 transition">
                    Electricidad
                </button>
                <button class="bg-white text-gray-700 px-5 py-2 rounded-full font-semibold border hover:border-blue-500 hover:text-blue-600 transition">
                    Limpieza
                </button>
                <button class="bg-white text-gray-700 px-5 py-2 rounded-full font-semibold border hover:border-blue-500 hover:text-blue-600 transition">
                    Soporte técnico
                </button>
            </div>

            <!-- Grid de servicios -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Card -->
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition">
                    <div class="h-40 bg-blue-50 flex items-center justify-center">
                        <span class="text-6xl">🔧</span>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                                Plomería
                            </span>
                            <span class="text-sm text-gray-500">
                                1-2 hrs
                            </span>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            Reparación de fugas
                        </h3>

                        <p class="text-gray-600 mb-5">
                            Solución para fugas en baños, cocinas, lavabos y tuberías.
                        </p>

                        <div class="flex items-end justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Desde</p>
                                <p class="text-2xl font-bold text-green-600">$350</p>
                            </div>

                            <a href="{{ route('cliente.cotizar', 'reparacion-de-fugas') }}"
                               class="bg-blue-600 text-white px-5 py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
                                Cotizar
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition">
                    <div class="h-40 bg-green-50 flex items-center justify-center">
                        <span class="text-6xl">🚿</span>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                                Plomería
                            </span>
                            <span class="text-sm text-gray-500">1-3 hrs</span>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            Destape de drenaje
                        </h3>

                        <p class="text-gray-600 mb-5">
                            Destape de lavabos, fregaderos, coladeras y tuberías.
                        </p>

                        <div class="flex items-end justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Desde</p>
                                <p class="text-2xl font-bold text-green-600">$450</p>
                            </div>

                            <a href="{{ route('cliente.cotizar', 'destape-de-drenaje') }}"
                               class="bg-blue-600 text-white px-5 py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
                                Cotizar
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition">
                    <div class="h-40 bg-yellow-50 flex items-center justify-center">
                        <span class="text-6xl">💡</span>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                                Electricidad
                            </span>
                            <span class="text-sm text-gray-500">1-2 hrs</span>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            Instalación eléctrica
                        </h3>

                        <p class="text-gray-600 mb-5">
                            Instalación de contactos, apagadores, lámparas y revisiones básicas.
                        </p>

                        <div class="flex items-end justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Desde</p>
                                <p class="text-2xl font-bold text-green-600">$400</p>
                            </div>

                            <a href="{{ route('cliente.cotizar', 'instalacion-electrica') }}"
                               class="bg-blue-600 text-white px-5 py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
                                Cotizar
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition">
                    <div class="h-40 bg-purple-50 flex items-center justify-center">
                        <span class="text-6xl">🧹</span>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                                Limpieza
                            </span>
                            <span class="text-sm text-gray-500">2-4 hrs</span>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            Limpieza general
                        </h3>

                        <p class="text-gray-600 mb-5">
                            Limpieza completa para casas, departamentos y espacios pequeños.
                        </p>

                        <div class="flex items-end justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Desde</p>
                                <p class="text-2xl font-bold text-green-600">$500</p>
                            </div>

                            <a href="{{ route('cliente.cotizar', 'limpieza-general') }}"
                               class="bg-blue-600 text-white px-5 py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
                                Cotizar
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition">
                    <div class="h-40 bg-red-50 flex items-center justify-center">
                        <span class="text-6xl">🛠️</span>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                                Mantenimiento
                            </span>
                            <span class="text-sm text-gray-500">2-3 hrs</span>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            Pintura básica
                        </h3>

                        <p class="text-gray-600 mb-5">
                            Pintura básica por habitación con diagnóstico previo.
                        </p>

                        <div class="flex items-end justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Desde</p>
                                <p class="text-2xl font-bold text-green-600">$650</p>
                            </div>

                            <a href="{{ route('cliente.cotizar', 'pintura-basica') }}"
                               class="bg-blue-600 text-white px-5 py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
                                Cotizar
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition">
                    <div class="h-40 bg-indigo-50 flex items-center justify-center">
                        <span class="text-6xl">💻</span>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                                Soporte técnico
                            </span>
                            <span class="text-sm text-gray-500">1-2 hrs</span>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            Mantenimiento de equipo
                        </h3>

                        <p class="text-gray-600 mb-5">
                            Revisión, limpieza y diagnóstico básico de computadora.
                        </p>

                        <div class="flex items-end justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Desde</p>
                                <p class="text-2xl font-bold text-green-600">$450</p>
                            </div>

                            <a href="{{ route('cliente.cotizar', 'mantenimiento-de-equipo') }}"
                               class="bg-blue-600 text-white px-5 py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
                                Cotizar
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
</x-app-layout>