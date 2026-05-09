<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-6xl mx-auto px-6">

            <div class="mb-8">
                <span class="inline-block bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    Confirmación
                </span>

                <h1 class="text-4xl font-bold text-gray-900">
                    Revisa tu solicitud
                </h1>

                <p class="text-gray-600 mt-2">
                    Verifica que toda la información sea correcta antes de continuar.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Detalles -->
                <div class="lg:col-span-2 space-y-6">

                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">
                            Detalles del servicio
                        </h2>

                        <div class="space-y-6">
                            <div>
                                <p class="text-sm text-gray-500">Servicio</p>
                                <p class="text-lg font-semibold text-gray-900">
                                    {{ $cotizacion['service_name'] }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">Dirección</p>
                                <p class="text-lg font-semibold text-gray-900">
                                    {{ $address->calle }} {{ $address->external_number }}
                                    @if($address->internal_number)
                                        Int. {{ $address->internal_number }}
                                    @endif
                                    , {{ $address->colonia }}, {{ $address->alcaldia }}, {{ $address->estado }}, CP {{ $address->postal_code }}
                                </p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <p class="text-sm text-gray-500">Fecha</p>
                                    <p class="font-semibold text-gray-900">
                                        {{ \Carbon\Carbon::parse($agenda['fecha'])->translatedFormat('d \d\e F \d\e Y') }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">Hora</p>
                                    <p class="font-semibold text-gray-900">
                                        {{ $agenda['hora'] }}
                                    </p>
                                </div>
                            </div>

                            @if(!empty($agenda['comentarios']))
                                <div>
                                    <p class="text-sm text-gray-500">Comentarios</p>
                                    <p class="font-semibold text-gray-900">
                                        {{ $agenda['comentarios'] }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">
                            Configuración seleccionada
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="rounded-2xl bg-gray-50 border border-gray-100 p-5">
                                <p class="text-sm text-gray-500">Urgencia</p>
                                <p class="font-semibold text-gray-900 mt-1">
                                    {{ $cotizacion['urgencia'] > 0 ? 'Urgente' : 'Normal' }}
                                </p>
                            </div>

                            <div class="rounded-2xl bg-gray-50 border border-gray-100 p-5">
                                <p class="text-sm text-gray-500">Complejidad</p>
                                <p class="font-semibold text-gray-900 mt-1">
                                    @if($cotizacion['complejidad'] == 0)
                                        Básico
                                    @elseif($cotizacion['complejidad'] == 100)
                                        Medio
                                    @else
                                        Alto
                                    @endif
                                </p>
                            </div>

                            <div class="rounded-2xl bg-gray-50 border border-gray-100 p-5">
                                <p class="text-sm text-gray-500">Zona</p>
                                <p class="font-semibold text-gray-900 mt-1">
                                    {{ $cotizacion['zona'] > 0 ? 'Zona lejana' : 'Estándar' }}
                                </p>
                            </div>
                        </div>

                        <div class="mt-6 bg-blue-50 border border-blue-100 rounded-2xl p-4">
                            <p class="text-sm text-blue-700">
                                El técnico confirmará los detalles del servicio antes de acudir.
                            </p>
                        </div>
                    </div>

                </div>

                <!-- Resumen de pago -->
                @php
                    $porcentajeAnticipo = 0.20;
                    $anticipo = $cotizacion['total'] * $porcentajeAnticipo;
                    $restante = $cotizacion['total'] - $anticipo;
                @endphp

                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 h-fit">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">
                        Resumen de pago
                    </h2>

                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-500">Precio base</span>
                            <span class="font-semibold text-gray-900">
                                ${{ number_format($cotizacion['precio_base'], 2) }}
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-500">Urgencia</span>
                            <span class="font-semibold text-gray-900">
                                ${{ number_format($cotizacion['urgencia'], 2) }}
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-500">Complejidad</span>
                            <span class="font-semibold text-gray-900">
                                ${{ number_format($cotizacion['complejidad'], 2) }}
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-500">Zona</span>
                            <span class="font-semibold text-gray-900">
                                ${{ number_format($cotizacion['zona'], 2) }}
                            </span>
                        </div>
                    </div>

                    <div class="border-t border-gray-100 mt-6 pt-6 space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-700 font-semibold">
                                Costo estimado
                            </span>

                            <span class="text-xl font-bold text-gray-900">
                                ${{ number_format($cotizacion['total'], 2) }}
                            </span>
                        </div>

                        <div class="bg-blue-50 border border-blue-100 rounded-2xl p-4">
                            <div class="flex justify-between items-center">
                                <span class="text-blue-700 font-semibold">
                                    Anticipo de confirmación
                                </span>

                                <span class="text-2xl font-bold text-blue-600">
                                    ${{ number_format($anticipo, 2) }}
                                </span>
                            </div>

                            <p class="text-xs text-blue-600 mt-2">
                                Corresponde al 20% del costo estimado del servicio.
                            </p>
                        </div>

                        <div class="flex justify-between items-center">
                            <span class="text-gray-500">
                                Restante al finalizar
                            </span>

                            <span class="font-semibold text-gray-900">
                                ${{ number_format($restante, 2) }}
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-2xl p-4">
                        <p class="text-sm text-yellow-800 font-semibold mb-2">
                            Política de anticipo
                        </p>

                        <p class="text-xs text-yellow-800 leading-relaxed">
                            El anticipo garantiza la reserva del servicio y la asignación del técnico.
                            Las cancelaciones o reprogramaciones deben realizarse con al menos 48 horas
                            de anticipación para aplicar al reembolso. Si el técnico acude al domicilio
                            y el cliente no se encuentra disponible, el anticipo no será reembolsable.
                        </p>
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('cliente.pago') }}"
                        class="block w-full text-center bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition shadow-sm">
                            Pagar anticipo
                        </a>

                        <a href="{{ route('cliente.agendar') }}"
                        class="block text-center mt-4 text-blue-600 hover:text-blue-700 font-semibold transition">
                            Volver a editar
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>