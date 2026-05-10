<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-16">

        <div class="max-w-3xl mx-auto px-6">

            <!-- Card principal -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-10 text-center">

                <!-- Icono -->
                <div class="w-24 h-24 mx-auto rounded-full bg-green-100 flex items-center justify-center mb-6">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-12 h-12 text-green-600"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M5 13l4 4L19 7" />

                    </svg>

                </div>

                <!-- Título -->
                <h1 class="text-4xl font-bold text-gray-900 mb-4">
                    ¡Servicio confirmado!
                </h1>

                <!-- Descripción -->
                <p class="text-gray-600 text-lg leading-relaxed max-w-2xl mx-auto">
                    Tu anticipo fue registrado correctamente y la solicitud ya está siendo procesada.
                    Un técnico confirmará los detalles antes de acudir a tu domicilio.
                </p>

            </div>

            <!-- Resumen -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 mt-8">

                <h2 class="text-2xl font-bold text-gray-900 mb-8">
                    Resumen de la solicitud
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    <!-- Servicio -->
                    <div>
                        <p class="text-sm text-gray-500 mb-2">
                            Servicio
                        </p>

                        <p class="text-lg font-semibold text-gray-900">
                            {{ $booking->service->name }}
                        </p>
                    </div>

                    <!-- Fecha -->
                    <div>
                        <p class="text-sm text-gray-500 mb-2">
                            Fecha
                        </p>

                        <p class="text-lg font-semibold text-gray-900">
                            {{ \Carbon\Carbon::parse($booking->scheduled_at)->translatedFormat('d \d\e F \d\e Y') }}
                        </p>
                    </div>

                    <!-- Hora -->
                    <div>
                        <p class="text-sm text-gray-500 mb-2">
                            Hora
                        </p>

                        <p class="text-lg font-semibold text-gray-900">
                            {{ \Carbon\Carbon::parse($booking->scheduled_at)->format('h:i A') }}
                        </p>
                    </div>

                    <!-- Estado -->
                    <div>
                        <p class="text-sm text-gray-500 mb-2">
                            Estado
                        </p>

                        <span class="inline-flex items-center px-4 py-2 rounded-full bg-blue-100 text-blue-700 text-sm font-semibold">
                            Solicitud confirmada
                        </span>
                    </div>

                </div>

                <!-- Dirección -->
                <div class="mt-8 pt-8 border-t border-gray-100">

                    <p class="text-sm text-gray-500 mb-3">
                        Dirección del servicio
                    </p>

                    <p class="text-lg font-semibold text-gray-900 leading-relaxed">

                        {{ $booking->address->calle }}
                        {{ $booking->address->external_number }},

                        {{ $booking->address->colonia }},
                        {{ $booking->address->alcaldia }},

                        {{ $booking->address->estado }},
                        CP {{ $booking->address->postal_code }}

                    </p>

                </div>

                <!-- Pago -->
                <div class="mt-8 pt-8 border-t border-gray-100">

                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                        <div>

                            <p class="text-sm text-gray-500 mb-2">
                                Anticipo pagado
                            </p>

                            <p class="text-4xl font-bold text-green-600">
                                ${{ number_format(optional($booking->payments()->first())->amount ?? 0, 2) }}
                            </p>

                        </div>

                        <div class="bg-blue-50 border border-blue-100 rounded-2xl p-5 text-left max-w-sm">

                            <p class="text-sm font-semibold text-blue-700 mb-2">
                                Próximo paso
                            </p>

                            <p class="text-sm text-blue-700 leading-relaxed">
                                El técnico revisará la solicitud y se pondrá en contacto contigo
                                para confirmar detalles adicionales del servicio.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Botones -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mt-10">

                <a href="{{ route('dashboard') }}"
                   class="px-8 py-4 bg-blue-600 text-white rounded-2xl font-semibold hover:bg-blue-700 transition shadow-sm text-center">

                    Ir al dashboard

                </a>

                <a href="{{ route('cliente.mis-servicios') }}"
                   class="px-8 py-4 border border-gray-300 text-gray-700 rounded-2xl font-semibold hover:bg-gray-50 transition text-center">

                    Ver mis servicios

                </a>

            </div>

        </div>

    </div>
</x-app-layout>