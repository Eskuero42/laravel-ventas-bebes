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

                                                        <a href="#"
                                                            class="btn btn-warning btn-icon waves-effect waves-light"
                                                            data-bs-toggle="modal" data-bs-target=".bs-edit-modal-xl"
                                                            title="Editar producto">
                                                            <i data-feather="edit-2"></i>
                                                        </a>

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


    <!--modal de registrar producto-->
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
                    <form id="addformproducto" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row g-3">
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="codigo" class="form-label">Código</label>
                                            <input type="text" name="codigo" class="form-control" id=""
                                                placeholder="M-##">
                                        </div>

                                        <div class="col-md-9">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" name="nombre" class="form-control" id=""
                                                placeholder="Nombre del producto">
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="precio" class="form-label">Precio</label>
                                            <input type="text" name="precio" class="form-control" id=""
                                                placeholder="Precio del producto" step="0.01" min="0">
                                        </div>
                                        <div class="col-md-9">
                                            <label for="" class="form-label">Descripción</label>
                                            <textarea name="descripcion" rows="3" class="form-control" placeholder="Descripción del producto"></textarea>
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <div class="col md-12">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="file" class="form-label">Imagen principal del
                                                        producto</label>
                                                    <input type="file" name="file" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col md-12">
                                            <label for="" class="form-label">Elija el tipo</label>
                                            <div class="row mb-3 mt-3">
                                                @foreach ($tipos as $tipo)
                                                    <div class="col-xl-3">
                                                        <div class="form-check form-check-primary mb-2">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="tipos[]" id="tipo_{{ $tipo->id }}"
                                                                value="{{ $tipo->id }}">

                                                            <label class="form-check-label text-primary"
                                                                for="tipo_{{ $tipo->id }}">
                                                                {{ $tipo->nombre }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <label class="form-label">Seleccione una categoría</label>
                                <div class="row">
                                    @foreach ($categorias as $categoria)
                                        <div class="col-md-4">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="categoria_id"
                                                    id="categoria_{{ $categoria->id }}" value="{{ $categoria->id }}">
                                                <label class="form-check-label fw-bold text-primary"
                                                    for="categoria_{{ $categoria->id }}">
                                                    {{ $categoria->nombre }}
                                                </label>
                                            </div>

                                            {{-- Subcategorías --}}
                                            @if ($categoria->categorias_hijosRecursive->count())
                                                @foreach ($categoria->categorias_hijosRecursive as $hijo)
                                                    <div class="form-check ms-3 mb-1">
                                                        <input class="form-check-input" type="radio"
                                                            name="categoria_id" id="categoria_{{ $hijo->id }}"
                                                            value="{{ $hijo->id }}">
                                                        <label class="form-check-label"
                                                            for="categoria_{{ $hijo->id }}">
                                                            {{ $hijo->nombre }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer mt-3">
                            <button type="button" class="btn bg-danger" data-bs-dismiss="modal"
                                style="color: white;">Cerrar</button>
                            <button type="submit" class="btn btn-success addBtn">Agregar Producto</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!--modal de editar producto-->
    <div class="modal fade bs-edit-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">

                <div class="modal-header bg-soft-warning justify-content-center position-relative">
                    <h3 class="modal-title text-uppercase fw-bold text-warning-emphasis text-center w-100"
                        id="myExtraLargeModalLabel">
                        <i class="ri-folder-add-line me-1"></i> Editar Producto
                    </h3>
                    <button type="button" class="btn-close position-absolute end-0 top-50 translate-middle-y me-3"
                        data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <form id="addformproducto" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row g-3">
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="codigo" class="form-label">Código</label>
                                            <input type="text" name="codigo" class="form-control" id=""
                                                placeholder="M-##">
                                        </div>

                                        <div class="col-md-9">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" name="nombre" class="form-control" id=""
                                                placeholder="Nombre del producto">
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="precio" class="form-label">Precio</label>
                                            <input type="text" name="precio" class="form-control" id=""
                                                placeholder="Precio del producto" step="0.01" min="0">
                                        </div>
                                        <div class="col-md-9">
                                            <label for="" class="form-label">Descripción</label>
                                            <textarea name="descripcion" rows="3" class="form-control" placeholder="Descripción del producto"></textarea>
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <div class="col md-12">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="file" class="form-label">Imagen principal del
                                                        producto</label>
                                                    <input type="file" name="file" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col md-12">
                                            <label for="" class="form-label">Elija el tipo</label>
                                            <div class="row mb-3 mt-3">
                                                @foreach ($tipos as $tipo)
                                                    <div class="col-xl-3">
                                                        <div class="form-check form-check-primary mb-2">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="tipos[]" id="tipo_{{ $tipo->id }}"
                                                                value="{{ $tipo->id }}">

                                                            <label class="form-check-label text-primary"
                                                                for="tipo_{{ $tipo->id }}">
                                                                {{ $tipo->nombre }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <label class="form-label">Seleccione una categoría</label>
                                <div class="row">
                                    @foreach ($categorias as $categoria)
                                        <div class="col-md-4">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="categoria_id"
                                                    id="categoria_{{ $categoria->id }}" value="{{ $categoria->id }}">
                                                <label class="form-check-label fw-bold text-primary"
                                                    for="categoria_{{ $categoria->id }}">
                                                    {{ $categoria->nombre }}
                                                </label>
                                            </div>

                                            {{-- Subcategorías --}}
                                            @if ($categoria->categorias_hijosRecursive->count())
                                                @foreach ($categoria->categorias_hijosRecursive as $hijo)
                                                    <div class="form-check ms-3 mb-1">
                                                        <input class="form-check-input" type="radio"
                                                            name="categoria_id" id="categoria_{{ $hijo->id }}"
                                                            value="{{ $hijo->id }}">
                                                        <label class="form-check-label"
                                                            for="categoria_{{ $hijo->id }}">
                                                            {{ $hijo->nombre }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer mt-3">
                            <button type="button" class="btn bg-danger" data-bs-dismiss="modal"
                                style="color: white;">Cerrar</button>
                            <button type="submit" class="btn btn-success addBtn">Actualizar Producto</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
