@extends('layouts.admin')

@section('title', 'Solicitudes')

@section('content')
    @if(session('success'))
        <div class="mb-4 rounded-lg bg-green-100 text-green-700 px-4 py-3 text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-4 rounded-lg bg-red-100 text-red-700 px-4 py-3 text-sm">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
                <h3 class="text-xl font-semibold">Solicitudes de servicio</h3>
                <p class="text-sm text-gray-500">
                    Revisa las solicitudes realizadas por los clientes.
                </p>
            </div>

            <div class="text-sm text-gray-500">
                Total: {{ $bookings->count() }} solicitudes
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Cliente</th>
                        <th class="px-4 py-3">Servicio</th>
                        <th class="px-4 py-3">Fecha programada</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3">Pago</th>
                        <th class="px-4 py-3">Técnico</th>
                        <th class="px-4 py-3">Total</th>
                        <th class="px-4 py-3 text-right">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($bookings as $booking)
                        <tr>
                            <td class="px-4 py-3 font-medium">
                                #{{ $booking->id }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $booking->user->name ?? 'Usuario no disponible' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $booking->service->name ?? 'Servicio no disponible' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $booking->scheduled_at ? $booking->scheduled_at->format('d/m/Y H:i') : 'Sin fecha' }}
                            </td>

                            <td class="px-4 py-3">
                                @php
                                    $statusClasses = [
                                        'pendiente' => 'bg-yellow-100 text-yellow-700',
                                        'confirmada' => 'bg-green-100 text-green-700',
                                        'en_proceso' => 'bg-blue-100 text-blue-700',
                                        'completada' => 'bg-slate-100 text-slate-700',
                                        'cancelada' => 'bg-red-100 text-red-700',
                                    ];

                                    $statusLabels = [
                                        'pendiente' => 'Pendiente',
                                        'confirmada' => 'Confirmada',
                                        'en_proceso' => 'En proceso',
                                        'completada' => 'Completada',
                                        'cancelada' => 'Cancelada',
                                    ];

                                    $statusClass = $statusClasses[$booking->status] ?? 'bg-gray-100 text-gray-700';
                                    $statusLabel = $statusLabels[$booking->status] ?? ucfirst($booking->status);
                                @endphp

                                <span class="px-3 py-1 rounded-full text-xs {{ $statusClass }}">
                                    {{ $statusLabel }}
                                </span>
                            </td>

                            <td class="px-4 py-3">
                                @php
                                    $paymentLabels = [
                                        'pending_deposit' => 'Anticipo pendiente',
                                        'deposit_paid' => 'Anticipo pagado',
                                        'paid' => 'Pagado',
                                        'refunded' => 'Reembolsado',
                                    ];
                                @endphp

                                {{ $paymentLabels[$booking->payment_status] ?? $booking->payment_status }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $booking->technician->name ?? 'Sin asignar' }}
                            </td>

                            <td class="px-4 py-3">
                                ${{ number_format($booking->total, 2) }} MXN
                            </td>

                            <td class="px-4 py-3 text-right">
                                <a href="{{ route('admin.bookings.show', $booking) }}"
                                   class="text-blue-600 font-medium hover:underline">
                                    Ver detalle
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-4 py-10 text-center text-gray-500">
                                No hay solicitudes registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection