<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-6xl mx-auto px-6">

            <div class="mb-8">
                <span class="inline-block bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    Pago
                </span>

                <h1 class="text-4xl font-bold text-gray-900">
                    Finaliza tu solicitud
                </h1>

                <p class="text-gray-600 mt-2">
                    Selecciona un método de pago para confirmar tu servicio.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Métodos de pago -->
                <div class="lg:col-span-2 bg-white rounded-3xl shadow-sm border border-gray-100 p-8">

                    <h2 class="text-2xl font-bold text-gray-900 mb-2">
                        Método de pago
                    </h2>

                    <p class="text-gray-500 mb-8">
                        Puedes elegir tarjeta, transferencia o pago en efectivo.
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                        <label class="border-2 border-blue-600 bg-blue-50 rounded-2xl p-5 cursor-pointer">
                            <input type="radio" name="metodo" checked class="text-blue-600">
                            <p class="font-semibold text-gray-900 mt-3">Tarjeta</p>
                            <p class="text-sm text-gray-500">Pago simulado</p>
                        </label>

                        <label class="border border-gray-200 hover:border-blue-500 rounded-2xl p-5 cursor-pointer transition">
                            <input type="radio" name="metodo" class="text-blue-600">
                            <p class="font-semibold text-gray-900 mt-3">Transferencia</p>
                            <p class="text-sm text-gray-500">Pago bancario</p>
                        </label>

                        <label class="border border-gray-200 hover:border-blue-500 rounded-2xl p-5 cursor-pointer transition">
                            <input type="radio" name="metodo" class="text-blue-600">
                            <p class="font-semibold text-gray-900 mt-3">Efectivo</p>
                            <p class="text-sm text-gray-500">Al finalizar servicio</p>
                        </label>
                    </div>

                    <div class="bg-gray-50 rounded-3xl border border-gray-100 p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-5">
                            Datos de tarjeta
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Número de tarjeta
                                </label>
                                <input type="text"
                                       placeholder="4242 4242 4242 4242"
                                       class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Nombre del titular
                                </label>
                                <input type="text"
                                       placeholder="Daniela Castro"
                                       class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    Vencimiento
                                </label>
                                <input type="text"
                                       placeholder="MM/AA"
                                       class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">
                                    CVV
                                </label>
                                <input type="text"
                                       placeholder="123"
                                       class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Resumen -->
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 h-fit">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">
                        Resumen
                    </h2>

                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-500">Servicio</span>
                            <span class="font-semibold text-gray-900">Reparación</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-500">Fecha</span>
                            <span class="font-semibold text-gray-900">17 mayo</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-500">Hora</span>
                            <span class="font-semibold text-gray-900">10:00 AM</span>
                        </div>
                    </div>

                    <div class="border-t border-gray-100 mt-6 pt-6 flex justify-between items-center">
                        <span class="font-semibold text-gray-800">Total</span>
                        <span class="text-3xl font-bold text-green-600">$450</span>
                    </div>

                    <button onclick="confirmarPago()"
                            class="mt-8 w-full bg-blue-600 text-white py-3 rounded-xl font-semibold hover:bg-blue-700 hover:shadow-md transition">
                        Pagar ahora
                    </button>

                    <a href="{{ route('cliente.checkout') }}"
                       class="block text-center mt-4 text-blue-600 hover:text-blue-700 font-medium">
                        Volver
                    </a>

                    <p class="text-xs text-gray-500 mt-6 text-center">
                        Pago simulado para fines académicos.
                    </p>
                </div>

            </div>

        </div>
    </div>

    <script>
        function confirmarPago() {
            alert('Tu servicio fue solicitado correctamente.');
            window.location.href = "/dashboard";
        }
    </script>
</x-app-layout>