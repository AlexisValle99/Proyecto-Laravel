<div>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Escritorio - Pedidos</h2>
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
                    <a href="{{ route('admin.dashboard') }}" class="primary-btn" >< Volver</a>

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
                        <th scope="col" colspan="2">Acción</th>
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
                            <a href="{{ route('admin.showorder',['orderId' => $order->id]) }}" class="btn btn-info" href="#">Ver</a>
                            </td>
                            <td>
                            <div class="dropdown">
                                <button class="btn btn-success btn-sm dropdown-toggle" type="button"data-toggle="dropdown" aria-haspopup="true" id="dropdownMenuButton" aria-expanded="false">Estado</button>
                                <span class="caret"></span></button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#" wire:click.prevent="update({{$order->id}},'delivered')">Entregado</a>
                                    <a class="dropdown-item" href="#" wire:click.prevent="update({{$order->id}},'canceled')">Cancelar</a>
                                </div> 
                            </div>
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