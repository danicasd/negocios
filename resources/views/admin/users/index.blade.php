@extends('layouts.admin')

@section('title', 'Usuarios')

@section('content')
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
                <h3 class="text-xl font-semibold">Usuarios registrados</h3>
                <p class="text-sm text-gray-500">
                    Consulta los clientes registrados y su actividad dentro del sistema.
                </p>
            </div>

            <input type="text"
                   placeholder="Buscar usuario..."
                   class="rounded-lg border-gray-300 text-sm">
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-4 py-3">Usuario</th>
                        <th class="px-4 py-3">Correo</th>
                        <th class="px-4 py-3">Teléfono</th>
                        <th class="px-4 py-3">Rol</th>
                        <th class="px-4 py-3">Solicitudes</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3 text-right">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    <tr>
                        <td class="px-4 py-3 font-medium">María López</td>
                        <td class="px-4 py-3">maria.lopez@email.com</td>
                        <td class="px-4 py-3">55 1234 5678</td>
                        <td class="px-4 py-3">Cliente</td>
                        <td class="px-4 py-3">3</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">
                                Activo
                            </span>
                        </td>
                        <td class="px-4 py-3 text-right">
                            <button class="text-blue-600 font-medium hover:underline">
                                Ver historial
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td class="px-4 py-3 font-medium">Carlos Méndez</td>
                        <td class="px-4 py-3">carlos.mendez@email.com</td>
                        <td class="px-4 py-3">55 9876 4321</td>
                        <td class="px-4 py-3">Cliente</td>
                        <td class="px-4 py-3">1</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">
                                Activo
                            </span>
                        </td>
                        <td class="px-4 py-3 text-right">
                            <button class="text-blue-600 font-medium hover:underline">
                                Ver historial
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td class="px-4 py-3 font-medium">Ana Torres</td>
                        <td class="px-4 py-3">ana.torres@email.com</td>
                        <td class="px-4 py-3">55 2468 1357</td>
                        <td class="px-4 py-3">Cliente</td>
                        <td class="px-4 py-3">5</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs">
                                Inactivo
                            </span>
                        </td>
                        <td class="px-4 py-3 text-right">
                            <button class="text-blue-600 font-medium hover:underline">
                                Ver historial
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection