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

            <div class="text-sm text-gray-500">
                Total: {{ $users->count() }} usuarios
            </div>
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
                        <th class="px-4 py-3">Registro</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($users as $user)
                        <tr>
                            <td class="px-4 py-3 font-medium">
                                {{ $user->name }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $user->email }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $user->phone ?? 'No registrado' }}
                            </td>

                            <td class="px-4 py-3">
                                Cliente
                            </td>

                            <td class="px-4 py-3">
                                {{ $user->bookings_count }}
                            </td>

                            <td class="px-4 py-3">
                                @if($user->status)
                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">
                                        Activo
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs">
                                        Inactivo
                                    </span>
                                @endif
                            </td>

                            <td class="px-4 py-3">
                                {{ $user->created_at ? $user->created_at->format('d/m/Y') : 'Sin fecha' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-10 text-center text-gray-500">
                                No hay usuarios registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection