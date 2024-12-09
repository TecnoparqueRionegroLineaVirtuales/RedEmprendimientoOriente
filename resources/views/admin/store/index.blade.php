<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    <!-- Tailwind -->
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
    </style>
</head>
    <body class="bg-gray-100 font-family-karla flex">
        @include('components.nav_admin')
        <div class="w-full flex flex-col h-screen overflow-y-hidden">
            @include('components.nav_head_admin')
            <div class="w-full overflow-x-hidden border-t flex flex-col">
                <main class="w-full flex-grow p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                    @role('admin')
                        <a href="{{ route('store') }}">
                            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                <img class="w-full" src="{{ asset('storage/img/tienda.svg') }}" alt="Sunset in the mountains">
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2">Productos</div>
                                    <p class="text-gray-700 text-base">
                                        En esta opción puedes gestionar los productos de la tienda.
                                    </p>
                                </div>
                                <div class="px-6 pt-4 pb-2">
                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Clic para gestionar productos</span>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('orders') }}">
                            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                <img class="w-full" src="{{ asset('storage/img/pedido.svg') }}" alt="Sunset in the mountains">
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2">Pedidos</div>
                                    <p class="text-gray-700 text-base">
                                        En esta opción puedes gestionar y ver los productos comprados en la tienda.
                                    </p>
                                </div>
                                <div class="px-6 pt-4 pb-2">
                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Clic para gestionar pedidos</span>
                                </div>
                            </div>
                        </a>
                    @endrole
                    @role('user')
                        <a href="{{ route('orders') }}">
                            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                <img class="w-full" src="{{ asset('storage/img/pedido.svg') }}" alt="Sunset in the mountains">
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2">Pedidos</div>
                                    <p class="text-gray-700 text-base">
                                        En esta opción puedes gestionar y ver los productos comprados en la tienda.
                                    </p>
                                </div>
                                <div class="px-6 pt-4 pb-2">
                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Clic para gestionar pedidos</span>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('orders.product.index') }}">
                            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                <img class="w-full" src="{{ asset('storage/img/pedidoPer.svg') }}" alt="Sunset in the mountains">
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2">Pedidos personalizados</div>
                                    <p class="text-gray-700 text-base">
                                        En esta opción puedes gestionar y ver los pedidos personalizados.
                                    </p>
                                </div>
                                <div class="px-6 pt-4 pb-2">
                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Clic para gestionar pedidos personalizados</span>
                                </div>
                            </div>
                        </a>
                    @endrole
                    @role('artista')
                    <a href="{{ route('orders') }}">
                            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                <img class="w-full" src="{{ asset('storage/img/pedido.svg') }}" alt="Sunset in the mountains">
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2">Pedidos</div>
                                    <p class="text-gray-700 text-base">
                                        En esta opción puedes gestionar y ver los productos comprados en la tienda.
                                    </p>
                                </div>
                                <div class="px-6 pt-4 pb-2">
                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Clic para gestionar pedidos</span>
                                </div>
                            </div>
                    </a>
                    <a href="{{ route('orders.product.index') }}">
                            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                <img class="w-full" src="{{ asset('storage/img/pedidoPer.svg') }}" alt="Sunset in the mountains">
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2">Pedidos personalizados</div>
                                    <p class="text-gray-700 text-base">
                                        En esta opción puedes gestionar y ver los pedidos personalizados.
                                    </p>
                                </div>
                                <div class="px-6 pt-4 pb-2">
                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Clic para gestionar pedidos personalizados</span>
                                </div>
                            </div>
                    </a>
                    @endrole
                </main>
            </div>
        </div>
        <!-- AlpineJS -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
        <!-- ChartJS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
    </body>
</html>