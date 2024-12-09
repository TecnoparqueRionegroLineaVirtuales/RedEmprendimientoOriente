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
            background-image: linear-gradient(to bottom right, rgba(255, 212, 128, 0.8), rgba(43, 203, 186, 0.8), rgba(43, 116, 185 , 0.8));
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
            <main class="flex justify-center items-center mt-8"> <!-- Ajusta el margen superior -->
                <div class="container mx-auto max-w-4xl bg-white rounded-lg shadow-md">
                    <div class="w-full px-10 py-10">
                        <div class="flex justify-between border-b pb-8">
                            <h1 class="font-semibold text-2xl">Carrito de compras</h1>
                            <h2 class="font-semibold text-2xl">{{ count($cartItems) }} Items</h2>
                        </div>
                        @if(count($cartItems) <= 0)
                            <h1 class="font-semibold text-2xl">El carrito esta vacio</h1>
                        @else
                        <div class="flex mt-10 mb-5">
                            <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Detalles del producto</h3>
                            <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center">Cantidad</h3>
                            <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center">Precio</h3>
                            <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
                        </div>

                        @foreach($cartItems as $id => $item)
                        <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                            <div class="flex w-2/5">
                                <div class="w-20">
                                    <img class="max-h-60 max-w-full" src="{{ asset('storage/'.$item['url']) }}" alt="">
                                </div>
                                <div class="flex flex-col justify-between ml-4 flex-grow">
                                    <span class="font-bold text-sm">{{ $item['name'] }}</span>
                                    <form action="{{ route('removeFromCart', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-semibold hover:text-red-500 text-gray-500 text-xs">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                            <div class="flex justify-center w-1/5">
                                <form action="{{ route('updateCart', $id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input class="mx-2 border text-center w-10" type="text" name="quantity" value="{{ $item['quantity'] }}">
                                    <button type="submit" class="text-blue-500">Actualizar</button>
                                </form>
                            </div>
                            <span class="text-center w-1/5 font-semibold text-sm">${{ $item['price'] }}</span>
                            <span class="text-center w-1/5 font-semibold text-sm">${{ $item['price'] * $item['quantity'] }}</span>
                        </div>
                        @endforeach

                        <div class="flex justify-between mx-4 mt-10">
                            <a href="{{ route('storeUser') }}" class="flex items-center font-semibold text-[#34482D] text-sm">
                                <svg class="fill-current mr-2 text-[#34482D] w-4" viewBox="0 0 448 512"><path d="M134.059 296H432c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16H134.059l72.971-72.971c6.249-6.249 6.249-16.379 0-22.627l-11.314-11.314c-6.249-6.249-16.379-6.249-22.627 0L70.059 244.059c-6.249 6.249-6.249 16.379 0 22.627L173.089 369c6.248 6.249 16.379 6.249 22.627 0l11.314-11.314c6.249-6.249 6.249-16.379 0-22.627L134.059 296z"></path></svg>
                                Continuar comprando
                            </a>
                            <form method="post" action="{{ route('showWhatsAppContactForm') }}" class="flex items-center">
                                @csrf
                                <button type="submit" class="p-4 bg-[#34482D] text-white font-semibold rounded-lg shadow-lg hover:bg-[#078C03] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-2"
                                    >Realizar pedido por WhatsApp</button>
                                </div>
                        @endif
                        </div>
                         <!-- Para manejar el contacto a WhatsApp -->
                        <div class="flex justify-between mx-4 mt-10">
                            
                        </div>
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
