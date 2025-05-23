<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="h-14 bg-gray-100 top-0 w-full fixed shadow" style="z-index: 99999;">
        <div class="flex justify-between items-center pr-10 pl-3 h-14">
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('archivos/logo.jpg') }}" alt="Logo" class="block h-9 w-auto" />
                </a>
                <div class="ml-4">
                    <h2 class="text-md font-bold">{{ Auth::user()->name }}</h2>
                    <p class="text-gray-400 text-[12px]">
                     
                    </p>
                </div>
                <a id="toggle-button"
                    class="hidden lg:block bg-gray-200 rounded-full transition-all duration-500 ease-in-out ml-4"
                    onclick="collapseSidebar()" href="#"><i class="fa-solid fa-arrow-right p-3"></i></a>
            </div>


            <ul class="flex items-center gap-5">
                <li class="">
                    <div class="ml-3 relative" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="relative inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <!-- Ícono de notificación -->
                            <div class="absolute left-0 top-0 bg-red-500 rounded-full">
                                @if (auth()->user()->unreadNotifications->count() > 0)
                                    <span
                                        class="text-sm text-white p-1">{{ auth()->user()->unreadNotifications->count() }}</span>
                                @endif
                            </div>
                            <div class="p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="text-gray-600 w-6 h-6" viewBox="0 0 16 16">
                                    <path
                                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                                </svg>
                            </div>
                        </button>
                        <!-- Dropdown de notificaciones -->
                        <div x-show="open" @click.away="open = false"
                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                            <div class="py-1" role="menu" aria-orientation="vertical"
                                aria-labelledby="options-menu">
                                @if (!auth()->user()->notifications->isEmpty())
                                    <button class="w-full text-left px-4 py-2 text-sm text-blue-600 hover:bg-gray-100"
                                        onclick="marcarTodasComoLeidas()">
                                        Marcar todas como leídas
                                    </button>
                                    @foreach (auth()->user()->notifications as $notification)
                                        <a href="{{ $notification->data['link'] }}"
                                            class="py-2 px-4 flex items-center hover:bg-gray-50 group {{ $notification->read_at ? 'bg-gray-200' : 'bg-white' }}"
                                            onclick="marcarNotificacionLeida(event, '{{ $notification->id }}')">
                                            <div class="ml-2">
                                                <div class="text-[10px] text-gray-600 font-medium truncate">
                                                    {{ $notification->data['titulo'] }}
                                                </div>
                                                <div class="text-[11px] text-gray-500">
                                                    {{ $notification->data['contenido'] }}
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                    <a href="{{ route('notificaciones.verTodas') }}"
                                        class="block text-center px-4 py-2 text-sm text-blue-700 hover:bg-gray-100">
                                        Ver todas las notificaciones
                                    </a>
                                @else
                                    <div class="w-full text-left px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">No
                                        hay notificaciones
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </li>
                <li class="" onclick="openUserDropdown()">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('informacionpersonal.inicio', Auth::user()->id) }}">
                                {{ __('Informacion Personal') }}
                            </x-dropdown-link>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </li>
            </ul>
        </div>
    </div>
    <!-- left sidebar -->
    <aside id="sidebar"
        class="w-[55px] lg:w-[55px] h-[calc(100vh-55px)] top-14 whitespace-nowrap fixed shadow overflow-x-hidden transition-all duration-500 ease-in-out bg-gray-100 overflow-y-auto z-10">
        <div class="flex flex-col justify-between h-full">
            <ul class="flex flex-col gap-1 mt-2">
                <li class="text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                    <a class="w-full flex items-center py-3" href="{{ route('dashboard') }}">
                        <i class="fa-solid fa-house text-center px-5"></i>
                        <span class="whitespace-nowrap pl-1">Dashboard</span>
                    </a>
                </li>
                @can('Inicio Reportes')
                    <li class="text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                        <a class="w-full flex items-center py-3" href="{{ route('reportes.inicio') }}">
                            <i class="fa-solid fa-chart-line text-center px-5"></i>
                            <span class="whitespace-nowrap pl-1">Reportes</span>
                        </a>
                    </li>
                @endcan
              
             
              
                @can('Inicio Roles')
                    <li class="text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                        <a class="w-full flex items-center py-3" href="{{ route('roles.inicio') }}">
                            <i class="fa-solid fa-user-shield text-center px-5"></i>
                            <span class="whitespace-nowrap pl-1">Roles</span>
                        </a>
                    </li>
                @endcan

                @can('Inicio Bitacoras')
                    <li class="text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                        <a class="w-full flex items-center py-3" href="{{ route('bitacoras.rinicio') }}">
                            <i class="fa-solid fa-clock-rotate-left text-center px-5"></i>
                            <span class="whitespace-nowrap pl-1">Bitacoras</span>
                        </a>
                    </li>
                @endcan
             


                
            

            </ul>
            <ul class="flex flex-col gap-1 mt-2">
                <li class="text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <a class="w-full flex items-center py-3" href="{{ route('logout') }}"
                            @click.prevent="$root.submit();">
                            <i class="fa-solid fa-right-from-bracket text-center px-5"></i>
                            <span class="pl-1">Logout</span>
                        </a>
                    </form>

                </li>
            </ul>
        </div>
    </aside>
</nav>
<script>
    function marcarTodasComoLeidas() {
        axios.post('{{ route('notificaciones.marcarTodasComoLeidas') }}')
            .then(response => {
                location.reload();
            })
            .catch(error => {
                console.error('Error marcando todas como leídas:', error);
            });
    }

    function marcarNotificacionLeida(event, notificationId) {
        event.preventDefault();

        axios.post('{{ route('notificaciones.marcarComoLeida', '') }}/' + notificationId)
            .then(response => {
                window.location.href = event.target.closest('a').href;
            })
            .catch(error => {
                console.error('Error marcando notificación como leída:', error);
            });
    }
</script>
