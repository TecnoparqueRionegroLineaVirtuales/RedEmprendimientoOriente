<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de la Ruta</title>
    @vite('resources/css/app.css')
    <style>
        .background-fixed {
            background-image: url('{{ asset('storage/img/fondo2.jpg') }}');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }
        /* Fondo sutil con humo más fuerte */
        .overlay {
            background-color: rgba(50, 50, 50, 0.7); /* Gris oscuro con opacidad del 70% */
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
                    <div class="overflow-auto grid grid-cols-2 gap-4 p-10">
                        <a href="{{ route('indexLanding')}}"><button class="p-10 bg-[#34482D] text-white font-semibold py-2 rounded-lg shadow-lg hover:bg-[#078C03] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="fas fa-arrow-alt-circle-left mr-3"></i> Regresar
                        </button></a>
                    </div>
                    <div class="container px-24 py-15 mx-auto">
                        <div class="flex bg-white bg-opacity-80 rounded-lg shadow-lg p-8">
                            <img alt="Ruta" class="rounded-lg w-1/2 h-80 object-cover object-center mr-6" src="{{ asset('storage/'.$route->url) }}"> <!-- Imagen más alta -->
                            <div class="w-1/2"> <!-- Información a la derecha -->
                                <h1 class="text-2xl font-medium title-font mb-4 text-gray-900">{{ $route->name }}</h1>
                                <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-900">Detalles de la ruta seleccionada.</p>
                                <h3 class="text-gray-900 mb-2">Descripción:</h3>
                                <p class="mb-4 text-gray-800">{{ $route->description }}</p>
                                <a href="{{ asset('storage/' . $route->pdf_url) }}" target="_blank" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#34482D] hover:bg-[#078C03] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Descargar PDF para mas información
                                </a>
                                <a href="https://wa.me/{{ preg_replace('/\D/', '57', $route->contact) }}?text=Hola,%20me%20interesa%20la%20ruta%20{{ urlencode($route->name) }}." 
                                    target="_blank" 
                                    class="mt-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#34482D] hover:bg-[#078C03] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Realizar pedido por WhatsApp
                                </a>
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
</html> -->
