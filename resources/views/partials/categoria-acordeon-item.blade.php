@props(['categoria', 'nivel' => 1])

<div class="accordion-item material-shadow">
    <h2 class="accordion-header" id="heading{{ $categoria->id }}_nivel{{ $nivel }}">
        <button class="accordion-button @if ($nivel > 1) collapsed @endif" type="button"
            data-bs-toggle="collapse" data-bs-target="#collapse{{ $categoria->id }}_nivel{{ $nivel }}"
            aria-expanded="{{ $nivel <= 1 ? 'true' : 'false' }}"
            aria-controls="collapse{{ $categoria->id }}_nivel{{ $nivel }}">
            {{ $categoria->nombre }}
            @if ($categoria->productos->count() > 0)
                <span class="badge bg-primary ms-2">{{ $categoria->productos->count() }} Prod.</span>
            @endif
        </button>
    </h2>
    <div id="collapse{{ $categoria->id }}_nivel{{ $nivel }}"
        class="accordion-collapse collapse @if ($nivel <= 1) show @endif"
        aria-labelledby="heading{{ $categoria->id }}_nivel{{ $nivel }}">
        <div class="accordion-body">
            {{-- Mostrar productos de esta categoría --}}
            @if ($categoria->productos->isNotEmpty())
                <div class="mt-3">
                    <h5>Productos</h5>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                        <?php $i = 0; ?>
                        @foreach ($categoria->productos as $producto)
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    @if ($producto->imagen_principal)
                                        <img src="{{ asset($producto->imagen_principal) }}" class="card-img-top"
                                            alt="{{ $producto->nombre }}" style="height: 120px; object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center"
                                            style="height: 120px;">
                                            <i class="fas fa-image fa-2x text-muted"></i>
                                        </div>
                                    @endif
                                    <div class="card-body d-flex flex-column p-2">
                                        <h6 class="card-title mb-1">{{ Str::limit($producto->nombre, 50) }}</h6>
                                        <p class="card-text small flex-grow-1 mb-2">
                                            {{ Str::limit($producto->descripcion, 80) }}</p>
                                        <p class="mb-1"><strong>Precio:</strong> Bs.
                                            {{ number_format($producto->precio, 2) }}</p>

                                        {{-- Mostrar Artículos del Producto --}}
                                        @if ($producto->articulos->isNotEmpty())
                                            <button
                                                class="btn btn-sm btn-outline-primary py-1 px-2 mt-auto align-self-start"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#articulosProducto{{ $producto->id }}_nivel{{ $nivel }}"
                                                aria-expanded="false"
                                                aria-controls="articulosProducto{{ $producto->id }}_nivel{{ $nivel }}">
                                                Ver Artículos ({{ $producto->articulos->count() }})
                                            </button>
                                            <div class="collapse mt-2"
                                                id="articulosProducto{{ $producto->id }}_nivel{{ $nivel }}">
                                                <div class="list-group list-group-flush">
                                                    @foreach ($producto->articulos as $articulo)
                                                        <div class="list-group-item px-2 py-1">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center mb-1">
                                                                <div class="small">
                                                                    <strong>{{ $articulo->codigo }}</strong> -
                                                                    {{ Str::limit($articulo->nombre, 40) }}
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="me-2 small">
                                                                    <strong>Precio:</strong> Bs.
                                                                    {{ number_format($articulo->precio, 2) }}
                                                                </div>
                                                                @if ($articulo->descuento_habilitado && $articulo->descuento_porcentaje > 0)
                                                                    <div class="small">
                                                                        <strong>Descuento:</strong>
                                                                        {{ $articulo->descuento_porcentaje }}%
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="d-flex align-items-center mt-1">
                                                                <label for="cantidad_{{ $articulo->id }}"
                                                                    class="form-label small me-2 mb-0">Cantidad:</label>
                                                                <div class="input-group input-group-sm"
                                                                    style="width: 120px;">
                                                                    <input type="number"
                                                                        id="cantidad_{{ $articulo->id }}"
                                                                        class="form-control form-control-sm cantidad-articulo"
                                                                        placeholder="0" min="0" value="0"
                                                                        data-articulo-id="{{ $articulo->id }}"
                                                                        name="articulos[{{ $i }}][cantidad]">

                                                                </div>
                                                                {{-- Campos ocultos para enviar otros datos del artículo --}}
                                                                <input type="hidden"
                                                                    name="articulos[{{ $i }}][codigo]"
                                                                    value="{{ $articulo->codigo }}">
                                                                <input type="hidden"
                                                                    name="articulos[{{ $i }}][precio]"
                                                                    value="{{ $articulo->precio }}">
                                                                <input type="hidden"
                                                                    name="articulos[{{ $i }}][descuento]"
                                                                    value="{{ $articulo->descuento_porcentaje ?? 0 }}">
                                                                <input type="hidden"
                                                                    name="articulos[{{ $i }}][nombre]"
                                                                    value="{{ $articulo->nombre }}">
                                                                <input type="hidden"
                                                                    name="articulos[{{ $i }}][articulo_id]"
                                                                    value="{{ $articulo->id }}">
                                                                <input type="hidden"
                                                                    name="articulos[{{ $i }}][producto_id]"
                                                                    value="{{ $producto->id }}">
                                                            </div>
                                                        </div>
                                                        <?php $i++; ?>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <small class="text-muted">No hay artículos.</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if ($categoria->categorias_hijos->isNotEmpty())
                @if ($categoria->productos->isNotEmpty())
                    <hr class="my-3">
                @endif
                <h5>Subcategorías</h5>
                <div class="accordion custom-accordionwithicon accordion-border-box mt-2 nesting-accordion-nivel-{{ $nivel + 1 }}"
                    id="accordionHijos{{ $categoria->id }}_nivel{{ $nivel }}">
                    @foreach ($categoria->categorias_hijos as $hijo)
                        @include('partials.categoria-acordeon-item', [
                            'categoria' => $hijo,
                            'nivel' => $nivel + 1,
                        ])
                    @endforeach
                </div>
                <script>
                    document.getElementById('collapse{{ $categoria->id }}_nivel{{ $nivel }}').setAttribute('data-bs-parent',
                        '#accordionHijos{{ $categoria->id }}_nivel{{ $nivel }}');
                </script>
            @elseif($categoria->productos->isEmpty())
                <p class="text-muted mt-2 mb-0"><em>Esta categoría está vacía.</em></p>
            @endif
        </div>
    </div>
</div>
