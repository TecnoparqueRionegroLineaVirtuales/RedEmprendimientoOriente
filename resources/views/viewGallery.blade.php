<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galeria</title>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js" defer></script>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .image-container img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }
        .modal-image {
            max-width: 100%;
            max-height: 90vh;
            object-fit: contain;
        }
        .modal-content {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .overlay {
            background-color: rgba(75, 75, 75, 0.7);
        }
    </style>
</head>
<body class="h-screen overflow-hidden" x-data="{ showModal: false, modalImage: '' }">
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
                <div class="overflow-auto grid grid-cols-2 gap-4 p-10">
                    <a href="{{ route('gallery')}}"><button class="p-10 bg-[#587ABA] text-white font-semibold py-2 rounded-lg shadow-lg hover:bg-[#07DBF2] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fas fa-arrow-alt-circle-left mr-3"></i> Regresar
                    </button></a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
                    @foreach ($multimedia as $media)
                        <div class="relative rounded overflow-hidden shadow-lg bg-white cursor-pointer image-container" @click="modalImage = '{{ asset('storage/'.$media->url) }}'; showModal = true">
                            <img src="{{ asset('storage/'.$media->url) }}" alt="Multimedia Image" class="w-full h-64 object-cover">
                            <div class="px-10 absolute inset-0 bg-black bg-opacity-40 flex flex-col items-center justify-center text-center text-white font-roboto font-medium group-hover:bg-opacity-60 transition">
                                <p class="text-2xl">{{ $media->name }}</p>
                                <p class="text-lg">{{ $media->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </main>
        </div>
    </div>
    <!-- Modal -->
    <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75 z-50">
        <div class="bg-white p-4 rounded-lg shadow-lg max-w-3xl w-full modal-content">
            <button @click="showModal = false" class="text-black font-bold py-2 px-4 rounded">X cerrar</button>
            <img :src="modalImage" alt="Modal Image" class="modal-image mt-4">
        </div>
    </div>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
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
