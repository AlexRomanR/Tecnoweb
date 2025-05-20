    <div>
        <div class=" max-w-7xl py-0 ">
            <div class="md:flex no-wrap md:-mx-2  ">
                <!-- Left Side -->

                <div class=" w-full md:w-3/12 ">

                    <div class=" p-3 ">

                        <ul
                            class="text-sm font-semibold text-gray-500 hover:text-gray-700 py-2 px-3 mt-3 divide-y rounded bg-white ">
                            <li class="items-center py-3">
                                <span>CI: {{ Auth::user()->ci }}</span><br />
                                <span class="ml-auto">Telefono: {{ Auth::user()->telefono }}</span>

                            </li>
                            <li class="items-center py-3">
                                <h1>Fecha de Creación</h1>
                                <span>{{ Auth::user()->created_at->isoFormat('LL') }}</span><br />
                                <span class="ml-auto">{{ Auth::user()->created_at->diffForHumans() }}</span>
                            </li>

                            <li class=" items-center py-3">
                                <span>Dirección:</span><br />
                                <span class="ml-auto">{{ Auth::user()->direccion }}</span><br />
                                <span class="ml-auto">Correo:</span><br />
                                <span class="ml-auto">{{ Auth::user()->email }}</span>


                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Right Side -->
                <div class="w-full mx-2   md:block lg:block md:mt-6 sm:mt-0">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="md:block lg:block flex ">
                        <ul class="flex w-full bg-white ">
                            <li class="mr-1" id="informacion1">
                                <a id="informacionButton"
                                    class="rounded-sm bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-xs lg:text-base
                                                {{ !$opcional || $opcional == null ? 'text-blue-700 font-semibold shadow-md' : 'text-blue-500 hover:text-blue-800 font-semibold' }}"
                                    href="#" onclick="cargarContenido('informacion')">Información</a>
                            </li>
                            <li class=" mr-1">
                                <a id="educacionesButton"
                                    class="rounded-sm bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-xs lg:text-base
                                                {{ $opcional == 'educaciones' ? 'text-blue-700 font-semibold shadow-md' : 'text-blue-500 hover:text-blue-800 font-semibold' }}"
                                    href="#" onclick="cargarContenido('educaciones')">Educaciones</a>
                            </li>
                            <li class=" mr-1">
                                <a id="reconocimientosButton"
                                    class="rounded-sm bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-xs lg:text-base
                                                {{ $opcional == 'reconocimientos' ? 'text-blue-700 font-semibold shadow-md' : 'text-blue-500 hover:text-blue-800 font-semibold' }}"
                                    href="#" onclick="cargarContenido('reconocimientos')">Reconocimientos</a>
                            </li>
                            <li class=" mr-1">
                                <a id="experienciasButton"
                                    class="rounded-sm bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-xs lg:text-base
                                                {{ $opcional == 'experiencias' ? 'text-blue-700 font-semibold shadow-md' : 'text-blue-500 hover:text-blue-800 font-semibold' }}"
                                    href="#" onclick="cargarContenido('experiencias')">Experiencias</a>
                            </li>
                            <li class=" mr-1">
                                <a id="referenciasButton"
                                    class="rounded-sm bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-xs lg:text-base
                                                {{ $opcional == 'referencias' ? 'text-blue-700 font-semibold shadow-md' : 'text-blue-500 hover:text-blue-800 font-semibold' }}"
                                    href="#" onclick="cargarContenido('referencias')">Referencias</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Contenido -->
                    <div id="contenido">
                        <x-tabla-informacion2 :opcional="$opcional" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function cargarContenido(info) {
            let contenido = document.getElementById('contenido');
            let tablaHTML = '';
            informacionButton.setAttribute("class", "rounded-sm bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold");
            educacionesButton.setAttribute("class", "rounded-sm bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold");
            reconocimientosButton.setAttribute("class", "rounded-sm bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold");
            experienciasButton.setAttribute("class", "rounded-sm bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold");
            referenciasButton.setAttribute("class", "rounded-sm bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold");

            if (info === 'informacion') {
                tablaHTML = `<x-tabla-informacion2 :opcional="null" />`;
                informacionButton.setAttribute("class", "rounded-sm bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold shadow-md");
            }

            if (info === 'educaciones') {
                tablaHTML = `<x-tabla-informacion2 :opcional="'educaciones'" />`;
                educacionesButton.setAttribute("class", "rounded-sm bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold shadow-md");
            }

            if (info === 'reconocimientos') {
                tablaHTML = `<x-tabla-informacion2 :opcional="'reconocimientos'" />`;
                reconocimientosButton.setAttribute("class", "rounded-sm bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold shadow-md");
            }

            if (info === 'experiencias') {
                tablaHTML = `<x-tabla-informacion2 :opcional="'experiencias'" />`;
                experienciasButton.setAttribute("class", "rounded-sm bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold shadow-md");
            }

            if (info === 'referencias') {
                tablaHTML = `<x-tabla-informacion2 :opcional="'referencias'" />`;
                referenciasButton.setAttribute("class", "rounded-sm bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold shadow-md");
            }

            contenido.innerHTML = tablaHTML;
        }
    </script>
