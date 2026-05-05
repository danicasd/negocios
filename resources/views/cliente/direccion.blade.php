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

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Direcciones guardadas -->
                <div class="lg:col-span-1 bg-white rounded-3xl shadow-sm border border-gray-100 p-6 h-fit">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">
                        Direcciones guardadas
                    </h2>

                    <div class="space-y-4">
                        <label class="block border border-blue-500 bg-blue-50 rounded-2xl p-4 cursor-pointer">
                            <div class="flex items-start gap-3">
                                <input type="radio" name="direccion_guardada" checked class="mt-1 text-blue-600">
                                <div>
                                    <p class="font-semibold text-gray-900">Casa</p>
                                    <p class="text-sm text-gray-600">
                                        Av. Universidad 3000, Copilco Universidad, Coyoacán
                                    </p>
                                    <p class="text-sm text-gray-500">CP 04360</p>
                                </div>
                            </div>
                        </label>

                        <label class="block border border-gray-200 hover:border-blue-500 rounded-2xl p-4 cursor-pointer transition">
                            <div class="flex items-start gap-3">
                                <input type="radio" name="direccion_guardada" class="mt-1 text-blue-600">
                                <div>
                                    <p class="font-semibold text-gray-900">Trabajo</p>
                                    <p class="text-sm text-gray-600">
                                        Insurgentes Sur 1200, Del Valle, Benito Juárez
                                    </p>
                                    <p class="text-sm text-gray-500">CP 03100</p>
                                </div>
                            </div>
                        </label>
                    </div>

                    <p class="text-xs text-gray-500 mt-4">
                        Más adelante estas direcciones vendrán de tu base de datos.
                    </p>
                </div>

                <!-- Nueva dirección -->
                <div class="lg:col-span-2 bg-white rounded-3xl shadow-sm border border-gray-100 p-8">

                    <h2 class="text-xl font-bold text-gray-900 mb-6">
                        Agregar nueva dirección
                    </h2>

                    <form action="{{ route('cliente.direccion.guardar') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Calle
                                </label>
                                <input type="text" name="calle"
                                       class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                       placeholder="Ej. Av. Universidad"
                                       @error('calle')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror>
                                
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Número
                                </label>
                                <input type="text" name="numero"
                                       class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                       placeholder="Ej. 3000">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Estado
                                </label>
                                <select name="estado"
                                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                    <option>Ciudad de México</option>
                                    <option>Estado de México</option>
                                    <option>Jalisco</option>
                                    <option>Nuevo León</option>
                                    <option>Puebla</option>
                                    <option>Guanajuato</option>
                                    <option>Querétaro</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Colonia
                                </label>
                                <input type="text" name="colonia"
                                       class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                       placeholder="Ej. Copilco Universidad">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Alcaldía / Municipio
                                </label>
                                <input type="text" name="municipio"
                                       class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                       placeholder="Ej. Coyoacán">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Código postal
                                </label>
                                <input type="text" name="codigo_postal"
                                       class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                       placeholder="Ej. 04360">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Tipo de domicilio
                                </label>
                                <select name="tipo_domicilio"
                                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                    <option>Casa</option>
                                    <option>Departamento</option>
                                    <option>Oficina</option>
                                    <option>Otro</option>
                                </select>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Referencias
                                </label>
                                <textarea name="referencias" rows="4"
                                          class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                          placeholder="Ej. Portón negro, frente a una tienda, tocar el timbre del departamento 3."></textarea>
                            </div>

                        </div>

                        <div class="mt-10 pt-6 border-t border-gray-100 flex items-center justify-between">

                                <!-- Volver -->
                            <a href="{{ url()->previous() }}"
                                class="text-base text-blue-600 hover:text-blue-700 font-semibold transition font-medium">
                                    Volver 
                                </a>

                                <!-- Continuar -->
                                <a href="{{ route('cliente.agendar') }}"
                                class="bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition shadow-sm">
                                    Continuar
                                </a>

                        </div>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>