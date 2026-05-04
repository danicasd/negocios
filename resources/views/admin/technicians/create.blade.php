@extends('layouts.admin')

@section('title', 'Agregar técnico')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.technicians.index') }}"
           class="text-blue-600 text-sm font-medium hover:underline">
            ← Volver a técnicos
        </a>
    </div>

    <div class="bg-white rounded-xl shadow p-6 max-w-4xl">
        <div class="mb-6">
            <h3 class="text-xl font-semibold">Agregar nuevo técnico</h3>
            <p class="text-sm text-gray-500">
                Registra la información del técnico, su especialidad, zona de trabajo y disponibilidad.
            </p>
        </div>

        <form class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Nombre
                    </label>
                    <input type="text"
                           placeholder="Ej. Juan"
                           class="w-full rounded-lg border-gray-300 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Apellidos
                    </label>
                    <input type="text"
                           placeholder="Ej. Pérez López"
                           class="w-full rounded-lg border-gray-300 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Correo electrónico
                    </label>
                    <input type="email"
                           placeholder="correo@email.com"
                           class="w-full rounded-lg border-gray-300 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Teléfono
                    </label>
                    <input type="text"
                           placeholder="55 1234 5678"
                           class="w-full rounded-lg border-gray-300 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Especialidad
                    </label>
                    <select class="w-full rounded-lg border-gray-300 text-sm">
                        <option>Seleccionar especialidad</option>
                        <option>Plomería</option>
                        <option>Electricidad</option>
                        <option>Limpieza</option>
                        <option>Mantenimiento</option>
                        <option>Soporte técnico</option>
                        <option>Seguridad</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Zona de trabajo
                    </label>
                    <select class="w-full rounded-lg border-gray-300 text-sm">
                        <option>Seleccionar zona</option>
                        <option>CDMX Sur</option>
                        <option>CDMX Norte</option>
                        <option>CDMX Centro</option>
                        <option>CDMX Oriente</option>
                        <option>CDMX Poniente</option>
                        <option>Estado de México</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Días disponibles
                    </label>
                    <input type="text"
                           placeholder="Ej. Lunes a viernes"
                           class="w-full rounded-lg border-gray-300 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Horario
                    </label>
                    <input type="text"
                           placeholder="Ej. 09:00 - 18:00"
                           class="w-full rounded-lg border-gray-300 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Estado
                    </label>
                    <select class="w-full rounded-lg border-gray-300 text-sm">
                        <option selected>Disponible</option>
                        <option>Ocupado</option>
                        <option>Inactivo</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Notas administrativas
                </label>
                <textarea rows="4"
                          class="w-full rounded-lg border-gray-300 text-sm"
                          placeholder="Ej. Técnico con experiencia en servicios urgentes."></textarea>
            </div>

            <div class="flex flex-col md:flex-row gap-3 justify-end pt-4 border-t">
                <a href="{{ route('admin.technicians.index') }}"
                   class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 text-sm font-medium hover:bg-gray-100 text-center">
                    Cancelar
                </a>

                <button type="button"
                        class="px-4 py-2 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700">
                    Guardar técnico
                </button>
            </div>
        </form>
    </div>
@endsection