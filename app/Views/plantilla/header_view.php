<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>
    <link rel="icon" href="<?= base_url('favicon.ico') ?>" type="image/x-icon">

    <!-- Enlaces a CSS3 -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/reset.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/styles.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/aos.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/swiper-bundle.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/drift-basic.min.css') ?>">

    


    <!-- Enlaces a JavaScript -->
    <script defer src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script defer src="<?= base_url('assets/js/aos.js') ?>"></script>
    <script defer src="<?= base_url('assets/js/swiper-bundle.min.js') ?>"></script>
    <script defer src="<?= base_url('assets/js/Drift.min.js') ?>"></script>
    <script defer src="<?= base_url('assets/js/inicializar-complementos.js') ?>"></script>

</head>

<body class="p-sm-0 d-flex flex-column min-vh-100 bg-dark text-white">
    <header class="container-fluid d-flex align-items-center bg-dark-2">
        <div class="container d-flex align-items-center">
            <img class="img-fluid logo" src="<?= base_url('./assets/img/logoempresa.png') ?>" />


            <div class="ms-auto d-flex align-items-center">
                <a href="<?= base_url('ver_carrito') ?>">
                    <img class="carrito" src="<?= base_url('assets/img/carrito.png') ?>" alt="Carrito" />
                </a>


                    <!-- Icono de búsqueda -->
                <button class="btn btn-outline-primary ms-3" id="searchIcon">
                    <i class="fas fa-search"></i>
                </button>

                <!-- Barra de búsqueda oculta por defecto -->
                <form class="d-flex ms-3" id="searchForm" action="<?= base_url('buscar') ?>" method="GET" style="display: none;">
                    <input class="form-control me-2" type="search" name="query" placeholder="Buscar..." aria-label="Buscar" required>
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>


                <?php if(session('login')) : ?>
                    <a href="<?= base_url('mi_perfil') ?>" class="text-white text-decoration-none contenedor-perfil">
                        <div class="btn btn-dark rounded rounded-start-pill position-relative c-perfil" style="padding-left: 43px;">
                            <img class="perfil-img rounded-circle position-absolute" 
                                src="
                                    <?= empty(session('imagen')) 
                                    ? base_url('./assets/img/perfiles/perfil_default.jpg') 
                                    : base_url('./assets/img/perfiles/') . session('imagen') ?>
                                " 
                                width="43" height="43"
                                style="object-fit: cover; left: -5px; bottom: -3px;"
                            />
                            <div>
                                <?= session('usuario') ?> 
                            </div>
                        </div>
                    </a>
                    <a type="button" href="<?= base_url('logout') ?>" class="btn btn-dark ms-3 border-primary">
                        Salir
                    </a>
                <?php else: ?>
                    <button type="button" class="btn btn-dark ms-3 border-primary" data-bs-toggle="modal" data-bs-target="#modalRegistro">
                        Registrarse
                    </button>
                    <button type="button" class="btn btn-dark border border-secondary bg-gradient ms-2" data-bs-toggle="modal" data-bs-target="#modalIngreso">
                        Ingresar
                    </button>
                <?php endif ?>

                

            </div>
        </div>
    </header>



    <!-- Modal Registro -->
    <div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="registroLabel" aria-hidden="true" data-bs-theme="dark">
        <div class="modal-dialog mi-modal inter">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registroLabel">Crear cuenta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <?php if (!empty($mensaje_registro)) : ?>
                        <div class="alert alert-success mt-2" role="alert">
                            <?= esc($mensaje_registro) ?>
                        </div>
                    <?php endif ?>

                    <?php if (!empty($validation_registro)) : ?>
                        <div class="alert alert-danger mt-2" role="alert">
                            <ul>
                                <?php foreach($validation_registro as $error) : ?>
                                    <li>
                                        <?= esc($error) ?>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif ?>

                    <form action="registro_usuario" method="post" id="formRegistro">
                        <div class="col-12">
                            <div style="font-size: 16px ;letter-spacing: 0.2rem;">
                                DATOS DE USUARIO (Requerido)
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="usuario" class="form-label formulario">Nombre de Usuario</label>
                                    <input name="usuario" type="text" class="form-control" id="usuario" value="<?= old('usuario') ?>" autocomplete="off" required>
                                </div>
                                <div class="mb-3 col">
                                    <label for="email" class="form-label formulario">Email</label>
                                    <input name="email" type="email" class="form-control" id="email" value="<?= old('email') ?>" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="contrasena" class="form-label formulario">Contraseña</label>
                                    <input name="contrasena" type="password" class="form-control" id="contrasena" autocomplete="off" required>
                                </div>
                                <div class="mb-3 col">
                                    <label for="repetir-contrasena" class="form-label formulario">Repetir contraseña</label>
                                    <input name="repetir-contrasena" type="password" class="form-control" id="repetir-contrasena" autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div style="font-size: 16px ;letter-spacing: 0.2rem;">
                                DATOS DE ENVIO (Opcional)
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="nombre" class="form-label formulario">Nombre</label>
                                    <input name="nombre" type="text" class="form-control" id="nombre" value="<?= old('nombre') ?>" autocomplete="off">
                                </div>
                                <div class="mb-3 col">
                                    <label for="apellido" class="form-label formulario">Apellido</label>
                                    <input name="apellido" type="text" class="form-control" id="apellido" value="<?= old('apellido') ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="dni" class="form-label formulario">DNI</label>
                                    <input name="dni" type="number" class="form-control" id="dni" value="<?= old('dni') ?>" autocomplete="off">
                                </div>
                                <div class="mb-3 col">
                                    <label for="fecha" class="form-label formulario">Fecha de Nacimiento</label>
                                    <input name="fecha" type="date" class="form-control" id="fecha" value="<?= old('fecha') ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="direccion" class="form-label formulario">Dirección</label>
                                    <input name="direccion" type="text" class="form-control" id="direccion" value="<?= old('direccion') ?>" autocomplete="off">
                                </div>
                                <div class="mb-3 col">
                                    <label for="provincia" class="form-label formulario">Provincia/Estado</label>
                                    <input name="provincia" type="text" class="form-control" id="provincia" value="<?= old('provincia') ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="pais" class="form-label formulario">País</label>
                                    <input name="pais" type="text" class="form-control" id="pais" value="<?= old('pais') ?>">
                                </div>
                                <div class="mb-3 col">
                                    <label for="codigopostal" class="form-label formulario">Código Postal</label>
                                    <input name="codigopostal" type="number" class="form-control" id="codigopostal" value="<?= old('codigopostal') ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="mb-3 col">
                                <input type="checkbox" class="" id="terminosRegistro" autocomplete="off" required>
                                <label for="terminosRegistro" class="form-label formulario" style="margin-left:5px; margin-top: 10px;font-size: 17px !important">
                                    Aceptar <a href="<?= base_url('terminos') ?>">Términos y Condiciones de Uso.</a>
                                </label>
                            </div>
                            <div class="mb-3 col">
                                <input type="checkbox" class="" id="newsRegistro" name="newsRegistro" <?= old('newsRegistro') ? 'checked' : '' ?> autocomplete="off">
                                <label for="newsRegistro" class="form-label formulario" style="margin-left:5px;font-size: 17px !important">
                                    Suscribete a nuestro newsletter para recibir las mejores ofertas.
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ingreso -->
    <div class="modal fade" id="modalIngreso" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true"  data-bs-theme="dark">
        <div class="modal-dialog inter">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginLabel">Ingresar cuenta registrada</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <?php if (session()->has('mensaje_login')) : ?>
                        <div class="alert alert-danger mt-2" role="alert">
                            <?= esc(session('mensaje_login')) ?>
                        </div>
                    <?php endif ?>

                    <?php if (!empty($validation_login)) : ?>
                        <div class="alert alert-danger mt-2" role="alert">
                            <ul>
                                <?php foreach($validation_login as $error) : ?>
                                    <li>
                                        <?= esc($error) ?>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif ?>

                    <form id="formLogin" action="login_usuario" method="POST">
                        <div class="mb-3">
                            <label for="login_email" class="form-label">Email</label>
                            <input value="<?= old('login_email') ?>" name="login_email" type="email" class="form-control" id="login_email" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="login_contrasena" class="form-label">Contraseña</label>
                            <input name="login_contrasena" type="password" class="form-control" id="login_contrasena" autocomplete="off" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <?php if (!empty($mensaje_registro) || !empty($validation)) : ?>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var modal = new bootstrap.Modal(document.getElementById('modalRegistro'));
                modal.show();
            });
        </script>
    <?php endif; ?>

    <?php if (session()->has('mensaje_login')) : ?>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var modal = new bootstrap.Modal(document.getElementById('modalIngreso'));
                modal.show();
            });
        </script>
    <?php endif; ?>

    <script>
        document.getElementById('searchIcon').addEventListener('click', function() {
            var searchForm = document.getElementById('searchForm');
            var searchIcon = document.getElementById('searchIcon');
            
            // Alterna la visibilidad de la barra de búsqueda
            searchForm.classList.toggle('show');
            
            // Alterna la visibilidad del icono de búsqueda
            if (searchForm.classList.contains('show')) {
                // Cuando la barra de búsqueda se despliega, ocultamos el icono
                searchIcon.style.display = 'none';
            } else {
                // Cuando la barra de búsqueda se oculta, mostramos el icono nuevamente
                searchIcon.style.display = 'block';
            }
        });
    </script>


<!--
</body>
</html>
-->