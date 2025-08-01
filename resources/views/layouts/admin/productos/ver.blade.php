@extends('layouts.admin-layout')
@section('contenido')
    <div class="row">
        <div class="col-xl-12">
            <div class="row align-items-center gy-3">
                <div class="col-md-4 text-start">
                    <h5 class="fs-14 mb-0">Categoría: Ropa</h5>
                </div>

                <div class="col-md-4 text-center">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl">
                        Registrar Producto
                    </button>
                </div>

                <div class="col-md-4 text-end">
                    <div class="card d-inline-block">
                        <div class="card-header border-bottom-dashed p-3">
                            <div class="text-center mb-2">
                                <h4 class="mb-0">Buscar por código</h4>
                            </div>
                            <div class="hstack gap-2">
                                <input class="form-control" type="text" placeholder="Introducir código"
                                    aria-label="Add Promo Code here...">
                                <button type="button" class="btn btn-success w-xs">Buscar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="row">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-justified nav-border-top nav-border-top-success mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#nav-border-justified-home" role="tab"
                            aria-selected="false">
                            0 - 3 meses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#nav-border-justified-profile" role="tab"
                            aria-selected="false">
                            <i class="ri-user-line me-1 align-middle"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#nav-border-justified-messages" role="tab"
                            aria-selected="false">
                            <i class="ri-question-answer-line align-middle me-1"></i>Messages
                        </a>
                    </li>
                </ul>
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="nav-border-justified-home" role="tabpanel">
                        <div class="col-xl-4">
                            <div class="card product">
                                <div class="card-body">
                                    <div class="row gy-3 align-items-start">

                                        <!-- Imagen del producto -->
                                        <div class="col-sm-auto">
                                            <div class="avatar-lg bg-light rounded p-1">
                                                <img src="assets/images/products/img-8.png" alt="Producto"
                                                    class="img-fluid d-block">
                                            </div>
                                        </div>

                                        <div class="col-sm">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="fs-16 text-truncate mb-2">Nombre del Producto</h5>
                                                <div class="text-end">
                                                    <p class="text-muted mb-1">CÓDIGO:</p>
                                                    <h6 id="ticket_price" class="product-price fw-semibold">M-45</h6>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center gap-2 text-muted mb-1">
                                                <span class="fw-semibold">Precio:</span>
                                                <span>Bs. <span class="product-line-price">20.00</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="row align-items-center gy-3">
                                        <div class="col-sm">
                                            <a href="#" class="text-body" data-bs-toggle="modal"
                                                data-bs-target="#removeItemModal">
                                                <i class="ri-delete-bin-fill text-muted align-bottom me-1"></i>
                                                Stock: 56
                                            </a>
                                        </div>
                                        <div class="col-sm-auto">
                                            <a href="#" class="btn btn-primary btn-icon waves-effect waves-light"
                                                title="Ir a detalles del producto">
                                                <i data-feather="eye"></i>
                                            </a>

                                            <!--Editar-->
                                            <a href="#" class="btn btn-warning btn-icon waves-effect waves-light"
                                                title="Ir a detalles del producto" data-bs-toggle="modal"
                                                data-bs-target=".bs-edit-modal-xl">
                                                <i data-feather="edit-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="nav-border-justified-profile" role="tabpanel">
                        <h6>Use a color palette</h6>
                        <p class="mb-0">
                            Opposites attract, and that’s a fact. It’s in our nature to be interested in the unusual, and
                            that’s why using contrasting colors in <a href="javascript:void(0);"
                                class="text-decoration-underline"><b>Graphic Design</b></a> is a must. It’s eye-catching, it
                            makes a statement, it’s impressive graphic design. Increase or decrease the letter spacing
                            depending on the situation and try, try again until it looks right, and each letter has the
                            perfect spot of its own.
                        </p>
                    </div>
                    <div class="tab-pane" id="nav-border-justified-messages" role="tabpanel">
                        <h6>Message</h6>
                        <p class="mb-0">
                            Consistency is the one thing that can take all of the different elements in your design, and tie
                            them all together and make them work. In an awareness campaign, it is vital for people to begin
                            put 2 and 2 together and begin to recognize your cause. Consistency piques people’s interest is
                            that it has become more and more popular over the years, which is excellent news to the beginner
                            and advanced <a href="javascript:void(0);" class="text-decoration-underline"><b>Contact
                                    Designer</b></a>.
                        </p>
                    </div>
                </div>
            </div><!-- end card-body -->
        </div>
    </div>

    <!--modal de registrar-->
        <div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog"
            aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">

                <div class="modal-header bg-soft-success justify-content-center position-relative">
                    <h3 class="modal-title text-uppercase fw-bold text-success-emphasis text-center w-100" id="myExtraLargeModalLabel">
                        <i class="ri-folder-add-line me-1"></i> Registrar Nuevo Producto
                    </h3>
                    <button type="button" class="btn-close position-absolute end-0 top-50 translate-middle-y me-3" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <form action="" id="addForm" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="codigo" class="form-label">Código</label>
                                    <input type="text" class="form-control" id="" placeholder="M-##">
                                </div>

                                <div class="col-md-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="" placeholder="Nombre del producto">
                                </div>

                                <div class="col-md-3">
                                    <label for="" class="form-label">Elegir tipo</label>
                                     <select class="form-select mb-3" aria-label="Default select example">
                                        <option selected>Tipos o tamaños</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="" class="form-label">Stock</label>
                                    <input type="number" class="form-control" id="" placeholder="introducir stock" step="0.01" min="0">
                                </div>
                            </div>

                            <div class="row mb-3">
                            
                                <div class="col-md-3">
                                    <label for="precio" class="form-label">Precio</label>
                                    <input type="number" class="form-control" id="" placeholder="introducir precio" step="0.01" min="0">
                                </div>
                                
                                <div class="col-md-9">
                                    <label for="descripcion" class="form-label">Descripción</label>
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
                                                <!-- This is used as the file preview template -->
                                                <div class="border rounded">
                                                    <div class="d-flex p-2">
                                                        <div class="flex-shrink-0 me-3">
                                                            <div class="avatar-sm bg-light rounded">
                                                                <img data-dz-thumbnail class="img-fluid rounded d-block" src="assets/images/new-document.png" alt="Dropzone-Image" />
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div class="pt-1">
                                                                <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                                <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                                <strong class="error text-danger" data-dz-errormessage></strong>
                                                            </div>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-3">
                                                            <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col md-3 ms-auto">
                                    <div class="form-check form-switch form-switch-dark">
                                        <label class="form-check-label" for="SwitchCheck7">Caracterísitcas</label>
                                        <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck7" checked>
                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <div class="col-xl-4">
                                            <label for="descripcion" class="form-label">Colores</label>
                                            <div class="form-check form-check-primary mb-3">
                                                <input class="form-check-input" type="checkbox" id="formCheck7">
                                                <label class="form-check-label text-primary" for="formCheck7">
                                                    Azul
                                                </label>
                                            </div>

                                            <div class="form-check form-check-danger mb-3">
                                                <input class="form-check-input" type="checkbox" id="formCheck7">
                                                <label class="form-check-label text-danger" for="formCheck7">
                                                    Rojo
                                                </label>
                                            </div>

                                            <div class="form-check form-check-warning mb-3">
                                                <input class="form-check-input" type="checkbox" id="formCheck7">
                                                <label class="form-check-label text-warning" for="formCheck7">
                                                    Amarillo
                                                </label>
                                            </div>

                                            <div class="form-check form-check-success mb-3">
                                                <input class="form-check-input" type="checkbox" id="formCheck7">
                                                <label class="form-check-label text-success" for="formCheck7">
                                                    Verde
                                                </label>
                                            </div>

                                            <div class="form-check form-check-info mb-3">
                                                <input class="form-check-input" type="checkbox" id="formCheck7">
                                                <label class="form-check-label text-info" for="formCheck7">
                                                    Celeste
                                                </label>
                                            </div>

                                            <div class="form-check form-check-outline form-check-dark mb-3">
                                                <input class="form-check-input" type="checkbox" id="formCheck19">
                                                <label class="form-check-label" for="formCheck19">
                                                    Blanco
                                                </label>
                                            </div>

                                            <div class="form-check form-check-dark mb-3">
                                                <input class="form-check-input" type="checkbox" id="formCheck7">
                                                <label class="form-check-label text-dark" for="formCheck7">
                                                    Negro
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-8">
                                            <label for="descripcion" class="form-label text-center">Tallas</label>
                                            <div class="row mb-2">
                                                <div class="col-xl-6">
                                                    <div class="form-check form-check-outline form-check-dark mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck19">
                                                        <label class="form-check-label" for="formCheck19">
                                                            0-3 meses
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-outline form-check-dark mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck19">
                                                        <label class="form-check-label" for="formCheck19">
                                                            3-6 meses
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-outline form-check-dark mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck19">
                                                        <label class="form-check-label" for="formCheck19">
                                                            6-9 meses
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6">
                                                    <div class="form-check form-check-outline form-check-dark mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck19">
                                                        <label class="form-check-label" for="formCheck19">
                                                            Talla 1
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-outline form-check-dark mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck19">
                                                        <label class="form-check-label" for="formCheck19">
                                                            Talla 2
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-outline form-check-dark mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck19">
                                                        <label class="form-check-label" for="formCheck19">
                                                            Talla 3
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-outline form-check-dark mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck19">
                                                        <label class="form-check-label" for="formCheck19">
                                                            Talla 4
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-outline form-check-dark mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck19">
                                                        <label class="form-check-label" for="formCheck19">
                                                            Talla 5
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="col md-3">
                                    <label for="descripcion" class="form-label">Calidad</label>
                                    <button type="button" class="btn btn-soft-success btn-sm material-shadow-none">
                                        Agregar
                                    </button>
                                    <div class="row mb-3">
                                        <div class="col-xl-4">
                                            <input type="text" class="form-control" id="" placeholder="Título" step="0.01" min="0">
                                        </div>
                                        <div class="col-xl-8">
                                            <input type="text" class="form-control" id="" placeholder="Descripción" step="0.01" min="0">
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>

                        <div class="modal-footer mt-3">
                            <button type="button" class="btn bg-danger" data-bs-dismiss="modal" style="color: white;">Cerrar</button>
                            <button type="submit" class="btn bg-success addBtn" style="color: white;">Agregar Producto</button>
                        </div>                                    
                    </form>
                </div>

                </div>
            </div>
        </div>

        <!--modal de editar-->
        <div class="modal fade bs-edit-modal-xl" tabindex="-1" role="dialog"
            aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">

                <div class="modal-header bg-soft-success justify-content-center position-relative">
                    <h3 class="modal-title text-uppercase fw-bold text-success-emphasis text-center w-100" id="myExtraLargeModalLabel">
                        <i class="ri-folder-add-line me-1"></i> Registrar Nuevo Producto
                    </h3>
                    <button type="button" class="btn-close position-absolute end-0 top-50 translate-middle-y me-3" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <form action="" id="addForm" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="codigo" class="form-label">Código</label>
                                    <input type="text" class="form-control" id="" placeholder="M-##">
                                </div>

                                <div class="col-md-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="" placeholder="Nombre del producto">
                                </div>

                                <div class="col-md-3">
                                    <label for="" class="form-label">Elegir tipo</label>
                                     <select class="form-select mb-3" aria-label="Default select example">
                                        <option selected>Tipos o tamaños</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="" class="form-label">Stock</label>
                                    <input type="number" class="form-control" id="" placeholder="introducir stock" step="0.01" min="0">
                                </div>
                            </div>

                            <div class="row mb-3">
                            
                                <div class="col-md-3">
                                    <label for="precio" class="form-label">Precio</label>
                                    <input type="number" class="form-control" id="" placeholder="introducir precio" step="0.01" min="0">
                                </div>
                                
                                <div class="col-md-9">
                                    <label for="descripcion" class="form-label">Descripción</label>
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
                                                <!-- This is used as the file preview template -->
                                                <div class="border rounded">
                                                    <div class="d-flex p-2">
                                                        <div class="flex-shrink-0 me-3">
                                                            <div class="avatar-sm bg-light rounded">
                                                                <img data-dz-thumbnail class="img-fluid rounded d-block" src="assets/images/new-document.png" alt="Dropzone-Image" />
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div class="pt-1">
                                                                <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                                <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                                <strong class="error text-danger" data-dz-errormessage></strong>
                                                            </div>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-3">
                                                            <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col md-3 ms-auto">
                                    <div class="form-check form-switch form-switch-dark">
                                        <label class="form-check-label" for="SwitchCheck7">Caracterísitcas</label>
                                        <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck7" checked>
                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <div class="col-xl-4">
                                            <label for="descripcion" class="form-label">Colores</label>
                                            <div class="form-check form-check-primary mb-3">
                                                <input class="form-check-input" type="checkbox" id="formCheck7">
                                                <label class="form-check-label text-primary" for="formCheck7">
                                                    Azul
                                                </label>
                                            </div>

                                            <div class="form-check form-check-danger mb-3">
                                                <input class="form-check-input" type="checkbox" id="formCheck7">
                                                <label class="form-check-label text-danger" for="formCheck7">
                                                    Rojo
                                                </label>
                                            </div>

                                            <div class="form-check form-check-warning mb-3">
                                                <input class="form-check-input" type="checkbox" id="formCheck7">
                                                <label class="form-check-label text-warning" for="formCheck7">
                                                    Amarillo
                                                </label>
                                            </div>

                                            <div class="form-check form-check-success mb-3">
                                                <input class="form-check-input" type="checkbox" id="formCheck7">
                                                <label class="form-check-label text-success" for="formCheck7">
                                                    Verde
                                                </label>
                                            </div>

                                            <div class="form-check form-check-info mb-3">
                                                <input class="form-check-input" type="checkbox" id="formCheck7">
                                                <label class="form-check-label text-info" for="formCheck7">
                                                    Celeste
                                                </label>
                                            </div>

                                            <div class="form-check form-check-outline form-check-dark mb-3">
                                                <input class="form-check-input" type="checkbox" id="formCheck19">
                                                <label class="form-check-label" for="formCheck19">
                                                    Blanco
                                                </label>
                                            </div>

                                            <div class="form-check form-check-dark mb-3">
                                                <input class="form-check-input" type="checkbox" id="formCheck7">
                                                <label class="form-check-label text-dark" for="formCheck7">
                                                    Negro
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-8">
                                            <label for="descripcion" class="form-label text-center">Tallas</label>
                                            <div class="row mb-2">
                                                <div class="col-xl-6">
                                                    <div class="form-check form-check-outline form-check-dark mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck19">
                                                        <label class="form-check-label" for="formCheck19">
                                                            0-3 meses
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-outline form-check-dark mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck19">
                                                        <label class="form-check-label" for="formCheck19">
                                                            3-6 meses
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-outline form-check-dark mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck19">
                                                        <label class="form-check-label" for="formCheck19">
                                                            6-9 meses
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6">
                                                    <div class="form-check form-check-outline form-check-dark mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck19">
                                                        <label class="form-check-label" for="formCheck19">
                                                            Talla 1
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-outline form-check-dark mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck19">
                                                        <label class="form-check-label" for="formCheck19">
                                                            Talla 2
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-outline form-check-dark mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck19">
                                                        <label class="form-check-label" for="formCheck19">
                                                            Talla 3
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-outline form-check-dark mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck19">
                                                        <label class="form-check-label" for="formCheck19">
                                                            Talla 4
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-outline form-check-dark mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck19">
                                                        <label class="form-check-label" for="formCheck19">
                                                            Talla 5
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="col md-3">
                                    <label for="descripcion" class="form-label">Calidad</label>
                                    <button type="button" class="btn btn-soft-success btn-sm material-shadow-none">
                                        Agregar
                                    </button>
                                    <div class="row mb-3">
                                        <div class="col-xl-4">
                                            <input type="text" class="form-control" id="" placeholder="Título" step="0.01" min="0">
                                        </div>
                                        <div class="col-xl-8">
                                            <input type="text" class="form-control" id="" placeholder="Descripción" step="0.01" min="0">
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>

                        <div class="modal-footer mt-3">
                            <button type="button" class="btn bg-danger" data-bs-dismiss="modal" style="color: white;">Cerrar</button>
                            <button type="submit" class="btn bg-success addBtn" style="color: white;">Agregar Producto</button>
                        </div>                                    
                    </form>
                </div>

                </div>
            </div>
        </div>
@endsection
