<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>

    <!-- Enlaces a CSS3 -->
    <link rel="stylesheet" type="text/css" href="./assets/css/reset.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/styles.css">

    <!-- Enlaces a JavaScript -->
    <script defer src="./assets/js/bootstrap.bundle.min.js"></script>
</head>
<body class="p-sm-0 container-lg flex-column min-vh-100 bg-dark text-white">
    <header class="container-fluid d-flex">
        <img class="img-fluid logo " src="./assets/img/logomarca_dark.png" />
        <div class="ms-auto d-flex align-items-center">
            <img class="carrito" src="./assets/img/carrito.png" />
            <button type="button" class="btn btn-dark ms-3 border-primary" data-bs-toggle="modal" data-bs-target="#modalRegistro">
                Registrarse
            </button>
            <button type="button" class="btn btn-dark border border-secondary bg-gradient ms-2" data-bs-toggle="modal" data-bs-target="#modalIngreso">
                Ingresar
            </button>
        </div>
    </header>
    
    <!-- Modal Registro -->
    <div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="registroLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registroLabel">Crear cuenta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formRegistro">
                        <div class="mb-3">
                            <label for="emailRegistro" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailRegistro" required>
                        </div>
                        <div class="mb-3">
                            <label for="emailRegistro" class="form-label">Nombre de Usuario</label>
                            <input type="email" class="form-control" id="emailRegistro" required>
                        </div>
                        <div class="mb-3">
                            <label for="passRegistro" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="passRegistro" required>
                        </div>
                        <div class="mb-3">
                            <label for="emailRegistro" class="form-label">Repetir contraseña</label>
                            <input type="email" class="form-control" id="emailRegistro" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ingreso -->
    <div class="modal fade" id="modalIngreso" tabindex="-1" aria-labelledby="registroLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registroLabel">Ingresar cuenta registrada</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formRegistro">
                        <div class="mb-3">
                            <label for="emailRegistro" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailRegistro" required>
                        </div>
                        <div class="mb-3">
                            <label for="passRegistro" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="passRegistro" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


<!--
</body>
</html>
-->