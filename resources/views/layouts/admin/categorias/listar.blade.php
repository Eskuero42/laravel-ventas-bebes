@extends('layouts.admin-layout')
@section('contenido')
    <div class="row">
        <div class="card shadow-sm border rounded-3">
            <div class="card-header bg-soft-primary position-relative d-flex align-items-center">
                <h4 class="card-title text-uppercase fw-bold mb-0 mx-auto">
                    Lista de categorías
                </h4>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">
                    Registrar Categoría
                </button>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($categorias as $categoria)
            <div class="col-xl-4 col-md-6">
                <div class="card card-height-100">

                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">{{ $categoria->nombre }}</h4>
                        <div class="flex-shrink-0">

                            <button type="button" class="btn btn-warning btn-icon waves-effect waves-light editBtn"
                                title="Editar categoría" data-bs-obj='@json($categoria)' data-bs-toggle="modal"
                                data-bs-target=".bs-edit-modal-lg">
                                <i data-feather="edit-2"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body text-center">
                        <div class="bg-info-subtle rounded p-2 mb-3">
                            <img src="{{ asset($categoria->imagen) }}" alt="{{ $categoria->nombre }}"
                                class="img-fluid rounded" style="max-height: 210px;">
                        </div>
                        <h5>
                            <p>
                                Descripción: {{ $categoria->descripcion }}
                            </p>
                        </h5>
                        <a href="{{ route('admin.productos.vertodos', ['id' => $categoria->id, $categoria->tipo]) }}"
                            class="btn btn-info  waves-effect waves-light" title="Ir a detalles del producto">
                            <i data-feather="eye"></i>Todos los productos
                        </a>

                    </div>
                </div>
            </div>
        @endforeach

    </div>


    <!--modal de registrar-->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-modal="true"
        role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-soft-success justify-content-center position-relative">
                    <h3 class="modal-title text-uppercase fw-bold text-success-emphasis text-center w-100"
                        id="myExtraLargeModalLabel">
                        <i class="ri-folder-add-line me-1"></i> Registrar Nueva Categoría
                    </h3>
                    <button type="button" class="btn-close position-absolute end-0 top-50 translate-middle-y me-3"
                        data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <form action="" id="addForm">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-8">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    placeholder="Nombre de categoría" required>
                            </div>

                            <div class="col-4">
                                <label class="form-label">Tipo</label>
                                <div class="d-flex flex-wrap gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo" id="tipo_asignado"
                                            value="asignado" required>
                                        <label class="form-check-label" for="tipo_asignado">Ropa</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo" id="tipo_no_asignado"
                                            value="no asignado">
                                        <label class="form-check-label" for="tipo_no_asignado">Otros</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">

                        </div>

                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input class="form-control" type="file" id="imagen" name="imagen" accept="image/*"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"
                                placeholder="Introducir descripción del producto"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn bg-danger text-white" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn bg-success text-white addBtn">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--modal de editar-->
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
                    <form action="" id="updateForm">
                        @csrf
                        <input type="hidden" id="editId" name="id">

                        <div class="row mb-3">
                            <div class="col-8">
                                <label for="editNombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="editNombre" name="nombre"
                                    placeholder="Nombre de categoría" required>
                            </div>

                            <div class="col-4">
                                <label class="form-label">Tipo</label>
                                <div class="d-flex flex-wrap gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo"
                                            id="edit_tipo_asignado" value="asignado" required>
                                        <label class="form-check-label" for="edit_tipo_asignado">Ropa</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo"
                                            id="edit_tipo_no_asignado" value="no asignado">
                                        <label class="form-check-label" for="edit_tipo_no_asignado">Otros</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="editImagen" class="form-label">Imagen</label>
                            <input class="form-control" type="file" id="editImagen" name="imagen" accept="image/*">
                            <img id="editPreview" alt="Imagen seleccionada" class="mt-2 rounded d-block"
                                style="max-height: 100px; display: none;">
                        </div>

                        <div class="mb-3">
                            <label for="editDescripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="editDescripcion" name="descripcion" rows="3"
                                placeholder="Introducir descripción del producto" required></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn bg-danger text-white"
                                data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn bg-warning text-white updateBtn">Actualizar</button>
                        </div>
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

            //modificar
            $('.editBtn').click(function() {
                var data = $(this).data('bs-obj');
                $('#editId').val(data.id);
                $('#editNombre').val(data.nombre);
                $('#editDescripcion').val(data.descripcion);

                if (data.tipo === 'asignado') {
                    $('#edit_tipo_asignado').prop('checked', true);
                } else {
                    $('#edit_tipo_no_asignado').prop('checked', true);
                }

                // Mostrar la imagen actual
                if (data.imagen) {
                    $('#editPreview').attr('src', data.imagen).show();
                } else {
                    $('#editPreview').hide();
                }

                // Limpiar el input file
                $('#editImagen').val('');
            });


            $('#updateForm').submit(function(e) {
                e.preventDefault();
                $('.updateBtn').prop('disabled', true);

                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.categorias.editar') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        alert(res.message);
                        $('.updateBtn').prop('disabled', false);
                        if (res.success) {
                            location.reload();
                        }
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
