<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Reserva')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        function toggleMenu(id) {
            document.getElementById(id).classList.toggle("hidden");
        }
    </script>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-900 text-white p-5">
            <h2 class="text-xl font-bold mb-6">Marriot JW</h2>
            <nav>
                <ul class="space-y-4">
                    <!-- Inicio -->
                    <li class="flex items-center gap-2 hover:text-blue-300 cursor-pointer">
                        <i class="fas fa-home"></i>
                        <a href="{{ route('dashboard') }}" onclick="redirectToHomeAndCloseMenu()">Inicio</a> <!-- Redirige al inicio y cierra los submenús -->
                    </li>

                    <!-- Habitaciones -->
                    <li onclick="toggleMenu('menuHabitaciones')" class="cursor-pointer flex items-center gap-2 hover:text-blue-300">
                        <i class="fas fa-bed"></i> Habitaciones
                    </li>
                    <ul id="menuHabitaciones" class="hidden pl-6 space-y-2">
                        <li><a href="{{ route('habitaciones.index') }}" class="hover:text-blue-300">Lista de habitaciones</a></li>
                        <li><a href="{{ route('habitaciones.disponibles') }}" class="hover:text-blue-300">Disponibles</a></li>
                        <li><a href="{{ route('habitaciones.reservadas') }}" class="hover:text-blue-300">Reservadas</a></li>
                        <li><a href="{{ route('habitaciones.ocupadas') }}" class="hover:text-blue-300">Ocupadas</a></li>
                        <li><a href="{{ route('habitaciones.mantenimiento') }}" class="hover:text-blue-300">Mantenimiento</a></li>
                    </ul>



                    <!-- Reservas -->
                    <li onclick="toggleMenu('menuReservas')" class="cursor-pointer flex items-center gap-2 hover:text-blue-300">
                        <i class="fas fa-calendar-check"></i> Reservas
                    </li>
                    <ul id="menuReservas" class="hidden pl-6 space-y-2">
                        <li><a href="{{ route('reservas.index') }}" class="hover:text-blue-300 cursor-pointer">Lista Reservas</a></li>

                    </ul>

                    <!-- Clientes -->
                    <li onclick="toggleMenu('menuClientes')" class="cursor-pointer flex items-center gap-2 hover:text-blue-300">
                        <i class="fas fa-users"></i> Clientes
                    </li>
                    <ul id="menuClientes" class="hidden pl-6 space-y-2">
                        <li>
                            <a href="{{ route('clientes.index') }}" class="hover:text-blue-300 cursor-pointer">Lista de Clientes</a>
                        </li>
                        <!-- <li class="hover:text-blue-300 cursor-pointer">Añadir Cliente</li> -->
                    </ul>

                    <!-- Pagos -->
                    <li onclick="toggleMenu('menuPagos')" class="cursor-pointer flex items-center gap-2 hover:text-blue-300">
                        <i class="fas fa-money-check-alt"></i> Pagos
                    </li>
                    <ul id="menuPagos" class="hidden pl-6 space-y-2">
                        <li class="hover:text-blue-300 cursor-pointer">Registrar Pago</li>
                        <li class="hover:text-blue-300 cursor-pointer">Historial de Pagos</li>
                    </ul>

                    <!-- Usuarios -->
                    <li onclick="toggleMenu('menuUsuarios')" class="cursor-pointer flex items-center gap-2 hover:text-blue-300">
                        <i class="fas fa-user-circle"></i> Usuarios
                    </li>
                    <ul id="menuUsuarios" class="hidden pl-6 space-y-2">
                        <li>
                            <a href="{{ route('usuarios.index')}}" class="hover:text-blue-300 cursor-pointer">Lista de Usuarios</a>

                        </li>

                    </ul>

                    <!-- Empleados -->
                    <li onclick="toggleMenu('menuEmpleados')" class="cursor-pointer flex items-center gap-2 hover:text-blue-300">
                        <i class="fas fa-id-badge"></i> Empleados
                    </li>
                    <ul id="menuEmpleados" class="hidden pl-6 space-y-2">
                        <li><a href="{{ route('empleados.index') }}" class="hover:text-blue-300 cursor-pointer">Lista de Empleados</a></li>

                    </ul>

                    <!-- Servicios -->
                    <li onclick="toggleMenu('menuServicios')" class="cursor-pointer flex items-center gap-2 hover:text-blue-300">
                        <i class="fas fa-concierge-bell"></i> Servicios
                    </li>
                    <ul id="menuServicios" class="hidden pl-6 space-y-2">
                        <li> <a href="{{ route('servicios.index') }}" class="hover:text-blue-300 cursor-pointer">Servicios Disponibles</a></li>
                        <!-- @if(isset($reserva))
                        <li><a href="{{ route('reservaservicios.index', ['reservaId' => $reserva->id_reserva]) }}" class="hover:text-blue-300 cursor-pointer">Detalle Servicio</a></li>
                        @endif -->


                    </ul>

                </ul>
            </nav>
        </aside>

        <!-- Contenido dinámico -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</body>

</html>