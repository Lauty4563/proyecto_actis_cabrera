<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Enlaces a CSS3 -->
    <link rel="stylesheet" type="text/css" href="./assets/css/reset.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/drift-basic.min.css">


    <!-- Enlaces a JavaScript -->
    <script defer src="./assets/js/bootstrap.bundle.min.js"></script>
    <script defer src="./assets/js/aos.js"></script>
    <script defer src="./assets/js/swiper-bundle.min.js"></script>
    <script defer src="./assets/js/Drift.min.js"></script>
    <script defer src="./assets/js/inicializar-complementos.js"></script>
</head>

<body class="p-sm-0 d-flex flex-column min-vh-100 bg-dark text-white">
    <header class="container-fluid d-flex align-items-center bg-dark-2">
        <div class="container d-flex align-items-center">
            <img class="img-fluid logo" src="./assets/img/logoempresa.png" />

            <div class="ms-auto d-flex align-items-center">
                <img class="carrito" src="./assets/img/carrito.png" />

                    <!-- Icono de búsqueda -->
                <button class="btn btn-outline-primary ms-3" id="searchIcon">
                    <i class="fas fa-search"></i>
                </button>

                <!-- Barra de búsqueda oculta por defecto -->
                <form class="d-flex ms-3" id="searchForm" action="#" method="GET"  onsubmit="return false;" style="display: none;">
                    <input class="form-control me-2" type="search" name="query" placeholder="Buscar..." aria-label="Buscar">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>

                <button type="button" class="btn btn-dark ms-3 border-primary" data-bs-toggle="modal" data-bs-target="#modalRegistro">
                    Registrarse
                </button>
                <button type="button" class="btn btn-dark border border-secondary bg-gradient ms-2" data-bs-toggle="modal" data-bs-target="#modalIngreso">
                    Ingresar
                </button>
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
                    <form id="formRegistro">
                        <div class="col-12">
                            <div
                                style="font-size: 16px ;letter-spacing: 0.2rem;">
                                DATOS DE USUARIO
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="emailRegistro" class="form-label formulario">Email</label>
                                    <input type="email" class="form-control" id="emailRegistro" required>
                                </div>
                                <div class="mb-3 col">
                                    <label for="nombreRegistro" class="form-label formulario">Nombre de Usuario</label>
                                    <input type="text" class="form-control" id="nombreRegistro" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="passRegistro" class="form-label formulario">Contraseña</label>
                                    <input type="password" class="form-control" id="passRegistro" required>
                                </div>
                                <div class="mb-3 col">
                                    <label for="passConfRegistro" class="form-label formulario">Repetir contraseña</label>
                                    <input type="password" class="form-control" id="passConfRegistro" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div
                                style="font-size: 16px ;letter-spacing: 0.2rem;">
                                DATOS DE ENVIO
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="dniRegistro" class="form-label formulario">DNI</label>
                                    <input type="number" class="form-control" id="dniRegistro" required>
                                </div>
                                <div class="mb-3 col">
                                    <label for="fechaNacRegistro" class="form-label formulario">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" id="fechaNacRegistro" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="direccionRegistro" class="form-label formulario">Dirección</label>
                                    <input type="text" class="form-control" id="direccionRegistro" required>
                                </div>
                                <div class="mb-3 col">
                                    <label for="provRegistro" class="form-label formulario">Provicia/Estado</label>
                                    <input type="text" class="form-control" id="provRegistro" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="paisRegistro" class="form-label formulario">Pais</label>
                                    <input type="text" class="form-control" id="paisRegistro" required>
                                </div>
                                <div class="mb-3 col">
                                    <label for="cpRegistro" class="form-label formulario">Código Postal</label>
                                    <input type="number" class="form-control" id="cpRegistro" required>
                                </div>
                            </div>
                            <div class="mb-3 col">
                                <input type="checkbox" class="" id="terminosRegistro" required>
                                <label for="terminoRegistro" class="form-label formulario" style="margin-left:5px; margin-top: 10px;font-size: 17px !important">
                                    Aceptar <a href="<?= base_url('terminos') ?>">Terminos y Condiciones de Uso.</a>
                                </label>
                            </div>
                            <div class="mb-3 col">
                                <input type="checkbox" class="" id="newsRegistro">
                                <label for="newsRegistro" class="form-label formulario" style="margin-left:5px;font-size: 17px !important">
                                    Suscribete a nuestro newsletter recibir las mejores ofertas.</a>
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
                    <form id="formLogin">
                        <div class="mb-3">
                            <label for="emailLogin" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailLogin" required>
                        </div>
                        <div class="mb-3">
                            <label for="passLogin" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="passLogin" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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