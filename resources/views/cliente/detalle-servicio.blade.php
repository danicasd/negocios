<x-app-layout>

    <div class="min-h-screen bg-gray-50 py-10">

        <div class="max-w-5xl mx-auto px-4">

            {{-- Header --}}
            <div class="mb-8 flex justify-between items-start">

                <div>
                    <h1 class="text-3xl font-bold text-gray-800">
                        {{ $booking->service->name }}
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Orden #{{ str_pad($booking->id, 4, '0', STR_PAD_LEFT) }}
                    </p>
                </div>

                <a href="{{ route('cliente.mis-servicios') }}"
                   class="text-blue-600 hover:text-blue-800 font-bold text-xl">
                    ← Volver
                </a>

            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-200 text-green-700 px-5 py-4 rounded-2xl mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-200 text-red-700 px-5 py-4 rounded-2xl mb-6">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border border-red-200 text-red-700 px-5 py-4 rounded-2xl mb-6">
                    {{ $errors->first() }}
                </div>
            @endif

            {{-- Card principal --}}
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">

                {{-- Estado --}}
                <div class="mb-8">

                    @php
                        $statusLabels = [
                            'pending' => 'Pendiente',
                            'confirmed' => 'Confirmado',
                            'in_progress' => 'En proceso',
                            'completed' => 'Completado',
                            'cancelled' => 'Cancelado',
                        ];

                        $statusText =
                            $statusLabels[$booking->status]
                            ?? ucfirst(str_replace('_', ' ', $booking->status));
                    @endphp

                    <span class="px-5 py-2 rounded-full text-sm font-semibold

                        @if($booking->status === 'pending')
                            bg-yellow-100 text-yellow-700

                        @elseif($booking->status === 'confirmed')
                            bg-blue-100 text-blue-700

                        @elseif($booking->status === 'in_progress')
                            bg-orange-100 text-orange-700

                        @elseif($booking->status === 'completed')
                            bg-green-100 text-green-700

                        @elseif($booking->status === 'cancelled')
                            bg-red-100 text-red-700

                        @else
                            bg-gray-100 text-gray-700
                        @endif
                    ">
                        {{ $statusText }}
                    </span>

                </div>

                {{-- Información --}}
                <div class="grid md:grid-cols-2 gap-8">

                    {{-- Columna izquierda --}}
                    <div class="space-y-6">

                        <div>
                            <h3 class="text-sm font-semibold text-gray-400 uppercase">
                                Fecha programada
                            </h3>

                            <p class="text-gray-800 mt-2">
                                {{ \Carbon\Carbon::parse($booking->scheduled_at)->format('d/m/Y h:i A') }}
                            </p>
                        </div>

                        <div>
                            <h3 class="text-sm font-semibold text-gray-400 uppercase">
                                Dirección
                            </h3>

                            <div class="text-gray-800 mt-2 leading-7">

                                {{ $booking->address->calle }}
                                #{{ $booking->address->external_number }}

                                @if($booking->address->internal_number)
                                    Int. {{ $booking->address->internal_number }}
                                @endif

                                <br>

                                Col. {{ $booking->address->colonia }}

                                <br>

                                {{ $booking->address->alcaldia }},
                                {{ $booking->address->estado }}

                                <br>

                                C.P. {{ $booking->address->postal_code }}

                                @if($booking->address->references)
                                    <br>
                                    <span class="text-gray-500">
                                        Referencias:
                                        {{ $booking->address->references }}
                                    </span>
                                @endif

                            </div>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-400 uppercase">
                                Técnico asignado
                            </h3>

                            @if($booking->technician)
                                <p class="text-gray-800 mt-2">
                                    {{ $booking->technician->name }}
                                </p>
                            @else
                                <p class="text-gray-500 mt-2">
                                    Aún no se ha asignado un técnico.
                                </p>
                            @endif
                        </div>

                    </div>

                    {{-- Columna derecha --}}
                    <div class="space-y-6">

                        @php
                            $payment = $booking->payments->first();
                            $remaining = $booking->total - ($payment->amount ?? 0);
                        @endphp

                        <div>
                            <h3 class="text-sm font-semibold text-gray-400 uppercase">
                                Resumen de pago
                            </h3>

                            <div class="mt-2 space-y-2 text-gray-800">

                                
                                @if($booking->status === 'completed')

                                    <p>
                                        Anticipo pagado:
                                        <span class="font-semibold text-green-600">
                                            ${{ number_format($payment->amount ?? 0, 2) }}
                                        </span>
                                    </p>

                                    <p>
                                        Saldo liquidado:
                                        <span class="font-semibold text-green-600">
                                            ${{ number_format($remaining, 2) }}
                                        </span>
                                    </p>

                                    <p>
                                        Total pagado:
                                        <span class="font-semibold">
                                            ${{ number_format($booking->total, 2) }}
                                        </span>
                                    </p>

                                    <p>
                                        Estado:
                                        <span class="font-semibold text-green-600">
                                            Liquidado
                                        </span>
                                    </p>

                                @else

                                    <p>
                                        Total del servicio:
                                        <span class="font-semibold">
                                            ${{ number_format($booking->total, 2) }}
                                        </span>
                                    </p>

                                    <p>
                                        Anticipo pagado:
                                        <span class="font-semibold text-green-600">
                                            ${{ number_format($payment->amount ?? 0, 2) }}
                                        </span>
                                    </p>

                                    <p>
                                        Saldo pendiente:
                                        <span class="font-semibold text-orange-600">
                                            ${{ number_format($remaining, 2) }}
                                        </span>
                                    </p>

                                @endif

                            </div>
                        </div>

                        @php
                            $paymentMethodLabels = [
                                'card' => 'Tarjeta',
                                'cash' => 'Efectivo',
                                'transfer' => 'Transferencia',
                            ];

                            $paymentStatusLabels = [
                                'paid' => 'Pagado',
                                'pending' => 'Pendiente',
                                'failed' => 'Fallido',
                            ];

                            $paymentMethodText =
                                $paymentMethodLabels[$payment->payment_method]
                                ?? ucfirst($payment->payment_method);

                            $paymentStatusText =
                                $paymentStatusLabels[$payment->status]
                                ?? ucfirst($payment->status);
                        @endphp
                        
                        @if($payment)
                            <div>
                                <h3 class="text-sm font-semibold text-gray-400 uppercase">
                                    Pago
                                </h3>

                                <div class="mt-2 text-gray-800 leading-7">

                                    Método:
                                    {{ $paymentMethodText }}

                                    <br>

                                    Estado:
                                    {{ $paymentStatusText }}

                                    <br>

                                    Referencia:
                                    {{ $payment->transaction_reference }}

                                </div>
                            </div>
                        @endif

                    </div>

                </div>

               
            </div>

             @php
                    $payment = $booking->payments->first();
                    $canCancel =
                        $booking->status === 'pending'
                        && now()->diffInHours(\Carbon\Carbon::parse($booking->scheduled_at), false) >= 24;
                        $canReschedule = $canCancel;
                @endphp

                {{-- Timeline --}}
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 mt-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-6">
                        Seguimiento del servicio
                    </h2>

                    <div class="space-y-5">

                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded-full bg-green-100 text-green-700 flex items-center justify-center font-bold">
                                ✓
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Solicitud creada</p>
                                <p class="text-sm text-gray-500">
                                    {{ $booking->created_at->format('d/m/Y h:i A') }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded-full {{ $payment ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-400' }} flex items-center justify-center font-bold">
                                {{ $payment ? '✓' : '•' }}
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Anticipo pagado</p>
                                <p class="text-sm text-gray-500">
                                    {{ $payment ? $payment->paid_at->format('d/m/Y h:i A') : 'Pendiente' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded-full {{ $booking->technician_id ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-400' }} flex items-center justify-center font-bold">
                                {{ $booking->technician_id ? '✓' : '•' }}
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Técnico asignado</p>
                                <p class="text-sm text-gray-500">
                                    {{ $booking->technician_id ? 'Asignado' : 'Pendiente de asignación' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded-full {{ $booking->status === 'in_progress' || $booking->status === 'completed' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-400' }} flex items-center justify-center font-bold">
                                {{ $booking->status === 'in_progress' || $booking->status === 'completed' ? '✓' : '•' }}
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Servicio en proceso</p>
                                <p class="text-sm text-gray-500">
                                    {{ $booking->status === 'in_progress' ? 'Actualmente en proceso' : 'Aún no inicia' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded-full {{ $booking->status === 'completed' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-400' }} flex items-center justify-center font-bold">
                                {{ $booking->status === 'completed' ? '✓' : '•' }}
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Servicio completado</p>
                                <p class="text-sm text-gray-500">
                                    {{ $booking->status === 'completed' ? 'Finalizado correctamente' : 'Pendiente' }}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Reseña del servicio --}}
                @if($booking->status === 'completed')
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 mt-8">
                        <h2 class="text-xl font-bold text-gray-800">
                            ¿Cómo calificarías el servicio?
                        </h2>

                        @if($booking->review)
                            <div class="mt-4 bg-green-50 border border-green-200 rounded-2xl p-5">
                                <p class="font-semibold text-green-800">
                                    Ya calificaste este servicio
                                </p>

                                <p class="text-yellow-500 text-2xl mt-3">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $booking->review->rating)
                                            ★
                                        @else
                                            ☆
                                        @endif
                                    @endfor
                                </p>

                                @if($booking->review->comment)
                                    <p class="text-gray-700 mt-3">
                                        "{{ $booking->review->comment }}"
                                    </p>
                                @endif
                            </div>
                        @else
                            <p class="text-gray-500 mt-2">
                                Tu opinión nos ayuda a mejorar.
                            </p>

                            <form method="POST"
                                action="{{ route('cliente.servicio.review', $booking->id) }}"
                                class="mt-5 space-y-5">
                                @csrf

                                <div>

                                    <input type="hidden" name="rating" id="ratingInput" required>

                                    <div class="flex justify-center items-center gap-2 mt-6" id="starContainer">

                                        @for($i = 1; $i <= 5; $i++)
                                            <button type="button"
                                                    class="star text-4xl text-gray-300 transition hover:scale-110"
                                                    data-value="{{ $i }}">
                                                ★
                                            </button>
                                        @endfor

                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 mt-8">
                                        Comentario
                                    </label>

                                    <textarea name="comment"
                                            rows="4"
                                            maxlength="500"
                                            placeholder="Cuéntanos cómo fue tu experiencia..."
                                            class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>
                                </div>

                                <div class="flex justify-center mt-8">
                                    <button type="submit"
                                            class="bg-blue-600 text-white px-8 py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
                                        Enviar reseña
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>
                @endif

                {{-- Reagendar servicio --}}
                @if($booking->status === 'pending')
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 mt-8">
                        <h2 class="text-xl font-bold text-gray-800">
                            Reagendar servicio
                        </h2>

                        @if($canReschedule)
                            <p class="text-gray-500 mt-2">
                                Puedes cambiar la fecha y hora de tu servicio al menos 24 horas antes de la fecha programada.
                            </p>

                            <form method="POST"
                                action="{{ route('cliente.servicio.reagendar', $booking->id) }}"
                                class="mt-5 grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                                @csrf
                                @method('PATCH')

                                <div>
                                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                                        Nueva fecha
                                    </label>
                                    <input type="date"
                                        name="new_date"
                                        min="{{ now()->addDay()->format('Y-m-d') }}"
                                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        required>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                                        Nueva hora
                                    </label>
                                    <input type="time"
                                        name="new_time"
                                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        required>
                                </div>

                                <button type="submit"
                                        class="bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
                                    Reagendar
                                </button>
                            </form>
                        @else
                            <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-5 mt-4">
                                <p class="text-yellow-800 font-medium">
                                    Este servicio ya no puede reagendarse desde la plataforma porque faltan menos de 24 horas para la fecha programada.
                                </p>

                                <p class="text-yellow-700 mt-3">
                                    Si necesitas realizar algún cambio, comunícate con soporte:
                                </p>

                                <p class="text-yellow-900 font-semibold mt-2">
                                    📞 55 1234 5678
                                </p>
                            </div>
                        @endif
                    </div>
                @endif

                {{-- Cancelar servicio --}}
                @if($booking->status === 'pending')
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 mt-8">
                        <h2 class="text-xl font-bold text-gray-800">
                            Cancelar servicio
                        </h2>

                        @if($canCancel)
                            <p class="text-gray-500 mt-2">
                                Puedes cancelar este servicio al menos 24 horas antes de la fecha programada.
                            </p>

                            <form method="POST"
                                action="{{ route('cliente.servicio.cancelar', $booking->id) }}"
                                class="mt-5 flex justify-center"
                                onsubmit="return confirm('¿Seguro que deseas cancelar este servicio?');">
                                @csrf
                                @method('PATCH')

                                <button type="submit"
                                        class="bg-red-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-red-700 transition ">
                                    Cancelar servicio
                                </button>
                            </form>
                        @else
                            <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-5 mt-4">
                                <p class="text-yellow-800 font-medium">
                                    Este servicio ya no puede cancelarse desde la plataforma porque faltan menos de 24 horas para la fecha programada.
                                </p>

                                <p class="text-yellow-700 mt-3">
                                    Si necesitas realizar algún cambio, comunícate con soporte:
                                </p>

                                <p class="text-yellow-900 font-semibold mt-2">
                                    📞 55 1234 5678
                                </p>
                            </div>
                        @endif
                    </div>
                @endif


        </div>

    </div>

</x-app-layout>

<script>
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('ratingInput');

    stars.forEach((star, index) => {

        star.addEventListener('click', () => {

            const rating = star.dataset.value;

            ratingInput.value = rating;

            stars.forEach((s, i) => {

                if (i < rating) {
                    s.classList.remove('text-gray-300');
                    s.classList.add('text-yellow-400');
                } else {
                    s.classList.remove('text-yellow-400');
                    s.classList.add('text-gray-300');
                }

            });

        });

    });
</script>