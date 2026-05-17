@extends('layouts.admin')

@section('title', 'Categorías')

@section('content')
    @if(session('success'))
        <div class="mb-4 rounded-lg bg-green-100 text-green-700 px-4 py-3 text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-4 rounded-lg bg-red-100 text-red-700 px-4 py-3 text-sm">
            {{ session('error') }}
        </div>
    @endif

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
            @forelse($categories as $category)
                <div class="border border-gray-200 rounded-xl p-5 hover:shadow-md transition">
                    <div class="flex justify-between items-start mb-4 gap-4">
                        <div>
                            <h4 class="text-lg font-semibold">{{ $category->name }}</h4>

                            <p class="text-sm text-gray-500 mt-1">
                                {{ $category->description ?? 'Sin descripción registrada.' }}
                            </p>
                        </div>

                        @if($category->status)
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs whitespace-nowrap">
                                Activa
                            </span>
                        @else
                            <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs whitespace-nowrap">
                                Inactiva
                            </span>
                        @endif
                    </div>

                    <div class="text-sm text-gray-600 mb-4">
                        <p>
                            <span class="font-medium">Servicios asociados:</span>
                            {{ $category->services_count }}
                        </p>

                        <p>
                            <span class="font-medium">Creada:</span>
                            {{ $category->created_at->format('d/m/Y') }}
                        </p>
                    </div>

                    <div class="flex justify-end gap-3">
                        <a href="{{ route('admin.categories.edit', $category) }}"
                           class="text-blue-600 text-sm font-medium hover:underline">
                            Editar
                        </a>

                        <form action="{{ route('admin.categories.destroy', $category) }}"
                                method="POST"
                                onsubmit="return confirm('{{ $category->status ? '¿Seguro que deseas desactivar esta categoría?' : '¿Seguro que deseas activar esta categoría?' }}');">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="{{ $category->status ? 'text-red-600' : 'text-green-600' }} text-sm font-medium hover:underline">
                                {{ $category->status ? 'Desactivar' : 'Activar' }}
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-10 text-gray-500">
                    No hay categorías registradas.
                </div>
            @endforelse
        </div>
    </div>
@endsection