<div>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Proceder al pago</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('my.cart') }}">Carrito</a>
                            <span>Pago</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Información de pago</h4>
                <form wire:submit.prevent="store">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Nombres<span>*</span></p>
                                        <input type="text" wire:model="firstname">
                                        @error('firstname') <p class="txt-danger">{{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Apellidos<span>*</span></p>
                                        <input type="text" wire:model="lastname">
                                        @error('lastname') <p class="txt-danger">{{ $message }} </p> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>País<span>*</span></p>
                                <input type="text" wire:model="country">
                                @error('country') <p class="txt-danger">{{ $message }} </p> @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Dirección<span>*</span></p>
                                <input type="text" placeholder="Calle y número" class="checkout__input__add" wire:model="line">
                                @error('line') <p class="txt-danger">{{ $message }} </p> @enderror
                                <input type="text" placeholder="Número interior" wire:model="line2">
                                @error('line2') <p class="txt-danger">{{ $message }} </p> @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Ciudad<span>*</span></p>
                                <input type="text" wire:model="city">
                                @error('city') <p class="txt-danger">{{ $message }} </p> @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Estado<span>*</span></p>
                                <input type="text" wire:model="state">
                                @error('state') <p class="txt-danger">{{ $message }} </p> @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Código postal / ZIP<span>*</span></p>
                                <input type="text" wire:model="zipcode">
                                @error('zipcode') <p class="txt-danger">{{ $message }} </p> @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Teléfono<span>*</span></p>
                                        <input type="text" wire:model="phone">
                                        @error('phone') <p class="txt-danger">{{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Correo electrónico<span>*</span></p>
                                        <input type="text" wire:model="email">
                                        @error('email') <p class="txt-danger">{{ $message }} </p> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    ¿Entregar en otra dirección?
                                    <input type="checkbox" id="diff-acc" wire:model="differentShipping">
                                    @error('differentShipping') <p class="txt-danger">{{ $message }} </p> @enderror
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @if($differentShipping)
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Nombres<span>*</span></p>
                                        <input type="text" wire:model="afirstname">
                                        @error('afirstname') <p class="txt-danger">{{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Apellidos<span>*</span></p>
                                        <input type="text" wire:model="alastname">
                                        @error('alastname') <p class="txt-danger">{{ $message }} </p> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>País<span>*</span></p>
                                <input type="text" wire:model="acountry">
                                @error('acountry') <p class="txt-danger">{{ $message }} </p> @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Dirección<span>*</span></p>
                                <input type="text" placeholder="Calle y número" class="checkout__input__add" wire:model="aline">
                                @error('aline') <p class="txt-danger">{{ $message }} </p> @enderror
                                <input type="text" placeholder="Número interior" wire:model="aline2">
                                @error('aline2') <p class="txt-danger">{{ $message }} </p> @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Ciudad<span>*</span></p>
                                <input type="text" wire:model="acity">
                                @error('acity') <p class="txt-danger">{{ $message }} </p> @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Estado<span>*</span></p>
                                <input type="text" wire:model="astate">
                                @error('astate') <p class="txt-danger">{{ $message }} </p> @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Código postal / ZIP<span>*</span></p>
                                <input type="text" wire:model="azipcode">
                                @error('azipcode') <p class="txt-danger">{{ $message }} </p> @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Teléfono<span>*</span></p>
                                        <input type="text" wire:model="aphone">
                                        @error('aphone') <p class="txt-danger">{{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Correo electrónico<span>*</span></p>
                                        <input type="text" wire:model="aemail">
                                        @error('aemail') <p class="txt-danger">{{ $message }} </p> @enderror
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Tu pedido</h4>
                                <div class="checkout__order__products">Productos <span>Total</span></div>
                                <ul>
                                    @foreach(Cart::content() as $product_cart)
                                    <li>{{ $product_cart->qty }} - {{ $product_cart->model->name }} <span>${{ $product_cart->subtotal }}</span></li>
                                    @endforeach
                                </ul>
                                @if(Session::has('checkout'))
                                <div class="checkout__order__subtotal">Subtotal <span>{{ Session::get('checkout')['subtotal'] }}</span></div>
                                <div class="checkout__order__total">Total <span>{{ Session::get('checkout')['total'] }}</span></div>
                                @endif
                                <p>Método de pago</p>
                                <div class="">
                                    <label for="payment">
                                        <input name="payment-method" type="radio" id="payment" value="deliver" checked wire:model="paymentType">
                                        Pago en entrega
                                    </label>
                                </div>
                                <div class="">
                                    <label for="card">
                                        <input name="payment-method" type="radio" id="card"  value="card" wire:model="paymentType">
                                        Tarjeta de crédito/débito
                                    </label>
                                </div>
                                <div class="">
                                    <label for="paypal">
                                        <input name="payment-method" type="radio" id="paypal"  value="paypal" wire:model="paymentType">
                                        Paypal
                                    </label>
                                </div>
                                @error('paymentType') <p class="txt-danger">{{ $message }} </p> @enderror
                                <button type="submit" class="site-btn">PAGAR AHORA</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
</div>