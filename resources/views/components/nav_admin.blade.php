<aside class="relative bg-[#587ABA] h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">
            <img src="{{ asset('storage/img/logo.png') }}"/>
        </a>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        @role('admin')
            <a href="{{ route('dashboard') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Panel de control
            </a>
            <a href="{{ route('galleryAdmin') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6">
                <i class="fas fa-images mr-3"></i>
                Galeria
            </a>
            <!--<a href="{{ route('storeNav') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6">
                <i class="fas fa-shopping-cart mr-3"></i>
                Tienda
            </a>-->
            <a href="{{ route('indexMessage') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6">
                <i class="fas fa-envelope mr-3"></i>
                Mensajes
            </a>
            <a href="{{ route('usersIndex') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6">
                <i class="fas fa-user mr-3"></i>
                Usuarios
            </a>
            <a href="{{ route('welcome') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6">
                <i class="fas fa-globe mr-3"></i>
                Regresar a la web
            </a>
        @endrole
        @role('user')
            <a href="{{ route('personal.edit', Auth::user()->id) }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6">
                <i class="fas fa-user mr-3"></i>
                Actualizar datos
            </a>
            <!--<a href="{{ route('storeNav') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6">
                <i class="fas fa-shopping-cart mr-3"></i>
                Compra
            </a>-->
            <a href="{{ route('welcome') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6">
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
    </nav>
</aside>