@if (!$opcional || $opcional == null)
    <div class="bg-white p-3 rounded-sm">
    </div>
    <div class="bg-white p-3 rounded-sm">
        <div class="flex items-center justify-between space-x-2 font-semibold text-gray-900 leading-8">
            <div class="flex items-center space-x-2">
                <span clas="text-green-500">
                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                        </path>
                    </svg>
                </span>
                <span class="tracking-wide px-2">Información Personal</span>
            </div>
            <a class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md"
                href="{{ route('postulantes.editarGES', ['id' => auth()->id()]) }}">Editar Información</a>
        </div>
        <div class="flex flex-col my-2 py-1">
            <p class="tracking-wide px-2">Fecha de nacimiento:
                {{ Auth::user()->postulante->fecha_de_nacimiento }}</p>
            <p class="tracking-wide px-2">Nacionalidad:
                {{ Auth::user()->postulante->nacionalidad }}</p>
            <p class="tracking-wide px-2">Habilidades:
                {{ Auth::user()->postulante->habilidades }}
            </p>
            @if(Auth::user()->postulante->fuente_de_contratacion)
            <p class="tracking-wide px-2">Fuente de Contratación:
                {{ Auth::user()->postulante->fuente_de_contratacion->nombre }}</p>
            @endif
            @if(Auth::user()->postulante->idioma)
            <p class="tracking-wide px-2">Idioma Secundario:
                {{ Auth::user()->postulante->idioma->nombre }} -
                {{ Auth::user()->postulante->nivel_idioma->categoria }}</p>
            @endif
        </div>
    </div>
@endif

@if ($opcional == 'educaciones')
    <div class="bg-white p-3 rounded-sm">
    </div>
    <div class="bg-white p-3 rounded-sm">
        <div class="flex items-center justify-between space-x-2 font-semibold text-gray-900 leading-8">
            <div class="flex items-center space-x-2">
                <span clas="text-green-500">
                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                        </path>
                    </svg>
                </span>
                <span class="tracking-wide px-2">Educaciones</span>
            </div>
            <a class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md"
                href="{{ route('educaciones.crearSIG') }}">Añadir Educación</a>
        </div>


        <div>


            <table class="min-w-full border-collapse block md:table">
                <thead class="block md:table-header-group">
                    <tr
                        class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            ID</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Nombre del colegio</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Grado Diploma</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Campo de estudio</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Fecha de finalización</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Notas adicionales</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            ID Postulante</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Acciones</th>

                    </tr>

                </thead>
                <tbody class="block md:table-row-group">

                    @if (!is_null(Auth::user()->postulante->educaciones))
                        @foreach (Auth::user()->postulante->educaciones as $educacion)
                            <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">ID</span>{{ $educacion->id }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Nombre
                                        del colegio</span>{{ $educacion->nombre_colegio }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Grado
                                        Diploma</span>{{ $educacion->grado_diploma }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Campo
                                        de estudio</span>{{ $educacion->campo_de_estudio }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Fecha
                                        de
                                        finalización</span>{{ $educacion->fecha_de_finalizacion }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Notas
                                        adicionales</span>{{ $educacion->notas_adicionales }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span
                                        class="inline-block w-1/3 md:hidden font-bold">Postulante</span>{{ $educacion->ID_Postulante }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <div class="flex flex-wrap">
                                        <span class="inline-block w-1/3 md:hidden font-bold">Acciones</span>


                                        <a href="{{ route('educaciones.editar', $educacion->id) }}"
                                            class = "bg-green-400 px-2 py-2 rounded-lg" title="Editar">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>


                                        <div class="flex flex-wrap">
                                            <div>
                                                <form id="formEliminar_{{ $educacion->id }}"
                                                    action="{{ route('educaciones.eliminar', $educacion->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="button" class="bg-red-500 px-2 py-2 rounded-lg"
                                                        title="Eliminar"
                                                        onclick="confirmarEliminacion('{{ $educacion->id }}')">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endif
@if ($opcional == 'reconocimientos')
    <div class="bg-white p-3 rounded-sm">
    </div>
    <div class="bg-white p-3 rounded-sm">
        <div class="flex items-center justify-between space-x-2 font-semibold text-gray-900 leading-8">
            <div class="flex items-center space-x-2">
                <span clas="text-green-500">
                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                        </path>
                    </svg>
                </span>
                <span class="tracking-wide px-2">Reconocimientos</span>
            </div>
            <a class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md"
                href="{{ route('reconocimientos.crearSIG') }}">Añadir Reconocimiento</a>
        </div>
        <div>
            <table class="min-w-full border-collapse block md:table">
                <thead class="block md:table-header-group">
                    <tr
                        class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            ID</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Nombre del reconocimiento</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Descripción</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            ID Postulante</th>

                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Acciones</th>

                    </tr>

                </thead>
                <tbody class="block md:table-row-group">

                    @if (!is_null(Auth::user()->postulante->reconocimientos))
                        @foreach (Auth::user()->postulante->reconocimientos as $reconocimiento)
                            <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span
                                        class="inline-block w-1/3 md:hidden font-bold">ID</span>{{ $reconocimiento->id }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Nombre
                                        del reconocimiento</span>{{ $reconocimiento->nombre }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span
                                        class="inline-block w-1/3 md:hidden font-bold">Descripción</span>{{ $reconocimiento->descripcion }}
                                </td>

                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">ID
                                        Postulante</span>{{ $reconocimiento->ID_Postulante }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <div class="flex flex-wrap">
                                        <span class="inline-block w-1/3 md:hidden font-bold">Acciones</span>


                                        <a href="{{ route('reconocimientos.editar', $reconocimiento->id) }}"
                                            class = "bg-green-400 px-2 py-2 rounded-lg" title="Editar">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>


                                        <div class="flex flex-wrap">
                                            <div>
                                                <form id="formEliminar_{{ $reconocimiento->id }}"
                                                    action="{{ route('reconocimientos.eliminar', $reconocimiento->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="button" class="bg-red-500 px-2 py-2 rounded-lg"
                                                        title="Eliminar"
                                                        onclick="confirmarEliminacion('{{ $reconocimiento->id }}')">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endif
@if ($opcional == 'experiencias')
    <div class="bg-white p-3 rounded-sm">
    </div>
    <div class="bg-white p-3 rounded-sm">
        <div class="flex items-center justify-between space-x-2 font-semibold text-gray-900 leading-8">
            <div class="flex items-center space-x-2">
                <span clas="text-green-500">
                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                        </path>
                    </svg>
                </span>
                <span class="tracking-wide px-2">Experiencias</span>
            </div>
            <a class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md"
                href="{{ route('experiencias.crearSIG') }}">Añadir Experiencia</a>
        </div>
        <div>


            <table class="min-w-full border-collapse block md:table">
                <thead class="block md:table-header-group">
                    <tr
                        class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            ID</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Cargo</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Descripción</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Años</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Lugar</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            ID Postulante</th>

                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Acciones</th>
                    </tr>
                </thead>
                <tbody class="block md:table-row-group">

                    @if (!is_null(Auth::user()->postulante->experiencias))
                        @foreach (Auth::user()->postulante->experiencias as $experiencia)
                            <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span
                                        class="inline-block w-1/3 md:hidden font-bold">ID</span>{{ $experiencia->id }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span
                                        class="inline-block w-1/3 md:hidden font-bold">Cargo</span>{{ $experiencia->cargo }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span
                                        class="inline-block w-1/3 md:hidden font-bold">Descripción</span>{{ $experiencia->descripcion }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span
                                        class="inline-block w-1/3 md:hidden font-bold">Años</span>{{ $experiencia->años }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span
                                        class="inline-block w-1/3 md:hidden font-bold">Lugar</span>{{ $experiencia->lugar }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">ID
                                        Postulante</span>{{ $experiencia->ID_Postulante }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <div class="flex flex-wrap">
                                        <span class="inline-block w-1/3 md:hidden font-bold">Acciones</span>


                                        <a href="{{ route('experiencias.editar', $experiencia->id) }}"
                                            class = "bg-green-400 px-2 py-2 rounded-lg" title="Editar">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>


                                        <div class="flex flex-wrap">
                                            <div>
                                                <form id="formEliminar_{{ $experiencia->id }}"
                                                    action="{{ route('experiencias.eliminar', $experiencia->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="button" class="bg-red-500 px-2 py-2 rounded-lg"
                                                        title="Eliminar"
                                                        onclick="confirmarEliminacion('{{ $experiencia->id }}')">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endif
@if ($opcional == 'referencias')
    <div class="bg-white p-3 rounded-sm">
    </div>
    <div class="bg-white p-3 rounded-sm">
        <div class="flex items-center justify-between space-x-2 font-semibold text-gray-900 leading-8">
            <div class="flex items-center space-x-2">
                <span clas="text-green-500">
                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                        </path>
                    </svg>
                </span>
                <span class="tracking-wide px-2">Referencias</span>
            </div>
            <a class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md"
                href="{{ route('referencias.crearSIG') }}">Añadir Referencia</a>
        </div>
        <div>


            <table class="min-w-full border-collapse block md:table">
                <thead class="block md:table-header-group">
                    <tr
                        class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            ID</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Nombre de la persona</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Telefono</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            ID Postulante</th>

                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Acciones</th>

                    </tr>

                </thead>
                <tbody class="block md:table-row-group">

                    @if (!is_null(Auth::user()->postulante->referencias))
                        @foreach (Auth::user()->postulante->referencias as $referencia)
                            <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span
                                        class="inline-block w-1/3 md:hidden font-bold">ID</span>{{ $referencia->id }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Nombre
                                        de la persona</span>{{ $referencia->nombre }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span
                                        class="inline-block w-1/3 md:hidden font-bold">Telefono</span>{{ $referencia->telefono }}
                                </td>

                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">ID
                                        Postulante</span>{{ $referencia->ID_Postulante }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <div class="flex flex-wrap">
                                        <span class="inline-block w-1/3 md:hidden font-bold">Acciones</span>


                                        <a href="{{ route('referencias.editar', $referencia->id) }}"
                                            class = "bg-green-400 px-2 py-2 rounded-lg" title="Editar">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>


                                        <div class="flex flex-wrap">
                                            <div>
                                                <form id="formEliminar_{{ $referencia->id }}"
                                                    action="{{ route('referencias.eliminar', $referencia->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="button" class="bg-red-500 px-2 py-2 rounded-lg"
                                                        title="Eliminar"
                                                        onclick="confirmarEliminacion('{{ $referencia->id }}')">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    @endif

                </tbody>
            </table>
        </div>
    </div>
@endif
