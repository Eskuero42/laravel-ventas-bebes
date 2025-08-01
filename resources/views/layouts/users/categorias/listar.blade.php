@extends('layouts.layout')
@section('contenido')
    <!-- Content
              ============================================= -->
    <div class="container bg-white py-4">
        <div class="fancy-title title-border title-start mb-0">
            <h3 class="text-dark mb-1">{{ $categoria->nombre }}</h3>
        </div>
    </div>
    </div>
    <section id="content" class="bg-baby-light">
        <div class="text-end pe-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 justify-content-end">
                    <li class="breadcrumb-item">
                        <a href="{{route('principal')}}">
                            Inicio
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $categoria->nombre }}
                    </li>
                    
                </ol>
            </nav>
        </div>
        @if (isset($categoria->categorias_hijos[0]))
            <div class="content-wrap pb-0">
                <div class="container">
                    <div id="oc-images" class="owl-carousel image-carousel carousel-widget mb-6" data-items-xs="2"
                        data-items-sm="3" data-items-lg="4" data-items-xl="5">
                        @foreach ($categoria->categorias_hijos as $subcategorias)
                            <div class="oc-item text-center">
                                <a href="{{ route('user.categorias.listar', $subcategorias->id) }}"
                                    title="Ver {{ $subcategorias->nombre }}">
                                    <img src="{{ asset('frontend/images/bebBus/ropaBebe/bebe1.png') }}" alt="{{ $subcategorias->nombre }}">
                                </a>
                                <div class="mt-2">
                                    <a href="{{ route('user.categorias.listar', $subcategorias->id) }}"
                                        class="text-dark fw-semibold text-decoration-none">
                                        {{ $subcategorias->nombre }}</a>
                                </div>
                                
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </section>
    <!-- #content end -->
    <!-- Page Title
              ============================================= -->
    <div class="container bg-white py-4">
        <div class="fancy-title title-border title-start mb-0">
            <h3 class="text-dark mb-1">Filtrar Producto</h3>
        </div>
    </div>

    <!-- Content
              ============================================= -->
    <section id="content" class="bg-baby-light">
        <div class="content-wrap">
            <div class="container">

                <div class="row gx-5 col-mb-80">
                    <!-- Post Content
                  ============================================= -->
                    <main class="postcontent col-lg-9 order-lg-last">

                        <!-- Shop
                   ============================================= -->
                        <div id="shop" class="shop row grid-container gutter-20" data-layout="fitRows">

                             @foreach ($productos as $producto)
                                <div class="product col-md-4 col-sm-6 sf-dress">
                                    <div class="grid-inner">
                                        <div class="product-image">
                                            <a href="#">
                                                <div
                                                    style="height: 400px; display: flex; align-items: center; justify-content: center; background-color: #fff;">
                                                    <img src="images/bebBus/productoRopa/vestido1a.png"
                                                        alt="{{$producto->nombre}}"
                                                        style="max-height: 100%; max-width: 100%; object-fit: contain;">
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div
                                                    style="height: 400px; display: flex; align-items: center; justify-content: center; background-color: #fff;">
                                                    <img src="images/bebBus/productoRopa/vestido1b.png"
                                                        alt="{{$producto->nombre}}"
                                                        style="max-height: 100%; max-width: 100%; object-fit: contain;">
                                                </div>
                                            </a>

                                            <div class="sale-flash badge bg-danger p-2">Agotado</div>

                                            <div class="bg-overlay">
                                                <div class="bg-overlay-content align-items-end justify-content-between"
                                                    data-hover-animate="fadeIn" data-hover-speed="400">
                                                    <a href="#" class="btn btn-dark me-2 hover-baby-gold"
                                                        title="Agregar al carrito">
                                                        <i class="bi-bag-plus"></i>
                                                    </a>

                                                    <a href="{{route('user.productos.ver',$producto->id)}}" class="btn btn-dark me-2 hover-baby-gold"
                                                        title="Vista rápida">
                                                        <i class="bi-eye"></i>
                                                    </a>
                                                </div>
                                                <div class="bg-overlay-bg bg-transparent"></div>
                                            </div>
                                        </div>

                                        <div class="product-desc text-center">
                                            <div class="product-title">
                                                <h3><a href="#">{{$producto->nombre}}</a></h3>
                                            </div>
                                            <div class="product-price">{{$producto->precio}}(bs)</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!--50%
                            <div class="sale-flash badge bg-warning p-2 text-white">-50%</div>
                            -->

                            <!--oferta
                            <div class="sale-flash badge bg-success p-2 text-uppercase">¡Oferta!</div>
                            -->

                        </div>
                        <!-- #shop end -->

                    </main><!-- .postcontent end -->

                    <!-- Sidebar
                  ============================================= -->
                    <aside class="sidebar col-lg-3">
                        <div class="sidebar-widgets-wrap">

                            <div class="widget widget-filter-links">

                                <h4>Seleccionar Categoría</h4>
                                <ul class="custom-filter ps-2" data-container="#shop" data-active-class="active-filter">
                                    <li class="widget-filter-reset active-filter">
                                        <a href="#" data-filter="*" title="Limpiar filtro">Limpiar
                                        </a>
                                    </li>
                                    <li><a href="#" data-filter=".sf-dress" class="hover-text-baby-gold"
                                            title="Vestidos">Vestidos</a></li>
                                    <li><a href="#" data-filter=".sf-tshirts" class="hover-text-baby-gold"
                                            title="Bodies">Bodies</a></li>
                                    <li><a href="#" data-filter=".sf-pants" class="hover-text-baby-gold"
                                            title="Pantalones">Pantalones</a></li>
                                    <li><a href="#" data-filter=".sf-sunglasses" class="hover-text-baby-gold"
                                            title="Conjuntos">Shorts</a></li>
                                    <li><a href="#" data-filter=".sf-shoes" class="hover-text-baby-gold"
                                            title="Zapatos">Enterizos</a></li>
                                    <li><a href="#" data-filter=".sf-watches" class="hover-text-baby-gold"
                                            title="Accesorios">Sudaderas</a></li>
                                </ul>

                            </div>


                            <div class="widget widget-filter-links">

                                <h4>Ordenar Por</h4>
                                <ul class="shop-sorting ps-2">
                                    <li class="widget-filter-reset active-filter ">
                                        <a href="#" data-sort-by="original-order" title="Limpiar orden">
                                            Limpiar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-sort-by="name" title="Ordenar por nombre"
                                            class="hover-text-baby-gold">
                                            Nombre
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-sort-by="price_lh" title="Ordenar precio de menor a mayor"
                                            class="hover-text-baby-gold">
                                            Precio: menor a mayor
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-sort-by="price_hl" title="Ordenar precio de mayor a menor"
                                            class="hover-text-baby-gold">
                                            Precio: mayor a menor
                                        </a>
                                    </li>
                                </ul>

                            </div>

                            <hr>

                            <div id="product-color-dots" class="owl-dots" aria-label="Seleccionar color del producto">
                                <button role="radio" class="owl-dot active" data-value="Azul" data-color="#2f3977"
                                    title="Color azul"></button>
                                <button role="radio" class="owl-dot" data-value="Rojo" data-color="#c8271d"
                                    title="Color rojo"></button>
                                <button role="radio" class="owl-dot" data-value="Marrón" data-color="#723f2e"
                                    title="Color marrón"></button>
                                <button role="radio" class="owl-dot" data-value="Negro" data-color="#4a4c4b"
                                    title="Color negro"></button>
                                <button role="radio" class="owl-dot" data-value="Marrón Claro" data-color="#af6035"
                                    title="Color marrón claro"></button>
                                <button role="radio" class="owl-dot" data-value="Verde Oscuro" data-color="#3d6370"
                                    title="Color verde oscuro"></button>
                            </div>

                            <hr>

                            <div class="col-lg-6">

                                <h4>Casillas de Verificación</h4>

                                <div>
                                    <input id="checkbox-4" class="checkbox-style" name="checkbox-4" type="checkbox"
                                        checked>
                                    <label for="checkbox-4" class="checkbox-style-1-label" title="Primera opción">Primera
                                        opción</label>
                                </div>
                                <div>
                                    <input id="checkbox-5" class="checkbox-style" name="checkbox-5" type="checkbox">
                                    <label for="checkbox-5" class="checkbox-style-1-label" title="Segunda opción">Segunda
                                        opción</label>
                                </div>
                                <div>
                                    <input id="checkbox-6" class="checkbox-style" name="checkbox-6" type="checkbox">
                                    <label for="checkbox-6" class="checkbox-style-1-label" title="Tercera opción">Tercera
                                        opción</label>
                                </div>

                            </div>

                            <hr>

                        </div>
                    </aside>

                    <!-- .sidebar end -->
                </div>

            </div>
        </div>
    </section><!-- #content end -->
@endsection
