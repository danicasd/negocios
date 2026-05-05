@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-sm text-gray-500">Solicitudes pendientes</p>
            <h3 class="text-3xl font-bold mt-2">8</h3>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-sm text-gray-500">Servicios activos</p>
            <h3 class="text-3xl font-bold mt-2">15</h3>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-sm text-gray-500">Técnicos disponibles</p>
            <h3 class="text-3xl font-bold mt-2">12</h3>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-sm text-gray-500">Usuarios registrados</p>
            <h3 class="text-3xl font-bold mt-2">42</h3>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Últimas solicitudes</h3>
            <a href="{{ route('admin.bookings.index') }}" class="text-blue-600 text-sm font-medium hover:underline">
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
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-3">María López</td>
                        <td class="px-4 py-3">Reparación de WC</td>
                        <td class="px-4 py-3">10/05/2026</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs">
                                Pendiente
                            </span>
                        </td>
                        <td class="px-4 py-3">Sin asignar</td>
                    </tr>

                    <tr class="border-b">
                        <td class="px-4 py-3">Carlos Méndez</td>
                        <td class="px-4 py-3">Instalación eléctrica</td>
                        <td class="px-4 py-3">11/05/2026</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">
                                Confirmada
                            </span>
                        </td>
                        <td class="px-4 py-3">Juan Pérez</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection