<nav>
    <ul class="md:flex items-center justify-start text-sm text-[#2e4053] font-bold pt-4 md:pt-0 hidden md:flex" id="menu">
        <li><a class="md:p-4 py-3 px-0 block text-sm" href="{{ route('welcome') }}">Inicio</a></li>
        <li><a class="md:p-4 py-3 px-0 block text-sm" href="{{ route('info') }}">¿Qué hace la red de emprendimiento?</a></li>
        <li><a class="md:p-4 py-3 px-0 block text-sm" href="{{ route('gallery') }}">Galerías de eventos</a></li>
        <li><a class="md:p-4 py-3 px-0 block text-sm" href="{{ route('entrepreneur') }}">Catálogo de emprendedores</a></li>
        <!--<li><a class="md:p-4 py-3 px-0 block text-sm" href="{{ route('storeUser') }}">Tienda</a></li>-->
        <li><a class="md:p-4 py-3 px-0 block text-sm" href="{{ route('contacto.index') }}">Contáctenos</a></li>
        @auth
            <li><a class="md:p-4 py-3 px-0 block text-sm" href="{{ route('dashboard') }}">Regresar al panel</a></li>
            <!--<li><a class="md:p-4 py-3 px-0 block" href="{{ route('viewCart') }}"><img src="{{ asset('storage/img/cart-shopping-solid.svg') }}" class="h-5"></a></li>-->
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="md:p-4 py-3 px-0 block bg-transparent text-[#2e4053] font-bold text-sm border-0">Cerrar sesión</button>
                </form>
            </li>
        @else
            <li><a class="md:p-4 py-3 px-0 block text-sm" href="{{ route('login') }}">Iniciar sesión</a></li>
        @endauth
    </ul>
    <!-- Menú desplegable para móviles -->
    <div class="md:hidden h-12">
        <button id="menu-toggle" class="text-[#2e4053] focus:outline-none">
            <ion-icon name="menu" size="large"></ion-icon>
        </button>
        <ul id="mobile-menu" class="hidden flex flex-col relative z-10 space-y-2 bg-white/90 p-4 absolute shadow-lg rounded-lg w-64 h-auto">
            <li><a class="p-4 block text-sm" href="{{ route('welcome') }}">Inicio</a></li>
            <li><a class="p-4 block text-sm" href="{{ route('gallery') }}">Galería</a></li>
            <li><a class="p-4 block text-sm" href="{{ route('entrepreneur') }}">Catálogo</a></li>
            <li><a class="p-4 block text-sm" href="{{ route('storeUser') }}">Tienda</a></li>
            <li><a class="p-4 block text-sm" href="{{ route('contacto.index') }}">Contáctenos</a></li>
            @auth
                <li><a class="p-4 block text-sm" href="{{ route('dashboard') }}">Regresar al panel</a></li>
                <li><a class="p-4 block" href="{{ route('viewCart') }}"><img src="{{ asset('storage/img/cart-shopping-solid.svg') }}" class="h-5"></a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left p-4 bg-transparent text-black font-bold text-sm border-0">Cerrar sesión</button>
                    </form>
                </li>
            @else
                <li><a class="p-4 block text-sm" href="{{ route('login') }}">Iniciar sesión</a></li>
            @endauth
        </ul>
    </div>
</nav>
