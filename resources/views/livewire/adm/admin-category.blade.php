<div>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Escritorio - Categorías</h2>
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
                    <a href="{{ route('admin.addcategory') }}" style="float:right;" class="primary-btn" >Nueva categoría</a>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <a href="{{ route('admin.editcategory',['categoryId' => $category->id]) }}" class="btn btn-info" href="#">Editar</a>
                                <a href="#" class="btn btn-danger" href="#" wire:click.pevent="delete({{ $category->id }})">Borrar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    {{ $categories->links('pagination.default') }}
            </div>
        </dvi>
    </section>
</div>
