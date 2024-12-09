<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Emprendedores</title>
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
                        <h1 class="text-2xl font-medium title-font mb-4 text-gray-100">Catalogo de emprendedores</h1>
                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-100">Conéctate con los emprendedores de nuestra red y apoya el crecimiento económico del Oriente Antioqueño.</p>
                      </div>
                      <div class="flex flex-wrap -m-4">
                        @foreach ($user as $users)
                            <div class="p-4 lg:w-1/4 md:w-1/2">
                                <div class="h-full flex flex-col items-center text-center bg-white rounded-lg shadow-lg p-4 transition-transform transform hover:scale-105">
                                    <img alt="team" class="flex-shrink-0 rounded-lg w-full h-64 object-cover object-center mb-4" src="{{ asset('storage/'.$users->profile_photo_path) }}">
                                    <div class="w-full">
                                        <h2 class="title-font font-medium text-lg text-gray-900">{{ $users->name }}</h2>
                                        <h3 class="text-gray-700 mb-3">Biografía</h3>
                                        <p class="mb-4 text-gray-700">{{ $users->description }}</p>
                                        <span class="inline-flex space-x-8">
                                            @if(!empty($users->instagram))
                                                <a href="{{ $users->instagram }}" target="_blank" class="text-gray-900 hover:text-[#f05ebf]">
                                                    <ion-icon name="logo-instagram" size="large"></ion-icon>
                                                </a>
                                            @endif
                                            @if(!empty($users->facebook))
                                                <a href="{{ $users->facebook }}" target="_blank" class="text-gray-900 hover:text-[#5260fe]">
                                                    <ion-icon name="logo-facebook" size="large"></ion-icon>
                                                </a>
                                            @endif
                                            @if(!empty($users->youtube))
                                                <a href="{{ $users->youtube }}" target="_blank" class="text-gray-900 hover:text-[#ff0000]">
                                                    <ion-icon name="logo-youtube" size="large"></ion-icon>
                                                </a>
                                            @endif
                                            @if(!empty($users->whatsapp))
                                                <a href="https://wa.me/{{ $users->whatsapp }}?text=Quiero saber mas sobre su emprendimiento" target="_blank" class="text-gray-900 hover:text-[#55ff6b]">
                                                    <ion-icon name="logo-whatsapp" size="large"></ion-icon>
                                                </a>
                                            @endif
                                        </span>
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
</body>
</html>
