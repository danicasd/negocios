<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-6xl mx-auto px-6">

            <div class="mb-8">
                <span class="inline-block bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    Dirección
                </span>

                <h1 class="text-4xl font-bold text-gray-900">
                    ¿Dónde realizaremos el servicio?
                </h1>

                <p class="text-gray-600 mt-2">
                    Elige una dirección guardada o agrega una nueva ubicación.
                </p>
            </div>

            <form action="{{ route('cliente.direccion.guardar') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <!-- Direcciones guardadas -->
                    <div class="lg:col-span-1 bg-white rounded-3xl shadow-sm border border-gray-100 p-6 h-fit">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">
                            Direcciones guardadas
                        </h2>

                        @if($direcciones->isEmpty())
                            <p class="text-sm text-gray-500">
                                Por ahora no hay direcciones guardadas, agrega una nueva.
                            </p>
                        @else
                            <div class="space-y-4">
                                @foreach($direcciones as $direccion)
                                    <label class="block border border-gray-200 hover:border-blue-500 rounded-2xl p-4 cursor-pointer transition">
                                        <div class="flex items-start gap-3">
                                            <input type="radio"
                                                   name="address_id"
                                                   value="{{ $direccion->id }}"
                                                   class="mt-1 text-blue-600 direccion-radio">

                                            <div>
                                                <p class="font-semibold text-gray-900">
                                                    {{ $direccion->calle }} {{ $direccion->external_number }}
                                                </p>

                                                <p class="text-sm text-gray-600">
                                                    {{ $direccion->colonia }}, {{ $direccion->alcaldia }}
                                                </p>

                                                <p class="text-sm text-gray-500">
                                                    {{ $direccion->estado }} · CP {{ $direccion->postal_code }}
                                                </p>
                                            </div>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Nueva dirección -->
                    <div class="lg:col-span-2 bg-white rounded-3xl shadow-sm border border-gray-100 p-8">

                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-bold text-gray-900">
                                Agregar nueva dirección
                            </h2>

                            @if(!$direcciones->isEmpty())
                                <button type="button"
                                        id="limpiarSeleccion"
                                        class="text-sm text-blue-600 hover:text-blue-700 font-semibold">
                                    Usar nueva dirección
                                </button>
                            @endif
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <!-- Calle -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Calle
                                </label>

                                <input type="text"
                                       name="calle"
                                       value="{{ old('calle') }}"
                                       class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 campo-nueva-direccion">

                                @error('calle')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Número exterior -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Número exterior
                                </label>

                                <input type="text"
                                       name="external_number"
                                       value="{{ old('external_number') }}"
                                       class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 campo-nueva-direccion">

                                @error('external_number')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Número interior -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Número interior
                                </label>

                                <input type="text"
                                       name="internal_number"
                                       value="{{ old('internal_number') }}"
                                       class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 campo-nueva-direccion">

                                @error('internal_number')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Estado -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Estado
                                </label>

                                <select name="estado"
                                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 campo-nueva-direccion">
                                    <option value="Ciudad de México" {{ old('estado') == 'Ciudad de México' ? 'selected' : '' }}>Ciudad de México</option>
                                    <option value="Estado de México" {{ old('estado') == 'Estado de México' ? 'selected' : '' }}>Estado de México</option>
                                    <option value="Jalisco" {{ old('estado') == 'Jalisco' ? 'selected' : '' }}>Jalisco</option>
                                    <option value="Nuevo León" {{ old('estado') == 'Nuevo León' ? 'selected' : '' }}>Nuevo León</option>
                                    <option value="Puebla" {{ old('estado') == 'Puebla' ? 'selected' : '' }}>Puebla</option>
                                    <option value="Guanajuato" {{ old('estado') == 'Guanajuato' ? 'selected' : '' }}>Guanajuato</option>
                                    <option value="Querétaro" {{ old('estado') == 'Querétaro' ? 'selected' : '' }}>Querétaro</option>
                                </select>

                                @error('estado')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Colonia -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Colonia
                                </label>

                                <input type="text"
                                       name="colonia"
                                       value="{{ old('colonia') }}"
                                       class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 campo-nueva-direccion">

                                @error('colonia')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Alcaldía -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Alcaldía / Municipio
                                </label>

                                <input type="text"
                                       name="alcaldia"
                                       value="{{ old('alcaldia') }}"
                                       class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 campo-nueva-direccion">

                                @error('alcaldia')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Código postal -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Código postal
                                </label>

                                <input type="text"
                                       name="postal_code"
                                       value="{{ old('postal_code') }}"
                                       class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 campo-nueva-direccion">

                                @error('postal_code')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Referencias -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Referencias
                                </label>

                                <textarea name="references"
                                          rows="4"
                                          class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 campo-nueva-direccion"
                                          placeholder="Ej. Portón negro, frente a una tienda, tocar el timbre del departamento 3.">{{ old('references') }}</textarea>

                                @error('references')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="mt-10 pt-6 border-t border-gray-100 flex items-center justify-between">
                            <a href="{{ route('cliente.cotizar', session('cotizacion.service_id')) }}"
                               class="text-base text-blue-600 hover:text-blue-700 font-semibold transition">
                                Volver
                            </a>

                            <button type="submit"
                                    class="bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition shadow-sm">
                                Continuar
                            </button>
                        </div>

                    </div>

                </div>
            </form>

        </div>
    </div>

    <script>
        const radiosDireccion = document.querySelectorAll('.direccion-radio');
        const camposNuevaDireccion = document.querySelectorAll('.campo-nueva-direccion');
        const limpiarSeleccion = document.getElementById('limpiarSeleccion');

        radiosDireccion.forEach(radio => {
            radio.addEventListener('change', () => {
                camposNuevaDireccion.forEach(campo => {
                    campo.disabled = true;
                    campo.classList.add('bg-gray-100', 'cursor-not-allowed');
                });
            });
        });

        if (limpiarSeleccion) {
            limpiarSeleccion.addEventListener('click', () => {
                radiosDireccion.forEach(radio => {
                    radio.checked = false;
                });

                camposNuevaDireccion.forEach(campo => {
                    campo.disabled = false;
                    campo.classList.remove('bg-gray-100', 'cursor-not-allowed');
                });
            });
        }
    </script>
</x-app-layout>