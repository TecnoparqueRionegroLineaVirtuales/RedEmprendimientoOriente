<header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
    <div class="w-1/2"></div>
    <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
        <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
            <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Profile Photo">
        </button>
        <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
        <div x-show="isOpen" class="absolute max-w-auto bg-white rounded-lg shadow-lg py-2 mt-16">
            <a href="{{ route('personal.edit', Auth::user()->id) }}" class="block text-sm px-4 py-2 account-link hover:bg-[#587ABA] hover:text-white">Actualizar datos</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="block text-sm px-4 py-2 account-link hover:bg-[#587ABA] hover:text-white"><button>Cerrar sesión</button></a>
            </form>
        </div>
    </div>
</header>
<header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
    <div class="flex items-center justify-between">
        <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">
            <img src="{{ asset('storage/img/logo.png') }}" class="h-14"/>
        </a>
        <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
            <i x-show="!isOpen" class="fas fa-bars"></i>
            <i x-show="isOpen" class="fas fa-times"></i>
        </button>
    </div>

    <!-- Dropdown Nav -->
    <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
    @role('admin')
            <a href="{{ route('dashboard') }}" class="flex items-center text-white opacity-75 hover:opacity-100 hover:bg-[#34482D] py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Panel de control
            </a>
            <a href="{{ route('galleryAdmin') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-images mr-3"></i>
                Galeria
            </a>
            <!--<a href="{{ route('storeNav') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-shopping-cart mr-3"></i>
                Tienda
            </a>-->

            <a href="{{ route('indexMessage') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-envelope mr-3"></i>
                Mensajes
            </a>
            <a href="{{ route('usersIndex') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-user mr-3"></i>
                Usuarios
            </a>
            <a href="{{ route('welcome') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-globe mr-3"></i>
                Regresar a la web
            </a>
        @endrole
        @role('user')
            <a href="{{ route('personal.edit', Auth::user()->id) }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-user mr-3"></i>
                Actualizar datos
            </a>
            <!--<a href="{{ route('storeNav') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-shopping-cart mr-3"></i>
                Compras
            </a>-->
            <a href="{{ route('welcome') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-globe mr-3"></i>
                Regresar a la web
            </a>
        @endrole
        @role('Emprendedor')
        <a href="{{ route('personal.edit', Auth::user()->id) }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-user mr-3"></i>
                Actualizar datos
            </a>
            <!--<a href="{{ route('storeNav') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-shopping-cart mr-3"></i>
                Compras
            </a>-->
            <a href="{{ route('welcome') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-globe mr-3"></i>
                Regresar a la web
            </a>
        @endrole
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-arrow-circle-up mr-3"></i> cerrar sesión
            </button>
        </form>
    </nav>
</header>