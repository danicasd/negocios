@extends('layouts.admin')

@section('title', 'Solicitudes')

@section('content')
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
                <h3 class="text-xl font-semibold">Solicitudes de servicio</h3>
                <p class="text-sm text-gray-500">
                    Revisa, asigna técnicos y actualiza el estado de las solicitudes.
                </p>
            </div>

            <div class="flex gap-2">
                <select class="rounded-lg border-gray-300 text-sm">
                    <option>Todos los estados</option>
                    <option>Pendiente</option>
                    <option>Confirmada</option>
                    <option>En proceso</option>
                    <option>Completada</option>
                    <option>Cancelada</option>
                </select>

                <input
                    type="text"
                    placeholder="Buscar solicitud..."
                    class="rounded-lg border-gray-300 text-sm"
                >
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Cliente</th>
                        <th class="px-4 py-3">Servicio</th>
                        <th class="px-4 py-3">Fecha</th>
                        <th class="px-4 py-3">Hora</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3">Técnico</th>
                        <th class="px-4 py-3 text-right">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    <tr>
                        <td class="px-4 py-3 font-medium">#001</td>
                        <td class="px-4 py-3">María López</td>
                        <td class="px-4 py-3">Reparación de WC</td>
                        <td class="px-4 py-3">10/05/2026</td>
                        <td class="px-4 py-3">10:00 AM</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs">
                                Pendiente
                            </span>
                        </td>
                        <td class="px-4 py-3">Sin asignar</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.bookings.show', 1) }}"
                               class="text-blue-600 font-medium hover:underline">
                                Ver detalle
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td class="px-4 py-3 font-medium">#002</td>
                        <td class="px-4 py-3">Carlos Méndez</td>
                        <td class="px-4 py-3">Instalación eléctrica</td>
                        <td class="px-4 py-3">11/05/2026</td>
                        <td class="px-4 py-3">12:00 PM</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">
                                Confirmada
                            </span>
                        </td>
                        <td class="px-4 py-3">Juan Pérez</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.bookings.show', 2) }}"
                               class="text-blue-600 font-medium hover:underline">
                                Ver detalle
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td class="px-4 py-3 font-medium">#003</td>
                        <td class="px-4 py-3">Ana Torres</td>
                        <td class="px-4 py-3">Limpieza profunda</td>
                        <td class="px-4 py-3">12/05/2026</td>
                        <td class="px-4 py-3">09:00 AM</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs">
                                En proceso
                            </span>
                        </td>
                        <td class="px-4 py-3">Laura Gómez</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.bookings.show', 3) }}"
                               class="text-blue-600 font-medium hover:underline">
                                Ver detalle
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection