@extends('layouts.layout')
@section('contenido')

        <!--============================================= -->
    <section id="content" class="bg-secondary">
        <div class="content-wrap py-6">
            <div class="container">

                <div class="mx-auto bg-white rounded-4 shadow-lg p-4" id="tab-login-register" style="max-width: 520px;">

                    <ul class="nav canvas-alt-tabs2 tabs nav-pills nav-fill mb-5 border-bottom pb-3" id="canvas-tab-nav2"
                        role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active text-uppercase fw-semibold rounded-pill" id="tab-login-tab"
                                data-bs-toggle="pill" data-bs-target="#tab-login" type="button" role="tab"
                                aria-controls="tab-login" aria-selected="true"><i class="bi-box-arrow-in-right me-1"></i>
                                Iniciar Sesión</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-uppercase fw-semibold rounded-pill" id="tab-register-tab"
                                data-bs-toggle="pill" data-bs-target="#tab-register" type="button" role="tab"
                                aria-controls="tab-register" aria-selected="false"><i class="bi-person-plus me-1"></i>
                                Registrarse</button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-login" role="tabpanel"
                            aria-labelledby="canvas-tab-login-tab" tabindex="0">
                            <div class="card border-0 shadow-sm rounded-3 mb-4">
                                <div class="card-body px-4 py-5">
                                    <form id="login-form" name="login-form" class="mb-0" action="#" method="post">
                                        <h3 class="text-center mb-4 text-uppercase fw-bold fs-4">Bienvenido de nuevo
                                        </h3>

                                        <div class="mb-4">
                                            <label for="login-form-username" class="form-label fw-semibold">Usuario</label>
                                            <input type="text" id="login-form-username" name="login-form-username"
                                                class="form-control form-control-lg rounded-pill"
                                                placeholder="Ingresa tu usuario">
                                        </div>

                                        <div class="mb-4">
                                            <label for="login-form-password"
                                                class="form-label fw-semibold">Contraseña</label>
                                            <input type="password" id="login-form-password" name="login-form-password"
                                                class="form-control form-control-lg rounded-pill"
                                                placeholder="Ingresa tu contraseña">
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <a href="#" class="small text-muted">¿Olvidaste tu contraseña?</a>
                                        </div>

                                        {{-- <button class="button button-3d button-rounded button-dark w-100 py-2"
                                         id="login-form-submit" name="login-form-submit" value="login"><i
                                             class="bi-box-arrow-in-right me-1"></i>Ingresar
                                     </button> --}}
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab-register" role="tabpanel"
                            aria-labelledby="canvas-tab-register-tab" tabindex="0">
                            <div class="card border-0 shadow-sm rounded-3">
                                <div class="card-body px-4 py-5">
                                    <h3 class="text-center mb-4 text-uppercase fw-bold fs-4">Crear una nueva cuenta
                                    </h3>

                                    <form id="register-form" name="register-form" class="row mb-0" action="#"
                                        method="post">

                                        <div class="col-12 mb-4">
                                            <label for="register-form-name" class="form-label fw-semibold">Nombre
                                                completo</label>
                                            <input type="text" id="register-form-name" name="register-form-name"
                                                class="form-control form-control-lg rounded-pill"
                                                placeholder="Tu nombre completo">
                                        </div>

                                        <div class="col-12 mb-4">
                                            <label for="register-form-email" class="form-label fw-semibold">Correo
                                                electrónico</label>
                                            <input type="email" id="register-form-email" name="register-form-email"
                                                class="form-control form-control-lg rounded-pill"
                                                placeholder="correo@ejemplo.com">
                                        </div>

                                        <div class="col-12 mb-4">
                                            <label for="register-form-username" class="form-label fw-semibold">Nombre de
                                                usuario</label>
                                            <input type="text" id="register-form-username" name="register-form-username"
                                                class="form-control form-control-lg rounded-pill"
                                                placeholder="Elige un nombre de usuario">
                                        </div>

                                        <div class="col-12 mb-4">
                                            <label for="register-form-phone"
                                                class="form-label fw-semibold">Teléfono</label>
                                            <input type="text" id="register-form-phone" name="register-form-phone"
                                                class="form-control form-control-lg rounded-pill"
                                                placeholder="Ej: 76543210">
                                        </div>

                                        <div class="col-12 mb-4">
                                            <label for="register-form-password"
                                                class="form-label fw-semibold">Contraseña</label>
                                            <input type="password" id="register-form-password"
                                                name="register-form-password"
                                                class="form-control form-control-lg rounded-pill"
                                                placeholder="Elige una contraseña segura">
                                        </div>

                                        <div class="col-12 mb-4">
                                            <label for="register-form-repassword" class="form-label fw-semibold">Repite
                                                la contraseña</label>
                                            <input type="password" id="register-form-repassword"
                                                name="register-form-repassword"
                                                class="form-control form-control-lg rounded-pill"
                                                placeholder="Confirma tu contraseña">
                                        </div>

                                        {{-- <div class="col-12">
                                         <button class="button button-3d button-rounded button-dark w-100 py-2"
                                             id="register-form-submit" name="register-form-submit"
                                             value="register"><i class="bi-person-plus me-1"></i>Registrarse</button>
                                     </div> --}}
                                    </form>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <a href="{{ route('admin.dashboard') }}"
                                class="button button-3d button-rounded button-dark w-100 py-2">
                                <i class="bi-person-plus me-1"></i>Ingresar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- #content end -->
@endsection