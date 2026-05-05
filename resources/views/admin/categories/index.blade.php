@extends('layouts.admin')

@section('title', 'Categorías')

@section('content')
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
                <h3 class="text-xl font-semibold">Categorías de servicios</h3>
                <p class="text-sm text-gray-500">
                    Organiza los servicios por tipo para facilitar la navegación del cliente.
                </p>
            </div>

            <a href="{{ route('admin.categories.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 text-center">
                + Agregar categoría
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            <!-- Categoría 1 -->
            <div class="border border-gray-200 rounded-xl p-5 hover:shadow-md transition">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h4 class="text-lg font-semibold">Plomería</h4>
                        <p class="text-sm text-gray-500">Servicios relacionados con fugas, tuberías y sanitarios.</p>
                    </div>

                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">
                        Activa
                    </span>
                </div>

                <div class="text-sm text-gray-600 mb-4">
                    <p><span class="font-medium">Servicios asociados:</span> 4</p>
                    <p><span class="font-medium">Ícono:</span> Llave inglesa</p>
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.categories.edit', 1) }}"
                       class="text-blue-600 text-sm font-medium hover:underline">
                        Editar
                    </a>

                    <button type="button"
                            class="text-red-600 text-sm font-medium hover:underline">
                        Desactivar
                    </button>
                </div>
            </div>

            <!-- Categoría 2 -->
            <div class="border border-gray-200 rounded-xl p-5 hover:shadow-md transition">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h4 class="text-lg font-semibold">Electricidad</h4>
                        <p class="text-sm text-gray-500">Instalaciones, contactos, apagadores y cableado.</p>
                    </div>

                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">
                        Activa
                    </span>
                </div>

                <div class="text-sm text-gray-600 mb-4">
                    <p><span class="font-medium">Servicios asociados:</span> 3</p>
                    <p><span class="font-medium">Ícono:</span> Rayo</p>
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.categories.edit', 2) }}"
                       class="text-blue-600 text-sm font-medium hover:underline">
                        Editar
                    </a>

                    <button type="button"
                            class="text-red-600 text-sm font-medium hover:underline">
                        Desactivar
                    </button>
                </div>
            </div>

            <!-- Categoría 3 -->
            <div class="border border-gray-200 rounded-xl p-5 hover:shadow-md transition">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h4 class="text-lg font-semibold">Limpieza</h4>
                        <p class="text-sm text-gray-500">Limpieza básica, profunda y mantenimiento del hogar.</p>
                    </div>

                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">
                        Activa
                    </span>
                </div>

                <div class="text-sm text-gray-600 mb-4">
                    <p><span class="font-medium">Servicios asociados:</span> 2</p>
                    <p><span class="font-medium">Ícono:</span> Escoba</p>
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.categories.edit', 3) }}"
                       class="text-blue-600 text-sm font-medium hover:underline">
                        Editar
                    </a>

                    <button type="button"
                            class="text-red-600 text-sm font-medium hover:underline">
                        Desactivar
                    </button>
                </div>
            </div>

            <!-- Categoría 4 -->
            <div class="border border-gray-200 rounded-xl p-5 hover:shadow-md transition">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h4 class="text-lg font-semibold">Mantenimiento</h4>
                        <p class="text-sm text-gray-500">Pintura, reparaciones menores y mejoras generales.</p>
                    </div>

                    <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs">
                        Inactiva
                    </span>
                </div>

                <div class="text-sm text-gray-600 mb-4">
                    <p><span class="font-medium">Servicios asociados:</span> 1</p>
                    <p><span class="font-medium">Ícono:</span> Herramientas</p>
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.categories.edit', 4) }}"
                       class="text-blue-600 text-sm font-medium hover:underline">
                        Editar
                    </a>

                    <button type="button"
                            class="text-green-600 text-sm font-medium hover:underline">
                        Activar
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection