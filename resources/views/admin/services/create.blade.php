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

        <form method="POST" action="{{ route('admin.services.store') }}" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nombre -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Nombre del servicio
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           placeholder="Ej. Reparación de WC"
                           class="w-full rounded-lg border-gray-300 text-sm">

                    @error('name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Categoría -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Categoría
                    </label>

                    <select name="category_id" class="w-full rounded-lg border-gray-300 text-sm">
                        <option value="">Seleccionar categoría</option>

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Precio base -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Precio base
                    </label>

                    <input type="number"
                           name="base_price"
                           value="{{ old('base_price') }}"
                           placeholder="Ej. 450"
                           min="0"
                           step="0.01"
                           class="w-full rounded-lg border-gray-300 text-sm">

                    <p class="text-xs text-gray-500 mt-1">
                        Ingresa el monto en pesos mexicanos.
                    </p>

                    @error('base_price')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Duración estimada -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Duración estimada
                    </label>

                    <input type="number"
                        name="estimated_duration"
                        value="{{ old('estimated_duration') }}"
                        placeholder="Ej. 90"
                        min="1"
                        class="w-full rounded-lg border-gray-300 text-sm">

                    <p class="text-xs text-gray-500 mt-1">
                        Ingresa la duración aproximada en minutos.
                    </p>

                    @error('estimated_duration')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Estado -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Estado
                    </label>

                    <select name="status" class="w-full rounded-lg border-gray-300 text-sm">
                        <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>
                            Activo
                        </option>
                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                            Inactivo
                        </option>
                    </select>

                    @error('status')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Descripción -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Descripción
                </label>

                <textarea name="description"
                          rows="4"
                          placeholder="Describe qué incluye el servicio."
                          class="w-full rounded-lg border-gray-300 text-sm">{{ old('description') }}</textarea>

                @error('description')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col md:flex-row gap-3 justify-end pt-4 border-t">
                <a href="{{ route('admin.services.index') }}"
                   class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 text-sm font-medium hover:bg-gray-100 text-center">
                    Cancelar
                </a>

                <button type="submit"
                        class="px-4 py-2 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700">
                    Guardar servicio
                </button>
            </div>
        </form>
    </div>
@endsection