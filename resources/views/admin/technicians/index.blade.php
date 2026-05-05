@extends('layouts.admin')

@section('title', 'Técnicos')

@section('content')
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
                <h3 class="text-xl font-semibold">Técnicos registrados</h3>
                <p class="text-sm text-gray-500">
                    Administra los técnicos disponibles para atender los servicios.
                </p>
            </div>

            <a href="{{ route('admin.technicians.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700">
                    + Agregar técnico
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-4 py-3">Técnico</th>
                        <th class="px-4 py-3">Especialidad</th>
                        <th class="px-4 py-3">Teléfono</th>
                        <th class="px-4 py-3">Zona</th>
                        <th class="px-4 py-3">Disponibilidad</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3 text-right">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    <tr>
                        <td class="px-4 py-3">
                            <div>
                                <p class="font-medium">Juan Pérez</p>
                                <p class="text-xs text-gray-500">juan.perez@email.com</p>
                            </div>
                        </td>
                        <td class="px-4 py-3">Plomería</td>
                        <td class="px-4 py-3">55 1234 5678</td>
                        <td class="px-4 py-3">CDMX Sur</td>
                        <td class="px-4 py-3">Lun - Vie, 9:00 - 18:00</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">
                                Disponible
                            </span>
                        </td>
                        <td class="px-4 py-3 text-right space-x-3">
                            <a href="{{ route('admin.technicians.edit', 2) }}"
                                class="text-blue-600 font-medium hover:underline">
                                    Editar
                            </a>
                            <button class="text-red-600 font-medium hover:underline">Desactivar</button>
                        </td>
                    </tr>

                    <tr>
                        <td class="px-4 py-3">
                            <div>
                                <p class="font-medium">Roberto García</p>
                                <p class="text-xs text-gray-500">roberto.garcia@email.com</p>
                            </div>
                        </td>
                        <td class="px-4 py-3">Electricidad</td>
                        <td class="px-4 py-3">55 9876 4321</td>
                        <td class="px-4 py-3">CDMX Centro</td>
                        <td class="px-4 py-3">Lun - Sáb, 10:00 - 17:00</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs">
                                Ocupado
                            </span>
                        </td>
                        <td class="px-4 py-3 text-right space-x-3">
                            <a href="{{ route('admin.technicians.edit', 2) }}"
                                class="text-blue-600 font-medium hover:underline">
                                    Editar
                            </a>
                            <button class="text-red-600 font-medium hover:underline">Desactivar</button>
                        </td>
                    </tr>

                    <tr>
                        <td class="px-4 py-3">
                            <div>
                                <p class="font-medium">Laura Gómez</p>
                                <p class="text-xs text-gray-500">laura.gomez@email.com</p>
                            </div>
                        </td>
                        <td class="px-4 py-3">Limpieza</td>
                        <td class="px-4 py-3">55 2468 1357</td>
                        <td class="px-4 py-3">CDMX Norte</td>
                        <td class="px-4 py-3">Mar - Dom, 8:00 - 15:00</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs">
                                Inactivo
                            </span>
                        </td>
                        <td class="px-4 py-3 text-right space-x-3">
                            <a href="{{ route('admin.technicians.edit', 3) }}"
                                class="text-blue-600 font-medium hover:underline">
                                    Editar
                            </a>
                            <button class="text-green-600 font-medium hover:underline">Activar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection