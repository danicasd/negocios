@extends('layouts.admin')

@section('title', 'Detalle de solicitud')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.bookings.index') }}"
           class="text-blue-600 text-sm font-medium hover:underline">
            ← Volver a solicitudes
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Información principal -->
        <div class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow p-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                    <div>
                        <h3 class="text-xl font-semibold">Solicitud #{{ $id }}</h3>
                        <p class="text-sm text-gray-500">
                            Información general del servicio solicitado.
                        </p>
                    </div>

                    <span class="w-fit px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-medium">
                        Pendiente
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <p class="text-sm text-gray-500">Cliente</p>
                        <p class="font-medium">María López</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Teléfono</p>
                        <p class="font-medium">55 1234 5678</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Correo</p>
                        <p class="font-medium">maria.lopez@email.com</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Servicio</p>
                        <p class="font-medium">Reparación de WC</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Fecha programada</p>
                        <p class="font-medium">10/05/2026</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Hora programada</p>
                        <p class="font-medium">10:00 AM</p>
                    </div>

                    <div class="md:col-span-2">
                        <p class="text-sm text-gray-500">Dirección</p>
                        <p class="font-medium">
                            Av. Universidad 3000, Coyoacán, Ciudad de México
                        </p>
                    </div>

                    <div class="md:col-span-2">
                        <p class="text-sm text-gray-500">Notas del cliente</p>
                        <p class="font-medium">
                            El WC presenta fuga constante y hace ruido durante la noche.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Opciones del servicio -->
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Opciones seleccionadas</h3>

                <div class="space-y-3">
                    <div class="flex justify-between border-b pb-3">
                        <span class="text-gray-600">Tipo de servicio</span>
                        <span class="font-medium">Reparación básica</span>
                    </div>

                    <div class="flex justify-between border-b pb-3">
                        <span class="text-gray-600">Urgencia</span>
                        <span class="font-medium">Normal</span>
                    </div>

                    <div class="flex justify-between border-b pb-3">
                        <span class="text-gray-600">Zona</span>
                        <span class="font-medium">CDMX</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-600">Precio estimado</span>
                        <span class="font-bold text-lg">$450 MXN</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panel lateral -->
        <div class="space-y-6">

            <!-- Asignación -->
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Asignar técnico</h3>

                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Técnico disponible
                        </label>

                        <select class="w-full rounded-lg border-gray-300 text-sm">
                            <option>Seleccionar técnico</option>
                            <option>Juan Pérez - Plomería</option>
                            <option>Roberto García - Plomería</option>
                            <option>Laura Gómez - Limpieza</option>
                        </select>
                    </div>

                    <button type="button"
                            class="w-full bg-blue-600 text-white py-2 rounded-lg font-medium hover:bg-blue-700">
                        Asignar técnico
                    </button>
                </form>
            </div>

            <!-- Estado -->
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Actualizar estado</h3>

                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Estado de la solicitud
                        </label>

                        <select class="w-full rounded-lg border-gray-300 text-sm">
                            <option>Pendiente</option>
                            <option>Confirmada</option>
                            <option>En proceso</option>
                            <option>Completada</option>
                            <option>Cancelada</option>
                        </select>
                    </div>

                    <button type="button"
                            class="w-full bg-slate-900 text-white py-2 rounded-lg font-medium hover:bg-slate-800">
                        Guardar cambios
                    </button>
                </form>
            </div>

            <!-- Resumen -->
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Resumen administrativo</h3>

                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Creada el</span>
                        <span class="font-medium">08/05/2026</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Método de pago</span>
                        <span class="font-medium">Efectivo</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Pago</span>
                        <span class="px-2 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs">
                            Pendiente
                        </span>
                    </div>
                </div>
            </div>

            <button type="button"
                    class="w-full bg-red-600 text-white py-2 rounded-lg font-medium hover:bg-red-700">
                Cancelar solicitud
            </button>
        </div>
    </div>
@endsection