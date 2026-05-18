@extends('layouts.admin')

@section('title', 'Detalle de solicitud')

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

    <div class="mb-6">
        <a href="{{ route('admin.bookings.index') }}"
           class="text-blue-600 text-sm font-medium hover:underline">
            ← Volver a solicitudes
        </a>
    </div>

    @php
        $statusClasses = [
            'pending' => 'bg-yellow-100 text-yellow-700',
            'confirmed' => 'bg-blue-100 text-blue-700',
            'in_progress' => 'bg-orange-100 text-orange-700',
            'completed' => 'bg-green-100 text-green-700',
            'cancelled' => 'bg-red-100 text-red-700',
        ];

        $statusLabels = [
            'pending' => 'Pendiente',
            'confirmed' => 'Confirmada',
            'in_progress' => 'En proceso',
            'completed' => 'Completada',
            'cancelled' => 'Cancelada',
        ];

        $paymentLabels = [
            'pending_deposit' => 'Anticipo pendiente',
            'deposit_paid' => 'Anticipo pagado',
            'paid' => 'Pagado',
            'refunded' => 'Reembolsado',
        ];

        $statusClass = $statusClasses[$booking->status] ?? 'bg-gray-100 text-gray-700';
        $statusLabel = $statusLabels[$booking->status] ?? ucfirst($booking->status);
    @endphp

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">

            {{-- Información principal --}}
            <div class="bg-white rounded-xl shadow p-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                    <div>
                        <h3 class="text-xl font-semibold">Solicitud #{{ $booking->id }}</h3>
                        <p class="text-sm text-gray-500">
                            Información general del servicio solicitado.
                        </p>
                    </div>

                    <span class="w-fit px-3 py-1 rounded-full text-xs font-medium {{ $statusClass }}">
                        {{ $statusLabel }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <p class="text-sm text-gray-500">Cliente</p>
                        <p class="font-medium">{{ $booking->user->name ?? 'Usuario no disponible' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Teléfono</p>
                        <p class="font-medium">{{ $booking->user->phone ?? 'No registrado' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Correo</p>
                        <p class="font-medium">{{ $booking->user->email ?? 'No registrado' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Servicio</p>
                        <p class="font-medium">{{ $booking->service->name ?? 'Servicio no disponible' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Fecha programada</p>
                        <p class="font-medium">
                            {{ $booking->scheduled_at ? $booking->scheduled_at->format('d/m/Y') : 'Sin fecha' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Hora programada</p>
                        <p class="font-medium">
                            {{ $booking->scheduled_at ? $booking->scheduled_at->format('H:i') : 'Sin hora' }}
                        </p>
                    </div>

                    <div class="md:col-span-2">
                        <p class="text-sm text-gray-500">Dirección</p>
                        <p class="font-medium">
                            @if($booking->address)
                                {{ $booking->address->calle }}
                                #{{ $booking->address->external_number }}
                                @if($booking->address->internal_number)
                                    Int. {{ $booking->address->internal_number }}
                                @endif,
                                Col. {{ $booking->address->colonia }},
                                {{ $booking->address->alcaldia }},
                                {{ $booking->address->estado }},
                                C.P. {{ $booking->address->postal_code }}
                            @else
                                Dirección no disponible
                            @endif
                        </p>
                    </div>

                    <div class="md:col-span-2">
                        <p class="text-sm text-gray-500">Referencias</p>
                        <p class="font-medium">
                            {{ $booking->address->references ?? 'Sin referencias.' }}
                        </p>
                    </div>

                    <div class="md:col-span-2">
                        <p class="text-sm text-gray-500">Notas del cliente</p>
                        <p class="font-medium">
                            {{ $booking->notes ?? 'Sin notas adicionales.' }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Costos --}}
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Resumen de costos</h3>

                <div class="space-y-3">
                    <div class="flex justify-between border-b pb-3">
                        <span class="text-gray-600">Precio base</span>
                        <span class="font-medium">${{ number_format($booking->base_price, 2) }} MXN</span>
                    </div>

                    <div class="flex justify-between border-b pb-3">
                        <span class="text-gray-600">Extras</span>
                        <span class="font-medium">${{ number_format($booking->extra_total, 2) }} MXN</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-600">Total</span>
                        <span class="font-bold text-lg">${{ number_format($booking->total, 2) }} MXN</span>
                    </div>
                </div>
            </div>

            {{-- Opciones seleccionadas --}}
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Opciones seleccionadas</h3>

                @if($booking->options && $booking->options->count() > 0)
                    <div class="space-y-3">
                        @foreach($booking->options as $option)
                            <div class="flex justify-between border-b pb-3">
                                <span class="text-gray-600">{{ $option->option_name }}</span>
                                <span class="font-medium">${{ number_format($option->extra_price, 2) }} MXN</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500">
                        Esta solicitud no tiene opciones adicionales registradas.
                    </p>
                @endif
            </div>
        </div>

        {{-- Panel lateral --}}
        <div class="space-y-6">

            {{-- Asignar técnico --}}
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Asignar técnico</h3>

                <form method="POST"
                      action="{{ route('admin.bookings.assign-technician', $booking) }}"
                      class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Técnico disponible
                        </label>

                        <select name="technician_id" class="w-full rounded-lg border-gray-300 text-sm">
                            <option value="">Seleccionar técnico</option>

                            @foreach($technicians as $technician)
                                <option value="{{ $technician->id }}"
                                    {{ old('technician_id', $booking->technician_id) == $technician->id ? 'selected' : '' }}>
                                    {{ $technician->name }} - {{ $technician->speciality }}
                                </option>
                            @endforeach
                        </select>

                        @error('technician_id')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="w-full bg-blue-600 text-white py-2 rounded-lg font-medium hover:bg-blue-700">
                        Asignar técnico
                    </button>
                </form>
            </div>

            {{-- Actualizar estado --}}
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Actualizar estado</h3>

                <form method="POST"
                      action="{{ route('admin.bookings.update-status', $booking) }}"
                      class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Estado de la solicitud
                        </label>

                        <select name="status" class="w-full rounded-lg border-gray-300 text-sm">
                            <option value="pending" {{ old('status', $booking->status) == 'pending' ? 'selected' : '' }}>
                                Pendiente
                            </option>

                            <option value="confirmed" {{ old('status', $booking->status) == 'confirmed' ? 'selected' : '' }}>
                                Confirmada
                            </option>

                            <option value="in_progress" {{ old('status', $booking->status) == 'in_progress' ? 'selected' : '' }}>
                                En progreso
                            </option>

                            <option value="completed" {{ old('status', $booking->status) == 'completed' ? 'selected' : '' }}>
                                Completada
                            </option>

                            <option value="cancelled" {{ old('status', $booking->status) == 'cancelled' ? 'selected' : '' }}>
                                Cancelada
                            </option>
                        </select>

                        @error('status')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="w-full bg-slate-900 text-white py-2 rounded-lg font-medium hover:bg-slate-800">
                        Guardar estado
                    </button>
                </form>
            </div>

            {{-- Resumen administrativo --}}
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Resumen administrativo</h3>

                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Creada el</span>
                        <span class="font-medium">{{ $booking->created_at->format('d/m/Y') }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Técnico</span>
                        <span class="font-medium">{{ $booking->technician->name ?? 'Sin asignar' }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Pago</span>
                        <span class="font-medium">
                            {{ $paymentLabels[$booking->payment_status] ?? $booking->payment_status }}
                        </span>
                    </div>

                    @if($booking->cancelled_at)
                        <div class="pt-3 border-t">
                            <p class="text-gray-500">Cancelada el</p>
                            <p class="font-medium">{{ $booking->cancelled_at->format('d/m/Y H:i') }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500">Motivo de cancelación</p>
                            <p class="font-medium">{{ $booking->cancellation_reason ?? 'Sin motivo registrado.' }}</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Cancelar solicitud --}}
            @if($booking->status !== 'cancelada')
                <div class="bg-white rounded-xl shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">Cancelar solicitud</h3>

                    <form method="POST"
                          action="{{ route('admin.bookings.cancel', $booking) }}"
                          class="space-y-4"
                          onsubmit="return confirm('¿Seguro que deseas cancelar esta solicitud?');">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Motivo de cancelación
                            </label>

                            <textarea name="cancellation_reason"
                                      rows="3"
                                      class="w-full rounded-lg border-gray-300 text-sm"
                                      placeholder="Ej. El cliente solicitó cancelar.">{{ old('cancellation_reason') }}</textarea>

                            @error('cancellation_reason')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                                class="w-full bg-red-600 text-white py-2 rounded-lg font-medium hover:bg-red-700">
                            Cancelar solicitud
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection