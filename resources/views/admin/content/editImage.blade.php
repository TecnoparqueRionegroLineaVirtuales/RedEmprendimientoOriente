<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Imagen</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
    </style>
</head>
<body class="bg-gray-100 font-family-karla flex">
    @include('components.nav_admin')
    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        @include('components.nav_head_admin')
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Editar Imagen</h1>
                <div class="w-full mt-12">
                    <div class="bg-white overflow-auto grid grid-cols-2 gap-4 p-10">
                        <a href="{{ route('galleryAdmin')}}"><button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                            <i class="fas fa-arrow-alt-circle-left mr-3"></i> Regresar
                        </button></a>
                    </div>
                    <div class="bg-white overflow-auto w-full gap-4 p-10">
                        <div class="mx-auto my-10 bg-white w-full p-8 rounded-lg shadow-lg">
                            <h2 class="text-2xl font-bold mb-6">Formulario de Edición</h2>
                            <form action="{{ route('updateImage', $image->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                                    <input type="text" id="name" name="name" value="{{ $image->name }}" maxlength="100" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                </div>
                                <div class="mb-4">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                                    <input type="text" id="description" name="description" value="{{ $image->description }}" maxlength="200" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                </div>
                                <div class="mb-4">
                                    <label for="url" class="block text-sm font-medium text-gray-700">Imagen</label>
                                    <input type="file" id="url" name="url" accept="image/*" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <img src="{{ asset('storage/' . $image->url) }}" alt="Imagen actual" class="mt-2 h-32">
                                </div>
                                <div class="mb-4">
                                    <label for="gallery_id" class="block text-sm font-medium text-gray-700">Galería</label>
                                    <select id="gallery_id" name="gallery_id" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                        @foreach ($gallery as $gallerys)
                                           <option value="{{ $gallerys->id }}" {{ $gallerys->id == $image->gallery_id ? 'selected' : '' }}>{{ $gallerys->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <input hidden id="user_id" name="user_id" value="1" type="text">
                                </div>
                                <div class="mb-4">
                                    <label for="status_id" class="block text-sm font-medium text-gray-700">Estado</label>
                                    <select id="status_id" name="status_id" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                        @foreach ($state as $states)
                                           <option value="{{ $states->id }}" {{ $states->id == $image->status_id ? 'selected' : '' }}>{{ $states->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" class="w-full bg-[#587ABA] text-white font-semibold py-2 rounded-lg shadow-lg hover:bg-[#07DBF2] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Actualizar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="w-full bg-white text-right p-4">
                <a target="_blank" href="" class="underline">Red de emprendimento del oriente antioqueño 2024.</a>.
            </footer>
        </div>
    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
</body>
</html>
