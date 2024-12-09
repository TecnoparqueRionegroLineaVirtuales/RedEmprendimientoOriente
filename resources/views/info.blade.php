<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Información</title>
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
                    <div class="container mx-auto lg:w-2/3 px-8 py-24">
                        <div class="flex flex-col text-center w-full mb-20">
                            <h1 class="text-3xl font-medium title-font mb-4 text-gray-100">¿Qué hacemos en la red de emprendimiento del oriente antioqueño?</h1>
                            <p class="lg:w-3/4 mx-auto leading-relaxed text-base text-gray-100">Explora nuestras iniciativas y descubre cómo estamos transformando la región.</p>
                        </div>
                        <div class="flex flex-wrap -m-4">
                            <div class="w-full p-4">
                                <div class="h-full flex flex-col items-center bg-white rounded-lg shadow-lg p-8 transition-transform transform hover:scale-105">
                                    @foreach ($users as $admin)
                                        <div class="w-full text-center mb-8">
                                            <h2 class="text-xl font-medium text-gray-900">{{ $admin->name }}</h2>
                                            <p class="mt-2 text-gray-600">{{ $admin->description }}</p>
                                            <!-- Agrega el recuadro del video -->
                                            <div class="mt-4 w-full bg-gray-200 rounded-lg overflow-hidden shadow-lg">
                                                <iframe 
                                                    width="100%" 
                                                    height="500" 
                                                    src="https://www.youtube.com/embed/{{ $admin->video_id }}" 
                                                    title="YouTube video player" 
                                                    frameborder="0" 
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                                    allowfullscreen>
                                                </iframe>
                                            </div>
                                        </div>
                                    @endforeach
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
