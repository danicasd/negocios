@extends('layouts.admin')

@section('title', 'Servicios')

@section('content')
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
                <h3 class="text-xl font-semibold">Catálogo de servicios</h3>
                <p class="text-sm text-gray-500">
                    Administra los servicios disponibles para los clientes.
                </p>
            </div>

            <a href="{{ route('admin.services.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700">
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
                    <tr>
                        <td class="px-4 py-3">
                            <div>
                                <p class="font-medium">Reparación de WC</p>
                                <p class="text-xs text-gray-500">Fugas, ruido o fallas básicas.</p>
                            </div>
                        </td>
                        <td class="px-4 py-3">Plomería</td>
                        <td class="px-4 py-3">$450 MXN</td>
                        <td class="px-4 py-3">1 - 2 horas</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">
                                Activo
                            </span>
                        </td>
                        <td class="px-4 py-3 text-right space-x-3">
                            <a href="{{ route('admin.services.edit', 1) }}"
                                class="text-blue-600 font-medium hover:underline">
                                    Editar
                            </a>
                            <button class="text-red-600 font-medium hover:underline">Desactivar</button>
                        </td>
                    </tr>

                    <tr>
                        <td class="px-4 py-3">
                            <div>
                                <p class="font-medium">Instalación eléctrica</p>
                                <p class="text-xs text-gray-500">Contactos, apagadores y cableado básico.</p>
                            </div>
                        </td>
                        <td class="px-4 py-3">Electricidad</td>
                        <td class="px-4 py-3">$600 MXN</td>
                        <td class="px-4 py-3">2 - 3 horas</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">
                                Activo
                            </span>
                        </td>
                        <td class="px-4 py-3 text-right space-x-3">
                            <a href="{{ route('admin.services.edit', 2) }}"
                                class="text-blue-600 font-medium hover:underline">
                                    Editar
                            </a>
                            <button class="text-red-600 font-medium hover:underline">Desactivar</button>
                        </td>
                    </tr>

                    <tr>
                        <td class="px-4 py-3">
                            <div>
                                <p class="font-medium">Limpieza profunda</p>
                                <p class="text-xs text-gray-500">Servicio general para casa o departamento.</p>
                            </div>
                        </td>
                        <td class="px-4 py-3">Limpieza</td>
                        <td class="px-4 py-3">$700 MXN</td>
                        <td class="px-4 py-3">3 - 4 horas</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs">
                                Inactivo
                            </span>
                        </td>
                        <td class="px-4 py-3 text-right space-x-3">
                            <a href="{{ route('admin.services.edit', 3) }}"
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