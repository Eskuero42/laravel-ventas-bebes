@foreach ($categorias as $subcategoria)
    <div class="ms-4 mt-3">
        <h6 class="fw-bold text-primary">{{ $subcategoria->nombre }}</h6>

        @if ($subcategoria->productos->count())
            <div class="table-responsive mb-3">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategoria->productos as $producto)
                            <tr>
                                <td>{{ $producto->codigo }}</td>
                                <td>
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="avatar-sm bg-light rounded p-1 d-flex align-items-center justify-content-center">
                                                @if (!empty($producto->imagen_principal) && file_exists(public_path($producto->imagen_principal)))
                                                    <img src="{{ asset($producto->imagen_principal) }}"
                                                        alt="{{ $producto->nombre }}" class="img-fluid rounded"
                                                        style="width: 50px; height: 50px; object-fit: cover;">
                                                @else
                                                    <img src="{{ asset('imagenes/default.png') }}" alt="Sin imagen"
                                                        class="img-fluid rounded"
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
                                        class="btn btn-warning btn-icon waves-effect waves-light editarProductoBtn"
                                        data-id="{{ $producto->id }}" data-nombre="{{ $producto->nombre }}"
                                        data-codigo="{{ $producto->codigo }}" data-precio="{{ $producto->precio }}"
                                        data-descripcion="{{ $producto->descripcion }}"
                                        data-imagen="{{ $producto->imagen_principal }}"
                                        data-categoria_id="{{ $producto->categoria_id }}" data-bs-toggle="modal"
                                        data-bs-target=".bs-edit-modal-xl" title="Editar producto">
                                        <i data-feather="edit-2"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        @if ($subcategoria->categorias_hijosRecursive->count())
            @include('layouts.admin.productos._subcategorias', [
                'categorias' => $subcategoria->categorias_hijosRecursive,
            ])
        @endif
    </div>
@endforeach

