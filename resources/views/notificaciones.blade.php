<x-app-layout>
    <x-slot name="header">
        <div class = "flex flex-wrap justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Todas las notificaciones') }}
            </h2>
        </div>
    </x-slot>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5">
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
                        <div class="text-[14px] text-gray-600 font-medium truncate">
                            {{ $notification->data['titulo'] }}
                        </div>
                        <div class="text-[15px] text-gray-500">
                            {{ $notification->data['contenido'] }}
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            <div class="w-full text-left px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">No
                hay notificaciones
            </div>
        @endif

    </div>

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

        function marcarNotificacionLeida(notificationId) {
            axios.post('{{ route('notificaciones.marcarComoLeida', '') }}/' + notificationId)
                .then(response => {
                    location.reload();
                })
                .catch(error => {
                    console.error('Error marcando notificación como leída:', error);
                });
        }
    </script>
</x-app-layout>
