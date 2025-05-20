<x-app-layout>
    <x-slot name="header">
        <div class = "flex flex-wrap justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('REPORTES') }}
            </h2>

        </div>
    </x-slot>

    <title>Reportes</title>

    <!-- component -->
    <div class="px-3 md:lg:xl:px-40 py-20 bg-opacity-10">
        <div class="grid grid-cols-1 md:lg:xl:grid-cols-3 group bg-white shadow-xl shadow-neutral-100 border ">


            <div class="p-10 flex flex-col items-center text-center group md:lg:xl:border-r md:lg:xl:border-b hover:bg-slate-50 cursor-pointer"
                onclick="toggleModalDiferentes('empleado', 'open')">
                <span class="p-5 rounded-full bg-green-500 text-white shadow-lg shadow-red-200"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg></span>
                <p class="text-xl font-medium text-slate-700 mt-3">Empleados</p>
                <p class="mt-2 text-sm text-slate-500">Reporte de los datos de todos los empleados de la empresa</p>
            </div>

            <!-- Modal -->
            <div id="modal_empleado" class="fixed hidden inset-0 z-50 flex items-center justify-center">
                <!-- Fondo opaco del modal -->
                <div class="fixed inset-0 bg-gray-800 opacity-75"></div>
                <!-- Contenido del modal -->
                <div class="max-w-xl rounded overflow-hidden shadow-lg bg-white p-8 z-50" style="width: 36rem">
                    <!-- Botón para cerrar el modal -->
                    <button id="closeModalempleado" class="float-right mt-4 mr-4"
                        onclick="toggleModalDiferentes('empleado', 'close')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <!-- Contenido del modal -->
                    <p class="p-4">Datos de Empleados</p>
                    <div class="border-b-2 m-0"></div>
                    <div class="mr-8 ml-4">
                        <form id="guardarEmpleadoForm" action="{{ route('reportes.empleado') }}" method="POST"
                            enctype="multipart/form-data" class="relative self-center">
                            @csrf

                            <p class="p-4">Ingrese los datos:</p>

                            <!-- Campo de columnas -->
                            <div class='flex flex-col mt-6'>
                                @foreach ($columnasu as $columnau)
                                    <div class="flex items-center">
                                        <div class="relative">
                                            <input type="checkbox" id="columnau{{ $loop->index }}"
                                                name="columnasusuarios[]" value="{{ $columnau }}"
                                                class="appearance-none h-6 w-6 bg-gray-400 rounded-full checked:bg-blue-900 checked:scale-75 transition-all duration-200 peer" />
                                        </div>
                                        <label for="columnau{{ $loop->index }}"
                                            class="ml-2 flex flex-col justify-center peer-checked:text-blue-900 select-none">{{ ucfirst($columnau) }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class='flex flex-col'>
                                @foreach ($columnase as $columnae)
                                    <div class="flex items-center">
                                        <div class="relative">
                                            <input type="checkbox" id="columnae{{ $loop->index }}"
                                                name="columnasempleados[]" value="{{ $columnae }}"
                                                class="appearance-none h-6 w-6 bg-gray-400 rounded-full checked:bg-blue-900 checked:scale-75 transition-all duration-200 peer" />
                                        </div>
                                        <label for="columnae{{ $loop->index }}"
                                            class="ml-2 flex flex-col justify-center peer-checked:text-blue-900 select-none">{{ ucfirst($columnae) }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div>
                                <p class="p-4">Selecciona Tipo de Archivo:</p>
                                <select name="extension" id="extension"
                                    class="font-bold rounded border-2 border-blue-900 text-gray-600 h-14 w-60 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                    <option value="excel">Excel</option>
                                    <option value="pdf">PDF</option>
                                    <option value="html">HTML</option>
                                    <option value="csv">CSV</option>
                                </select>
                            </div>

                            <button id="closeModalempleado" onclick="toggleModalDiferentes('empleado', 'close')"
                                class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mt-8">
                                Aceptar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="p-10 flex flex-col items-center text-center group md:lg:xl:border-r md:lg:xl:border-b hover:bg-slate-50 cursor-pointer"
                onclick="toggleModalDiferentes('departamento', 'open')">

                <span class="p-5 rounded-full bg-blue-500 text-white shadow-lg shadow-orange-200">
                    <svg class="h-10 w-10 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 4h12M6 4v16M6 4H5m13 0v16m0-16h1m-1 16H6m12 0h1M6 20H5M9 7h1v1H9V7Zm5 0h1v1h-1V7Zm-5 4h1v1H9v-1Zm5 0h1v1h-1v-1Zm-3 4h2a1 1 0 0 1 1 1v4h-4v-4a1 1 0 0 1 1-1Z" />
                    </svg>

                </span>
                <p class="text-xl font-medium text-slate-700 mt-3">Departamentos</p>
                <p class="mt-2 text-sm text-slate-500">Reportes de los datos de todos los empleados por departamentos
                </p>
            </div>

            <!-- Modal -->
            <div id="modal_departamento" class="fixed hidden inset-0 z-50 flex items-center justify-center">
                <!-- Fondo opaco del modal -->
                <div class="fixed inset-0 bg-gray-800 opacity-75"></div>
                <!-- Contenido del modal -->
                <div class="max-w-xl rounded overflow-hidden shadow-lg bg-white p-8 z-50" style="width: 36rem">
                    <!-- Botón para cerrar el modal -->
                    <button id="closeModaldepartamento" class="float-right mt-4 mr-4"
                        onclick="toggleModalDiferentes('departamento', 'close')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <!-- Contenido del modal -->
                    <p class="p-4">Datos de Empleados por Departamento</p>
                    <div class="border-b-2 m-0"></div>
                    <div class="mr-8 ml-4">
                        <form id="guardarDepartamentoForm" action="{{ route('reportes.departamento.empleado') }}"
                            method="POST" enctype="multipart/form-data" class="relative self-center">
                            @csrf

                            <p class="p-4">Ingrese los datos:</p>

                            <!-- Campo de Departamento -->
                            <div>
                                <p class="p-4">Selecciona Departamento:</p>
                                <select name="ID_Departamento" id="ID_Departamento"
                                    class="font-bold rounded border-2 border-blue-900 text-gray-600 h-14 w-60 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                    @foreach ($departamentos as $dep)
                                        <option value="{{ $dep->id }}">
                                            {{ $dep->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Campo de columnas -->
                            <div class='flex flex-col mt-6'>
                                @foreach ($columnasu as $columnau)
                                    <div class="flex items-center">
                                        <div class="relative">
                                            <input type="checkbox" id="columnau{{ $loop->index }}"
                                                name="columnasusuarios[]" value="{{ $columnau }}"
                                                class="appearance-none h-6 w-6 bg-gray-400 rounded-full checked:bg-blue-900 checked:scale-75 transition-all duration-200 peer" />
                                        </div>
                                        <label for="columnau{{ $loop->index }}"
                                            class="ml-2 flex flex-col justify-center peer-checked:text-blue-900 select-none">{{ ucfirst($columnau) }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class='flex flex-col '>
                                @foreach ($columnase as $columnae)
                                    <div class="flex items-center">
                                        <div class="relative">
                                            <input type="checkbox" id="columnae{{ $loop->index }}"
                                                name="columnasempleadosd[]" value="{{ $columnae }}"
                                                class="appearance-none h-6 w-6 bg-gray-400 rounded-full checked:bg-blue-900 checked:scale-75 transition-all duration-200 peer" />
                                        </div>
                                        <label for="columnae{{ $loop->index }}"
                                            class="ml-2 flex flex-col justify-center peer-checked:text-blue-900 select-none">{{ ucfirst($columnae) }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div>
                                <p class="p-4">Selecciona Tipo de Archivo:</p>
                                <select name="extension" id="extension"
                                    class="font-bold rounded border-2 border-blue-900 text-gray-600 h-14 w-60 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                    <option value="excel">Excel</option>
                                    <option value="pdf">PDF</option>
                                    <option value="html">HTML</option>
                                    <option value="csv">CSV</option>
                                </select>
                            </div>

                            <button id="closeModaldepartamento"
                                onclick="toggleModalDiferentes('departamento', 'close')"
                                class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mt-8">
                                Aceptar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="p-10 flex flex-col items-center text-center group md:lg:xl:border-r md:lg:xl:border-b hover:bg-slate-50 cursor-pointer"
                onclick="toggleModalDiferentes('postulante', 'open')">
                <span class="p-5 rounded-full bg-orange-500 text-white shadow-lg shadow-red-200"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg></span>
                <p class="text-xl font-medium text-slate-700 mt-3">Postulantes</p>
                <p class="mt-2 text-sm text-slate-500">Reporte de los datos de los postulantes registrados</p>
            </div>

            <!-- Modal -->
            <div id="modal_postulante" class="fixed hidden inset-0 z-50 flex items-center justify-center">
                <!-- Fondo opaco del modal -->
                <div class="fixed inset-0 bg-gray-800 opacity-75"></div>
                <!-- Contenido del modal -->
                <div class="max-w-xl rounded overflow-hidden shadow-lg bg-white p-8 z-50" style="width: 36rem">
                    <!-- Botón para cerrar el modal -->
                    <button id="closeModalpostulante" class="float-right mt-4 mr-4"
                        onclick="toggleModalDiferentes('postulante', 'close')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <!-- Contenido del modal -->
                    <p class="p-4">Datos de Postulantes</p>
                    <div class="border-b-2 m-0"></div>
                    <div class="mr-8 ml-4">
                        <form id="guardarPostulanteForm" action="{{ route('reportes.postulante') }}" method="POST"
                            enctype="multipart/form-data" class="relative self-center">
                            @csrf

                            <p class="p-4">Ingrese los datos:</p>

                            <!-- Campo de columnas -->
                            <div class='flex flex-col mt-6'>
                                @foreach ($columnasu as $columnau)
                                    <div class="flex items-center">
                                        <div class="relative">
                                            <input type="checkbox" id="columnau{{ $loop->index }}"
                                                name="columnasusuarios[]" value="{{ $columnau }}"
                                                class="appearance-none h-6 w-6 bg-gray-400 rounded-full checked:bg-blue-900 checked:scale-75 transition-all duration-200 peer" />
                                        </div>
                                        <label for="columnau{{ $loop->index }}"
                                            class="ml-2 flex flex-col justify-center peer-checked:text-blue-900 select-none">{{ ucfirst($columnau) }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class='flex flex-col'>
                                @foreach ($columnasp as $columnap)
                                    <div class="flex items-center">
                                        <div class="relative">
                                            <input type="checkbox" id="columnap{{ $loop->index }}"
                                                name="columnaspostulantes[]" value="{{ $columnap }}"
                                                class="appearance-none h-6 w-6 bg-gray-400 rounded-full checked:bg-blue-900 checked:scale-75 transition-all duration-200 peer" />
                                        </div>
                                        <label for="columnap{{ $loop->index }}"
                                            class="ml-2 flex flex-col justify-center peer-checked:text-blue-900 select-none">{{ ucfirst($columnap) }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div>
                                <p class="p-4">Selecciona Tipo de Archivo:</p>
                                <select name="extension" id="extension"
                                    class="font-bold rounded border-2 border-blue-900 text-gray-600 h-14 w-60 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                    <option value="excel">Excel</option>
                                    <option value="pdf">PDF</option>
                                    <option value="html">HTML</option>
                                    <option value="csv">CSV</option>
                                </select>
                            </div>

                            <button id="closeModalpostulante" onclick="toggleModalDiferentes('postulante', 'close')"
                                class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mt-8">
                                Aceptar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- <div
                class="p-10 flex flex-col items-center text-center group md:lg:xl:border-r md:lg:xl:border-b hover:bg-slate-50 cursor-pointer">
                <span class="p-5 rounded-full bg-orange-500 text-white shadow-lg shadow-orange-200"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.5">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg></span>
                <p class="text-xl font-medium text-slate-700 mt-3">Best
                    Test preparation</p>
                <p class="mt-2 text-sm text-slate-500">Know where you stand and what next to do to succeed .</p>
            </div>

            
            <div
                class="p-10 flex flex-col items-center text-center group   md:lg:xl:border-b hover:bg-slate-50 cursor-pointer">
                <span class="p-5 rounded-full bg-yellow-500 text-white shadow-lg shadow-yellow-200"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                    </svg></span>
                <p class="text-xl font-medium text-slate-700 mt-3">Admission process Guidance</p>
                <p class="mt-2 text-sm text-slate-500">Professional Advice for higher education abroad and select the
                    top institutions worldwide.</p>
            </div>


            <div
                class="p-10 flex flex-col items-center text-center group   md:lg:xl:border-r hover:bg-slate-50 cursor-pointer">
                <span class="p-5 rounded-full bg-lime-500 text-white shadow-lg shadow-lime-200"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg></span>
                <p class="text-xl font-medium text-slate-700 mt-3">Best
                    Track Record</p>
                <p class="mt-2 text-sm text-slate-500">Yet another year ! Yet another jewel in our crown!</p>
            </div>

            <div
                class="p-10 flex flex-col items-center text-center group    md:lg:xl:border-r hover:bg-slate-50 cursor-pointer">
                <span class="p-5 rounded-full bg-teal-500 text-white shadow-lg shadow-teal-200"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg></span>
                <p class="text-xl font-medium text-slate-700 mt-3">Free
                    Mock Exams</p>
                <p class="mt-2 text-sm text-slate-500">Get Topic-Wise Tests, Section- Wise and mock tests for your
                    preparation.</p>
            </div>

            <div class="p-10 flex flex-col items-center text-center group     hover:bg-slate-50 cursor-pointer">
                <span class="p-5 rounded-full bg-indigo-500 text-white shadow-lg shadow-indigo-200"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg></span>
                <p class="text-xl font-medium text-slate-700 mt-3">Genuine
                    Visa Advice</p>
                <p class="mt-2 text-sm text-slate-500">Visa process by helping you create the necessary documentation
                </p>
            </div> --}}




        </div>

        {{-- <div class="w-full   bg-indigo-600 shadow-xl shadow-indigo-200 py-10 px-20 flex justify-between items-center">
            <p class=" text-white"> <span class="text-4xl font-medium">Still Confused ?</span> <br> <span
                    class="text-lg">Book For Free Career Consultation Today ! </span></p>
            <button
                class="px-5 py-3  font-medium text-slate-700 shadow-xl  hover:bg-white duration-150  bg-yellow-400">BOOK
                AN APPOINTMENT </button>
        </div> --}}

    </div>

    <script>
        function submitForm(formId) {
            document.getElementById(formId).submit();
        }

        function toggleModal(modalId, action) {
            const modal = document.getElementById(modalId);
            if (action === 'open') {
                modal.classList.remove('hidden');
            } else if (action === 'close') {
                modal.classList.add('hidden');
            }
        }

        function toggleModalDiferentes(entityType, action) {
            const modalId = `modal_${entityType}`;
            toggleModal(modalId, action);
        }
    </script>

</x-app-layout>
