<div>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Cuenta - Pedidos</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Inicio</a>
                            <span>Cuenta</span>
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
                    <a href="{{ route('user.dashboard') }}" class="primary-btn" >< Volver</a>

            </div>
            <div class="row">
                <table class="table table-striped">
                    <thead>

                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Impuestos</th>
                        <th scope="col">Total</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Status</th>
                        <th scope="col">Creación</th>
                        <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->id }}</th>
                            <td>${{ $order->subtotal }}</td>
                            <td>${{ $order->taxes }}</td>
                            <td>${{ $order->total }}</td>
                            <td>{{ $order->firstname }}</td>
                            <td>{{ $order->lastname}}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                            <a href="{{ route('user.showorder',['orderId' => $order->id]) }}" class="btn btn-info" href="#">Ver</a>
                            @if($order->status != "canceled" || $order->status != "delivered")
                            <a class="btn btn-danger" href="#" wire:click.prevent="update({{$order->id}})">Cancelar</a>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    {{ $orders->links('pagination.default') }}
            </div>
        </dvi>
    </section>
</div>