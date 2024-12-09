<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
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
                <h1 class="text-3xl text-black pb-6">Productos</h1>
                <div class="w-full mt-12">
                    <div class="bg-white overflow-auto grid grid-cols-2 gap-4 p-10">
                        <a href="{{ route('storeNav')}}"><button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                            <i class="fas fa-arrow-alt-circle-left mr-3"></i> Regresar
                        </button></a>
                        <a href="{{ route('registerProduct') }}"><button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                            <i class="fas fa-save mr-3"></i> Registrar Producto
                        </button></a>
                    </div>
                    <div class="bg-white overflow-auto grid grid-cols-1 gap-4 p-10">
                        <h1 class="text-3xl text-black pb-6">Productos</h1>
                    </div>
                    <div class="bg-white overflow-auto grid grid-cols-1 gap-4 p-10">
                        <table class="min-w-full bg-white mt-4">
                            <thead class="bg-[#587ABA] text-white">
                                <tr>
                                    <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Nombre</th>
                                    <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Descripción</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Precio</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Estado</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach($products as $product)
                                <tr>
                                    <td class="w-1/4 text-left py-3 px-4">{{ $product->name }}</td>
                                    <td class="w-1/4 text-left py-3 px-4">{{ $product->description }}</td>
                                    <td class="text-left py-3 px-4">${{ $product->price }}</td>
                                    <td class="text-left py-3 px-4">
                                        @if($product->status_id == 1)
                                            <span class="bg-green-500 text-white py-1 px-3 rounded-full text-xs">Activo</span>
                                        @else
                                            <span class="bg-red-500 text-white py-1 px-3 rounded-full text-xs">Inactivo</span>
                                        @endif
                                    </td>
                                    <td class="text-left py-3 px-4">
                                        <a href="{{ route('products.edit', $product->id) }}" class="mr-3">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">
                                                <i class="fas fa-trash mr-3"></i>
                                            </button>
                                        </form>                                                                                
                                        <form action="{{ route('products.toggleStatus', $product->id) }}" method="POST" style="display: inline;">
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
                    </div>
                </div>
            </main>
            <footer class="w-full bg-white text-right p-4">
                <a target="_blank" href="" class="underline">Pantágoras 2024.</a>.
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