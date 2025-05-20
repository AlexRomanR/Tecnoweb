<x-guest-layout>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js"
        defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>

    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css');
    </style>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center px-5 py-3">
            <div class="bg-gray-100 text-gray-500 rounded-3xl border border-black overflow-hidden"
                style="max-width:1000px">
                <div class="md:flex w-full">
                    <div class="hidden md:block w-1/2 bg-indigo-500 py- px-">
                        <img src='https://images.pexels.com/photos/3184663/pexels-photo-3184663.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'>
                    </div>
                    <div class="w-full md:w-1/2 pt-14 pb-10 px-5 md:px-10">
                        <div class="text-center mb-10">
                            <h1 class="font-bold text-3xl text-gray-900">Registrar Usuario</h1>
                        </div>
                        <div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fa-solid fa-user text-gray-400 text-lg"></i>
                                        </div>
                                        <input id="name" type="text" name="name"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-2xl border-2 border-gray-100 outline-none focus:border-indigo-500"
                                            placeholder="Ingresar nombre">
                                        @error('name')
                                            <strong class="text-red-500">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fa-solid fa-envelope text-gray-400 text-lg"></i>
                                        </div>
                                        <input id="email" type="email" name="email"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-2xl border-2 border-gray-100 outline-none focus:border-indigo-500"
                                            placeholder="ingresar correo electrónico">
                                        @error('email')
                                            <strong class="text-red-500">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fa-solid fa-house text-gray-400 text-lg"></i>
                                        </div>
                                        <input id="direccion" type="text" name="direccion"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-2xl border-2 border-gray-100 outline-none focus:border-indigo-500"
                                            placeholder="ingresar dirección">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-1/2 px-3 mb-5">
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fa-solid fa-phone text-gray-400 text-lg"></i>
                                        </div>
                                        <input id="telefono" type="integer" name="telefono"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-2xl border-2 border-gray-100 outline-none focus:border-indigo-500"
                                            placeholder="Ingresar teléfono">
                                        @error('telefono')
                                            <strong class="text-red-500">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-1/2 px-3 mb-5">
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fa-solid fa-user text-gray-400 text-lg"></i>
                                        </div>
                                        <input id="ci" type="integer" name="ci"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-2xl border-2 border-gray-100 outline-none focus:border-indigo-500"
                                            placeholder="Ingresar C.I.">
                                        @error('ci')
                                            <strong class="text-red-500">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fa-solid fa-lock text-gray-400 text-lg"></i>
                                        </div>
                                        <input id="password" type="password" name="password"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-2xl border-2 border-gray-100 outline-none focus:border-indigo-500"
                                            placeholder="ingresar Contraseña">
                                        @error('password')
                                            <strong class="text-red-500">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-12">
                                    <div class="flex">
                                        <div
                                            class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <i class="fa-solid fa-lock text-gray-400 text-lg"></i>
                                        </div>
                                        <input id="password_confirmation" type="password"
                                            name="password_confirmation"
                                            class="w-full -ml-10 pl-10 pr-3 py-2 rounded-2xl border-2 border-gray-100 outline-none focus:border-indigo-500"
                                            placeholder="Ingresar contraseña nuevamente">
                                    </div>
                                </div>
                            </div>

                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <x-label for="terms">
                                        <div class="flex items-center">
                                            <x-checkbox name="terms" id="terms" required />

                                            <div class="ml-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' =>
                                                        '<a target="_blank" href="' .
                                                        route('terms.show') .
                                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                        __('Terms of Service') .
                                                        '</a>',
                                                    'privacy_policy' =>
                                                        '<a target="_blank" href="' .
                                                        route('policy.show') .
                                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                        __('Privacy Policy') .
                                                        '</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-label>
                                </div>
                            @endif

                            <div class="flex items-center justify-end mt-4">
                                <a
                                    class="underline text-sm pr-5 py-2 text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('login') }}">
                                    {{ __('Ya tienes cuenta?') }}
                                </a>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <button
                                        class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">REGISTRAR
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
