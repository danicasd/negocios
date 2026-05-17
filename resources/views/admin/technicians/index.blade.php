@extends('layouts.admin')

@section('title', 'Técnicos')

@section('content')
    @if(session('success'))
        <div class="mb-4 rounded-lg bg-green-100 text-green-700 px-4 py-3 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
                <h3 class="text-xl font-semibold">Técnicos registrados</h3>
                <p class="text-sm text-gray-500">
                    Administra los técnicos disponibles para atender servicios.
                </p>
            </div>

            <a href="{{ route('admin.technicians.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 text-center">
                + Agregar técnico
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-4 py-3">Técnico</th>
                        <th class="px-4 py-3">Teléfono</th>
                        <th class="px-4 py-3">Especialidad</th>
                        <th class="px-4 py-3">Disponibilidad</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3 text-right">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($technicians as $technician)
                        <tr>
                            <td class="px-4 py-3 font-medium">
                                {{ $technician->name }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $technician->phone }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $technician->speciality }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $technician->availability ?? 'No definida' }}
                            </td>

                            <td class="px-4 py-3">
                                @if($technician->status)
                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">
                                        Activo
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs">
                                        Inactivo
                                    </span>
                                @endif
                            </td>

                            <td class="px-4 py-3 text-right">
                                <div class="flex justify-end gap-3">
                                    <a href="{{ route('admin.technicians.edit', $technician) }}"
                                       class="text-blue-600 font-medium hover:underline">
                                        Editar
                                    </a>

                                    <form action="{{ route('admin.technicians.destroy', $technician) }}"
                                          method="POST"
                                          onsubmit="return confirm('¿Seguro que deseas desactivar este técnico?');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="text-red-600 font-medium hover:underline">
                                            Desactivar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-10 text-center text-gray-500">
                                No hay técnicos registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection