<div>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Escritorio - Productos</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Inicio</a>
                            <span>Productos</span>
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
                    <a href="{{ route('admin.addproduct') }}" style="float:right;" class="primary-btn" >Nuevo producto</a>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <thead>

                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Precio de oferta</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Creación</th>
                        <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td><img src="{{ asset('img/products')}}/{{ $product->image }}" width="55" height="55" /></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->stock_status }}</td>
                            <td>{{ $product->normal_price }}</td>
                            <td>{{ $product->sale_price }}</td>
                            <td>{{ $product->category->name}}</td>
                            <td>{{ $product->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.editproduct',['productId' => $product->id]) }}" class="btn btn-info" href="#">Editar</a>
                                <a href="#" class="btn btn-danger" href="#" wire:click.pevent="delete({{ $product->id }})">Borrar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    {{ $products->links('pagination.default') }}
            </div>
        </dvi>
    </section>
</div>