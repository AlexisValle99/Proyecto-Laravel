<x-guest-layout>
                    <!-- <div class="row mb-4 px-3">
                        <h6 class="mb-0 mr-4 mt-2">Inicia sesión con</h6>
                        <div class="facebook text-center mr-3">
                            <div class="fa fa-facebook"></div>
                        </div>
                        <div class="twitter text-center mr-3">
                            <div class="fa fa-twitter"></div>
                        </div>
                        <div class="linkedin text-center mr-3">
                            <div class="fa fa-linkedin"></div>
                        </div>
                    </div>
                    <div class="row px-3 mb-4">
                        <div class="line"></div> <small class="or text-center">ó</small>
                        <div class="line"></div>
                    </div> -->
                    <x-jet-validation-errors />
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row px-3"> 
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Nombre</h6>
                            </label> 
                            <input id="name" class="mb-4" type="text" name="name" :value="old('name')" placeholder="Nombre completo" required autofocus autocomplete="name" >
                        </div>
                        <div class="row px-3"> 
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Correo electrónico</h6>
                            </label> 
                            <input id="email" type="email" name="email" :value="old('email')"  class="mb-4" placeholder="Ingrese un correo electrónico" required autofocus>
                        </div>
                        <div class="row px-3"> 
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Contraseña</h6>
                            </label> 
                            <input id="password" class="mb-4" type="password" name="password" required autocomplete="current-password" placeholder="Ingrese una contraseña"> 
                        </div>
                        <div class="row px-3"> 
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Repetir contraseña</h6>
                            </label> 
                            <input id="password_confirmation" class="mb-4" type="password" name="password_confirmation" placeholder="Ingresa nuevamente la contraseña" required autocomplete="new-password" > 
                        </div>

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-jet-label for="terms">
                                    <div class="flex items-center">
                                        <x-jet-checkbox name="terms" id="terms"/>

                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-jet-label>
                            </div>
                        @endif

                        <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Registrarse</button> </div>
                    </form>
                    <div class="row mb-4 px-3"> <small class="font-weight-bold">¿Tienes cuenta? <a href="{{ route('login') }}" class="text-danger ">Inicia sesión</a></small> </div>
</x-guest-layout>
