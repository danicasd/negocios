@extends('layouts.admin')

@section('title', 'Servicios')

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
                <h3 class="text-xl font-semibold">Catálogo de servicios</h3>
                <p class="text-sm text-gray-500">
                    Administra los servicios disponibles para los clientes.
                </p>
            </div>

            <a href="{{ route('admin.services.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 text-center">
                + Agregar servicio
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-4 py-3">Servicio</th>
                        <th class="px-4 py-3">Categoría</th>
                        <th class="px-4 py-3">Precio base</th>
                        <th class="px-4 py-3">Duración estimada</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3 text-right">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($services as $service)
                        <tr>
                            <td class="px-4 py-3">
                                <div>
                                    <p class="font-medium">{{ $service->name }}</p>
                                    <p class="text-xs text-gray-500">
                                        {{ $service->description ?? 'Sin descripción registrada.' }}
                                    </p>
                                </div>
                            </td>

                            <td class="px-4 py-3">
                                {{ $service->category->name ?? 'Sin categoría' }}
                            </td>

                            <td class="px-4 py-3">
                                ${{ number_format($service->base_price, 2) }} MXN
                            </td>

                            <td class="px-4 py-3">
                                {{ $service->estimated_duration ? $service->estimated_duration . ' min' : 'No definida' }}
                            </td>

                            <td class="px-4 py-3">
                                @if($service->status)
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
                                    <a href="{{ route('admin.services.edit', $service) }}"
                                       class="text-blue-600 font-medium hover:underline">
                                        Editar
                                    </a>

                                    <form action="{{ route('admin.services.destroy', $service) }}"
                                            method="POST"
                                            onsubmit="return confirm('{{ $service->status ? '¿Seguro que deseas desactivar este servicio?' : '¿Seguro que deseas activar este servicio?' }}');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="{{ $service->status ? 'text-red-600' : 'text-green-600' }} font-medium hover:underline">
                                            {{ $service->status ? 'Desactivar' : 'Activar' }}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-10 text-center text-gray-500">
                                No hay servicios registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection