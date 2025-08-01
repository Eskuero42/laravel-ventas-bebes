@extends('layouts.admin-layout')
@section('contenido')
<pre>
    @php
    print_r($categorias);    
    @endphp
    
</pre>
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h5 class="fs-16">Filters</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="#" class="text-decoration-underline" id="clearall">Clear All</a>
                        </div>
                    </div>

                    <div class="filter-choices-input">
                        <input class="form-control" data-choices data-choices-removeItem type="text"
                            id="filter-choices-input" value="T-Shirts" />
                    </div>
                </div>

                <div class="accordion accordion-flush filter-accordion">

                    <div class="card-body border-bottom">
                        <div>
                            <p class="text-muted text-uppercase fs-12 fw-medium mb-2">Products</p>
                            <ul class="list-unstyled mb-0 filter-list">
                                <li>
                                    <a href="#" class="d-flex py-1 align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-0 listname">Grocery</h5>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex py-1 align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-0 listname">Fashion</h5>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <span class="badge bg-light text-muted">5</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex py-1 align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-0 listname">Watches</h5>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex py-1 align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-0 listname">Electronics</h5>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <span class="badge bg-light text-muted">5</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex py-1 align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-0 listname">Furniture</h5>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <span class="badge bg-light text-muted">6</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex py-1 align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-0 listname">Automotive Accessories</h5>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex py-1 align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-0 listname">Appliances</h5>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <span class="badge bg-light text-muted">7</span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="d-flex py-1 align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-0 listname">Kids</h5>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body border-bottom">
                        <p class="text-muted text-uppercase fs-12 fw-medium mb-4">Price</p>

                        <div id="product-price-range"></div>
                        <div class="formCost d-flex gap-2 align-items-center mt-3">
                            <input class="form-control form-control-sm" type="text" id="minCost" value="0" />
                            <span class="fw-semibold text-muted">to</span> <input class="form-control form-control-sm"
                                type="text" id="maxCost" value="1000" />
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingBrands">
                            <button class="accordion-button bg-transparent shadow-none" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseBrands" aria-expanded="true"
                                aria-controls="flush-collapseBrands">
                                <span class="text-muted text-uppercase fs-12 fw-medium">Brands</span> <span
                                    class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                            </button>
                        </h2>

                        <div id="flush-collapseBrands" class="accordion-collapse collapse show"
                            aria-labelledby="flush-headingBrands">
                            <div class="accordion-body text-body pt-0">
                                <div class="search-box search-box-sm">
                                    <input type="text" class="form-control bg-light border-0" id="searchBrandsList"
                                        placeholder="Search Brands...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                                <div class="d-flex flex-column gap-2 mt-3 filter-check">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Boat"
                                            id="productBrandRadio5" checked>
                                        <label class="form-check-label" for="productBrandRadio5">Boat</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="OnePlus"
                                            id="productBrandRadio4">
                                        <label class="form-check-label" for="productBrandRadio4">OnePlus</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Realme"
                                            id="productBrandRadio3">
                                        <label class="form-check-label" for="productBrandRadio3">Realme</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Sony"
                                            id="productBrandRadio2">
                                        <label class="form-check-label" for="productBrandRadio2">Sony</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="JBL"
                                            id="productBrandRadio1" checked>
                                        <label class="form-check-label" for="productBrandRadio1">JBL</label>
                                    </div>

                                    <div>
                                        <button type="button"
                                            class="btn btn-link text-decoration-none text-uppercase fw-medium p-0">1,235
                                            More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end accordion-item -->

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingDiscount">
                            <button class="accordion-button bg-transparent shadow-none collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseDiscount" aria-expanded="true"
                                aria-controls="flush-collapseDiscount">
                                <span class="text-muted text-uppercase fs-12 fw-medium">Discount</span> <span
                                    class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                            </button>
                        </h2>
                        <div id="flush-collapseDiscount" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingDiscount">
                            <div class="accordion-body text-body pt-1">
                                <div class="d-flex flex-column gap-2 filter-check">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="50% or more"
                                            id="productdiscountRadio6">
                                        <label class="form-check-label" for="productdiscountRadio6">50% or more</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="40% or more"
                                            id="productdiscountRadio5">
                                        <label class="form-check-label" for="productdiscountRadio5">40% or more</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="30% or more"
                                            id="productdiscountRadio4">
                                        <label class="form-check-label" for="productdiscountRadio4">
                                            30% or more
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="20% or more"
                                            id="productdiscountRadio3" checked>
                                        <label class="form-check-label" for="productdiscountRadio3">
                                            20% or more
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="10% or more"
                                            id="productdiscountRadio2">
                                        <label class="form-check-label" for="productdiscountRadio2">
                                            10% or more
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Less than 10%"
                                            id="productdiscountRadio1">
                                        <label class="form-check-label" for="productdiscountRadio1">
                                            Less than 10%
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end accordion-item -->

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingRating">
                            <button class="accordion-button bg-transparent shadow-none collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseRating" aria-expanded="false"
                                aria-controls="flush-collapseRating">
                                <span class="text-muted text-uppercase fs-12 fw-medium">Rating</span> <span
                                    class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                            </button>
                        </h2>

                        <div id="flush-collapseRating" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingRating">
                            <div class="accordion-body text-body">
                                <div class="d-flex flex-column gap-2 filter-check">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="4 & Above Star"
                                            id="productratingRadio4" checked>
                                        <label class="form-check-label" for="productratingRadio4">
                                            <span class="text-muted">
                                                <i class="mdi mdi-star text-warning"></i>
                                                <i class="mdi mdi-star text-warning"></i>
                                                <i class="mdi mdi-star text-warning"></i>
                                                <i class="mdi mdi-star text-warning"></i>
                                                <i class="mdi mdi-star"></i>
                                            </span> 4 & Above
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="3 & Above Star"
                                            id="productratingRadio3">
                                        <label class="form-check-label" for="productratingRadio3">
                                            <span class="text-muted">
                                                <i class="mdi mdi-star text-warning"></i>
                                                <i class="mdi mdi-star text-warning"></i>
                                                <i class="mdi mdi-star text-warning"></i>
                                                <i class="mdi mdi-star"></i>
                                                <i class="mdi mdi-star"></i>
                                            </span> 3 & Above
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="2 & Above Star"
                                            id="productratingRadio2">
                                        <label class="form-check-label" for="productratingRadio2">
                                            <span class="text-muted">
                                                <i class="mdi mdi-star text-warning"></i>
                                                <i class="mdi mdi-star text-warning"></i>
                                                <i class="mdi mdi-star"></i>
                                                <i class="mdi mdi-star"></i>
                                                <i class="mdi mdi-star"></i>
                                            </span> 2 & Above
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1 Star"
                                            id="productratingRadio1">
                                        <label class="form-check-label" for="productratingRadio1">
                                            <span class="text-muted">
                                                <i class="mdi mdi-star text-warning"></i>
                                                <i class="mdi mdi-star"></i>
                                                <i class="mdi mdi-star"></i>
                                                <i class="mdi mdi-star"></i>
                                                <i class="mdi mdi-star"></i>
                                            </span> 1
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end accordion-item -->
                </div>
            </div>
        </div>

        <div class="col-xxl-9 col-lg-4">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row g-4">
                        <div class="col-sm-auto">
                            <div>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target=".bs-example-modal-xl">
                                    Registrar Producto
                                </button>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control" id="searchProductList"
                                        placeholder="Search Products...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills nav-custom nav-custom-light mb-3" role="tablist">
                        @foreach ($categorias as $categoria => $padre)
                            <li class="nav-item">
                                <a class="nav-link @if ($categoria === 0) active @endif" data-bs-toggle="tab"
                                    href="#cat-{{ $padre->id }}" role="tab">
                                    {{ $padre->nombre }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content text-muted">
                        @foreach ($categorias as $categoria => $padre)
                            <div class="tab-pane fade @if ($categoria === 0) show active @endif"
                                id="cat-{{ $padre->id }}" role="tabpanel">

                                @if ($padre->productos->count())
                                    <h4>{{ $padre->nombre }}</h4>
                                    <div class="table-responsive mb-3">
                                        <table class="table align-middle mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Código</th>
                                                    <th>Nombre</th>
                                                    <th>Precio</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($subcategoria->productos as $i => $producto)
                                                    <tr>
                                                        <td>{{ $i + 1 }}</td>
                                                        <td>{{ $producto->codigo }}</td>
                                                        <td>{{ $producto->nombre }}</td>
                                                        <td>Bs. {{ number_format($producto->precio, 2) }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                                                <i data-feather="eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-soft-warning btn-sm">
                                                                <i data-feather="edit-2"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            
                                @include('layouts.admin.productos._subcategorias', [
                                    'categorias' => $padre->
                                    
                                    ,
                                ])
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <!-- end col -->
    </div>


    <!--modal de registrar-->
    <div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">

                <div class="modal-header bg-soft-success justify-content-center position-relative">
                    <h3 class="modal-title text-uppercase fw-bold text-success-emphasis text-center w-100"
                        id="myExtraLargeModalLabel">
                        <i class="ri-folder-add-line me-1"></i> Registrar Nuevo Producto
                    </h3>
                    <button type="button" class="btn-close position-absolute end-0 top-50 translate-middle-y me-3"
                        data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <form action="" id="addForm" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="codigo" class="form-label">Código</label>
                                    <input type="text" class="form-control" id="" placeholder="M-##">
                                </div>

                                <div class="col-md-6">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id=""
                                        placeholder="Nombre del producto">
                                </div>

                                <div class="col-md-3">
                                    <label for="precio" class="form-label">Precio</label>
                                    <input type="number" class="form-control" id=""
                                        placeholder="introducir precio" step="0.01" min="0">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="" rows="3" placeholder="Introducir descripción del producto"></textarea>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col md-6">
                                    <div class="card-body">
                                        <div class="dropzone">
                                            <div class="fallback">
                                                <input name="file" type="file" multiple="multiple">
                                            </div>
                                            <div class="dz-message needsclick">
                                                <div class="mb-3">
                                                    <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                                </div>

                                                <h4>Drop files here or click to upload.</h4>
                                            </div>
                                        </div>

                                        <ul class="list-unstyled mb-0" id="dropzone-preview">
                                            <li class="mt-2" id="dropzone-preview-list">

                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col md-3 ms-auto">
                                    <label for="" class="form-label">Elija el tipo</label>
                                    <div class="row mb-3 mt-3">
                                        @foreach ($tipos as $tipo)
                                            <div class="col-xl-3">
                                                <label for="descripcion" class="form-label">{{ $tipo->nombre }}</label>
                                                @foreach ($tipo['especificaciones'] as $especificacion)
                                                    <div class="form-check form-check-primary mb-3">
                                                        <input class="form-check-input" type="checkbox" id="{{$especificacion->descripcion}}">
                                                        <label class="form-check-label text-primary" for="{{$especificacion->descripcion}}">
                                                            {{$especificacion->descripcion}}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach

                                    </div>
                                </div>



                            </div>
                        </div>

                        <div class="modal-footer mt-3">
                            <button type="button" class="btn bg-danger" data-bs-dismiss="modal"
                                style="color: white;">Cerrar</button>
                            <button type="submit" class="btn bg-success addBtn" style="color: white;">Agregar
                                Producto</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
