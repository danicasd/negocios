@extends('layouts.admin')

@section('title', 'Editar técnico')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.technicians.index') }}"
           class="text-blue-600 text-sm font-medium hover:underline">
            ← Volver a técnicos
        </a>
    </div>

    <div class="bg-white rounded-xl shadow p-6 max-w-3xl">
        <div class="mb-6">
            <h3 class="text-xl font-semibold">Editar técnico #{{ $technician->id }}</h3>
            <p class="text-sm text-gray-500">
                Modifica la información del técnico seleccionado.
            </p>
        </div>

        <form method="POST" action="{{ route('admin.technicians.update', $technician) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nombre
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name', $technician->name) }}"
                       class="w-full rounded-lg border-gray-300 text-sm">

                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Teléfono
                </label>

                <input type="text"
                       name="phone"
                       value="{{ old('phone', $technician->phone) }}"
                       class="w-full rounded-lg border-gray-300 text-sm">

                @error('phone')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Especialidad
                </label>

                <select name="speciality" class="w-full rounded-lg border-gray-300 text-sm">
                    <option value="">Seleccionar servicio</option>

                    @foreach($services as $service)
                        <option value="{{ $service->name }}"
                            {{ old('speciality', $technician->speciality) == $service->name ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>

                @error('speciality')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Disponibilidad
                </label>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    @php
                        $days = ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'];
                        $currentAvailability = old(
                            'availability',
                            $technician->availability ? array_map('trim', explode(',', $technician->availability)) : []
                        );
                    @endphp

                    @foreach($days as $day)
                        <label class="flex items-center gap-2 text-sm border rounded-lg px-3 py-2">
                            <input type="checkbox"
                                name="availability[]"
                                value="{{ $day }}"
                                class="rounded border-gray-300"
                                {{ in_array($day, $currentAvailability) ? 'checked' : '' }}>
                            {{ $day }}
                        </label>
                    @endforeach
                </div>

                @error('availability')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Estado
                </label>

                <select name="status" class="w-full rounded-lg border-gray-300 text-sm">
                    <option value="1" {{ old('status', $technician->status) == 1 ? 'selected' : '' }}>
                        Activo
                    </option>
                    <option value="0" {{ old('status', $technician->status) == 0 ? 'selected' : '' }}>
                        Inactivo
                    </option>
                </select>

                @error('status')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col md:flex-row gap-3 justify-end pt-4 border-t">
                <a href="{{ route('admin.technicians.index') }}"
                   class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 text-sm font-medium hover:bg-gray-100 text-center">
                    Cancelar
                </a>

                <button type="submit"
                        class="px-4 py-2 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700">
                    Guardar cambios
                </button>
            </div>
        </form>
    </div>
@endsection