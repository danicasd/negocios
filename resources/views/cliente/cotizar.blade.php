<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-6xl mx-auto px-6">

            <div class="mb-8">
                <span class="inline-block bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    Cotizador
                </span>

                <h1 class="text-4xl font-bold text-gray-900">
                    Personaliza tu servicio
                </h1>

                <p class="text-gray-600 mt-2">
                    Elige las opciones que mejor se ajusten a tu necesidad.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Formulario -->
                <div class="lg:col-span-2 bg-white rounded-3xl shadow-sm border border-gray-100 p-8">

                    <div class="mb-8">
                        <p class="text-sm text-blue-600 font-semibold mb-1">
                            Servicio seleccionado
                        </p>

                        <h2 class="text-2xl font-bold text-gray-900 capitalize">
                            {{ str_replace('-', ' ', $servicio) }}
                        </h2>

                        <p class="text-gray-500 mt-1">
                            Precio base: $<span id="precio-base">300</span>
                        </p>
                    </div>

                    <div class="space-y-6">

                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-2">
                                ¿Qué tan urgente es?
                            </label>

                            <select id="urgencia"
                                    class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                <option value="0">Normal — sin costo extra</option>
                                <option value="150">Urgente — +$150</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-2">
                                Nivel de complejidad
                            </label>

                            <select id="complejidad"
                                    class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                <option value="0">Básico — sin costo extra</option>
                                <option value="100">Medio — +$100</option>
                                <option value="200">Alto — +$200</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-2">
                                Zona del servicio
                            </label>

                            <select id="zona"
                                    class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                <option value="0">Zona estándar — sin costo extra</option>
                                <option value="100">Zona lejana — +$100</option>
                            </select>
                        </div>

                    </div>

                    
                </div>

                <!-- Resumen -->
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 h-fit sticky top-24">

                    <h3 class="text-xl font-bold text-gray-900 mb-6">
                        Resumen
                    </h3>

                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-500">Precio base</span>
                            <span class="font-semibold text-gray-800">$300</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-500">Urgencia</span>
                            <span id="extra-urgencia" class="font-semibold text-gray-800">$0</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-500">Complejidad</span>
                            <span id="extra-complejidad" class="font-semibold text-gray-800">$0</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-500">Zona</span>
                            <span id="extra-zona" class="font-semibold text-gray-800">$0</span>
                        </div>
                    </div>

                    <div class="border-t border-gray-100 mt-6 pt-6 flex justify-between items-center">
                        <span class="text-gray-700 font-semibold">
                            Total estimado
                        </span>

                        <span id="total" class="text-3xl font-bold text-green-600">
                            $300
                        </span>
                    </div>

                    <p class="text-xs text-gray-500 mt-4">
                        El precio final puede ajustarse después de la revisión del técnico.
                    </p>

                    
                    <div class="mt-10 pt-6 border-t border-gray-100 flex items-center justify-between">

                            <!-- Volver (ligero) -->
                        <a href="{{ route('cliente.catalogo') }}"
                            class="text-base text-blue-600 hover:text-blue-700 font-semibold transition font-medium">
                                Volver al catálogo
                            </a>

                            <!-- Continuar (fuerte) -->
                            <a href="{{ route('cliente.direccion') }}"
                            class="bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition shadow-sm">
                                Continuar
                            </a>

                    </div>
                </div>


            </div>
        </div>
    </div>

    <script>
        const precioBase = 300;

        const urgencia = document.getElementById('urgencia');
        const complejidad = document.getElementById('complejidad');
        const zona = document.getElementById('zona');

        const total = document.getElementById('total');
        const extraUrgencia = document.getElementById('extra-urgencia');
        const extraComplejidad = document.getElementById('extra-complejidad');
        const extraZona = document.getElementById('extra-zona');

        function formatoPrecio(valor) {
            return '$' + valor;
        }

        function calcularTotal() {
            const valorUrgencia = parseInt(urgencia.value);
            const valorComplejidad = parseInt(complejidad.value);
            const valorZona = parseInt(zona.value);

            const suma = precioBase + valorUrgencia + valorComplejidad + valorZona;

            extraUrgencia.textContent = formatoPrecio(valorUrgencia);
            extraComplejidad.textContent = formatoPrecio(valorComplejidad);
            extraZona.textContent = formatoPrecio(valorZona);
            total.textContent = formatoPrecio(suma);
        }

        urgencia.addEventListener('change', calcularTotal);
        complejidad.addEventListener('change', calcularTotal);
        zona.addEventListener('change', calcularTotal);

        calcularTotal();
    </script>
</x-app-layout>