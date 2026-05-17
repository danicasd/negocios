<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-10">
        <div class="max-w-7xl mx-auto px-4">

            {{-- Header --}}
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800">
                    Hola, {{ Auth::user()->name }}
                </h1>

                <p class="text-gray-500 mt-2">
                    Aquí puedes consultar el resumen de tus servicios solicitados.
                </p>
            </div>

            {{-- Cards de resumen --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <p class="text-gray-500 font-medium">Servicios pendientes</p>

                    <h3 class="text-4xl font-bold text-yellow-600 mt-3">
                        {{ $pendingCount }}
                    </h3>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <p class="text-gray-500 font-medium">Servicios completados</p>

                    <h3 class="text-4xl font-bold text-green-600 mt-3">
                        {{ $completedCount }}
                    </h3>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <p class="text-gray-500 font-medium">Servicios cancelados</p>

                    <h3 class="text-4xl font-bold text-red-600 mt-3">
                        {{ $cancelledCount }}
                    </h3>
                </div>

            </div>

            {{-- Próximo servicio --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">
                            Próximo servicio
                        </h2>

                        <p class="text-gray-500 mt-1">
                            Tu servicio más cercano programado.
                        </p>
                    </div>

                    <a href="{{ route('cliente.mis-servicios') }}"
                       class="text-blue-600 font-semibold hover:text-blue-800">
                        Ver mis servicios
                    </a>
                </div>

                @if($nextBooking)

                    @php
                        $statusLabels = [
                            'pending' => 'Pendiente',
                            'confirmed' => 'Confirmado',
                            'in_progress' => 'En proceso',
                            'completed' => 'Completado',
                            'cancelled' => 'Cancelado',
                        ];

                        $paymentStatusLabels = [
                            'pending' => 'Pendiente',
                            'deposit_pending' => 'Anticipo pendiente',
                            'deposit_paid' => 'Anticipo pagado',
                            'paid' => 'Pagado',
                            'cancelled' => 'Cancelado',
                        ];

                        $statusText =
                            $statusLabels[$nextBooking->status]
                            ?? ucfirst(str_replace('_', ' ', $nextBooking->status));

                        $paymentStatusText =
                            $paymentStatusLabels[$nextBooking->payment_status]
                            ?? ucfirst(str_replace('_', ' ', $nextBooking->payment_status));
                    @endphp

                    <div class="border border-gray-100 rounded-2xl p-5 bg-gray-50">
                        <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">

                            <div>
                                <h3 class="text-lg font-bold text-gray-800">
                                    {{ $nextBooking->service->name ?? 'Servicio no disponible' }}
                                </h3>

                                <p class="text-gray-500 mt-1">
                                    Orden #{{ str_pad($nextBooking->id, 4, '0', STR_PAD_LEFT) }}
                                </p>
                            </div>

                            <div class="flex flex-wrap gap-2">
                                <span class="px-4 py-1 rounded-full text-sm font-semibold
                                    @if($nextBooking->status === 'pending') bg-yellow-100 text-yellow-700
                                    @elseif($nextBooking->status === 'confirmed') bg-blue-100 text-blue-700
                                    @elseif($nextBooking->status === 'in_progress') bg-orange-100 text-orange-700
                                    @elseif($nextBooking->status === 'completed') bg-green-100 text-green-700
                                    @elseif($nextBooking->status === 'cancelled') bg-red-100 text-red-700
                                    @else bg-gray-100 text-gray-700
                                    @endif">
                                    {{ $statusText }}
                                </span>

                                <span class="px-4 py-1 rounded-full text-sm font-semibold
                                    @if($nextBooking->payment_status === 'paid') bg-green-100 text-green-700
                                    @elseif($nextBooking->payment_status === 'deposit_paid') bg-blue-100 text-blue-700
                                    @elseif($nextBooking->payment_status === 'pending') bg-yellow-100 text-yellow-700
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
                                    {{ \Carbon\Carbon::parse($nextBooking->scheduled_at)->format('d/m/Y h:i A') }}
                                </p>
                            </div>

                            <div>
                                <p class="text-gray-400 font-semibold">Dirección</p>

                                @if($nextBooking->address)
                                    <p class="text-gray-700">
                                        {{ $nextBooking->address->calle }}
                                        #{{ $nextBooking->address->external_number }},
                                        Col. {{ $nextBooking->address->colonia }}
                                    </p>
                                @else
                                    <p class="text-gray-700">
                                        Sin dirección registrada
                                    </p>
                                @endif
                            </div>

                            <div>
                                <p class="text-gray-400 font-semibold">Total</p>
                                <p class="text-gray-700">
                                    ${{ number_format($nextBooking->total, 2) }}
                                </p>
                            </div>

                        </div>

                        <div class="mt-6 flex justify-end">
                            <a href="{{ route('cliente.servicio.detalle', $nextBooking->id) }}"
                               class="bg-blue-600 text-white px-5 py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
                                Ver detalle
                            </a>
                        </div>
                    </div>

                @else
                    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-6 text-center">
                        <h3 class="text-lg font-semibold text-gray-700">
                            No tienes servicios próximos
                        </h3>

                        <p class="text-gray-500 mt-2">
                            Cuando agendes un servicio, aparecerá aquí.
                        </p>

                        <a href="{{ route('cliente.catalogo') }}"
                           class="inline-block mt-5 bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
                            Solicitar servicio
                        </a>
                    </div>
                @endif
            </div>

            {{-- Últimos servicios solicitados --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">
                            Últimos servicios solicitados
                        </h2>

                        <p class="text-gray-500 mt-1">
                            Consulta tus solicitudes más recientes.
                        </p>
                    </div>

                    <a href="{{ route('cliente.mis-servicios') }}"
                       class="text-blue-600 font-semibold hover:text-blue-800">
                        Ver todos
                    </a>
                </div>

                @if($recentBookings->isEmpty())
                    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-6 text-center">
                        <p class="text-gray-500">
                            Todavía no has solicitado servicios.
                        </p>
                    </div>
                @else
                    <div class="space-y-4">
                        @foreach($recentBookings as $booking)

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

                            <div class="border border-gray-100 rounded-2xl p-5 flex flex-col md:flex-row md:items-center md:justify-between gap-4 hover:border-blue-200 transition">

                                <div>
                                    <h3 class="font-bold text-gray-800">
                                        {{ $booking->service->name ?? 'Servicio no disponible' }}
                                    </h3>

                                    <p class="text-sm text-gray-500 mt-1">
                                        Orden #{{ str_pad($booking->id, 4, '0', STR_PAD_LEFT) }}
                                    </p>

                                    <p class="text-sm text-gray-500 mt-1">
                                        {{ \Carbon\Carbon::parse($booking->scheduled_at)->format('d/m/Y h:i A') }}
                                    </p>
                                </div>

                                <div class="flex items-center gap-3">
                                    <span class="px-4 py-1 rounded-full text-sm font-semibold
                                        @if($booking->status === 'pending') bg-yellow-100 text-yellow-700
                                        @elseif($booking->status === 'confirmed') bg-blue-100 text-blue-700
                                        @elseif($booking->status === 'in_progress') bg-orange-100 text-orange-700
                                        @elseif($booking->status === 'completed') bg-green-100 text-green-700
                                        @elseif($booking->status === 'cancelled') bg-red-100 text-red-700
                                        @else bg-gray-100 text-gray-700
                                        @endif">
                                        {{ $statusText }}
                                    </span>

                                    <a href="{{ route('cliente.servicio.detalle', $booking->id) }}"
                                       class="text-blue-600 font-semibold hover:text-blue-800">
                                        Ver
                                    </a>
                                </div>

                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>