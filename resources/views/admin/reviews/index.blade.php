@extends('layouts.admin')

@section('title', 'Reseñas')

@section('content')
    @if(session('success'))
        <div class="mb-4 rounded-lg bg-green-100 text-green-700 px-4 py-3 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
                <h3 class="text-xl font-semibold">Reseñas de clientes</h3>
                <p class="text-sm text-gray-500">
                    Consulta y modera las calificaciones realizadas por los clientes.
                </p>
            </div>

            <div class="text-sm text-gray-500">
                Total: {{ $reviews->count() }} reseñas
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Cliente</th>
                        <th class="px-4 py-3">Servicio</th>
                        <th class="px-4 py-3">Solicitud</th>
                        <th class="px-4 py-3">Calificación</th>
                        <th class="px-4 py-3">Comentario</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3">Fecha</th>
                        <th class="px-4 py-3 text-right">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($reviews as $review)
                        <tr>
                            <td class="px-4 py-3 font-medium">
                                #{{ $review->id }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $review->user->name ?? 'Usuario no disponible' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $review->booking->service->name ?? 'Servicio no disponible' }}
                            </td>

                            <td class="px-4 py-3">
                                @if($review->booking)
                                    <a href="{{ route('admin.bookings.show', $review->booking) }}"
                                       class="text-blue-600 font-medium hover:underline">
                                        Solicitud #{{ $review->booking->id }}
                                    </a>
                                @else
                                    No disponible
                                @endif
                            </td>

                            <td class="px-4 py-3">
                                <div class="flex items-center gap-1">
                                    <span class="font-medium">{{ $review->rating }}/5</span>
                                    <span class="text-yellow-500">
                                        @for($i = 1; $i <= 5; $i++)
                                            {{ $i <= $review->rating ? '★' : '☆' }}
                                        @endfor
                                    </span>
                                </div>
                            </td>

                            <td class="px-4 py-3 max-w-xs">
                                <p class="line-clamp-2">
                                    {{ $review->comment ?? 'Sin comentario.' }}
                                </p>
                            </td>

                            <td class="px-4 py-3">
                                @if($review->status)
                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">
                                        Visible
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs">
                                        Oculta
                                    </span>
                                @endif
                            </td>

                            <td class="px-4 py-3">
                                {{ $review->created_at ? $review->created_at->format('d/m/Y') : 'Sin fecha' }}
                            </td>

                            <td class="px-4 py-3 text-right">
                                <form action="{{ route('admin.reviews.toggle-status', $review) }}"
                                      method="POST"
                                      onsubmit="return confirm('¿Seguro que deseas cambiar el estado de esta reseña?');">
                                    @csrf
                                    @method('PATCH')

                                    <button type="submit"
                                            class="{{ $review->status ? 'text-red-600' : 'text-green-600' }} font-medium hover:underline">
                                        {{ $review->status ? 'Ocultar' : 'Mostrar' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-4 py-10 text-center text-gray-500">
                                No hay reseñas registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection