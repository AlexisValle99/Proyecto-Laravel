<x-guest-layout>
<x-jet-validation-errors />
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row px-3"> 
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Correo electrónico</h6>
                            </label> 
                            <input id="email" type="email" name="email" :value="old('email')"  class="mb-4" placeholder="Ingrese el correo electrónico" required autofocus>
                        </div>

                        <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Recuperación</button> </div>
                    </form>
                    <div class="row mb-4 px-3"> <small class="font-weight-bold">¿Tienes cuenta? <a href="{{ route('login') }}" class="text-danger ">Inicia sesión</a></small> </div>
</x-guest-layout>
