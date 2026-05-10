<x-app-layout>

    <div class="min-h-screen bg-gray-50 py-10">

        <div class="max-w-5xl mx-auto px-4">

            {{-- Header --}}
            <div class="mb-8 flex justify-between items-start">

                <div>
                    <h1 class="text-3xl font-bold text-gray-800">
                        {{ $booking->service->name }}
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Orden #{{ str_pad($booking->id, 4, '0', STR_PAD_LEFT) }}
                    </p>
                </div>

                <a href="{{ route('cliente.mis-servicios') }}"
                   class="text-blue-600 hover:text-blue-800 font-bold text-xl">
                    ← Volver
                </a>

            </div>

            {{-- Card principal --}}
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">

                {{-- Estado --}}
                <div class="mb-8">

                    @php
                        $statusLabels = [
                            'pending' => 'Pendiente',
                            'confirmed' => 'Confirmado',
                            'in_progress' => 'En proceso',
                            'completed' => 'Completado',
                            'cancelled' => 'Cancelado',
                        ];

                        $statusText =
                            $statusLabels[$booking->status]
                            ?? ucfirst(str_replace('_', ' ', $booking->status));
                    @endphp

                    <span class="px-5 py-2 rounded-full text-sm font-semibold

                        @if($booking->status === 'pending')
                            bg-yellow-100 text-yellow-700

                        @elseif($booking->status === 'confirmed')
                            bg-blue-100 text-blue-700

                        @elseif($booking->status === 'in_progress')
                            bg-orange-100 text-orange-700

                        @elseif($booking->status === 'completed')
                            bg-green-100 text-green-700

                        @elseif($booking->status === 'cancelled')
                            bg-red-100 text-red-700

                        @else
                            bg-gray-100 text-gray-700
                        @endif
                    ">
                        {{ $statusText }}
                    </span>

                </div>

                {{-- Información --}}
                <div class="grid md:grid-cols-2 gap-8">

                    {{-- Columna izquierda --}}
                    <div class="space-y-6">

                        <div>
                            <h3 class="text-sm font-semibold text-gray-400 uppercase">
                                Fecha programada
                            </h3>

                            <p class="text-gray-800 mt-2">
                                {{ \Carbon\Carbon::parse($booking->scheduled_at)->format('d/m/Y h:i A') }}
                            </p>
                        </div>

                        <div>
                            <h3 class="text-sm font-semibold text-gray-400 uppercase">
                                Dirección
                            </h3>

                            <div class="text-gray-800 mt-2 leading-7">

                                {{ $booking->address->calle }}
                                #{{ $booking->address->external_number }}

                                @if($booking->address->internal_number)
                                    Int. {{ $booking->address->internal_number }}
                                @endif

                                <br>

                                Col. {{ $booking->address->colonia }}

                                <br>

                                {{ $booking->address->alcaldia }},
                                {{ $booking->address->estado }}

                                <br>

                                C.P. {{ $booking->address->postal_code }}

                                @if($booking->address->references)
                                    <br>
                                    <span class="text-gray-500">
                                        Referencias:
                                        {{ $booking->address->references }}
                                    </span>
                                @endif

                            </div>
                        </div>

                    </div>

                    {{-- Columna derecha --}}
                    <div class="space-y-6">

                        @php
                            $payment = $booking->payments->first();
                            $remaining = $booking->total - ($payment->amount ?? 0);
                        @endphp

                        <div>
                            <h3 class="text-sm font-semibold text-gray-400 uppercase">
                                Resumen de pago
                            </h3>

                            <div class="mt-2 space-y-2 text-gray-800">

                                <p>
                                    Total del servicio:
                                    <span class="font-semibold">
                                        ${{ number_format($booking->total, 2) }}
                                    </span>
                                </p>

                                <p>
                                    Anticipo pagado:
                                    <span class="font-semibold text-green-600">
                                        ${{ number_format($payment->amount ?? 0, 2) }}
                                    </span>
                                </p>

                                <p>
                                    Saldo pendiente:
                                    <span class="font-semibold text-orange-600">
                                        ${{ number_format($remaining, 2) }}
                                    </span>
                                </p>

                            </div>
                        </div>

                        @php
                            $paymentMethodLabels = [
                                'card' => 'Tarjeta',
                                'cash' => 'Efectivo',
                                'transfer' => 'Transferencia',
                            ];

                            $paymentStatusLabels = [
                                'paid' => 'Pagado',
                                'pending' => 'Pendiente',
                                'failed' => 'Fallido',
                            ];

                            $paymentMethodText =
                                $paymentMethodLabels[$payment->payment_method]
                                ?? ucfirst($payment->payment_method);

                            $paymentStatusText =
                                $paymentStatusLabels[$payment->status]
                                ?? ucfirst($payment->status);
                        @endphp
                        
                        @if($payment)
                            <div>
                                <h3 class="text-sm font-semibold text-gray-400 uppercase">
                                    Pago
                                </h3>

                                <div class="mt-2 text-gray-800 leading-7">

                                    Método:
                                    {{ $paymentMethodText }}

                                    <br>

                                    Estado:
                                    {{ $paymentStatusText }}

                                    <br>

                                    Referencia:
                                    {{ $payment->transaction_reference }}

                                </div>
                            </div>
                        @endif

                    </div>

                </div>

               
            </div>

             @php
                    $payment = $booking->payments->first();
                    $canCancel =
                        $booking->status === 'pending'
                        && now()->diffInHours(\Carbon\Carbon::parse($booking->scheduled_at), false) >= 24;
                @endphp

                {{-- Timeline --}}
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 mt-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-6">
                        Seguimiento del servicio
                    </h2>

                    <div class="space-y-5">

                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded-full bg-green-100 text-green-700 flex items-center justify-center font-bold">
                                ✓
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Solicitud creada</p>
                                <p class="text-sm text-gray-500">
                                    {{ $booking->created_at->format('d/m/Y h:i A') }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded-full {{ $payment ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-400' }} flex items-center justify-center font-bold">
                                {{ $payment ? '✓' : '•' }}
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Anticipo pagado</p>
                                <p class="text-sm text-gray-500">
                                    {{ $payment ? $payment->paid_at->format('d/m/Y h:i A') : 'Pendiente' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded-full {{ $booking->technician_id ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-400' }} flex items-center justify-center font-bold">
                                {{ $booking->technician_id ? '✓' : '•' }}
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Técnico asignado</p>
                                <p class="text-sm text-gray-500">
                                    {{ $booking->technician_id ? 'Asignado' : 'Pendiente de asignación' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded-full {{ $booking->status === 'in_progress' || $booking->status === 'completed' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-400' }} flex items-center justify-center font-bold">
                                {{ $booking->status === 'in_progress' || $booking->status === 'completed' ? '✓' : '•' }}
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Servicio en proceso</p>
                                <p class="text-sm text-gray-500">
                                    {{ $booking->status === 'in_progress' ? 'Actualmente en proceso' : 'Aún no inicia' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded-full {{ $booking->status === 'completed' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-400' }} flex items-center justify-center font-bold">
                                {{ $booking->status === 'completed' ? '✓' : '•' }}
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Servicio completado</p>
                                <p class="text-sm text-gray-500">
                                    {{ $booking->status === 'completed' ? 'Finalizado correctamente' : 'Pendiente' }}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Cancelar servicio --}}
                @if($booking->status === 'pending')
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 mt-8">
                        <h2 class="text-xl font-bold text-gray-800">
                            Cancelar servicio
                        </h2>

                        @if($canCancel)
                            <p class="text-gray-500 mt-2">
                                Puedes cancelar este servicio porque aún faltan más de 24 horas para la fecha programada.
                            </p>

                            <form method="POST"
                                action="{{ route('cliente.servicio.cancelar', $booking->id) }}"
                                class="mt-5 flex justify-center"
                                onsubmit="return confirm('¿Seguro que deseas cancelar este servicio?');">
                                @csrf
                                @method('PATCH')

                                <button type="submit"
                                        class="bg-red-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-red-700 transition ">
                                    Cancelar servicio
                                </button>
                            </form>
                        @else
                            <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-5 mt-4">
                                <p class="text-yellow-800 font-medium">
                                    Este servicio ya no puede cancelarse desde la plataforma porque faltan menos de 24 horas para la fecha programada.
                                </p>

                                <p class="text-yellow-700 mt-3">
                                    Si necesitas realizar algún cambio, comunícate con soporte:
                                </p>

                                <p class="text-yellow-900 font-semibold mt-2">
                                    📞 55 1234 5678
                                </p>
                            </div>
                        @endif
                    </div>
                @endif


        </div>

    </div>

</x-app-layout>