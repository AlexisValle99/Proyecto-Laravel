<div>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Pedidos - Ver Pedido</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Inicio</a>
                            <span>Escritorio</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <section class="dashboard spad">
        <div class="container">
                @if(Session::has('success_msg'))
                    <div class="alert alert-success">
                        <h2>Éxito</h2>
                        {{ Session::get('success_msg') }}
                    </div>
                @endif
            <div class="row">
                    <a href="{{ route('admin.orders') }}" class="primary-btn" >< Volver</a>

            </div>

            <h2>Productos</h2><br/>
            <div class="row">
                <div class="col-lg-12">
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
                                @foreach($order->orderProducts as $product_cart)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{ asset('img/products') }}/{{ $product_cart->product->image }}" width="60" height="60" alt="{{ $product_cart->product->name }}">
                                        <h5><a href="{{ route('product.detail',['slug' => $product_cart->product->slug]) }}">{{ $product_cart->product->name }}</a></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        ${{ $product_cart->price }}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        {{ $product_cart->quantity }}
                                    </td>
                                    <td class="shoping__cart__total">
                                        ${{ $product_cart->price * $product_cart->quantity}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <strong>Subtotal: </strong>${{$order->subtotal}}<br/>
                        <strong>Impuestos: </strong>${{$order->taxes}}<br/>
                        <strong>Total: </strong>${{$order->total}}<br/>
                    </div>
                </div>
            </div>
            <h2>Detalles de pago</h2><br/>
            <strong>Nombre: </strong>{{$order->firstname}}<br/>
            <strong>Apellidos: </strong>{{$order->lastname}}<br/>
            <strong>Teléfono: </strong>{{$order->phone}}<br/>
            <strong>Correo electrónico: </strong>{{$order->email}}<br/>
            <strong>Dirección: </strong>{{$order->line}}<br/>
            <strong>Dirección 2: </strong>{{$order->line2}}<br/>
            <strong>Ciudad: </strong>{{$order->city}}<br/>
            <strong>Estado: </strong>{{$order->state}}<br/>
            <strong>País: </strong>{{$order->country}}<br/>

            @if($order->different_shipping)
            <h2>Detalle de envío</h2><br/>
            <strong>Nombre: </strong>{{$order->shipping->firstname}}<br/>
            <strong>Apellidos: </strong>{{$order->shipping->lastname}}<br/>
            <strong>Teléfono: </strong>{{$order->shipping->phone}}<br/>
            <strong>Correo electrónico: </strong>{{$order->shipping->email}}<br/>
            <strong>Dirección: </strong>{{$order->shipping->line}}<br/>
            <strong>Dirección 2: </strong>{{$order->shipping->line2}}<br/>
            <strong>Ciudad: </strong>{{$order->shipping->city}}<br/>
            <strong>Estado: </strong>{{$order->shipping->state}}<br/>
            <strong>País: </strong>{{$order->shipping->country}}<br/>
            @endif

            <h2>Pago</h2><br/>
            <strong>Pago por: </strong>{{$order->transaction->type}}<br/>
            <strong>Estado: </strong>{{$order->transaction->status}}<br/>
            <strong>Fecha: </strong>{{$order->transaction->created_at}}<br/>
 

        </dvi>
    </section>
</div>