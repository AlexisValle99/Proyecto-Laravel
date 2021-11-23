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
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row px-3"> 
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Correo electrónico</h6>
                            </label> 
                            <input id="email" type="email" name="email" :value="old('email')"  class="mb-4" placeholder="Ingrese un correo electrónico" required autofocus> </div>
                        <div class="row px-3"> 
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Contraseña</h6>
                            </label> 
                            <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Ingrese una contraseña"> </div>
                        <div class="row px-3 mb-4">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                 <input id="chk1" type="checkbox" name="chk" id="remember_me" name="remember" class="custom-control-input"> 
                                 <label for="chk1" class="custom-control-label text-sm">Recuérdame</label> 
                            </div> 
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="ml-auto mb-0 text-sm">¿Contraseña olvidada?</a>
                            @endif
                        </div>
                        <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Iniciar sesión</button> </div>
                    </form>
                    <div class="row mb-4 px-3"> <small class="font-weight-bold">¿No tienes una cuenta? <a href="{{ route('register') }}" class="text-danger ">Regístrate</a></small> </div>
</x-guest-layout>