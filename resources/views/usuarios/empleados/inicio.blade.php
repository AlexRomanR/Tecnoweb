<x-app-layout>
    <x-slot name="header">
        <div class = "flex flex-wrap justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Lista de Empleados') }}
            </h2>
            <div>
                <a href="{{ route('excelempleado') }}"
                    class="bg-green-500 hover:bg-green-600 text-white font-bold px-4 py-2 shadow mr-4">
                    Excel
                </a>
                <a href="{{ route('pdfempleado') }}"
                    class="bg-red-500 hover:bg-red-600 text-white font-bold px-4 py-2 shadow mr-4">
                    PDF
                </a>
                <a href="{{ route('htmlempleado') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold px-4 py-2 shadow mr-4">
                    HTML
                </a>
                <a href="{{ route('csvempleado') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-bold px-4 py-2 shadow mr-4">
                    CSV
                </a>
                @can('Crear Empleados')
                <a class = "px-3 py-2 bg-indigo-600 font-bold text-white rounded-lg"
                    href="{{ route('empleados.crear') }}">REGISTRAR EMPLEADO</a>
                @endcan
            </div>
            
        </div>
    </x-slot>

    <title>Empleados</title>

    <table class="min-w-full border-collapse block md:table">
        <thead class="block md:table-header-group">
            <tr
                class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    ID</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Nombre</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Correo Electronico</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Direccion</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Telefono</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    C.I.</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Departamento</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Cargo</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Imagen</th>

                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Acciones</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group">
            @foreach ($empleados as $empleado)
                <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">ID</span>{{ $empleado->usuario->id }}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Nombre</span>{{ $empleado->usuario->name }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Correo
                            Electronico</span>{{ $empleado->usuario->email }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Direccion</span>{{ $empleado->usuario->direccion }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Telefono</span>{{ $empleado->usuario->telefono }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">C.I</span>{{ $empleado->usuario->ci }}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                        class="inline-block w-1/3 md:hidden font-bold">Departamento</span>{{ optional($empleado->departamento)->nombre ?? 'N/A'  }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                        class="inline-block w-1/3 md:hidden font-bold">Cargoo</span>{{ optional($empleado->cargo)->nombre ?? 'N/A'  }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">

                        <div class="flex">
                            <span class="inline-block w-1/3 md:hidden font-bold">Foto</span>
                            @if ($empleado->ruta_imagen_e)
                                <img id="imagen" src="{{ asset($empleado->ruta_imagen_e) }}"
                                    class="w-16 h-16 object-cover rounded-full" alt="placeholder"> style="width:100px; height:100px;" 
                            @else
                                <span>Null</span>
                            @endif
                        </div>
                    </td>

                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <div class="flex flex-wrap">
                            <span class="inline-block w-1/3 md:hidden font-bold">Acciones</span>
                            @can('Editar Empleados')
                                <a href="{{ route('empleados.editar', $empleado->usuario->id) }}"
                                    class = "bg-green-400 px-2 py-2 rounded-lg" title="Editar">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                            @endcan
                            @can('Eliminar Empleados')
                                <div> 
                                    <form id="formEliminar_{{ $empleado->usuario->id }}"
                                        action="{{ route('empleados.eliminar', $empleado->usuario->id) }}" method="POST">
                                        @csrf
                                        <button type="button" class="bg-red-500 px-2 py-2 rounded-lg" title="Eliminar"
                                            onclick="confirmarEliminacion('{{ $empleado->usuario->id }}')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            @endcan
                            @can('Inicio Informacion Personal')
                                <a href="{{ route('informacionpersonal.inicio', $empleado->usuario->id) }}"
                                    class = "bg-amber-300 px-2 py-2 rounded-lg" title="Informacion">
                                    <i class="far fa-file-alt"></i>
                                </a>
                            @endcan
                            @can('Inicio Bitacoras')
                                <a href="{{ route('bitacoras.inicio', $empleado->usuario->id) }}"
                                    class = "bg-blue-500 px-2 py-2 rounded-lg" title="Bitacora">
                                    <i class="fas fa-history"></i>
                                </a>
                            @endcan
                            @can('Asignar Horarios')
                                <a href="{{ route('empleados.inicioH', $empleado->usuario->id) }}"
                                    class = "bg-purple-500 px-2 py-2 rounded-lg" title="Horario">
                                    <i class="fas fa-clock"></i>
                                </a>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <script>
        @if (Session::has('eliminado'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
            toastr.success("{{ session('eliminado') }}")
        @endif
        @if (Session::has('actualizado'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
            toastr.success("{{ session('actualizado') }}")
        @endif
        @if (Session::has('creado'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
            toastr.success("{{ session('creado') }}")
        @endif
    </script>

    
</x-app-layout>
