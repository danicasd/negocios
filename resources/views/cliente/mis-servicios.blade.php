<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-10">
        <div class="max-w-6xl mx-auto px-4">

            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800">
                    Mis servicios
                </h1>
                <p class="text-gray-500 mt-2">
                    Consulta el estado de tus servicios solicitados y pagos realizados.
                </p>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-200 text-green-700 px-5 py-4 rounded-2xl mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-200 text-red-700 px-5 py-4 rounded-2xl mb-6">
                    {{ session('error') }}
                </div>
            @endif

            @if($bookings->isEmpty())
                <div class="bg-white rounded-2xl shadow p-8 text-center">
                    <h2 class="text-xl font-semibold text-gray-700">
                        Aún no tienes servicios solicitados
                    </h2>
                    <p class="text-gray-500 mt-2">
                        Cuando solicites un servicio, aparecerá aquí.
                    </p>

                    <a href="{{ route('servicios') }}"
                       class="inline-block mt-6 bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition">
                        Solicitar servicio
                    </a>
                </div>
            @else
                <div class="space-y-5">
                    @foreach($bookings as $booking)
                        <div class="bg-white rounded-2xl shadow p-6 border border-gray-100">

                            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                                <div>
                                    <h2 class="text-xl font-bold text-gray-800">
                                        {{ $booking->service->name ?? 'Servicio no disponible' }}
                                    </h2>

                                    <p class="text-gray-500 mt-1">
                                        Orden #{{ str_pad($booking->id, 4, '0', STR_PAD_LEFT) }}
                                    </p>
                                </div>

                                <div class="flex gap-2 flex-wrap">
                                    
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

                                    <span class="px-4 py-1 rounded-full text-sm font-semibold

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

                                    @php
                                        $paymentStatusLabels = [
                                            'pending' => 'Pendiente',
                                            'deposit_pending' => 'Anticipo pendiente',
                                            'deposit_paid' => 'Anticipo pagado',
                                            'paid' => 'Pagado',
                                            'cancelled' => 'Cancelado',
                                        ];

                                        $paymentStatusText =
                                            $paymentStatusLabels[$booking->payment_status]
                                            ?? ucfirst(str_replace('_', ' ', $booking->payment_status));
                                    @endphp

                                    <span class="px-4 py-1 rounded-full text-sm font-semibold
                                        @if($booking->payment_status === 'paid') bg-green-100 text-green-700
                                        @elseif($booking->payment_status === 'deposit_paid') bg-blue-100 text-blue-700
                                        @elseif($booking->payment_status === 'pending') bg-yellow-100 text-yellow-700
                                        @else bg-gray-100 text-gray-700
                                        @endif">

                                        Pago: {{ $paymentStatusText }}
                                    </span>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6 text-sm">

                                <div>
                                    <p class="text-gray-400 font-semibold">Fecha programada</p>
                                    <p class="text-gray-700">
                                        {{ \Carbon\Carbon::parse($booking->scheduled_at)->format('d/m/Y h:i A') }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-gray-400 font-semibold">Dirección</p>

                                    @if($booking->address)
                                        <p class="text-gray-700">
                                            {{ $booking->address->calle }}
                                            #{{ $booking->address->external_number }}

                                            @if($booking->address->internal_number)
                                                Int. {{ $booking->address->internal_number }}
                                            @endif

                                            <br>
                                            Col. {{ $booking->address->colonia }},
                                            {{ $booking->address->alcaldia }}
                                            <br>
                                            {{ $booking->address->estado }},
                                            C.P. {{ $booking->address->postal_code }}

                                            @if($booking->address->references)
                                                <br>
                                                <span class="text-gray-500">
                                                    Ref: {{ $booking->address->references }}
                                                </span>
                                            @endif
                                        </p>
                                    @else
                                        <p class="text-gray-700">Sin dirección registrada</p>
                                    @endif
                                </div>

                                <div>
                                    <p class="text-gray-400 font-semibold">Pago</p>

                                    @if($booking->payments->isNotEmpty())

                                        @php
                                            $payment = $booking->payments->first();

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

                                        <p class="text-gray-700">
                                            Anticipo: ${{ number_format($payment->amount, 2) }}
                                            <br>

                                            Método: {{ $paymentMethodText }}
                                            <br>

                                            Estado: {{ $paymentStatusText }}
                                            <br>

                                            Total: ${{ number_format($booking->total, 2) }}
                                        </p>

                                    @else
                                        <p class="text-gray-700">
                                            Sin pago registrado
                                        </p>
                                    @endif
                                </div>

                            </div>

                            <div class="mt-6 flex justify-end">
                                <a href="{{ route('cliente.servicio.detalle', $booking->id) }}"
                                   class="text-blue-600 font-semibold hover:text-blue-800">
                                    Ver detalle
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>