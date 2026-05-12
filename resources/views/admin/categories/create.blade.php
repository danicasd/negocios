@extends('layouts.admin')

@section('title', 'Agregar categoría')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.categories.index') }}"
           class="text-blue-600 text-sm font-medium hover:underline">
            ← Volver a categorías
        </a>
    </div>

    <div class="bg-white rounded-xl shadow p-6 max-w-3xl">
        <div class="mb-6">
            <h3 class="text-xl font-semibold">Agregar nueva categoría</h3>
            <p class="text-sm text-gray-500">
                Registra una categoría para organizar los servicios que verá el cliente.
            </p>
        </div>

        <form method="POST" action="{{ route('admin.categories.store') }}" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nombre de la categoría
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="Ej. Plomería"
                       class="w-full rounded-lg border-gray-300 text-sm">

                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Descripción
                </label>

                <textarea name="description"
                          rows="4"
                          placeholder="Ej. Servicios relacionados con fugas, tuberías, sanitarios y reparaciones hidráulicas."
                          class="w-full rounded-lg border-gray-300 text-sm">{{ old('description') }}</textarea>

                @error('description')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Estado
                </label>

                <select name="status" class="w-full rounded-lg border-gray-300 text-sm">
                    <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>
                        Activa
                    </option>
                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                        Inactiva
                    </option>
                </select>

                @error('status')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col md:flex-row gap-3 justify-end pt-4 border-t">
                <a href="{{ route('admin.categories.index') }}"
                   class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 text-sm font-medium hover:bg-gray-100 text-center">
                    Cancelar
                </a>

                <button type="submit"
                        class="px-4 py-2 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700">
                    Guardar categoría
                </button>
            </div>
        </form>
    </div>
@endsection