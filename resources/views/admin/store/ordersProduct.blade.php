<!-- resources/views/admin/store/ordersProduct.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
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
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Pedidos</h1>
                <div class="w-full mt-12">
                    @if(session('error'))
                        <div class="bg-red-500 text-white p-4 mb-4">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="bg-white overflow-auto grid grid-cols-1 gap-4 p-10">
                        <table class="min-w-full bg-white mt-4">
                            <thead class="bg-[#34482D] text-white">
                                <tr>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">ID Factura</th>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Producto</th>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Nombre Usuario</th>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Total</th>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Fecha</th>
                                    <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach($orders as $billId => $billOrders)
                                    @php
                                        $firstOrder = $billOrders->first();
                                    @endphp
                                    <tr>
                                        <td class="w-1/6 text-left py-3 px-4">{{ optional($firstOrder->bill)->id }}</td>
                                        <td class="w-1/6 text-left py-3 px-4">
                                            <ul>
                                                @foreach($billOrders as $order)
                                                    <li>{{ optional($order->buys->product)->name }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td class="w-1/6 text-left py-3 px-4">{{ optional($firstOrder->bill->user)->name }}</td>
                                        <td class="w-1/6 text-left py-3 px-4">${{ optional($firstOrder->bill)->total }}</td>
                                        <td class="w-1/6 text-left py-3 px-4">{{ optional($firstOrder->bill)->date }}</td>
                                        <td class="w-1/6 text-left py-3 px-4">
                                            <a href="{{ route('bill.show', optional($firstOrder->bill)->id) }}">
                                                <button class="bg-[#120A33] hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ver Factura</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
            <footer class="w-full bg-white text-right p-4">
                <a target="_blank" href="" class="underline">Pantágoras 2024.</a>.
            </footer>
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
