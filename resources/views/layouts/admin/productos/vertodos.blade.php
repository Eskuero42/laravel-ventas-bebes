@extends('layouts.admin-layout')
@section('contenido')
    <div class="row">
        <div class="card shadow-sm border rounded-3">
            <div class="card-header bg-soft-primary position-relative d-flex align-items-center">

                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target=".bs-edit-modal-lg">
                    <i data-feather="edit-2"></i> Editar Categoría
                </button>

                <h4 class="card-title text-uppercase fw-bold mb-0 mx-auto">
                    Categoria: {{ $categoria->nombre }}
                </h4>

                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                    data-bs-target=".bs-example-modal-xl">
                    <i class="bx bx-plus-circle align-middle me-1"></i> Registrar Producto
                </button>

                &nbsp;

                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"
                    data-categoria-id="{{ $categoria->id }}" data-categoria-tipo="{{ $categoria->tipo }}">
                    <i class="bx bx-category-alt align-middle me-1"></i> Registrar SubCategoría
                </button>

            </div>
        </div>
    </div>


    @if (isset($categoria['productos'][0]))
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Lista de productos de la categoria: {{ $categoria->nombre }}</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="row">
                    @foreach ($categoria['productos'] as $producto)
                        <div class="col-xl-4">
                            <div class="card product">
                                <div class="card-body">
                                    <div class="row gy-3 align-items-start">
                                        <div class="col-sm-auto">
                                            <div
                                                class="avatar-lg bg-light rounded p-1 d-flex align-items-center justify-content-center">
                                                <img src="{{ asset($producto->imagen_principal) }}" alt="Producto"
                                                    class="img-fluid rounded avatar-md object-fit-contain"
                                                    style="max-height: 100px;">
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="fs-16 text-truncate mb-2">{{ $producto->nombre }}</h5>
                                                <div class="text-end">
                                                    <p class="text-muted mb-1">CÓDIGO:</p>
                                                    <h6 id="ticket_price" class="product-price fw-semibold">
                                                        {{ $producto->codigo }}</h6>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center gap-2 text-muted mb-1">
                                                <span class="fw-semibold">Precio:</span>
                                                <span>Bs. <span
                                                        class="product-line-price">{{ $producto->precio }}</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="row align-items-center gy-3">
                                        <div class="col-sm-auto">
                                            <a href="{{ route('admin.articulos.listar', $producto->id) }}"
                                                class="btn btn-primary btn-icon waves-effect waves-light"
                                                title="Ir a detalles del producto">
                                                <i data-feather="eye"></i>
                                            </a>

                                            <!--Editar-->
                                            <a href="#"
                                                class="btn btn-warning btn-icon waves-effect waves-light editarProductoBtn"
                                                data-id="{{ $producto->id }}" data-nombre="{{ $producto->nombre }}"
                                                data-codigo="{{ $producto->codigo }}"
                                                data-precio="{{ $producto->precio }}"
                                                data-descripcion="{{ $producto->descripcion }}"
                                                data-imagen="{{ $producto->imagen_principal }}"
                                                data-categoria_id="{{ $producto->categoria_id }}" data-bs-toggle="modal"
                                                data-bs-target=".bs-edit-modal-xl" title="Editar producto">
                                                <i data-feather="edit-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> <!-- end row -->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    @endif

    @if (isset($categoria['categorias_hijos'][0]))
        <div class="row">
            <div class="text-center mb-2">
                <h4 class="mb-0">Subcategorías de {{ $categoria->nombre }}</h4>
            </div>

            <div class="card">
                <div class="card-body">
                    @php $activo = true; @endphp

                    <!-- Tabs de subcategorías -->
                    <ul class="nav nav-tabs nav-justified nav-border-top nav-border-top-success mb-3" role="tablist">
                        @foreach ($categoria['categorias_hijos'] as $subcategoria)
                            <li class="nav-item">
                                <a class="nav-link {{ $activo ? 'active' : '' }}" data-bs-toggle="tab"
                                    href="#nav-{{ $subcategoria->id }}-home" role="tab"
                                    aria-selected="{{ $activo ? 'true' : 'false' }}">

                                    {{ $subcategoria->nombre }}

                                    <span class="btn btn-success btn-sm btn-icon"
                                        onclick="event.stopPropagation(); window.location.href='{{ route('admin.productos.vertodos', ['id' => $subcategoria->id]) }}';"
                                        title="Entrar a subcategoría {{ $subcategoria->nombre }}">
                                        <i data-feather="eye"></i>
                                    </span>
                                </a>
                            </li>
                            @php $activo = false; @endphp
                        @endforeach
                    </ul>

                    <!-- Contenido de los tabs -->
                    <div class="tab-content text-muted">
                        @php $seleccionado = 1; @endphp

                        @foreach ($categoria['categorias_hijos'] as $subcategoria)
                            <div class="tab-pane {{ $seleccionado ? 'active' : '' }}"
                                id="nav-{{ $subcategoria->id }}-home" role="tabpanel">

                                @php $seleccionado = 0; @endphp

                                <div class="row">
                                    @foreach ($subcategoria['productos'] as $producto)
                                        <div class="col-xl-4">
                                            <div class="card product">
                                                <div class="card-body">
                                                    <div class="row gy-3 align-items-start">

                                                        <!-- Imagen -->
                                                        <div class="col-sm-auto">
                                                            <div class="avatar-lg bg-light rounded p-1">
                                                                <img src="{{ asset($producto->imagen_principal) }}"
                                                                    alt="Producto" class="img-fluid d-block">
                                                            </div>
                                                        </div>

                                                        <!-- Info del producto -->
                                                        <div class="col-sm">
                                                            <div class="d-flex justify-content-between">
                                                                <h5 class="fs-16 text-truncate mb-2">
                                                                    {{ $producto->nombre }}
                                                                </h5>
                                                                <div class="text-end">
                                                                    <p class="text-muted mb-1">CÓDIGO:</p>
                                                                    <h6 class="product-price fw-semibold">
                                                                        {{ $producto->codigo }}
                                                                    </h6>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex align-items-center gap-2 text-muted mb-1">
                                                                <span class="fw-semibold">Precio:</span>
                                                                <span>Bs. <span
                                                                        class="product-line-price">{{ $producto->precio }}</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Footer de acciones -->
                                                <div class="card-footer">
                                                    <div class="row align-items-center gy-3">
                                                        <div class="col-sm-auto">
                                                            <!-- Ver producto -->
                                                            <a href="{{ route('admin.articulos.listar', $producto->id) }}"
                                                                class="btn btn-primary btn-icon waves-effect waves-light"
                                                                title="Ir a detalles del producto">
                                                                <i data-feather="eye"></i>
                                                            </a>

                                                            <!-- Editar producto -->
                                                            <a href="#"
                                                                class="btn btn-warning btn-icon waves-effect waves-light editarProductoBtn"
                                                                data-id="{{ $producto->id }}"
                                                                data-nombre="{{ $producto->nombre }}"
                                                                data-codigo="{{ $producto->codigo }}"
                                                                data-precio="{{ $producto->precio }}"
                                                                data-descripcion="{{ $producto->descripcion }}"
                                                                data-imagen="{{ $producto->imagen_principal }}"
                                                                data-categoria_id="{{ $producto->categoria_id }}"
                                                                data-bs-toggle="modal" data-bs-target=".bs-edit-modal-xl"
                                                                title="Editar producto">
                                                                <i data-feather="edit-2"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        @foreach ($otrascategorias as $otra)
            <div class="col-xl-4 col-md-6">
                <div class="card card-height-100">

                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">{{ $otra->nombre }}</h4>
                    </div>

                    <div class="card-body text-center">
                        <div class="bg-info-subtle rounded p-2 mb-3">
                            <img src="{{ asset($otra->imagen) }}" alt="{{ $otra->nombre }}" class="img-fluid rounded"
                                style="max-height: 210px;">
                        </div>
                        <h5>
                            <p>
                                Descripción: {{ $otra->descripcion }}
                            </p>
                        </h5>
                        <a href="{{ route('admin.productos.vertodos', ['id' => $otra->id, $otra->tipo]) }}"
                            class="btn btn-info  waves-effect waves-light" title="Ir a detalles del producto">
                            <i data-feather="eye"></i>Todos los productos
                        </a>

                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <!--modal de registrar producto-->
    <div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header bg-soft-secondary justify-content-center position-relative">
                    <h3 class="modal-title text-uppercase fw-bold text-secondary-emphasis text-center w-100"
                        id="myExtraLargeModalLabel">
                        <i class="ri-folder-add-line me-1"></i> Registrar Nuevo Producto
                    </h3>
                    <button type="button" class="btn-close position-absolute end-0 top-50 translate-middle-y me-3"
                        data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <form id="addformproducto" enctype="multipart/form-data">
                        @csrf
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

                                <input type="hidden" name="categoria_id" value="{{ $categoria->id }}">

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
                                            <label for="file" class="form-label">Imagen principal del producto</label>
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
                                                    <input class="form-check-input" type="checkbox" name="tipos[]"
                                                        id="tipo_{{ $tipo->id }}" value="{{ $tipo->id }}">

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

                        <div class="modal-footer mt-3">
                            <button type="button" class="btn bg-danger" data-bs-dismiss="modal"
                                style="color: white;">Cerrar</button>
                            <button type="submit" class="btn btn-secondary addBtn">Agregar Producto</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!--modal de editar producto-->
    <div class="modal fade bs-edit-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
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
                    <form id="edirformproducto" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="editProductoId">

                        <div class="row g-3">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="codigo" class="form-label">Código</label>
                                    <input type="text" name="codigo" id="editCodigo" class="form-control">
                                </div>

                                <div class="col-md-9">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" name="nombre" id="editNombre" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="editPrecio" class="form-label">Precio</label>
                                    <input type="number" name="precio" id="editPrecio" class="form-control"
                                        step="0.01" min="0">
                                </div>

                                <div class="col-md-9">
                                    <label for="editDescripcion" class="form-label">Descripción</label>
                                    <textarea name="descripcion" id="editDescripcion" rows="3" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">


                                <div class="col-md-12">
                                    <label for="imagen_principal" class="form-label">Imagen principal del producto</label>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <input type="file" name="imagen_principal" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="editPreview" class="form-label">Imagen actual</label>
                                    <img id="editPreview" src="" alt="Imagen actual" class="mt-2 rounded"
                                        style="max-height: 100px;">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label class="form-label">Seleccionar categoría</label>

                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="categoria_id"
                                            id="categoria_padre_{{ $categoria->id }}" value="{{ $categoria->id }}"
                                            required>
                                        <label class="form-check-label" for="categoria_padre_{{ $categoria->id }}">
                                            {{ $categoria->nombre }} (Padre)
                                        </label>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            @foreach ($categoria->categorias_hijos->where('id', '>', 0)->values() as $i => $subcat)
                                                @if ($i % 2 === 0)
                                                    <div class="form-check mb-2 ms-3">
                                                        <input class="form-check-input" type="radio"
                                                            name="categoria_id" id="categoria_{{ $subcat->id }}"
                                                            value="{{ $subcat->id }}">
                                                        <label class="form-check-label"
                                                            for="categoria_{{ $subcat->id }}">
                                                            {{ $subcat->nombre }}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-md-6">
                                            @foreach ($categoria->categorias_hijos->where('id', '>', 0)->values() as $i => $subcat)
                                                @if ($i % 2 === 1)
                                                    <div class="form-check mb-2 ms-3">
                                                        <input class="form-check-input" type="radio"
                                                            name="categoria_id" id="categoria_{{ $subcat->id }}"
                                                            value="{{ $subcat->id }}">
                                                        <label class="form-check-label"
                                                            for="categoria_{{ $subcat->id }}">
                                                            {{ $subcat->nombre }}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer mt-3">
                            <button type="button" class="btn bg-danger" data-bs-dismiss="modal"
                                style="color: white;">Cerrar</button>
                            <button type="submit" class="btn btn-warning addBtn">Actualizar Producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--modal de registrar categoria-->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-modal="true"
        role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-soft-info justify-content-center position-relative">
                    <h3 class="modal-title text-uppercase fw-bold text-info-emphasis text-center w-100"
                        id="myExtraLargeModalLabel">
                        <i class="ri-folder-add-line me-1"></i> Registrar Nueva Categoría
                    </h3>
                    <button type="button" class="btn-close position-absolute end-0 top-50 translate-middle-y me-3"
                        data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="addForm">
                        @csrf
                        <input type="hidden" name="categoria_id" id="categoriaPadreId">
                        <div class="row g-3">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        placeholder="Nombre de categoría" required>
                                </div>

                                <input type="hidden" name="tipo" value="{{ $categoria->tipo }}">


                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="imagen" class="form-label">Imagen</label>
                                    <input class="form-control" type="file" id="imagen" accept="image/*"
                                        name="imagen" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="descripcion" rows="3" name="descripcion"
                                        placeholder="Introducir descripción del producto"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn bg-danger" data-bs-dismiss="modal"
                                style="color: white;">Cerrar</button>
                            <button type="submit" class="btn bg-info addBtn" style="color: white;">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--modal de editar categoria-->
    <div class="modal fade bs-edit-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-modal="true"
        role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-soft-warning justify-content-center position-relative">
                    <h3 class="modal-title text-uppercase fw-bold text-warning-emphasis text-center w-100"
                        id="myExtraLargeModalLabel">
                        <i class="ri-folder-add-line me-1"></i> Editar Categoría
                    </h3>
                    <button type="button" class="btn-close position-absolute end-0 top-50 translate-middle-y me-3"
                        data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <!-- Cuerpo del modal -->
                <div class="modal-body">
                    <form action="{{ route('admin.categorias.actualizar') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $categoria->id }}">

                        <div class="row mb-3">
                            <div class="row col-8">
                                <label for="editNombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="editNombre" name="nombre"
                                    value="{{ $categoria->nombre }}" required>
                            </div>

                            <div class="row col-4">
                                <label class="form-label">Tipo</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo" value="asignado"
                                        {{ $categoria->tipo === 'asignado' ? 'checked' : '' }}>
                                    <label class="form-check-label">Ropa</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo" value="no asignado"
                                        {{ $categoria->tipo === 'no asignado' ? 'checked' : '' }}>
                                    <label class="form-check-label">Otros</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="editImagen" class="form-label">Imagen</label>
                            <input type="file" class="form-control" id="editImagen" name="imagen" accept="image/*">
                            @if ($categoria->imagen)
                                <img src="{{ Storage::url($categoria->imagen) }}" alt="Imagen actual"
                                    class="mt-2 rounded" style="max-height: 100px;">
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="editDescripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="editDescripcion" name="descripcion" rows="3" required>{{ $categoria->descripcion }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-warning">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {

            $('#addForm').submit(function(e) {
                e.preventDefault();
                $('.addBtn').prop('disabled', true);

                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.categorias.registrar') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        alert(res.message);
                        if (res.success) {
                            $('#addForm')[0].reset(); // Limpiar el formulario
                            location.reload();
                        }
                    },
                    error: function(xhr) {
                        var errorMessage = xhr.responseJSON?.message ||
                            'Error al procesar la solicitud';
                        alert(errorMessage);
                    },
                    complete: function() {
                        $('.addBtn').prop('disabled', false);
                    }
                });
            });

            $('#addformproducto').submit(function(e) {
                e.preventDefault();
                $('.addBtn').prop('disabled', true);

                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.productos.registrar') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        alert(res.message);
                        if (res.success) {
                            $('#addformproducto')[0].reset();
                            location.reload();
                        }
                    },
                    error: function(xhr) {
                        alert(xhr.responseJSON?.message || 'Error al registrar producto');
                    },
                    complete: function() {
                        $('.addBtn').prop('disabled', false);
                    }
                });
            });

            $('.editarProductoBtn').click(function() {
                $('#editProductoId').val($(this).data('id'));
                $('#editNombre').val($(this).data('nombre'));
                $('#editCodigo').val($(this).data('codigo'));
                $('#editPrecio').val($(this).data('precio'));
                $('#editImagen').val(''); // Limpiar el input file
                $('#editDescripcion').val($(this).data('descripcion'));

                const categoriaId = $(this).data('categoria_id');
                $(`input[name="categoria_id"][value="${categoriaId}"]`).prop('checked', true);

                // Mostrar imagen actual
                const imagen = $(this).data('imagen');
                if (imagen) {
                    $('#editPreview').attr('src', '/storage/' + imagen).show();
                } else {
                    $('#editPreview').hide();
                }
            });

            $(document).on('click', '[data-bs-target=".bs-example-modal-lg"]', function() {
                const categoriaId = $(this).data('categoria-id');
                $('#categoriaPadreId').val(categoriaId); // lo asigna correctamente al hidden
            });


            $('#edirformproducto').submit(function(e) {
                e.preventDefault();
                $('.addBtn').prop('disabled', true);

                const formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.productos.actualizar') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        alert(res.message);
                        if (res.success) {
                            $('#edirformproducto')[0].reset();
                            location.reload();
                        }
                    },
                    error: function(xhr) {
                        alert(xhr.responseJSON?.message || 'Error al actualizar producto');
                    },
                    complete: function() {
                        $('.addBtn').prop('disabled', false);
                    }
                });
            });

            $('#deleteForm').submit(function(e) {
                e.preventDefault();
                $('.btnDelete').prop('disabled', true);

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin.tipos.eliminar') }}",
                    type: "DELETE",
                    data: formData,
                    success: function(res) {
                        alert(res.message);
                        $('.btnDelete').prop('disabled', false);
                        if (res.success) {
                            location.reload();
                        }
                    }
                });
            });
        });
    </script>
@endpush
