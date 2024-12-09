<x-guest-layout>
    <div class="flex h-screen">
        <!-- Contenedor izquierdo con el botón de registro -->
        <div class="hidden lg:flex items-center justify-center bg-[#587ABA] w-1/2">
            <div class="p-8">
                <h2 class="text-4xl text-white font-bold mb-4">¡Únete a nosotros!</h2>
                <p class="text-lg text-white mb-8">Regístrate para obtener una cuenta y acceder.</p>
                <a href="{{ route('register') }}" class="bg-white text-black px-6 py-3 rounded-full font-semibold text-lg hover:bg-black hover:text-white transition-colors duration-300">Registrarse</a>
            </div>
        </div>

        <!-- Contenedor derecho con el formulario de inicio de sesión -->
        <div class="w-full lg:w-1/2 flex items-center justify-center">
            <div class="p-8 rounded-lg w-full max-w-md">
                <!-- Logo -->
                <div class="flex justify-center mb-6">
                    <x-authentication-card-logo class="text-black" />
                </div>

                <!-- Errores de validación -->
                <x-validation-errors class="mb-4 text-black" />

                @session('status')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ $value }}
                    </div>
                @endsession

                <!-- Formulario de inicio de sesión -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Campo Email -->
                    <div>
                        <x-label for="email" value="{{ __('Email') }}" class="text-black" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <!-- Campo Contraseña -->
                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" class="text-black" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>


                    <!-- Recordarme -->
                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ms-2 text-sm">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <!-- Botones -->
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-white hover:text-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#34482D]" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-button class="ms-4 bg-[#078C03] text-white hover:bg-[#34482D]">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
