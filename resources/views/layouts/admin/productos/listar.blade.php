@extends('layouts.admin-layout')
@section('contenido')
    <div class="row">
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
                <!-- Tabs de categorías -->
                <ul class="nav nav-pills nav-custom nav-custom-light mb-3" role="tablist">
                    @foreach ($categorias as $index => $categoria)
                        <li class="nav-item">
                            <a class="nav-link @if ($index === 0) active @endif" data-bs-toggle="tab"
                                href="#cat-{{ $categoria->id }}" role="tab">
                                {{ $categoria->nombre }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content text-muted">
                    @foreach ($categorias as $index => $categoria)
                        <div class="tab-pane fade @if ($index === 0) show active @endif"
                            id="cat-{{ $categoria->id }}" role="tabpanel">

                            <!-- Productos de la categoría padre -->
                            @if ($categoria->productos && $categoria->productos->count())
                                <h4>{{ $categoria->nombre }}</h4>
                                <div class="table-responsive mb-3">
                                    <table class="table align-middle mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Código</th>
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th>Acciones</th> <!-- solo 5 columnas -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categoria->productos as $i => $producto)
                                                <tr>
                                                    <td>{{ $i + 1 }}</td>
                                                    <td>{{ $producto->codigo }}</td>
                                                    <td>
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <div
                                                                    class="avatar-sm bg-light rounded p-1 d-flex align-items-center justify-content-center">
                                                                    @if (!empty($producto->imagen_principal) && file_exists(public_path($producto->imagen_principal)))
                                                                        <img src="{{ asset($producto->imagen_principal) }}"
                                                                            alt="{{ $producto->nombre }}"
                                                                            class="img-fluid rounded"
                                                                            style="width: 50px; height: 50px; object-fit: cover;">
                                                                    @else
                                                                        <img src="{{ asset('imagenes/default.png') }}"
                                                                            alt="Sin imagen" class="img-fluid rounded"
                                                                            style="width: 50px; height: 50px; object-fit: cover;">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                {{ $producto->nombre }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Bs. {{ number_format($producto->precio, 2) }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.articulos.listar', $producto->id) }}"
                                                            class="btn btn-primary btn-icon waves-effect waves-light"
                                                            title="Ir a detalles del producto">
                                                            <i data-feather="eye"></i>
                                                        </a>
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

                            <!-- Subcategorías recursivas -->
                            @if ($categoria->categorias_hijosRecursive && $categoria->categorias_hijosRecursive->count())
                                @include('layouts.admin.productos._subcategorias', [
                                    'categorias' => $categoria->categorias_hijosRecursive,
                                ])
                            @endif

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
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
                                                        <input class="form-check-input" type="checkbox"
                                                            id="{{ $especificacion->descripcion }}">
                                                        <label class="form-check-label text-primary"
                                                            for="{{ $especificacion->descripcion }}">
                                                            {{ $especificacion->descripcion }}
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
