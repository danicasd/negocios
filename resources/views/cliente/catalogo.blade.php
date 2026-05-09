<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <section class="bg-gradient-to-br from-blue-50 via-white to-green-50 py-14">
            <div class="max-w-7xl mx-auto px-6">
                <div class="max-w-3xl">
                    <span class="inline-block bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                        Catálogo para clientes
                    </span>

                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                        ¿Qué necesita tu hogar hoy?
                    </h1>

                    <p class="text-lg text-gray-600">
                        Elige un servicio, revisa el precio base y cotiza en segundos.
                    </p>
                </div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto px-6 py-10">

            <!-- Filtros visuales -->
            <div class="flex flex-wrap gap-3 mb-10">
                <button 
                    class="filtro-categoria bg-blue-600 text-white px-5 py-2 rounded-full font-semibold shadow-sm"
                    data-categoria="todos">
                    Todos
                </button>

                @foreach($categorias as $categoria)
                    <button 
                        class="filtro-categoria bg-white text-gray-700 px-5 py-2 rounded-full font-semibold border hover:border-blue-500 hover:text-blue-600 transition"
                        data-categoria="{{ Str::slug($categoria->name) }}">
                        {{ $categoria->name }}
                    </button>
                @endforeach
            </div>

            <!-- Grid de servicios -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse($categorias as $categoria)
                    @foreach($categoria->services as $servicio)

                        <div class="servicio-card bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition" data-categoria="{{ Str::slug($categoria->name) }}">

                            <div class="h-40 bg-blue-50 flex items-center justify-center">
                                <span class="text-6xl">
                                    @switch($categoria->name)
                                        @case('Plomería')
                                            🚿
                                            @break

                                        @case('Electricidad')
                                            💡
                                            @break

                                        @case('Limpieza')
                                            🧹
                                            @break

                                        @case('Soporte técnico')
                                            💻
                                            @break

                                        @case('Cámaras')
                                            📹
                                            @break

                                        @case('Mantenimiento')
                                            🛠️
                                            @break

                                        @default
                                            🏠
                                    @endswitch
                                </span>
                            </div>

                            <div class="p-6">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="text-sm font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                                        {{ $categoria->name }}
                                    </span>
                                </div>

                                <h3 class="text-xl font-bold text-gray-900 mb-2">
                                    {{ $servicio->name }}
                                </h3>

                                <p class="text-gray-600 mb-5">
                                    {{ $servicio->description }}
                                </p>

                                <div class="flex items-end justify-between">
                                    <div>
                                        <p class="text-sm text-gray-500">Desde</p>
                                        <p class="text-2xl font-bold text-green-600">
                                            ${{ number_format($servicio->base_price, 2) }}
                                        </p>
                                    </div>

                                    <a href="{{ route('cliente.cotizar', $servicio->id) }}"
                                       class="bg-blue-600 text-white px-5 py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
                                        Cotizar
                                    </a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @empty
                    <div class="col-span-full bg-white rounded-3xl border border-gray-100 p-10 text-center">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">
                            Aún no hay servicios disponibles
                        </h2>
                        <p class="text-gray-600">
                            Cuando se registren categorías y servicios, aparecerán aquí.
                        </p>
                    </div>
                @endforelse

            </div>
        </section>
    </div>
</x-app-layout>

<script>
    const botonesFiltro = document.querySelectorAll('.filtro-categoria');
    const tarjetasServicio = document.querySelectorAll('.servicio-card');

    botonesFiltro.forEach(boton => {
        boton.addEventListener('click', () => {
            const categoriaSeleccionada = boton.dataset.categoria;

            tarjetasServicio.forEach(tarjeta => {
                const categoriaTarjeta = tarjeta.dataset.categoria;

                if (categoriaSeleccionada === 'todos' || categoriaSeleccionada === categoriaTarjeta) {
                    tarjeta.classList.remove('hidden');
                } else {
                    tarjeta.classList.add('hidden');
                }
            });

            botonesFiltro.forEach(btn => {
                btn.classList.remove('bg-blue-600', 'text-white');
                btn.classList.add('bg-white', 'text-gray-700', 'border');
            });

            boton.classList.remove('bg-white', 'text-gray-700', 'border');
            boton.classList.add('bg-blue-600', 'text-white');
        });
    });
</script>