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
    <!-- Sidebar -->
    @include('components.nav_admin')

    <div class="w-full flex flex-col h-screen">
        <!-- Header -->
        @include('components.nav_head_admin')

        <div class="flex-grow flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Panel de control, Bienvenido {{Auth::user()->name}}</h1>
                @role('admin')
                <div class="flex flex-wrap mt-6 justify-center">
                    <div class="w-full lg:w-1/2">
                        <div class="relative">
                            <img src="{{ asset('storage/img/background.jpg') }}" alt="Banner" class="w-full h-auto object-cover rounded-lg">
                            <div class="absolute inset-0 bg-gray-700 bg-opacity-50 flex items-center justify-center rounded-lg">
                                <h2 class="text-white text-3xl font-bold">Bienvenido a la red de emprendimento del oriente antioqueño.</h2>
                            </div>
                        </div>
                    </div>
                </div>
                @endrole
                @role('user')
                <div class="flex flex-wrap mt-6 justify-center">
                    <div class="w-full lg:w-1/2">
                        <div class="relative">
                            <img src="{{ asset('storage/img/background.jpg') }}" alt="Banner" class="w-full h-auto object-cover rounded-lg">
                            <div class="absolute inset-0 bg-gray-700 bg-opacity-50 flex items-center justify-center rounded-lg">
                                <h2 class="text-white text-3xl font-bold">Bienvenido a la red de emprendimento del oriente antioqueño.</h2>
                            </div>
                        </div>
                    </div>
                </div>
                @endrole
                @role('Emprendedor')
                <div class="flex flex-wrap mt-6 justify-center">
                    <div class="w-full lg:w-1/2">
                        <div class="relative">
                            <img src="{{ asset('storage/img/background.jpg') }}" alt="Banner" class="w-full h-auto object-cover rounded-lg">
                            <div class="absolute inset-0 bg-gray-700 bg-opacity-50 flex items-center justify-center rounded-lg">
                                <h2 class="text-white text-3xl font-bold">Bienvenido a la red de emprendimento del oriente antioqueño.</h2>
                            </div>
                        </div>
                    </div>
                </div>
                @endrole

            </main>

            <!-- Footer -->
            <footer class="w-full bg-white text-right p-4">
                <a target="_blank" href="" class="underline">Red de emprendimento del oriente antioqueño 2024.</a>
            </footer>
        </div>
    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

    <!-- Gráfico de Ventas por Producto -->
    <script>
        var ctx = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($productInteraction->pluck('product_name')),
                datasets: [{
                    label: 'Ventas Totales',
                    data: @json($productInteraction->pluck('total_count')),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
