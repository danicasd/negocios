<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-6xl mx-auto px-6">

            <div class="mb-8">
                <span class="inline-block bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    Agendar servicio
                </span>

                <h1 class="text-4xl font-bold text-gray-900">
                    Elige fecha y horario
                </h1>

                <p class="text-gray-600 mt-2">
                    Selecciona cuándo quieres que el técnico acuda a tu domicilio.
                </p>
            </div>

            <form action="{{ route('cliente.agendar.guardar') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <!-- Formulario -->
                    <div class="lg:col-span-2 bg-white rounded-3xl shadow-sm border border-gray-100 p-8">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Fecha del servicio
                                </label>

                                <input type="date"
                                       id="fecha"
                                       name="fecha"
                                       value="{{ old('fecha') }}"
                                       class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                                @error('fecha')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Hora disponible
                                </label>

                                <select id="hora"
                                        name="hora"
                                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                    <option value="09:00 AM" {{ old('hora') == '09:00 AM' ? 'selected' : '' }}>09:00 AM</option>
                                    <option value="10:00 AM" {{ old('hora') == '10:00 AM' ? 'selected' : '' }}>10:00 AM</option>
                                    <option value="11:00 AM" {{ old('hora') == '11:00 AM' ? 'selected' : '' }}>11:00 AM</option>
                                    <option value="12:00 PM" {{ old('hora') == '12:00 PM' ? 'selected' : '' }}>12:00 PM</option>
                                    <option value="01:00 PM" {{ old('hora') == '01:00 PM' ? 'selected' : '' }}>01:00 PM</option>
                                    <option value="03:00 PM" {{ old('hora') == '03:00 PM' ? 'selected' : '' }}>03:00 PM</option>
                                    <option value="04:00 PM" {{ old('hora') == '04:00 PM' ? 'selected' : '' }}>04:00 PM</option>
                                    <option value="05:00 PM" {{ old('hora') == '05:00 PM' ? 'selected' : '' }}>05:00 PM</option>
                                </select>

                                @error('hora')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Comentarios adicionales
                                </label>

                                <textarea name="comentarios"
                                          rows="5"
                                          class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                          placeholder="Ej. El problema está en el baño principal, favor de traer herramienta para tubería.">{{ old('comentarios') }}</textarea>

                                @error('comentarios')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <!-- Resumen -->
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 h-fit">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">
                            Resumen de solicitud
                        </h2>

                        <div class="space-y-5 text-sm">

                            <div>
                                <p class="text-gray-500">Servicio</p>
                                <p class="font-semibold text-gray-900">
                                    {{ $cotizacion['service_name'] }}
                                </p>
                            </div>

                            <div>
                                <p class="text-gray-500">Dirección</p>
                                <p class="font-semibold text-gray-900">
                                    {{ $address->calle }} {{ $address->external_number }},
                                    {{ $address->colonia }}, {{ $address->alcaldia }}
                                </p>
                            </div>

                            <div>
                                <p class="text-gray-500">Fecha</p>
                                <p id="resumen-fecha" class="font-semibold text-gray-900">
                                    Selecciona una fecha
                                </p>
                            </div>

                            <div>
                                <p class="text-gray-500">Hora</p>
                                <p id="resumen-hora" class="font-semibold text-gray-900">
                                    09:00 AM
                                </p>
                            </div>

                            <div>
                                <p class="text-gray-500">Precio estimado</p>
                                <p class="text-2xl font-bold text-green-600">
                                    ${{ number_format($cotizacion['total'], 2) }}
                                </p>
                            </div>

                        </div>

                        <div class="mt-6 bg-blue-50 border border-blue-100 rounded-2xl p-4">
                            <p class="text-sm text-blue-700">
                                La disponibilidad puede variar según la zona y la carga de trabajo del técnico.
                            </p>
                        </div>

                        <div class="mt-10 pt-6 border-t border-gray-100 flex items-center justify-between">
                            <a href="{{ route('cliente.direccion') }}"
                               class="text-base text-blue-600 hover:text-blue-700 font-semibold transition">
                                Volver
                            </a>

                            <button type="submit"
                                    class="bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition shadow-sm">
                                Continuar
                            </button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>

    <script>
        const fecha = document.getElementById('fecha');
        const hora = document.getElementById('hora');

        const resumenFecha = document.getElementById('resumen-fecha');
        const resumenHora = document.getElementById('resumen-hora');

        function actualizarResumenAgenda() {
            if (fecha.value) {
                const fechaSeleccionada = new Date(fecha.value + 'T00:00:00');

                resumenFecha.textContent = fechaSeleccionada.toLocaleDateString('es-MX', {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                });
            } else {
                resumenFecha.textContent = 'Selecciona una fecha';
            }

            resumenHora.textContent = hora.value;
        }

        fecha.addEventListener('change', actualizarResumenAgenda);
        hora.addEventListener('change', actualizarResumenAgenda);

        actualizarResumenAgenda();
    </script>
</x-app-layout>