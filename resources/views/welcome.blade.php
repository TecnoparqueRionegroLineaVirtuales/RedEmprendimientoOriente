<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    @vite('resources/css/app.css')
    <style>
        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }

        .icon-bounce {
            animation: float 2s ease-in-out infinite;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.8); 
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">

    <!-- Fondo con degradado y superposición de imagen -->
    <div class="relative w-full min-h-screen bg-cover bg-center bg-fixed" 
         style="background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.7), rgba(50, 50, 50, 0.7)), url('{{ asset('storage/img/background.jpg') }}');">

        <!-- Contenido de la página -->
        <div class="content">
            <header class="lg:px-16 px-4 flex items-center justify-between py-4 bg-white/90 p-4 rounded-lg shadow-lg border border-gray-200 mx-4">
                
                <!-- Logo -->
                <div class="flex-1 flex justify-between items-center">
                    <a href="#" class="text-4xl font-extrabold text-[#2e4053]">
                        <img src="{{ asset('storage/img/logo.png') }}" class="h-20">
                    </a>
                </div>
                
                <!-- Menú en recuadro -->
                <div class="flex items-center space-x-4">
                    @include('components/nav_landing')
                </div>
            </header>
            
            <!-- Sección principal de la página -->
            <div class="flex items-center justify-center h-[calc(90vh-4rem)]">
                <div class="lg:w-[30%] text-center bg-white/90 p-8 rounded-lg shadow-lg border border-gray-200">
                    <h1 class="sm:text-5xl xs:text-4xl text-[#2e4053] uppercase font-bold font-mono">
                        RED DE EMPRENDIMIENTO DEL ORIENTE ANTIOQUEÑO
                    </h1>

                    <!-- Iconos de redes sociales -->
                    <div class="flex items-center justify-center space-x-8 pt-6 mt-8">
                        @if(!empty($user->facebook))
                            <a href="{{ $user->facebook }}" target="_blank" class="icon-bounce no-underline px-2 bg-white/50 rounded-full flex items-center justify-center aspect-square w-12 h-12">
                                <ion-icon name="logo-facebook" size="large" style="color: #1877F2;"></ion-icon>
                            </a>
                        @endif
                        @if(!empty($user->instagram))
                            <a href="{{ $user->instagram }}" target="_blank" class="icon-bounce no-underline px-2 bg-white/50 rounded-full flex items-center justify-center aspect-square w-12 h-12">
                                <ion-icon name="logo-instagram" size="large" style="color: #C13584;"></ion-icon>
                            </a>
                        @endif
                        @if(!empty($user->whatsapp))
                            <a href="https://wa.me/{{ $user->whatsapp }}?text=Quiero saber más sobre la red de emprendimiento del oriente de Antioquia" target="_blank" class="icon-bounce no-underline px-2 bg-white/50 rounded-full flex items-center justify-center aspect-square w-12 h-12">
                                <ion-icon name="logo-whatsapp" size="large" style="color: #25D366;"></ion-icon>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts de Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- Script para menú móvil -->
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
