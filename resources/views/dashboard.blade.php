<x-app-layout>
    @if (!Auth::user()->Empleado)
        <div class="bg-white px-4 py-4 sm:flex sm:justify-between sm:mt-[55px]">
            <div class="flex items-center flex-row md:hidden justify-between">
                <div class="flex-1">
                    @if (Auth::user()->postulante->ruta_imagen_e)
                        <img class="flex-1 w-36 sm:w-48 rounded-full shadow-lg"
                            src="{{ Auth::user()->postulante->ruta_imagen_e }}" alt="{{ Auth::user()->name }}" />
                    @else
                        <img class="flex-1 w-36 sm:w-48 rounded-full shadow-lg"
                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    @endif
                </div>
                <div class="flex space-x-4 space-y-4">
                    @if (Auth::user()->postulante->estado === 0)
                        <a href="{{ route('puesto_disponibles.disponibles') }}"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-2 rounded-md">Puestos
                            disponibles</a>
                    @else
                        @if (Auth::user()->postulante->contrato)
                            <a href="{{ route('generarContratoPDF', Auth::user()->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-2 rounded-md">Información
                                del
                                contrato</a>
                        @else
                            @if (Auth::user()->postulante->entrevista)
                                @if (!Auth::user()->postulante->entrevista->puntos)
                                    <a href="{{ route('entrevistas.visualizar', Auth::user()->postulante->entrevista->id) }}"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-2 rounded-md">Información
                                        de
                                        la Entrevista</a>
                                @endif
                            @endif


                            @if (Auth::user()->postulante->referencias->isEmpty())
                                <a class="bg-blue-500 hover:bg-blue-600 text-white px-2 rounded-md"
                                    href="{{ route('postulantes.postularse') }}">Continuar
                                    Proceso</a>
                            @endif
                        @endif
                    @endif
                    <button class="bg-gray-500 hover:bg-gray-600 text-white px-2 rounded-md"
                        onclick="window.location.href='{{ route('postulantes.editarinfo', Auth::user()->id) }}'">Editar</button>

                </div>
            </div>

            <div class=" max-w-7xl px-4 py-8 bg-white sm:px-6 lg:px-10 hidden md:block">
                @if (Auth::user()->postulante->ruta_imagen_e)
                    <img class="flex-1 w-48 rounded-full shadow-lg" src="{{ Auth::user()->postulante->ruta_imagen_e }}"
                        alt="{{ Auth::user()->name }}" />
                @else
                    <img class="flex-1 w-48 rounded-full shadow-lg" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}" />
                @endif
            </div>
            <div>
                <div class="bg-white max-w-7xl px-4 pt-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-sans tracking-tight text-gray-900">
                        {{ Auth::user()->name }}
                    </h1>
                    @if (Auth::user()->postulante->puesto_disponible)
                        <p class="ml-10">Postulante para {{ Auth::user()->postulante->puesto_disponible->nombre }}</p>
                    @endif
                </div>
                <div class="bg-white max-w-7xl px-4 sm:px-6 lg:px-8">
                    @if (Auth::user()->postulante->referencias->isEmpty())
                        <p class="ml-10 text-red-500">Información incompleta</p>
                        <p class="ml-10 text-gray-500">Por favor, complete toda la información requerida en su solicitud
                            para continuar con el proceso de postulación.</p>
                    @else
                        @if (Auth::user()->postulante->estado === 0)
                            <p class="ml-10 text-red-500">Rechazado</p>
                            <p class="ml-10 text-gray-500">Lamentablemente, su solicitud ha sido rechazada en esta
                                ocasión.
                                Sin embargo, lo invitamos a seguir revisando nuestras oportunidades de trabajo y
                                postularse
                                a otros puestos que puedan ser de su interés.</p>
                        @else
                            @if (Auth::user()->postulante->contrato)
                                <p class="ml-10 text-green-500">Oferta extendida</p>
                                <p class="ml-10 text-gray-500">Le hemos extendido una oferta de empleo. Por favor,
                                    revise
                                    los
                                    términos y condiciones de la oferta y contáctenos si tiene alguna pregunta o desea
                                    discutir
                                    los
                                    detalles.</p>
                            @else
                                @if (!Auth::user()->postulante->entrevista && !Auth::user()->postulante->contrato)
                                    <p class="ml-10 text-green-500 fond-bold">Pendiente de revisión</p>
                                    <p class="ml-10 text-gray-500">Su solicitud ha sido enviada y está siendo revisada
                                        por
                                        el
                                        equipo
                                        de
                                        reclutamiento. Por favor, espere mientras procesamos su solicitud.</p>
                                @endif

                                @if (Auth::user()->postulante->entrevista)
                                    @if (!Auth::user()->postulante->entrevista->puntos)
                                        <p class="ml-10 text-green-500 fond-bold">Programado para entrevista</p>
                                        <p class="ml-10 text-gray-500">Ha sido programado para una entrevista. Por
                                            favor,
                                            asegúrese
                                            de
                                            prepararse adecuadamente y estar disponible en el momento programado.</p>
                                    @else
                                        <p class="ml-10 text-green-500 fond-bold">Entrevista realizada</p>
                                        <p class="ml-10 text-gray-500">Ha completado con éxito la entrevista. Ahora
                                            estamos
                                            evaluando su
                                            desempeño y pronto nos pondremos en contacto con usted con más información.
                                        </p>
                                    @endif
                                @endif


                            @endif
                        @endif
                    @endif
                </div>
            </div>


            <div class="bg-white mx-auto max-w-7xl px-2 py-20 hidden md:block sm:px-2 lg:px-2">

                <div class="flex justify-between">

                    <div class="flex-1">
                    </div>

                    <!-- Buttons -->
                    <div class="flex space-x-4 space-y-4 lg:block md:block">
                        @if (Auth::user()->postulante->estado === 0)
                            <a href="{{ route('puesto_disponibles.disponibles') }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md">Puestos
                                disponibles</a>
                        @else
                            @if (Auth::user()->postulante->contrato)
                                <a href="{{ route('generarContratoPDF', Auth::user()->id) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md">Información
                                    del
                                    contrato</a>
                            @else
                                @if (Auth::user()->postulante->entrevista)
                                    @if (!Auth::user()->postulante->entrevista->puntos)
                                        <a href="{{ route('entrevistas.visualizar', Auth::user()->postulante->entrevista->id) }}"
                                            class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md">Información
                                            de
                                            la Entrevista</a>
                                    @endif
                                @endif


                                @if (Auth::user()->postulante->referencias->isEmpty())
                                    <a class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md"
                                        href="{{ route('postulantes.postularse') }}">Continuar
                                        Proceso</a>
                                @endif
                            @endif
                        @endif
                        <button class="bg-gray-500 hover:bg-gray-600 text-white px-2 py-1 rounded-md"
                            onclick="window.location.href='{{ route('postulantes.editarinfo', Auth::user()->id) }}'">Editar</button>

                    </div>

                </div>

            </div>

        </div>

        <x-tabla-informacion :opcional="$opcional" />
    @else
        @if (Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Encargado'))

            <head>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
                    rel="stylesheet">
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <style>
                    /* Agregar estilos para la vista de dispositivos pequeños */
                    @media (max-width: 768px) {
                        .flex-wrap {
                            display: flex;
                            flex-wrap: wrap;
                        }

                        .section-small {
                            width: 50%;
                        }
                    }
                </style>
            </head>
            <div class="flex-1 p-4">

                <!-- Contenedor de las 4 secciones (disminuido para dispositivos pequeños) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2 p-2">
                    <!-- Sección 1 - Gráfica de Usuarios (disminuida para dispositivos Sección 1 - Gráfica de Usuarios -->
                    <div class="bg-white p-4 rounded-md">
                        <h2 class="text-gray-500 text-lg font-semibold pb-1">Usuarios</h2>
                        <div class="my1-"></div> <!-- Espacio de separación -->
                        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px  mb-6"></div>
                        <!-- Línea con gradiente -->
                        <div class="chart-container" style="position: relative; height:150px; width:100%">
                            <!-- El canvas para la gráfica -->
                            <canvas id="usersChart"></canvas>
                        </div>
                    </div>

                    <!-- Sección 2 - Gráfica de Comercios -->
                    <div class="bg-white p-4 rounded-md">
                        <h2 class="text-gray-500 text-lg font-semibold pb-1">Postulantes</h2>
                        <div class="my-1"></div> <!-- Espacio de separación -->
                        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                        <!-- Línea con gradiente -->
                        <div class="chart-container" style="position: relative; height:150px; width:100%">
                            <!-- El canvas para la gráfica -->
                            <canvas id="commercesChart"></canvas>
                        </div>
                    </div>
                   

                    <!-- Sección 4 - Tabla de Transacciones (disminuida para dispositivos pequeños) -->
                    <div class="bg-white p-4 rounded-md mt-4">
                        <h2 class="text-gray-500 text-lg font-semibold pb-4">Asistencia</h2>
                        <div class="my-1"></div> <!-- Espacio de separación -->
                        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                        <!-- Línea con gradiente -->
                        <table class="w-full table-auto text-sm">
                            <thead>
                                <tr class="text-sm leading-normal">
                                    <th
                                        class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                                        Nombre</th>
                                    <th
                                        class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                                        Fecha</th>
                                    <th
                                        class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light text-right">
                                        Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                            </tbody>
                        </table>
                        <!-- Botón "Ver más" para la tabla de Transacciones -->
                        <div class="text-right mt-4">
                            <a class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded">
                                Ver más
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>


            <!-- Script para las gráficas -->
            <script>
                // Gráfica de Usuarios
                var usersChart = new Chart(document.getElementById('usersChart'), {
                    type: 'doughnut',
                    data: {
                        labels: ['Nuevos', 'Registrados'],
                        datasets: [{
                            data: [30, 65],
                            backgroundColor: ['#00F0FF', '#8B8B8D'],
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: {
                            position: 'bottom' // Ubicar la leyenda debajo del círculo
                        }
                    }
                });

                // Gráfica de Comercios
                var commercesChart = new Chart(document.getElementById('commercesChart'), {
                    type: 'doughnut',
                    data: {
                        labels: ['Nuevos', 'Registrados'],
                        datasets: [{
                            data: [60, 40],
                            backgroundColor: ['#FEC500', '#8B8B8D'],
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: {
                            position: 'bottom' // Ubicar la leyenda debajo del círculo
                        }
                    }
                });
            </script>
        @else
            @php
                $empleado = Auth::user()->empleado;
            @endphp
            <style>
                /* Estilo para el modal */
                .button {
                    position: relative;
                }

                .modal {
                    display: none;
                    position: absolute;
                    z-index: 9999;
                    background-color: #fefefe;
                    border: 1px solid #888;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    max-width: 400px;
                    padding: 20px;
                }

                .modal-content {
                    /* Estilos para el contenido del modal */
                }

                .close {
                    position: absolute;
                    top: 8px;
                    right: 8px;
                    cursor: pointer;
                }
            </style>
            <div class="flex flex-col items-center justify-center min-h-screen mt-[55px]">
                <!-- dark theme -->
                <div class="container  m-4">
                    <div class="max-w-5xl w-full mx-auto grid gap-4 grid-cols-1">
                        <!-- profile card -->
                        <div class="flex flex-col sticky top-0 z-10">
                            <div class="bg-white border border-gray-800 shadow-lg  rounded-2xl p-4">
                                <div class="flex-none sm:flex">
                                    <div class=" relative h-32 w-32   sm:mb-0 mb-3">
                                        <!-- Foto --><img src="{{ $empleado->ruta_imagen_e }}" alt="aji"
                                            class=" w-32 h-32 object-cover rounded-2xl border-2 border-gray-800">
                                        {{-- Editar Foto <a href="#"
                                        class="absolute -right-2 bottom-2   -ml-3  text-white p-1 text-xs bg-green-400 hover:bg-green-500 font-medium tracking-wider rounded-full transition ease-in duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="h-4 w-4">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a> --}}
                                    </div>
                                    <div class="flex-auto sm:ml-5 justify-evenly">
                                        <div class="flex items-center justify-between sm:mt-2">
                                            <div class="flex items-center">
                                                <div class="flex flex-col">
                                                    <div
                                                        class="w-full flex-none text-lg text-gray-700 font-bold leading-none">
                                                        <!-- Nombre --> {{ $empleado->usuario->name }}
                                                    </div>
                                                    <div class="flex-auto text-gray-500 my-1">
                                                        <!-- Departamento, Cargo --> <span
                                                            class="mr-3 ">{{ $empleado->departamento->nombre }}
                                                        </span><span
                                                            class="mr-3 border-r border-gray-600  max-h-0"></span><span>{{ $empleado->cargo->nombre }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-row items-center">
                                            <div class="flex">

                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" class="h-5 w-5 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" class="h-5 w-5 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                    </path>
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" class="h-5 w-5 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                    </path>
                                                </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" class="h-5 w-5 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                    class="h-5 w-5 text-yellow-400">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex pt-2  text-sm text-gray-400">
                                            <div class="flex-1 inline-flex items-center">
                                                {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                                                </path>
                                            </svg>
                                            <p class="">1.2k Followers</p> --}}
                                            </div>
                                            <div class="flex-1 inline-flex items-center">
                                                {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <p class="">14 Components</p> --}}
                                            </div>
                                            @can('Solicitar Permiso')
                                                <a href="{{ route('permisos.solicitud') }}"
                                                    class="flex-no-shrink bg-green-400 hover:bg-blue-500 px-5 ml-4 py-2 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-green-300 hover:border-green-500 text-white rounded-full transition ease-in duration-300">
                                                    Solicitar Permiso</a>
                                            @endcan
                                            <a href="{{ route('asistencias.marcar', Auth::user()->empleado->ID_Usuario) }}"
                                                class="flex-no-shrink bg-green-400 hover:bg-green-500 px-5 ml-4 py-2 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-green-300 hover:border-green-500 text-white rounded-full transition ease-in duration-300">
                                                Asistencia</a>
                                            <a href="{{ route('asistencias.historial', Auth::user()->empleado->ID_Usuario) }}"
                                                class="flex-no-shrink bg-blue-400 hover:bg-blue-500 px-5 ml-4 py-2 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-blue-300 hover:border-blue-500 text-white rounded-full transition ease-in duration-300">
                                                Ver Historial </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col sticky top-0 z-10">
                            <div class="max-w-4xl mx-auto">


                                <div class="bg-white border border-gray-800 shadow-lg rounded-2xl p-4">
                                    <h1 class="text-center font-bold text-3xl mb-5">Llamadas de Atención</h1>
                                    @php
                                        $llamadasAtencion = Auth::user()->empleado->llamada_atencion->count();

                                    @endphp

                                    @if ($llamadasAtencion > 3)
                                        <p class="text-red-600 font-bold text-center">
                                            Tienes demasiadas llamadas de atención, un administrador se comunicará con
                                            usted en la brevedad posible para ver su continuidad en la empresa.
                                        </p>
                                    @elseif ($llamadasAtencion == 3)
                                        <p class="text-yellow-600 font-bold text-center">
                                            Tiene tres llamadas de atención, su situación es crítica, por favor tome
                                            medidas correctivas inmediatamente.
                                        </p>
                                    @elseif ($llamadasAtencion == 2)
                                        <p class="text-yellow-600 font-bold text-center">
                                            Dos llamadas de atención han sido registradas, le sugerimos evaluar su
                                            conducta.
                                        </p>
                                    @elseif ($llamadasAtencion == 1)
                                        <p class="text-green-600 font-bold text-center">
                                            Tiene una llamada de atención, por favor preste más atención a sus acciones
                                            para evitar futuras llamadas.
                                        </p>
                                    @else
                                        <p class="text-green-600 font-bold text-center">
                                            No tiene llamadas de atención, siga así y mantenga su buen desempeño.
                                        </p>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div
                            class="flex flex-col relative bg-white border border-gray-800 text-black rounded-2xl pb-6">
                            <div class="text-xl font-bold py-4 px-4 mb-5">
                                <h2>Horario</h2>
                            </div>
                            <div class="px-4 ml-4">
                                <table class="min-w-full border-collapse block md:table">
                                    <thead class="block md:table-header-group">
                                        <tr
                                            class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                                            <th
                                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                Dia</th>
                                            <th
                                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                Hora de Inicio</th>
                                            <th
                                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                Hora de Finalizacion</th>
                                            <th
                                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                                Hora de Atraso</th>
                                        </tr>
                                    </thead>
                                    <tbody class="block md:table-row-group">
                                        @foreach (Auth::user()->empleado->horario_empleado as $diaTrabajo)
                                            @php
                                                $hasHorario = $diaTrabajo;
                                            @endphp
                                            <tr
                                                class="bg-white border border-grey-500 md:border-none block md:table-row">
                                                <td
                                                    class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                    <span class="inline-block w-1/3 md:hidden font-bold">Dia</span>
                                                    {{ $diaTrabajo->dia_horario_empleado->DiaTrabajo->Nombre }}
                                                </td>
                                                @if ($hasHorario)
                                                    <td
                                                        class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                        <span class="inline-block w-1/3 md:hidden font-bold">Hora de
                                                            Inicio</span>
                                                        {{ $diaTrabajo->Horario->HoraInicio }}
                                                    </td>
                                                    <td
                                                        class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                        <span class="inline-block w-1/3 md:hidden font-bold">Hora de
                                                            Finalización</span>
                                                        {{ $diaTrabajo->Horario->HoraFin }}
                                                    </td>
                                                    <td
                                                        class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                        <span class="inline-block w-1/3 md:hidden font-bold">Hora de
                                                            Atraso</span>
                                                        {{ $diaTrabajo->Horario->HoraLimite }}
                                                    </td>
                                                @else
                                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"
                                                        colspan="3">
                                                        No se asignó horario para este día
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif

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
