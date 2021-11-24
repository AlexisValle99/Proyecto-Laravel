<div>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Categorías - Editar categoría</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('admin.categories') }}">Categorías</a>
                            <span>Editar categoría</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <section class="contact-form  dashboard spad">
        <div class="container">
                @if(Session::has('success_msg'))
                    <div class="alert alert-success">
                        <h2>Éxito</h2>
                        {{ Session::get('success_msg') }}
                    </div>
                @endif
            <div class="row">
                <div class="col-lg-6 col-md-6">
                <a href="{{ route('admin.categories') }}" class="primary-btn" >< Categorías</a><br /><br />
                </div>
            </div>
            <form wire:submit.prevent="update">
                <div class="row" style="margin-bottom:20px;">
                    <div class="col-lg-6 col-md-6">
                        <p>Nombre de categoría<span>*</span></p>
                        <input type="text" placeholder="Nombre" required wire:model="name" wire:keyup="getSlug">
                        @error('name') <p class="txt-danger">{{ $message }} </p> @enderror
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <p>Slug de categoría<span>*</span></p>
                        <input type="text" placeholder="Slug" wire:model="slug">
                        @error('slug') <p class="txt-danger">{{ $message }} </p> @enderror
                    </div>

                    <div class="col-lg-12 text-center">
                        <button type="submit" class="site-btn">ACTUALIZAR CATEGORÍA</button>
                    </div>
                </div>
            </form>
        </dvi>
    </section>
</div>
