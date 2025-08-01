@extends('layouts.admin-layout')
@section('contenido')
    @php
        \Carbon\Carbon::setLocale('es');
    @endphp
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="listjs-table" id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>

                                    <button type="button" class="btn btn-info add-btn" data-bs-toggle="modal"
                                        data-bs-target=".registrar_compra">
                                        <i class="ri-add-line align-bottom me-1"></i>
                                        Registrar compra
                                    </button>

                                    <div class="modal fade registrar_compra" tabindex="-1" role="dialog"
                                        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">

                                                <div
                                                    class="modal-header bg-soft-info justify-content-center position-relative">
                                                    <h3 class="modal-title text-uppercase fw-bold text-info-emphasis text-center w-100"
                                                        id="myExtraLargeModalLabel">
                                                        <i class="ri-folder-add-line me-1"></i> Registrar Nueva Compra
                                                    </h3>
                                                    <button type="button"
                                                        class="btn-close position-absolute end-0 top-50 translate-middle-y me-3"
                                                        data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form id="addFormArticulo">
                                                        @csrf
                                                        <div class="row g-3">
                                                            <div class="row mb-3">
                                                                <div class="col-md-3">
                                                                    <label for="codigo" class="form-label">Código</label>
                                                                    <input type="text" name="codigo"
                                                                        class="form-control" placeholder="M-##">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="fecha_compra"
                                                                        class="form-label">Fecha</label>
                                                                    <input type="date" name="fecha_compra"
                                                                        class="form-control"
                                                                        placeholder="Fecha de la compra">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label for="precio" class="form-label">Precio</label>
                                                                    <input type="number" name="precio"
                                                                        class="form-control"
                                                                        placeholder="Precio del producto" step="0.01"
                                                                        min="0">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label for="descuento"
                                                                        class="form-label">Descuento</label>
                                                                    <input type="number" name="descuento"
                                                                        class="form-control" placeholder="¿Hay descuento?"
                                                                        step="0.01" min="0">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label for="descuento"
                                                                        class="form-label">Cantidad</label>
                                                                    <input type="number" name="cantidad"
                                                                        class="form-control" placeholder="cantidad"
                                                                        step="0.01" min="0">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-xxl-12">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="live-preview">
                                                                            {{-- Acordeón principal para las categorías de nivel superior --}}
                                                                            @if ($categorias->isNotEmpty())
                                                                                <div class="accordion custom-accordionwithicon accordion-border-box"
                                                                                    id="accordionCategoriasRaiz">
                                                                                    {{-- Iterar sobre las categorías de primer nivel --}}
                                                                                    @foreach ($categorias as $categoria_raiz)
                                                                                        {{-- Incluir el componente parcial para cada categoría raíz --}}
                                                                                        @include(
                                                                                            'partials.categoria-acordeon-item',
                                                                                            [
                                                                                                'categoria' => $categoria_raiz,
                                                                                                'nivel' => 1,
                                                                                            ]
                                                                                        )
                                                                                    @endforeach
                                                                                </div>
                                                                            @else
                                                                                <p>No se encontraron categorías
                                                                                    principales.</p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Opcional: Script para manejar data-bs-parent dinámicamente si el de inline no funciona perfecto --}}
                                                        <script>
                                                            // Este script puede ayudar a asegurar que data-bs-parent se aplique correctamente
                                                            // después de que se rendericen los elementos.
                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                const accordions = document.querySelectorAll(
                                                                    '.accordion-body > .accordion'); // Encuentra acordeones hijos directos
                                                                accordions.forEach(function(accordionHijos) {
                                                                    const accordionBody = accordionHijos.parentElement; // El .accordion-body que lo contiene
                                                                    const collapseDiv = accordionBody.parentElement.querySelector(
                                                                        '.accordion-collapse'); // El div .accordion-collapse del padre
                                                                    if (collapseDiv && accordionHijos.id) {
                                                                        collapseDiv.setAttribute('data-bs-parent', '#' + accordionHijos.id);
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                </div>

                                                <div class="modal-footer mt-3">
                                                    <button type="button" class="btn bg-danger" data-bs-dismiss="modal"
                                                        style="color: white;">Cerrar</button>
                                                    <button type="submit" class="btn btn-info addBtn">Agregar
                                                        Producto</button>
                                                </div>

                                                </form>

                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control search" placeholder="Search...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="customerTable">
                                <thead class="table-light">
                                    <tr>
                                        <th class="sort" data-sort="customer_name">Código</th>
                                        <th class="sort" data-sort="email">Fecha</th>
                                        <th class="sort" data-sort="phone">Precio</th>
                                        <th class="sort" data-sort="status">Descuento</th>
                                        <th class="sort" data-sort="action">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @foreach ($compras as $compra)
                                        <tr>
                                            <td class="customer_name">{{ $compra->codigo }}</td>
                                            <td class="email">
                                                {{ \Carbon\Carbon::parse($compra->fecha_compra)->translatedFormat('d \d\e F \d\e Y') }}
                                            </td>
                                            <td class="phone">Bs. {{ $compra->precio_total }}</td>
                                            <td class="email">Bs. {{ $compra->descuento }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <div class="edit">

                                                        <button class="btn btn-sm btn-success verCompraBtn"
                                                            data-bs-target=".bs-ver-modal-xl"{{ $compra->id }}"
                                                            data-bs-toggle="modal">
                                                            Ver detalles
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="noresult" style="display: none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                        colors="primary:#121331,secondary:#08a88a"
                                        style="width:75px;height:75px"></lord-icon>
                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                    <p class="text-muted mb-0">We've searched more than 150+ Orders We
                                        did not find any orders for you search.</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <div class="pagination-wrap hstack gap-2">
                                <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                                    Previous
                                </a>
                                <ul class="pagination listjs-pagination mb-0"></ul>
                                <a class="page-item pagination-next" href="javascript:void(0);">
                                    Next
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>




    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {

            $('#addFormArticulo').submit(function(e) {
                e.preventDefault();
                $('.addBtn').prop('disabled', true);

                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.compras.registrar') }}",
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

        });
    </script>
@endpush
