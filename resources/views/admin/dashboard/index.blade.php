@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-sm text-gray-500">Solicitudes pendientes</p>
            <h3 class="text-3xl font-bold mt-2">{{ $pendingBookings }}</h3>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-sm text-gray-500">Servicios activos</p>
            <h3 class="text-3xl font-bold mt-2">{{ $activeServices }}</h3>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-sm text-gray-500">Técnicos disponibles</p>
            <h3 class="text-3xl font-bold mt-2">{{ $availableTechnicians }}</h3>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-sm text-gray-500">Usuarios registrados</p>
            <h3 class="text-3xl font-bold mt-2">{{ $registeredUsers }}</h3>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Últimas solicitudes</h3>

            <a href="{{ route('admin.bookings.index') }}"
               class="text-blue-600 text-sm font-medium hover:underline">
                Ver todas
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-4 py-3">Cliente</th>
                        <th class="px-4 py-3">Servicio</th>
                        <th class="px-4 py-3">Fecha</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3">Técnico</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($latestBookings as $booking)
                        <tr>
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
                                        'pending' => 'bg-yellow-100 text-yellow-700',
                                    ];

                                    $statusLabels = [
                                        'pendiente' => 'Pendiente',
                                        'confirmada' => 'Confirmada',
                                        'en_proceso' => 'En proceso',
                                        'completada' => 'Completada',
                                        'cancelada' => 'Cancelada',
                                        'pending' => 'Pendiente',
                                    ];

                                    $statusClass = $statusClasses[$booking->status] ?? 'bg-gray-100 text-gray-700';
                                    $statusLabel = $statusLabels[$booking->status] ?? ucfirst($booking->status);
                                @endphp

                                <span class="px-3 py-1 rounded-full text-xs {{ $statusClass }}">
                                    {{ $statusLabel }}
                                </span>
                            </td>

                            <td class="px-4 py-3">
                                {{ $booking->technician->name ?? 'Sin asignar' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-10 text-center text-gray-500">
                                No hay solicitudes registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection