<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-10">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Bienvenida -->
            <div class="bg-white rounded-2xl shadow-sm p-8 mb-8">
                <h1 class="text-3xl font-bold text-gray-800">
                    Hola, {{ Auth::user()->name }} 👋
                </h1>
                <p class="text-gray-600 mt-2">
                    Bienvenido a tu panel de cliente. Desde aquí puedes solicitar servicios, revisar tus próximos trabajos y consultar tu historial.
                </p>
            </div>

            <!-- Acciones rápidas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <h2 class="text-xl font-semibold">Solicitar nuevo servicio</h2>
                    
                {{--<a href="{{ url('/servicios') }}"-->
                   class="bg-blue-600 text-white rounded-2xl p-6 shadow-sm hover:bg-blue-700 transition"> 
                    <h2 class="text-xl font-semibold">Solicitar nuevo servicio</h2>
                    <p class="text-blue-100 mt-2">
                        Explora el catálogo y cotiza el servicio que necesitas.
                    </p>
                </a> --}}
                </div>
                <h2 class="text-xl font-semibold text-gray-800">Mis servicios</h2>
                    <p class="text-gray-600 mt-2">
                        Consulta el estado de tus solicitudes.
                    </p>

               {{-- <a href="{{ route('cliente.mis-servicios') }}"
                   class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition border border-gray-100">
                    <h2 class="text-xl font-semibold text-gray-800">Mis servicios</h2>
                    <p class="text-gray-600 mt-2">
                        Consulta el estado de tus solicitudes.
                    </p>
                </a> 

                <a href="{{ route('cliente.perfil') }}"
                   class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition border border-gray-100">
                    <h2 class="text-xl font-semibold text-gray-800">Mi perfil</h2>
                    <p class="text-gray-600 mt-2">
                        Revisa tus datos personales.
                    </p>
                </a>
            </div> --}}

            <!-- Próximo servicio -->
            <div class="bg-white rounded-2xl shadow-sm p-8 mb-8">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-2xl font-bold text-gray-800">
                        Próximo servicio programado
                    </h2>
                </div>

                <div class="border border-gray-100 rounded-xl p-6 bg-gray-50">
                    <h3 class="text-lg font-semibold text-gray-800">
                        Limpieza general del hogar
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4 text-gray-600">
                        <p>
                            <span class="font-semibold text-gray-700">Fecha:</span>
                            15 de mayo de 2026
                        </p>
                        <p>
                            <span class="font-semibold text-gray-700">Hora:</span>
                            10:00 AM
                        </p>
                        <p>
                            <span class="font-semibold text-gray-700">Estado:</span>
                            <span class="text-yellow-600 font-semibold">Pendiente</span>
                        </p>
                    </div>

                    <div class="mt-5">
                        <a href="#"
                           class="inline-block bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
                            Ver detalle
                        </a>
                    </div>
                </div>
            </div>

            <!-- Últimos servicios -->
            <div class="bg-white rounded-2xl shadow-sm p-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">
                        Últimos servicios solicitados
                    </h2>

                    {{-- <a href="{{ route('cliente.mis-servicios') }}"
                       class="text-blue-600 font-semibold hover:underline">
                        Ver todos
                    </a> --}}
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b text-gray-600">
                                <th class="py-3">Servicio</th>
                                <th class="py-3">Fecha</th>
                                <th class="py-3">Total</th>
                                <th class="py-3">Estado</th>
                                <th class="py-3">Acción</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-4 font-medium text-gray-800">Plomería</td>
                                <td class="py-4 text-gray-600">08 mayo 2026</td>
                                <td class="py-4 text-gray-600">$450</td>
                                <td class="py-4">
                                    <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-700">
                                        Completado
                                    </span>
                                </td>
                                <td class="py-4">
                                    <a href="#" class="text-blue-600 font-semibold hover:underline">
                                        Ver detalle
                                    </a>
                                </td>
                            </tr>

                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-4 font-medium text-gray-800">Electricidad</td>
                                <td class="py-4 text-gray-600">02 mayo 2026</td>
                                <td class="py-4 text-gray-600">$600</td>
                                <td class="py-4">
                                    <span class="px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-700">
                                        Asignado
                                    </span>
                                </td>
                                <td class="py-4">
                                    <a href="#" class="text-blue-600 font-semibold hover:underline">
                                        Ver detalle
                                    </a>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50">
                                <td class="py-4 font-medium text-gray-800">Soporte técnico</td>
                                <td class="py-4 text-gray-600">25 abril 2026</td>
                                <td class="py-4 text-gray-600">$500</td>
                                <td class="py-4">
                                    <span class="px-3 py-1 rounded-full text-sm bg-red-100 text-red-700">
                                        Cancelado
                                    </span>
                                </td>
                                <td class="py-4">
                                    <a href="#" class="text-blue-600 font-semibold hover:underline">
                                        Ver detalle
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>


