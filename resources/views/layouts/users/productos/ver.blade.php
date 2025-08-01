@extends('layouts.layout')
@section('contenido')
    <!-- Content ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container">
                <div class="row gx-5 col-mb-80">
                    <!-- Post Content ============================================= -->
                    <main class="postcontent col-lg-8">

                        <!-- Shop imagenes ============================================= -->
                        <div id="shop" class="shop row gutter-30">
                            <div class="product col-sm-6 col-12">
                                <div class="grid-inner">
                                    <div class="product-image">
                                        <a href="#">
                                            <img src="images/bebBus/productoRopa/producto1.png" alt="Checked Short Dress"
                                                style="width: 100%; height: 500px; object-fit: cover; object-position: center;">
                                        </a>
                                        <div class="bg-overlay">
                                            <div class="bg-overlay-bg bg-transparent"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="product col-sm-6 col-12">
                                <div class="grid-inner">
                                    <div class="product-image">
                                        <a href="#">
                                            <img src="images/bebBus/productoRopa/producto2.png" alt="Checked Short Dress"
                                                style="width: 100%; height: 500px; object-fit: cover; object-position: center;">
                                        </a>
                                        <div class="bg-overlay">
                                            <div class="bg-overlay-bg bg-transparent"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="product col-sm-6 col-12">
                                <div class="grid-inner">
                                    <div class="product-image">
                                        <a href="#">
                                            <img src="images/bebBus/productoRopa/producto3.png" alt="Checked Short Dress"
                                                style="width: 100%; height: 500px; object-fit: cover; object-position: center;">
                                        </a>
                                        <div class="bg-overlay">
                                            <div class="bg-overlay-bg bg-transparent"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="product col-sm-6 col-12">
                                <div class="grid-inner">
                                    <div class="product-image">
                                        <a href="#">
                                            <img src="images/bebBus/productoRopa/producto4.png" alt="Checked Short Dress"
                                                style="width: 100%; height: 500px; object-fit: cover; object-position: center;">
                                        </a>
                                        <div class="bg-overlay">
                                            <div class="bg-overlay-bg bg-transparent"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="product col-sm-6 col-12">
                                <div class="grid-inner">
                                    <div class="product-image">
                                        <a href="#">
                                            <img src="images/bebBus/productoRopa/producto5.png" alt="Checked Short Dress"
                                                style="width: 100%; height: 500px; object-fit: cover; object-position: center;">
                                        </a>
                                        <div class="bg-overlay">
                                            <div class="bg-overlay-bg bg-transparent"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="product col-sm-6 col-12">
                                <div class="grid-inner">
                                    <div class="product-image">
                                        <a href="#">
                                            <img src="images/bebBus/productoRopa/producto6.png" alt="Checked Short Dress"
                                                style="width: 100%; height: 500px; object-fit: cover; object-position: center;">
                                        </a>
                                        <div class="bg-overlay">

                                            <div class="bg-overlay-bg bg-transparent"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div><!-- #shop end -->

                    </main><!-- .postcontent end -->

                    <!-- Sidebar ============================================= -->
                    <aside class="sidebar col-lg-4">
                        <div class="bg-light rounded p-4 shadow-sm mb-4">
                            <h2 class="mb-2 fw-bold text-uppercase text-baby-sky">{{ $producto->nombre }}</h2>
                            <p class="mb-0 fs-5 text-dark">{{ $producto->descripcion }}</p>
                        </div>

                        <div class="mb-3">
                            <span class="fs-4 fw-bold text-danger">{{ $producto->precio }}</span>
                            <del class="text-muted ms-2">$12.99</del>
                            <span class="badge bg-danger text-white ms-2">-30%</span>
                        </div>

                        <p class="small text-muted">
                            o 4 pagos sin interés
                            <strong>$2.27</strong>
                        </p>

                        <hr>

                        <h5 class="fw-medium mb-3">Seleccionar Color:<span
                                class="product-color-value ms-1 fw-semibold"></span></h5>

                        <!-- Colores -->
                        <div id="product-color-dots" class="owl-dots">
                            <button role="radio" class="owl-dot active" data-value="Blue" data-color="#2f3977"></button>
                            <button role="radio" class="owl-dot" data-value="Red" data-color="#c8271d"></button>
                            <button role="radio" class="owl-dot" data-value="Brown" data-color="#723f2e"></button>
                            <button role="radio" class="owl-dot" data-value="Black" data-color="#4a4c4b"></button>
                            <button role="radio" class="owl-dot" data-value="Light Brown" data-color="#af6035"></button>
                            <button role="radio" class="owl-dot" data-value="Deep Green" data-color="#3d6370"></button>
                        </div>

                        <hr>

                        <h4 class="mb-3">Tamaño</h4>

                        <div class="row g-3">

                            <div class="col-6">
                                <div class="form-check custom-radio">
                                    <input id="talla-recien" class="form-check-input" type="radio" name="talla"
                                        checked>
                                    <label for="talla-recien" class="form-check-label">Recién nacido</label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-check custom-radio">
                                    <input id="talla-0-3" class="form-check-input" type="radio" name="talla">
                                    <label for="talla-0-3" class="form-check-label">0-3 meses</label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-check custom-radio">
                                    <input id="talla-3-6" class="form-check-input" type="radio" name="talla">
                                    <label for="talla-3-6" class="form-check-label">3-6 meses</label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-check custom-radio">
                                    <input id="talla-6-9" class="form-check-input" type="radio" name="talla">
                                    <label for="talla-6-9" class="form-check-label">6-9 meses</label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-check custom-radio">
                                    <input id="talla-9-12" class="form-check-input" type="radio" name="talla">
                                    <label for="talla-9-12" class="form-check-label">9-12 meses</label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-check custom-radio">
                                    <input id="talla-12-18" class="form-check-input" type="radio" name="talla">
                                    <label for="talla-12-18" class="form-check-label">12-18 meses</label>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-check custom-radio">
                                    <input id="talla-18-24" class="form-check-input" type="radio" name="talla">
                                    <label for="talla-18-24" class="form-check-label">18-24 meses</label>
                                </div>
                            </div>

                        </div>

                        <button
                            class="bg-baby-gold w-100 bg-button-baby-gold text-white fw-semibold hover-baby-gold px-4 py-2 border-0">
                            AÑADIR A LA BOLSA
                        </button>

                        <hr>

                        <!--caracteristicas-->
                        <div class="row col-mb-50 mb-0 gx-5">
                            @if ($producto->caracteristicas->isNotEmpty())
                                @foreach ($producto->caracteristicas as $caracteristica)
                                    <div class="col-sm-6 col-lg-4">
                                        <div
                                            class="feature-box fbox-center fbox-effect p-4 bg-baby-light rounded shadow-sm h-100 text-center">
                                            <div class="mb-3">
                                                <img src="{{ asset($caracteristica->icono) }}" alt="icono"
                                                    class="img-fluid" style="width: 60px; height: 60px;">
                                            </div>
                                            <div class="fbox-content">
                                                <h6 class="mb-0 fw-semibold text-dark">{{ $caracteristica->descripcion }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-info text-center fw-semibold my-4">
                                    Aún no se han registrado características para este producto.
                                </div>
                            @endif
                        </div>

                        <hr>

                        <!--detalles-->
                        <div class="accordion accordion-bg accordion-border mb-0" id="accordionFlushExample">
                            @if ($producto->detalles->isNotEmpty())
                                @foreach ($producto->detalles as $detalle)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-heading{{ $detalle }}">
                                            <button
                                                class="accordion-button collapsed bg-light text-dark fw-semibold px-4 py-3 rounded"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse{{ $detalle }}" aria-expanded="false"
                                                aria-controls="flush-collapse{{ $detalle }}">
                                                {{ $detalle->titulo }}
                                            </button>
                                        </h2>
                                        <div id="flush-collapse{{ $detalle }}" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading{{ $detalle }}"
                                            data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body px-4 py-3 bg-light border-top">
                                                <p class="mb-2">{{ $detalle->descripcion }}</p>

                                                @if ($detalle->imagen)
                                                    <img src="{{ asset($detalle->imagen) }}" alt="imagen detalle"
                                                        class="img-thumbnail mt-3 rounded" style="max-height: 220px;">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-info text-center fw-semibold my-4">
                                    Aún no se han registrado detalles para este producto.
                                </div>
                            @endif
                        </div>
                    </aside>
                    <!-- .sidebar end -->
                </div>

            </div>
        </div>
    </section>
    <!-- #content end -->
@endsection
