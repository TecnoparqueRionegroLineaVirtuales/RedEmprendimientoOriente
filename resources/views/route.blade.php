<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rutas</title>
    @vite('resources/css/app.css')
    <style>
        .background-fixed {
            background-image: url('{{ asset('storage/img/fondo2.jpg') }}');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }

        .overlay {
            background-color: rgba(50, 50, 50, 0.7);
        }
    </style>
</head>
<body class="h-screen overflow-hidden">
    <div class="background-fixed fixed inset-0"></div>
    <div class="relative w-full h-full bg-no-repeat bg-cover bg-center overlay">
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
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-15 mx-auto">
                        <div class="flex flex-col text-center w-full mb-20">
                            <h1 class="text-2xl font-medium title-font mb-4 text-gray-100">¿Quieres vivir la experiencia más de cerca?</h1>
                            <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-100">Agenda una de nuestras rutas.</p>
                        </div>
                        <div class="flex flex-wrap -m-4">
                            @foreach ($route as $routes)
                                <div class="p-4 lg:w-1/4 md:w-1/2">
                                    <div class="h-full flex flex-col items-center text-center bg-white bg-opacity-80 rounded-lg shadow-lg"> 
                                        <img alt="team" class="flex-shrink-0 rounded-t-lg w-full h-56 object-cover object-center mb-2" src="{{ asset('storage/'.$routes->url) }}">
                                        <div class="w-full pt-2 pb-2 mt-[-10px]">
                                            <h2 class="title-font font-medium text-lg text-gray-900">{{ $routes->name }}</h2>
                                            <h3 class="text-gray-900 mb-2">Descripción:</h3>
                                            <p class="mb-4 text-gray-800">{{ Str::limit($routes->description, 30) }}</p> <!-- Descripción limitada a 30 caracteres -->
                                            <a href="{{ route('routes.show', $routes->id) }}" class="mb-4 text-gray-800">Clic para más información</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
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
</html> -->
