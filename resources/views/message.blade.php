<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contactos</title>
    @vite('resources/css/app.css')
    <style>
        .overlay {
            background-color: rgba(75, 75, 75, 0.7);
        }
    </style>
</head>
<body class="h-screen overflow-hidden">
    <div class="background-fixed fixed inset-0"></div>
    <div class="relative w-full h-full bg-no-repeat bg-cover bg-center overlay"
         style="background-image: linear-gradient(to bottom right, rgba(43, 116, 185 , 0.8), rgba(255, 255, 255, 0.8));">
        <div class="content relative z-10 h-full overflow-auto">
            <!-- Menú con recuadro -->
            <header class="lg:px-16 px-4 flex flex-wrap items-center py-4 bg-white/90 p-4 rounded-lg shadow-lg border border-gray-200 mx-4">
                <div class="flex-1 flex justify-between items-center">
                    <a href="#" class="text-4xl font-extrabold text-[#2e4053]">
                        <img src="{{ asset('storage/img/logo.png') }}" class="h-20">
                    </a>
                </div>
                @include('components.nav_landing')
            </header>
            <main>
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="flex flex-col text-center w-full mb-20">
                            <h1 class="text-2xl font-medium title-font mb-4 text-gray-100">Contactos</h1>
                            <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-100">Conéctate y envíanos un mensaje.</p>
                        </div>
                        <div class="flex flex-wrap -m-4">
                            <div class="p-4 lg:w-1/2 md:w-1/2 mx-auto">
                                <div class="h-full flex flex-col items-center text-center bg-white rounded-lg shadow-lg p-8 transition-transform transform hover:scale-105">
                            <form action="{{ route('contacto.store') }}" method="POST">
                            <div class="flex flex-wrap -m-2">
                            
                                @csrf
                                <div class="p-2 w-full">
                                    <div class="relative">
                                        <label for="name" class="leading-7 text-sm text-gray-600">Nombre</label>
                                        <input type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                                    </div>
                                </div>
                                <div class="p-2 w-1/2">
                                    <div class="relative">
                                        <label for="email" class="leading-7 text-sm text-gray-600">Correo</label>
                                        <input type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                                    </div>
                                </div>
                                <div class="p-2 w-1/2">
                                    <div class="relative">
                                        <label for="number" class="leading-7 text-sm text-gray-600">Numero de contacto</label>
                                        <input type="text" id="number" name="number" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                                    </div>
                                </div>
                                <div class="p-2 w-full">
                                    <div class="relative">
                                        <label for="description" class="leading-7 text-sm text-gray-600">Mensaje</label>
                                        <textarea id="description" name="description" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" required></textarea>
                                    </div>
                                </div>
                                <div class="p-2 w-full">
                                    <button class="flex mx-auto text-white bg-[#587ABA] border-0 py-2 px-8 focus:outline-none hover:bg-[#07DBF2] rounded text-lg">Enviar</button>
                                </div>
                            </div>
                            </form>
                        </div>                                
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>