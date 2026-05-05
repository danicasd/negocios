@extends('layouts.admin')

@section('title', 'Editar categoría')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.categories.index') }}"
           class="text-blue-600 text-sm font-medium hover:underline">
            ← Volver a categorías
        </a>
    </div>

    <div class="bg-white rounded-xl shadow p-6 max-w-3xl">
        <div class="mb-6">
            <h3 class="text-xl font-semibold">Editar categoría #{{ $id }}</h3>
            <p class="text-sm text-gray-500">
                Modifica la información de la categoría seleccionada.
            </p>
        </div>

        <form class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nombre de la categoría
                </label>
                <input type="text"
                       value="Plomería"
                       class="w-full rounded-lg border-gray-300 text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Descripción
                </label>
                <textarea rows="4"
                          class="w-full rounded-lg border-gray-300 text-sm">Servicios relacionados con fugas, tuberías y sanitarios.</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Ícono o referencia visual
                    </label>
                    <input type="text"
                           value="Llave inglesa"
                           class="w-full rounded-lg border-gray-300 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Estado
                    </label>
                    <select class="w-full rounded-lg border-gray-300 text-sm">
                        <option selected>Activa</option>
                        <option>Inactiva</option>
                    </select>
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-3 justify-end pt-4 border-t">
                <a href="{{ route('admin.categories.index') }}"
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