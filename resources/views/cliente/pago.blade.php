<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Header -->
            <div class="mb-10">
                <span class="inline-flex items-center px-4 py-2 rounded-full bg-blue-100 text-blue-700 text-sm font-semibold mb-4">
                    Pago
                </span>

                <h1 class="text-5xl font-bold text-gray-900 leading-tight">
                    Finaliza tu solicitud
                </h1>

                <p class="text-gray-600 text-lg mt-3">
                    Paga el anticipo para confirmar la reserva de tu servicio.
                </p>
            </div>

            @php
                $anticipo = $cotizacion['total'] * 0.20;
                $restante = $cotizacion['total'] - $anticipo;
            @endphp

            <form action="{{ route('cliente.pago.confirmar') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <!-- Columna izquierda -->
                    <!-- Columna izquierda -->
                    <div class="lg:col-span-2 space-y-8">

                        <!-- Datos de tarjeta -->
                        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">

                            <input type="hidden" name="payment_method" value="card">

                            <h2 class="text-3xl font-bold text-gray-900 mb-2">
                                Método de pago
                            </h2>

                            <p class="text-gray-500 mb-8">
                                Ingresa los datos de tu tarjeta para confirmar tu reserva.
                            </p>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <div class="md:col-span-2">
                                    <label class="block text-sm font-semibold text-gray-800 mb-2">
                                        Número de tarjeta
                                    </label>

                                    <input type="text"
                                        name="card_number"
                                        placeholder="4242 4242 4242 4242"
                                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-sm font-semibold text-gray-800 mb-2">
                                        Nombre del titular
                                    </label>

                                    <input type="text"
                                        name="card_holder"
                                        placeholder="Nombre del cliente"
                                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-800 mb-2">
                                        Vencimiento
                                    </label>

                                    <input type="text"
                                        name="card_expiration"
                                        placeholder="MM/AA"
                                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-800 mb-2">
                                        CVV
                                    </label>

                                    <input type="text"
                                        name="card_cvv"
                                        placeholder="123"
                                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                </div>

                            </div>

                            <div class="mt-6 bg-gray-50 border border-gray-100 rounded-2xl p-4">
                                <p class="text-sm text-gray-500 leading-relaxed">
                                    Los datos de pago son simulados y únicamente tienen fines académicos.
                                </p>
                            </div>

                            @error('payment_method')
                                <p class="text-red-500 text-sm mt-4">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>
                    <!-- Resumen -->
                    <div>

                        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 sticky top-8">

                            <h2 class="text-2xl font-bold text-gray-900 mb-8">
                                Resumen de pago
                            </h2>

                            <!-- Servicio -->
                            <div class="space-y-5 text-sm">

                                <div class="flex justify-between gap-4">
                                    <span class="text-gray-500">
                                        Servicio
                                    </span>

                                    <span class="font-semibold text-gray-900 text-right">
                                        {{ $cotizacion['service_name'] }}
                                    </span>
                                </div>

                                <div class="flex justify-between gap-4">
                                    <span class="text-gray-500">
                                        Fecha
                                    </span>

                                    <span class="font-semibold text-gray-900 text-right">
                                        {{ \Carbon\Carbon::parse($agenda['fecha'])->translatedFormat('d \\d\\e F \\d\\e Y') }}
                                    </span>
                                </div>

                                <div class="flex justify-between gap-4">
                                    <span class="text-gray-500">
                                        Hora
                                    </span>

                                    <span class="font-semibold text-gray-900 text-right">
                                        {{ $agenda['hora'] }}
                                    </span>
                                </div>

                            </div>

                            <!-- Costos -->
                            <div class="border-t border-gray-100 mt-8 pt-8 space-y-5">

                                <div class="flex justify-between">
                                    <span class="text-gray-500">
                                        Precio base
                                    </span>

                                    <span class="font-semibold text-gray-900">
                                        ${{ number_format($cotizacion['precio_base'], 2) }}
                                    </span>
                                </div>

                                <div class="flex justify-between">
                                    <span class="text-gray-500">
                                        Extras
                                    </span>

                                    <span class="font-semibold text-gray-900">
                                        ${{ number_format(
                                            $cotizacion['urgencia'] +
                                            $cotizacion['complejidad'] +
                                            $cotizacion['zona'], 2
                                        ) }}
                                    </span>
                                </div>

                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-semibold text-gray-900">
                                        Costo estimado
                                    </span>

                                    <span class="text-2xl font-bold text-gray-900">
                                        ${{ number_format($cotizacion['total'], 2) }}
                                    </span>
                                </div>

                            </div>

                            <!-- Anticipo -->
                            <div class="mt-8 bg-blue-50 border border-blue-100 rounded-2xl p-6">

                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-sm font-semibold text-blue-700">
                                            Anticipo de confirmación
                                        </p>

                                        <p class="text-xs text-blue-600 mt-1">
                                            20% del costo estimado
                                        </p>
                                    </div>

                                    <span class="text-3xl font-bold text-blue-600">
                                        ${{ number_format($anticipo, 2) }}
                                    </span>
                                </div>

                            </div>

                            <!-- Restante -->
                            <div class="mt-6 flex justify-between items-center">
                                <span class="text-gray-500">
                                    Restante al finalizar
                                </span>

                                <span class="font-semibold text-gray-900">
                                    ${{ number_format($restante, 2) }}
                                </span>
                            </div>

                            <!-- Política -->
                            <div class="mt-8 bg-yellow-50 border border-yellow-200 rounded-2xl p-5">

                                <p class="text-sm font-semibold text-yellow-800 mb-2">
                                    Política de anticipo
                                </p>

                                <p class="text-xs text-yellow-800 leading-relaxed">
                                    El anticipo garantiza la reserva del servicio y la asignación del técnico.
                                    Las cancelaciones o reprogramaciones deben realizarse con al menos
                                    24 horas de anticipación para aplicar a reembolso.
                                    Si el técnico acude al domicilio y el cliente no se encuentra disponible,
                                    el anticipo no será reembolsable.
                                </p>

                            </div>

                            <!-- Botones -->
                            <div class="mt-8">

                                <button type="submit"
                                        class="w-full bg-blue-600 text-white py-4 rounded-2xl font-semibold text-lg hover:bg-blue-700 hover:shadow-lg transition">

                                    Pagar anticipo

                                </button>

                                <a href="{{ route('cliente.checkout') }}"
                                   class="block text-center mt-5 text-blue-600 hover:text-blue-700 font-semibold transition">

                                    Volver

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </form>

        </div>
    </div>
</x-app-layout>