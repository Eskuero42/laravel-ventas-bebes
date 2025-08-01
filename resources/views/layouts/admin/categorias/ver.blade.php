@extends('layouts.admin-layout')
@section('contenido')


    <div class="row">
        <div class="card shadow-sm border rounded-3">
            <div class="card-header bg-soft-primary position-relative d-flex align-items-center">
                <h4 class="card-title text-uppercase fw-bold mb-0 mx-auto">
                    Lista de categorías
                </h4>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target=".bs-example-modal-dialog">
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
                        <h4 class="card-title mb-0 flex-grow-1">{{$categoria->nombre}}</h4>
                        <div class="flex-shrink-0">
                            <a href="#" class="btn btn-success btn-icon waves-effect waves-light"
                                title="Ir a detalles del producto" data-bs-toggle="modal"
                                data-bs-target=".bs-edit-modal-dialog">
                                <i data-feather="plus"></i>
                            </a>

                            <a href="#" class="btn btn-warning btn-icon waves-effect waves-light"
                                title="Ir a detalles del producto" data-bs-toggle="modal"
                                data-bs-target=".bs-edit-modal-dialog">
                                <i data-feather="edit-2"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card-body text-center">
                        <!-- Imagen acomodada -->
                        <div class="bg-info-subtle rounded p-2 mb-3">
                            <img src="assets/images/products/img-3.png" alt="" class="img-fluid rounded"
                                style="max-height: 210px;">
                        </div>
                        <h5>
                            <p>
                                Descripción: {{$categoria->descripcion}}
                            </p>
                        </h5>
                        <a href="{{ route('admin.productos.vertodos', ['id' => $categoria->id]) }}" class="btn btn-info  waves-effect waves-light" title="Ir productos de la categoria">
                            <i data-feather="eye"></i>
                        </a>

                        <a href="{{ route('admin.categorias.subcategorias.ver', ['id' => $categoria->id]) }}" class="btn btn-danger btn-icon waves-effect waves-light"
                            title="Listar de subcategorias">
                            <i data-feather="eye"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>


    <!--modal de registrar-->
    <div class="modal fade bs-example-modal-dialog modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-soft-success justify-content-center position-relative">
                    <h3 class="modal-title text-uppercase fw-bold text-success-emphasis text-center w-100"
                        id="myExtraLargeModalLabel">
                        <i class="ri-folder-add-line me-1"></i> Registrar Nueva Categoría
                    </h3>
                    <button type="button" class="btn-close position-absolute end-0 top-50 translate-middle-y me-3"
                        data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <!-- Cuerpo del modal -->
                <div class="modal-body">
                    <form action="" id="addForm" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id=""
                                        placeholder="Nombre de categoría">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="imagen" class="form-label">Imagen</label>
                                    <input class="form-control" type="file" id="" accept="image/*">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="nombre" class="form-label">Tipo</label>
                                    <input type="text" class="form-control" id="" placeholder="Escoger tipo">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="" rows="3" placeholder="Introducir descripción del producto"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn bg-danger" data-bs-dismiss="modal"
                                style="color: white;">Cerrar</button>
                            <button type="submit" class="btn bg-success" style="color: white;">Agregar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!--modal de editar-->
    <div class="modal fade bs-edit-modal-dialog modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
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
                    <form action="" id="addForm" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id=""
                                        placeholder="Nombre de categoría">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="imagen" class="form-label">Imagen</label>
                                    <input class="form-control" type="file" id="" accept="image/*">
                                </div>
                            </div>

                            <div class="row-mb-3">
                                <input class="form-control" type="file" id="" accept="image/*">
                                <div class="avatar-lg bg-light rounded p-1 mb-3">
                                    <img src="assets/images/products/img-3.png" alt="Producto" class="img-fluid d-block">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="nombre" class="form-label">Tipo</label>
                                    <input type="text" class="form-control" id=""
                                        placeholder="Escoger tipo">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="" rows="3" placeholder="Introducir descripción del producto"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn bg-danger" data-bs-dismiss="modal"
                                style="color: white;">Cerrar</button>
                            <button type="submit" class="btn bg-warning" style="color: white;">Editar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
