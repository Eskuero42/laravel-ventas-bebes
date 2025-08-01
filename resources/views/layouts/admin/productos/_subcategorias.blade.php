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
                                            <img src="assets/images/adminBebBus/iconos/mono.png" alt=""
                                                class="avatar-xs rounded-circle" />
                                        </div>
                                        <div class="flex-grow-1">
                                            {{ $producto->nombre }}
                                        </div>
                                    </div>
                                </td>
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

        {{-- Llamada recursiva si hay más subcategorías --}}
        @if ($subcategoria->categorias_hijosRecursive->count())
            @include('layouts.admin.productos._subcategorias', [
                'categorias' => $subcategoria->categorias_hijosRecursive,
            ])
        @endif
    </div>
@endforeach
