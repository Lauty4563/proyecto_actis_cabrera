<div class="container mt-5">

    <?php if(session()->getFlashdata('mensaje_perfil')): ?>
        <div class="alert alert-warning">
            <?= session()->getFlashdata('mensaje_perfil') ?>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach(session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
    <?php endif; ?>

    <div class="d-flex flex-column justify-content-center align-items-center">
        <div class="position-relative">
            <img class="rounded-circle" 
                src="
                    <?= empty($usuario['imagen_usuario']) 
                    ? './assets/img/perfiles/perfil_default.jpg' 
                    : './assets/img/perfiles/' . $usuario['imagen_usuario'] ?>
                " 
                width="200" height="200"
                style="object-fit: cover;"
            />
            <form action="update_imagen_user" method="post" enctype="multipart/form-data" id="formImagenUser" class="d-flex position-absolute align-items-center" style="bottom: 0; right: -50px;">
                <label for="ui_imagen" class="custom-file-upload" style="cursor: pointer;">
                    <img src="./assets/img/upload.png" alt="subir imagen" width="50" style="filter: drop-shadow(0 0 5px black)">
                </label>
                <input class="d-none" type="file" name="ui_imagen" id="ui_imagen">
                <div class="d-flex justify-content-center" style="height: 30px;">
                    <button type="submit" class="btn border-warning text-white" style="font-size: 12px;">
                        Update
                    </button>
                </div> 
            </form>
        </div>
        <div class="mt-1 fs-2"><?= $usuario['nombre_usuario'] ?></div>
    </div>

    <div class="accordion" id="accordionPanelsStayOpenExample" data-bs-theme="dark">

        <div class="accordion-item my-2">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    E D I T A R  - D A T O S - D E - E N V I O
                </button>
            </h2>

            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show px-4">
                <form action="update_envio_user" method="post" id="formEnvioUser">
                    <div class="col-12">
                        <div
                            class="d-flex justify-content-center pt-2"
                            style="font-size: 20px ;letter-spacing: 0.2rem;">
                            IMAGEN
                        </div>
                        <div class="row">
                            <div class="mb-3 col <?php if ( $usuario['nombre'] == '' ) echo 'pb-2 border border-warning rounded'; ?>">
                                <label for="ue_nombre" class="form-label formulario">Nombre</label>
                                <input value="<?= $usuario['nombre'] ?>" name="ue_nombre" type="text" class="form-control" id="ue_nombre" autocomplete="off">
                            </div>
                            <div class="mb-3 col <?php if ( $usuario['apellido'] == '' ) echo 'pb-2 border border-warning rounded'; ?>">
                                <label for="ue_apellido" class="form-label formulario">Apellido</label>
                                <input value="<?= $usuario['apellido'] ?>" name="ue_apellido" type="text" class="form-control" id="ue_apellido" autocomplete="off">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col <?php if ( $usuario['dni_usuario'] == '' ) echo 'pb-2 border border-warning rounded'; ?>">
                                <label for="ue_dni" class="form-label formulario">DNI</label>
                                <input value="<?= $usuario['dni_usuario'] ?>" name="ue_dni" type="number" class="form-control" id="ue_dni" autocomplete="off">
                            </div>
                            <div class="mb-3 col <?php if ( $usuario['fecha_usuario'] == '0000-00-00' ) echo 'pb-2 border border-warning rounded'; ?>">
                                <label for="ue_fecha" class="form-label formulario">Fecha de Nacimiento</label>
                                <input value="<?= $usuario['fecha_usuario'] ?>" name="ue_fecha" type="date" class="form-control" id="ue_fecha" autocomplete="off">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col <?php if ( $usuario['direccion_usuario'] == '' ) echo 'pb-2 border border-warning rounded'; ?>">
                                <label for="ue_direccion" class="form-label formulario">Dirección</label>
                                <input value="<?= $usuario['direccion_usuario'] ?>" name="ue_direccion" type="text" class="form-control" id="ue_direccion" autocomplete="off">
                            </div>
                            <div class="mb-3 col <?php if ( $usuario['provincia_usuario'] == '' ) echo 'pb-2 border border-warning rounded'; ?>">
                                <label for="ue_provincia" class="form-label formulario">Provicia/Estado</label>
                                <input value="<?= $usuario['provincia_usuario'] ?>" name="ue_provincia" type="text" class="form-control" id="ue_provincia" autocomplete="off">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col <?php if ( $usuario['pais_usuario'] == '' ) echo 'pb-2 border border-warning rounded'; ?>">
                                <label for="ue_pais" class="form-label formulario">Pais</label>
                                <input value="<?= $usuario['pais_usuario'] ?>" name="ue_pais" type="text" class="form-control" id="ue_pais">
                            </div>
                            <div class="mb-3 col <?php if ( $usuario['codigopostal_usuario'] == '' ) echo 'pb-2 border border-warning rounded'; ?>">
                                <label for="ue_codigopostal" class="form-label formulario">Código Postal</label>
                                <input value="<?= $usuario['codigopostal_usuario'] ?>" name="ue_codigopostal" type="number" class="form-control" id="ue_codigopostal" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-25 mt-3 mb-3">A C T U A L I Z A R</button>
                    </div>  
                </form>
            </div>
        </div>

    </div>

<div class="container my-5">
    <button class="btn btn-outline-light mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#misPedidosCollapse" aria-expanded="false" aria-controls="misPedidosCollapse">
        🧾 Ver / Ocultar Mis Pedidos
    </button>

    <div class="collapse" id="misPedidosCollapse">
        <div class="card bg-dark text-white border-secondary p-3">
            <h4 class="mb-3">Mis Pedidos</h4>

            <?php if (!empty($ventas)) : ?>
                <div class="alert alert-success text-center fs-5">
                    Total gastado en compras: <strong>$<?= number_format($totalGastado, 2, ',', '.') ?></strong>
                </div>
            <?php endif ?>

            <?php if (empty($ventas)) : ?>
                <div class="alert alert-info">No tenés pedidos realizados todavía.</div>
            <?php else : ?>
                <?php foreach ($ventas as $venta): ?>
                    <div class="card mb-3 bg-dark border border-secondary">
                        <div class="card-header d-flex justify-content-between">
                            <span>Venta #<?= esc($venta['id_venta']) ?> - <?= esc($venta['fecha']) ?></span>
                            <span>Total: <strong>$<?= number_format($venta['total'], 2, ',', '.') ?></strong></span>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush bg-dark">
                                <?php foreach ($venta['productos'] as $producto): ?>
                                    <li class="list-group-item bg-dark text-white">
                                        <?= esc($producto['cantidad']) ?> x <?= esc($producto['nombre']) ?> 
                                        ($<?= number_format($producto['precio'], 2, ',', '.') ?>) 
                                        = $<?= number_format($producto['subtotal'], 2, ',', '.') ?>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
</div>



</div>