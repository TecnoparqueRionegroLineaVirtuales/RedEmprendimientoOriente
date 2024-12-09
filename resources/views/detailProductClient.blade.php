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
            background-image:  linear-gradient(to bottom right, rgba(255, 212, 128, 0.8), rgba(43, 203, 186, 0.8), rgba(43, 116, 185 , 0.8));">
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }
        .modal-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 50;
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: #fff;
            max-width: 50%;
            max-height: 100%;
            overflow-y: auto;
            padding: 20px;
            position: relative;
            border-radius: 8px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .close-modal {
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
        }
        /* Personaliza el estilo del alert de login */
        .login-alert h1 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: #fff; /* Cambiar texto a blanco */
        }
        .login-alert button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            font-weight: bold;
            color: #fff;
            background-color: #34482D; /* Color del botón */
        }
        .login-alert button:hover {
            background-color: #078C03; /* Color del botón en hover */
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
            <main>
                <div class="container px-5 py-24 mx-auto">
                    @if(!Auth::check())
                    <div class="login-alert bg-opacity-7 rounded-lg p-4">
                        <h1 class="text-white text-lg font-semibold mb-4">Debes iniciar sesión o registrarte para solicitar los productos o servicios</h1>
                        <a href="{{ route('login') }}">
                            <button class="bg-[#34482D] text-white py-2 px-4 rounded-lg hover:bg-[#078C03] transition-colors duration-300">
                                <i class="fas fa-sign-in-alt mr-2"></i> Iniciar sesión
                            </button>
                        </a>
                    </div>
                    @endif
                </div>                
                <section class="text-gray-600 body-font overflow-hidden">
                    <div class="container px-5 mx-auto">
                        <div class="lg:w-4/5 mx-auto flex flex-wrap">
                            <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto max-h-96 md:h-32 sm:h-24 object-cover object-center rounded cursor-pointer" src="{{ asset('storage/'.$product->url) }}" id="product-image">
                            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                                <h2 class="text-sm title-font text-gray-50 tracking-widest">{{ $product->brand }}</h2>
                                <h1 class="text-gray-50 text-3xl title-font font-medium mb-1">{{ $product->name }}</h1>
                                <div class="flex mb-4 text-gray-50">
                                    Categoría: {{ $product->category->name }}
                                </div>
                                <p class="leading-relaxed text-gray-50">{{ $product->description }}</p>
                                <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5"></div>
                                <div class="flex">
                                    <span class="title-font font-medium text-2xl text-gray-50">${{ $product->price }}</span>
                                    @if(Auth::check())
                                    <form action="{{ route('addToCart', $product->id) }}" method="POST" class="m-5 w-full">
                                        @csrf
                                        <button type="submit" class="bg-[#34482D] text-white font-semibold py-2 rounded-lg shadow-lg hover:bg-[#078C03] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">+ Agregar al carrito</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
    <!-- Modal -->
    <div id="modal" class="modal-container">
        <div class="modal-content">
            <span class="close-modal" id="modal-close">&times;</span>
            <img src="{{ asset('storage/'.$product->url) }}" alt="Modal Image">
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        const modal = document.getElementById('modal');
        const modalClose = document.getElementById('modal-close');
        const productImg = document.getElementById('product-image');

        productImg.addEventListener('click', () => {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        });

        modalClose.addEventListener('click', () => {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        });

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        }
    </script>
</body>
</html>
