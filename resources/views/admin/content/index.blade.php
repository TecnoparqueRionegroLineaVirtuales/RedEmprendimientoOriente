<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de control</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
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
                <h1 class="text-3xl text-black pb-6">Contenido</h1>
                <div class="w-full mt-12">
                    <div class="bg-white overflow-auto grid grid-cols-2 gap-4 p-10">
                        <a href="{{ route('galleryRegister') }}"><button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                            <i class="fas fa-save mr-3"></i> Registrar Galerias
                        </button></a>
                        <a href="{{ route('imageRegister') }}"><button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                            <i class="fas fa-save mr-3"></i> Registrar Imagenes
                        </button></a>
                    </div>
                    <div class="bg-white overflow-auto grid grid-cols-2 gap-4 p-10">
                        <h1 class="text-3xl text-black pb-6">Galerias</h1>
                        <h1 class="text-3xl text-black pb-6">Imagenes</h1>
                    </div>
                    <div class="bg-white overflow-auto grid grid-cols-2 gap-4 p-10">
                        
                        <table class="min-w-full bg-white">
                            <thead class="bg-[#587ABA] text-white">
                                <tr>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Nombre</th>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Descripción</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Estado</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                            @foreach($gallery as $gallerys)
                                <tr>
                                    <td class="w-1/3 text-left py-3 px-4">{{ $gallerys->name }}</td>
                                    <td class="w-1/3 text-left py-3 px-4">{{ $gallerys->description }}</td>
                                    <td class="text-left py-3 px-4">
                                        @if($gallerys->status_id == 1)
                                            <span class="bg-green-500 text-white py-1 px-3 rounded-full text-xs">Activo</span>
                                        @else
                                            <span class="bg-red-500 text-white py-1 px-3 rounded-full text-xs">Inactivo</span>
                                        @endif
                                    </td>
                                    <td class="text-left py-3 px-4">
                                        <a href="{{ route('galleryEdit', $gallerys->id) }}">
                                            <button>
                                                <i class="fas fa-pen mr-3"></i>
                                            </button>
                                        </a>
                                        <form action="{{ route('galleryDelete', $gallerys->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">
                                                <i class="fas fa-trash mr-3"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('galleryToggleStatus', $gallerys->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit">
                                                <i class="fas fa-toggle-on mr-3"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                        <table class="min-w-full bg-white">
                            <thead class="bg-[#587ABA] text-white">
                                <tr>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Nombre</th>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Descripción</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Estado</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach($multimedia as $multimedias)
                                    <tr>
                                        <td class="w-1/3 text-left py-3 px-4">{{ $multimedias->name }}</td>
                                        <td class="w-1/3 text-left py-3 px-4">{{ $multimedias->description }}</td>
                                        <td class="text-left py-3 px-4">
                                            @if($multimedias->status_id == 1)
                                            <span class="bg-green-500 text-white py-1 px-3 rounded-full text-xs">Activo</span>
                                            @else
                                                <span class="bg-red-500 text-white py-1 px-3 rounded-full text-xs">Inactivo</span>
                                            @endif
                                        </td>
                                        <td class="text-left py-3 px-4">
                                            <a href="{{ route('editImage', $multimedias->id) }}"><i class="fas fa-pen mr-3"></i></a>
                                            <form action="{{ route('destroyImage', $multimedias->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><i class="fas fa-trash mr-3"></i></button>
                                            </form>
                                            <a href="{{ route('toggleImageStatus', $multimedias->id) }}"><i class="fas fa-toggle-on mr-3"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>                        
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