<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .background-fixed {
            background-image: linear-gradient(to bottom right, rgba(255, 212, 128, 0.8), rgba(43, 203, 186, 0.8), rgba(43, 116, 185 , 0.8));
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }
        .product-card img {
            object-fit: cover;
            width: 100%;
            height: 200px;
        }
        .product-card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
        .login-alert {
            background: #fff;
            padding: 1rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
            text-align: center;
        }
        .login-alert h1 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: #333;
        }
        .login-alert button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            font-weight: bold;
            color: #fff;
            background: #120A33;
            text-decoration: none;
        }
        .login-alert button:hover {
            background: #4f5d75;
        }
        .overlay {
            background-color: rgba(50, 50, 50, 0.7);
        }
    </style>
</head>
<body class="h-screen overflow-hidden">
    <div class="background-fixed fixed inset-0"></div>
    <div class="relative w-full h-full bg-no-repeat bg-cover bg-center overlay bg-opacity-75">
        <div class="content relative z-10 h-full overflow-auto">
            <header class="lg:px-16 px-4 flex flex-wrap items-center py-4">
                <div class="flex-1 flex justify-between items-center">
                    <a href="#" class="text-4xl font-extrabold text-white">
                        <img src="{{ asset('storage/img/logo.png') }}" class="h-20">
                    </a>
                </div>
                    @include('components/nav_landing')
            </header>
            <main>
                <div class="container px-5 py-24 mx-auto">
                    <div class="flex flex-wrap justify-center">
                        @foreach($products as $product)
                            <div class="w-full m-3 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 product-card">
                                <a href="{{ route('viewProduct', $product->id) }}">
                                    <img class="p-8 rounded-t-lg" src="{{ asset('storage/'.$product->url) }}" alt="product image" />
                                </a>
                                <div class="px-5 pb-5 flex flex-col flex-grow">
                                    <a href="{{ route('viewProduct', $product->id) }}">
                                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $product->name }}</h5>
                                    </a>
                                    <div class="flex items-center mt-2.5 mb-5 flex-grow">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-3xl font-bold text-gray-900 dark:text-white">$ {{ $product->price }}</span>
                                        @if(Auth::check())
                                            <form action="{{ route('addToCart', $product->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="p-10 bg-[#34482D] text-white font-semibold py-2 rounded-lg shadow-lg hover:bg-[#078C03] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Agregar al carrito +
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
