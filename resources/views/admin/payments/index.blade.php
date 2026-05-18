@extends('layouts.admin')

@section('title', 'Pagos')

@section('content')
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
                <h3 class="text-xl font-semibold">Pagos registrados</h3>
                <p class="text-sm text-gray-500">
                    Consulta los pagos relacionados con las solicitudes de servicio.
                </p>
            </div>

            <div class="text-sm text-gray-500">
                Total: {{ $payments->count() }} pagos
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Solicitud</th>
                        <th class="px-4 py-3">Cliente</th>
                        <th class="px-4 py-3">Servicio</th>
                        <th class="px-4 py-3">Tipo</th>
                        <th class="px-4 py-3">Método</th>
                        <th class="px-4 py-3">Monto</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3">Fecha de pago</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($payments as $payment)
                        @php
                            $typeLabels = [
                                'deposit' => 'Anticipo',
                                'remaining' => 'Pago restante',
                                'full' => 'Pago completo',
                                'refund' => 'Reembolso',

                                // Por si en tu BD guardaron el tipo como método:
                                'card' => 'Tarjeta',
                                'transfer' => 'Transferencia',
                                'cash' => 'Efectivo',
                            ];

                            $methodLabels = [
                                'card' => 'Tarjeta',
                                'transfer' => 'Transferencia',
                                'cash' => 'Efectivo',
                                'debit_card' => 'Tarjeta de débito',
                                'credit_card' => 'Tarjeta de crédito',
                            ];

                            $statusClasses = [
                                'pending' => 'bg-yellow-100 text-yellow-700',
                                'paid' => 'bg-green-100 text-green-700',
                                'failed' => 'bg-red-100 text-red-700',
                                'refunded' => 'bg-slate-100 text-slate-700',
                            ];

                            $statusLabels = [
                                'pending' => 'Pendiente',
                                'paid' => 'Pagado',
                                'failed' => 'Fallido',
                                'refunded' => 'Reembolsado',
                            ];

                            $typeLabel = $typeLabels[$payment->type] ?? ucfirst(str_replace('_', ' ', $payment->type));
                            $methodLabel = $methodLabels[$payment->payment_method] ?? ucfirst(str_replace('_', ' ', $payment->payment_method));

                            $statusClass = $statusClasses[$payment->status] ?? 'bg-gray-100 text-gray-700';
                            $statusLabel = $statusLabels[$payment->status] ?? ucfirst(str_replace('_', ' ', $payment->status));
                        @endphp

                        <tr>
                            <td class="px-4 py-3 font-medium">
                                #{{ $payment->id }}
                            </td>

                            <td class="px-4 py-3">
                                @if($payment->booking)
                                    <a href="{{ route('admin.bookings.show', $payment->booking) }}"
                                       class="text-blue-600 font-medium hover:underline">
                                        Solicitud #{{ $payment->booking->id }}
                                    </a>
                                @else
                                    No disponible
                                @endif
                            </td>

                            <td class="px-4 py-3">
                                {{ $payment->booking->user->name ?? 'Usuario no disponible' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $payment->booking->service->name ?? 'Servicio no disponible' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $typeLabel }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $methodLabel }}
                            </td>

                            <td class="px-4 py-3">
                                ${{ number_format($payment->amount, 2) }} MXN
                            </td>

                            <td class="px-4 py-3">
                                <span class="px-3 py-1 rounded-full text-xs {{ $statusClass }}">
                                    {{ $statusLabel }}
                                </span>
                            </td>

                            <td class="px-4 py-3">
                                {{ $payment->paid_at ? $payment->paid_at->format('d/m/Y H:i') : 'Sin confirmar' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-4 py-10 text-center text-gray-500">
                                No hay pagos registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection