@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-8">
        <h3 class="text-2xl font-bold text-slate-900">Panel general</h3>
        <p class="text-sm text-gray-500 mt-1">
            Resumen operativo de solicitudes, servicios, técnicos, usuarios y pagos.
        </p>
    </div>

    {{-- Métricas principales --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
        <a href="{{ route('admin.bookings.index') }}"
           class="bg-white rounded-2xl shadow p-6 hover:shadow-lg hover:-translate-y-1 transition">
            <div class="flex items-center justify-between mb-4">
                <p class="text-sm text-gray-500">Solicitudes pendientes</p>
                <div class="w-10 h-10 rounded-xl bg-yellow-100 flex items-center justify-center text-yellow-700 font-bold">
                    !
                </div>
            </div>

            <h3 class="text-4xl font-bold text-slate-900">{{ $pendingBookings }}</h3>
            <p class="text-xs text-gray-500 mt-2">Solicitudes que requieren atención</p>
        </a>

        <a href="{{ route('admin.services.index') }}"
           class="bg-white rounded-2xl shadow p-6 hover:shadow-lg hover:-translate-y-1 transition">
            <div class="flex items-center justify-between mb-4">
                <p class="text-sm text-gray-500">Servicios activos</p>
                <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-blue-700 font-bold">
                    S
                </div>
            </div>

            <h3 class="text-4xl font-bold text-slate-900">{{ $activeServices }}</h3>
            <p class="text-xs text-gray-500 mt-2">Servicios disponibles para clientes</p>
        </a>

        <a href="{{ route('admin.technicians.index') }}"
           class="bg-white rounded-2xl shadow p-6 hover:shadow-lg hover:-translate-y-1 transition">
            <div class="flex items-center justify-between mb-4">
                <p class="text-sm text-gray-500">Técnicos activos</p>
                <div class="w-10 h-10 rounded-xl bg-green-100 flex items-center justify-center text-green-700 font-bold">
                    T
                </div>
            </div>

            <h3 class="text-4xl font-bold text-slate-900">{{ $availableTechnicians }}</h3>
            <p class="text-xs text-gray-500 mt-2">Personal disponible para asignación</p>
        </a>

        <a href="{{ route('admin.users.index') }}"
           class="bg-white rounded-2xl shadow p-6 hover:shadow-lg hover:-translate-y-1 transition">
            <div class="flex items-center justify-between mb-4">
                <p class="text-sm text-gray-500">Usuarios registrados</p>
                <div class="w-10 h-10 rounded-xl bg-purple-100 flex items-center justify-center text-purple-700 font-bold">
                    U
                </div>
            </div>

            <h3 class="text-4xl font-bold text-slate-900">{{ $registeredUsers }}</h3>
            <p class="text-xs text-gray-500 mt-2">Clientes registrados en la plataforma</p>
        </a>
    </div>

    {{-- Métricas secundarias --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-slate-900 text-white rounded-2xl shadow p-6">
            <p class="text-sm text-slate-300">Solicitudes totales</p>
            <h3 class="text-3xl font-bold mt-2">{{ $totalBookings }}</h3>
            <p class="text-xs text-slate-400 mt-2">Reservaciones generadas por clientes</p>
        </div>

        <div class="bg-white rounded-2xl shadow p-6">
            <p class="text-sm text-gray-500">Servicios completados</p>
            <h3 class="text-3xl font-bold mt-2 text-slate-900">{{ $completedBookings }}</h3>
            <p class="text-xs text-gray-500 mt-2">Solicitudes finalizadas correctamente</p>
        </div>

        <div class="bg-white rounded-2xl shadow p-6">
            <p class="text-sm text-gray-500">Ingresos confirmados</p>
            <h3 class="text-3xl font-bold mt-2 text-green-600">
                ${{ number_format($totalRevenue, 2) }} MXN
            </h3>
            <p class="text-xs text-gray-500 mt-2">Pagos registrados como pagados</p>
        </div>
    </div>

    {{-- Gráficas --}}
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-8">
        <div class="bg-white rounded-2xl shadow p-6">
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-slate-900">Solicitudes por estado</h3>
                <p class="text-sm text-gray-500">
                    Distribución actual del flujo operativo.
                </p>
            </div>

            <div class="h-72">
                <canvas id="bookingsStatusChart"></canvas>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow p-6">
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-slate-900">Pagos por estado</h3>
                <p class="text-sm text-gray-500">
                    Seguimiento de pagos registrados en el sistema.
                </p>
            </div>

            <div class="h-72">
                <canvas id="paymentsStatusChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Últimas solicitudes --}}
    <div class="bg-white rounded-2xl shadow p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-5">
            <div>
                <h3 class="text-lg font-semibold text-slate-900">Últimas solicitudes</h3>
                <p class="text-sm text-gray-500">
                    Actividad reciente de los clientes dentro de ServiHogar.
                </p>
            </div>

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
                        <th class="px-4 py-3 text-right">Acción</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($latestBookings as $booking)
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

                        <tr>
                            <td class="px-4 py-3 font-medium">
                                {{ $booking->user->name ?? 'Usuario no disponible' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $booking->service->name ?? 'Servicio no disponible' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $booking->scheduled_at ? $booking->scheduled_at->format('d/m/Y H:i') : 'Sin fecha' }}
                            </td>

                            <td class="px-4 py-3">
                                <span class="px-3 py-1 rounded-full text-xs {{ $statusClass }}">
                                    {{ $statusLabel }}
                                </span>
                            </td>

                            <td class="px-4 py-3">
                                {{ $booking->technician->name ?? 'Sin asignar' }}
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
                            <td colspan="6" class="px-4 py-10 text-center text-gray-500">
                                No hay solicitudes recientes.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const bookingsStatusData = @json($bookingsByStatus);
        const paymentsStatusData = @json($paymentsByStatus);

        const bookingLabels = Object.keys(bookingsStatusData);
        const bookingValues = Object.values(bookingsStatusData);

        const paymentLabels = Object.keys(paymentsStatusData);
        const paymentValues = Object.values(paymentsStatusData);

        new Chart(document.getElementById('bookingsStatusChart'), {
            type: 'doughnut',
            data: {
                labels: bookingLabels,
                datasets: [{
                    data: bookingValues,
                    backgroundColor: [
                        '#facc15',
                        '#22c55e',
                        '#3b82f6',
                        '#64748b',
                        '#ef4444'
                    ],
                    borderWidth: 2,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        new Chart(document.getElementById('paymentsStatusChart'), {
            type: 'bar',
            data: {
                labels: paymentLabels,
                datasets: [{
                    label: 'Pagos',
                    data: paymentValues,
                    backgroundColor: [
                        '#facc15',
                        '#22c55e',
                        '#ef4444',
                        '#64748b'
                    ],
                    borderRadius: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>
@endsection