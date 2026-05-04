@extends('layouts.admin')

@section('title', 'Agregar servicio')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.services.index') }}"
           class="text-blue-600 text-sm font-medium hover:underline">
            ← Volver a servicios
        </a>
    </div>

    <div class="bg-white rounded-xl shadow p-6 max-w-4xl">
        <div class="mb-6">
            <h3 class="text-xl font-semibold">Agregar nuevo servicio</h3>
            <p class="text-sm text-gray-500">
                Registra un servicio que estará disponible para los clientes.
            </p>
        </div>

        <form class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Nombre del servicio
                    </label>
                    <input type="text"
                           placeholder="Ej. Reparación de WC"
                           class="w-full rounded-lg border-gray-300 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Categoría
                    </label>
                    <select class="w-full rounded-lg border-gray-300 text-sm">
                        <option>Seleccionar categoría</option>
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
                        Precio base
                    </label>
                    <input type="number"
                           placeholder="Ej. 450"
                           class="w-full rounded-lg border-gray-300 text-sm">
                    <p class="text-xs text-gray-500 mt-1">
                        Ingresa el monto en pesos mexicanos.
                    </p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Duración estimada
                    </label>
                    <input type="text"
                           placeholder="Ej. 1 - 2 horas"
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
                           placeholder="Ej. plomeria-wc.jpg o ícono de baño"
                           class="w-full rounded-lg border-gray-300 text-sm">
                    <p class="text-xs text-gray-500 mt-1">
                        Por ahora puede ser solo una referencia; después pueden conectarlo a imágenes reales.
                    </p>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Descripción
                </label>
                <textarea rows="4"
                          placeholder="Describe qué incluye el servicio."
                          class="w-full rounded-lg border-gray-300 text-sm"></textarea>
            </div>

            <div class="bg-gray-50 border border-gray-200 rounded-xl p-5">
                <h4 class="font-semibold mb-3">Opciones de cotización</h4>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" class="rounded border-gray-300">
                        Servicio urgente
                    </label>

                    <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" class="rounded border-gray-300">
                        Complejidad
                    </label>

                    <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" class="rounded border-gray-300">
                        Ajuste por zona
                    </label>
                </div>

                <p class="text-xs text-gray-500 mt-3">
                    Estas opciones representan ajustes que después podrán afectar el precio final.
                </p>
            </div>

            <div class="flex flex-col md:flex-row gap-3 justify-end pt-4 border-t">
                <a href="{{ route('admin.services.index') }}"
                   class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 text-sm font-medium hover:bg-gray-100 text-center">
                    Cancelar
                </a>

                <button type="button"
                        class="px-4 py-2 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700">
                    Guardar servicio
                </button>
            </div>
        </form>
    </div>
@endsection