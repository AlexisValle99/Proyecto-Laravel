<div>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Productos - Editar producto</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('admin.products') }}">Productos</a>
                            <span>Editar producto</span>
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
                <a href="{{ route('admin.products') }}" class="primary-btn" >< Productos</a><br /><br />
                </div>
            </div>
            <form wire:submit.prevent="update">
                <div class="row" style="margin-bottom:20px;">
                    <div class="col-lg-6 col-md-6">
                        <p>Nombre del producto<span>*</span></p>
                        <input type="text" placeholder="Nombre"  wire:model="name" wire:keyup="getSlug">
                        @error('name') <p class="txt-danger">{{ $message }} </p> @enderror
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <p>Slug del producto<span>*</span></p>
                        <input type="text" placeholder="Slug"   wire:model="slug">
                        @error('slug') <p class="txt-danger">{{ $message }} </p> @enderror
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <p>Descripción corta<span></span></p>
                        <textarea  placeholder="Descripción corta" wire:model="desc"></textarea>
                        @error('desc') <p class="txt-danger">{{ $message }} </p> @enderror
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <p>Descripción<span></span></p>
                        <textarea  placeholder="Descripción" wire:model="longDesc"></textarea>
                        @error('longDesc') <p class="txt-danger">{{ $message }} </p> @enderror
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <p>Disponibilidad<span></span></p>
                        <select class="form-control"  wire:model="stock">
                            <option value="in">Disponible</option>
                            <option value="out">No Disponible</option>
                        </select>
                        @error('stock') <p class="txt-danger">{{ $message }} </p> @enderror
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <p>SKU<span></span></p>
                        <input type="text" placeholder="Código" wire:model="sku">
                        @error('sku') <p class="txt-danger">{{ $message }} </p> @enderror
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <p>Precio<span></span></p>
                        <input type="text" placeholder="Precio" wire:model="price">
                        @error('price') <p class="txt-danger">{{ $message }} </p> @enderror
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <p>Precio promoción<span></span></p>
                        <input type="text" placeholder="Precio oferta"  wire:model="salePrice" value="0">
                        @error('salePrice') <p class="txt-danger">{{ $message }} </p> @enderror
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <p>Destacado<span></span></p>
                        <select class="form-control"  wire:model="featured">
                            <option value="0">No</option>
                            <option value="1">Sí</option>
                        </select>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <p>Cantidad<span></span></p>
                        <input type="text" placeholder="Cantidad"  wire:model="quantity">
                        @error('quantity') <p class="txt-danger">{{ $message }} </p> @enderror
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <p>Peso (KG)<span></span></p>
                        <input type="text" placeholder="Peso" wire:model="weight" value="0">
                        @error('weight') <p class="txt-danger">{{ $message }} </p> @enderror
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <p>Imagen principal<span></span></p>
                        <input class="input-file" type="file" wire:model="newImage">
                        @if($newImage)
                            <img src="{{ $newImage->temporaryUrl() }}" width="60" height="60" />
                        @else
                            <img src="{{ asset('img/products')}}/{{ $image }}" width="60" height="60" />
                        @endif
                        @error('newImage') <p class="txt-danger">{{ $message }} </p> @enderror
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <p>Imágenes<span></span></p>
                        <input class="input-file" type="file" wire:model="newImages" multiple>
                        @if($newImages)
                            @foreach($newImages as $newimage)
                                @if($newimage)
                                <img src="{{ $newimage->temporaryUrl() }}" width="60" height="60" />
                                @endif
                            @endforeach
                        @else
                            @foreach($images as $image)
                            @if($image)
                            <img src="{{ asset('img/products')}}/{{ $image }}" width="60" height="60" />
                            @endif
                            @endforeach
                        @endif
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <p>Categoría<span></span></p>
                        <select class="form-control"  wire:model="categoryId">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('categoryId') <p class="txt-danger">{{ $message }} </p> @enderror
                    </div>

                    <div class="col-lg-12 text-center">
                        <button type="submit" class="site-btn">EDITAR PRODUCTO</button>
                    </div>
                </div>
            </form>
        </dvi>
    </section>
</div>
