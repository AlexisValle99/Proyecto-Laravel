<div>
   <!-- Breadcrumb Section Begin -->
   <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Carrito</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Inicio</a>
                            <span>Carrito</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                @if(Session::has('success_msg'))
                    <div class="alert alert-success">
                        <h2>Éxito</h2>
                        {{ Session::get('success_msg') }}
                    </div>
                @endif

                <div class="col-lg-12">
                    @if(Cart::count() > 0)
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Productos</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Cart::content() as $product_cart)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{ asset('img/products') }}/{{ $product_cart->model->image }}" width="60" height="60" alt="{{ $product_cart->model->name }}">
                                        <h5><a href="{{ route('product.detail',['slug' => $product_cart->model->slug]) }}">{{ $product_cart->model->name }}</a></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        ${{ $product_cart->model->normal_price }}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <a class="dec qtybtn" href="#" wire:click.prevent="update('{{ $product_cart->rowId }}', -1)" >-</span></a>
                                                <input type="text" value="{{ $product_cart->qty }}" disabled>
                                                <a class="inc qtybtn" href="#"  wire:click.prevent="update('{{ $product_cart->rowId }}', 1)" >+</span></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        ${{ $product_cart->subtotal }}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="#" class="icon_close" wire:click.prevent="delete('{{ $product_cart->rowId }}')"></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        <h3>No hay productos en el carrito.</h3>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="/" class="primary-btn cart-btn">CONTINUAR COMPRANDO</a>
                        @if(Cart::count() > 0)
                        <!-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Actualizar carrito
                        </a> -->
                        <a href="#" class="primary-btn cart-btn cart-btn-right" wire:click.prevent="destroy()">
                            Limpiar carrito
                        </a>
                        @endif
                    </div>
                </div>
            @if(Cart::count() > 0)
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Código de descuento</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APLICAR CUPÓN</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Total</h5>
                        <ul>
                            <li>Subtotal <span>${{ Cart::subtotal() }}</span></li>
                            <li>Impuestos <span>${{ Cart::tax() }}</span></li>
                            <li>Total <span>${{ Cart::total() }}</span></li>
                        </ul>
                        <a href="#" class="primary-btn" wire:click.prevent="checkout">PROCEDER AL PAGO</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
</div>