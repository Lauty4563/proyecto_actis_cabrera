<div class="container py-4" style="flex-grow: 1;">
    <h2 class="mb-4">Bienvenido, <?= session('nombre') . ' ' . session('apellido') ?></h2>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card border-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-users me-2"></i>Usuarios activos</h5>
                    <p class="fs-3"><?= esc($totalUsuarios) ?></p>
                    <a href="<?= base_url('admin/usuarios') ?>" class="btn btn-sm btn-outline-primary mt-2">Ver usuarios</a>
                </div>
            </div>
        </div>

        <!-- Productos activos -->
        <div class="col-md-4 mb-3">
            <div class="card border-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-box-open me-2"></i>Productos activos</h5>
                    <p class="fs-3"><?= esc($totalProductos) ?></p>
                    <a href="<?= base_url('gestionar_productos') ?>" class="btn btn-sm btn-outline-success mt-2">Gestionar productos</a>
                </div>
            </div>
        </div>

        <!-- Mensajes recibidos -->
        <div class="col-md-4 mb-3">
            <div class="card border-warning shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-envelope me-2"></i>Mensajes recibidos</h5>
                    <p class="fs-3"><?= esc($totalMensajes) ?></p>
                    <a href="<?= base_url('contacto') ?>" class="btn btn-sm btn-outline-warning mt-2">Ver formulario</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Últimos mensajes -->
    <div class="mt-5">
        <h4>Últimos mensajes de contacto</h4>
        <table class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th style="background-color: rgb(120, 120, 120); color: white">Nombre</th>
                    <th style="background-color: rgb(120, 120, 120); color: white">Email</th>
                    <th style="background-color: rgb(120, 120, 120); color: white">Asunto</th>
                    <th style="background-color: rgb(120, 120, 120); color: white">Mensaje</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ultimosMensajes as $msg): ?>
                    <tr>
                        <td><?= esc($msg['nombre_mensaje']) ?></td>
                        <td><?= esc($msg['email_mensaje']) ?></td>
                        <td style=" max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                            <?= esc($msg['asunto_mensaje']) ?></td>
                        <td style=" max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                            <?= esc(word_limiter($msg['texto_mensaje'], 10)) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
