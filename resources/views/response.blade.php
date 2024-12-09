<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product View</title>
    @vite('resources/css/app.css')
    <style>
        .background-fixed {
            background-image: url('{{ asset('storage/img/fondo.png') }}');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }
    </style>
</head>
<body class="h-screen overflow-hidden">
    <div class="background-fixed fixed inset-0"></div>
    <div class="relative w-full h-full bg-no-repeat bg-cover bg-center bg-shadow bg-opacity-75">
        <div class="content relative z-10 h-full overflow-auto">
            <header class="lg:px-16 px-4 flex flex-wrap items-center py-4">
                <div class="flex-1 flex justify-between items-center">
                    <a href="#" class="text-4xl font-extrabold text-white">
                        <img src="{{ asset('storage/img/logo.png') }}" class="h-20">
                    </a>
                </div>
                    @include('components/nav_landing')
            </header>
            <main class="flex justify-center items-center mt-8">
                <div class="container mx-auto max-w-4xl bg-white rounded-lg shadow-md">
                    <div class="w-full px-10 py-10">
                    <h1 class="font-semibold text-2xl m-10">Gracias por su compra: {{ $estadoTx }}</h1>
                        <h3 class="font-semibold text-gray-600 text-xs uppercase m-5 w-2/5">Detalles:</h3>
                        <ul>
                            <li><strong>Merchant Id     :</strong> {{ $data['merchant_id'] }}</li>
                            <li><strong>Codigo de referncia:</strong> {{ $data['referenceCode'] }}</li>
                            <li><strong>Valor de transacción:</strong> $ {{ $data['TX_VALUE'] }} {{ $data['currency'] }}</li>
                            <li><strong>Modeda:</strong> {{ $data['currency'] }}</li>
                            <li><strong>Estado de la transacción:</strong> 
                            @if($data['transactionState'] == 4)
                                Transacción aprobada.
                            @else
                                Transacción declinada.
                            @endif
                        </li>
                        </ul>
                        <p>
                        <a href="{{ route('viewCart') }}" class="flex m-10 items-center font-semibold text-indigo-600 text-sm">
                            <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512"><path d="M134.059 296H432c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16H134.059l72.971-72.971c6.249-6.249 6.249-16.379 0-22.627l-11.314-11.314c-6.249-6.249-16.379-6.249-22.627 0L70.059 244.059c-6.249 6.249-6.249 16.379 0 22.627L173.089 369c6.248 6.249 16.379 6.249 22.627 0l11.314-11.314c6.249-6.249 6.249-16.379 0-22.627L134.059 296z"></path></svg>
                            Regresar al comercio
                        </a>
                        </p>  
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>