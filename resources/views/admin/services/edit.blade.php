@extends('layouts.admin')

@section('title', 'Editar servicio')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.services.index') }}"
           class="text-blue-600 text-sm font-medium hover:underline">
            ← Volver a servicios
        </a>
    </div>

    <div class="bg-white rounded-xl shadow p-6 max-w-4xl">
        <div class="mb-6">
            <h3 class="text-xl font-semibold">Editar servicio #{{ $id }}</h3>
            <p class="text-sm text-gray-500">
                Modifica la información del servicio seleccionado.
            </p>
        </div>

        <form class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Nombre del servicio
                    </label>
                    <input type="text"
                           value="Reparación de WC"
                           class="w-full rounded-lg border-gray-300 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Categoría
                    </label>
                    <select class="w-full rounded-lg border-gray-300 text-sm">
                        <option selected>Plomería</option>
                        <option>Electricidad</option>
                        <option>Limpieza</option>
                        <option>Mantenimiento</option>
                        <option>Soporte técnico</option>
                        <option>Seguridad</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Precio base
                    </label>
                    <input type="number"
                           value="450"
                           class="w-full rounded-lg border-gray-300 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Duración estimada
                    </label>
                    <input type="text"
                           value="1 - 2 horas"
                           class="w-full rounded-lg border-gray-300 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Estado
                    </label>
                    <select class="w-full rounded-lg border-gray-300 text-sm">
                        <option selected>Activo</option>
                        <option>Inactivo</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Imagen o referencia visual
                    </label>
                    <input type="text"
                           value="Ícono de plomería"
                           class="w-full rounded-lg border-gray-300 text-sm">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Descripción
                </label>
                <textarea rows="4"
                          class="w-full rounded-lg border-gray-300 text-sm">Servicio para corregir fugas, ruido constante o fallas básicas en WC.</textarea>
            </div>

            <div class="bg-gray-50 border border-gray-200 rounded-xl p-5">
                <h4 class="font-semibold mb-3">Opciones de cotización</h4>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" class="rounded border-gray-300" checked>
                        Servicio urgente
                    </label>

                    <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" class="rounded border-gray-300" checked>
                        Complejidad
                    </label>

                    <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" class="rounded border-gray-300">
                        Ajuste por zona
                    </label>
                </div>

                <p class="text-xs text-gray-500 mt-3">
                    Estas opciones indican qué variables puede seleccionar el cliente al cotizar el servicio.
                </p>
            </div>

            <div class="flex flex-col md:flex-row gap-3 justify-end pt-4 border-t">
                <a href="{{ route('admin.services.index') }}"
                   class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 text-sm font-medium hover:bg-gray-100 text-center">
                    Cancelar
                </a>

                <button type="button"
                        class="px-4 py-2 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700">
                    Guardar cambios
                </button>
            </div>
        </form>
    </div>
@endsection