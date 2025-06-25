<div class="container my-5">

    <?php if(session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('mensaje') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    <?php endif; ?>

    <?php if (isset($errors) && is_array($errors)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    <?php endif; ?>

    <h3 class="text-white mb-4">👥 Usuarios del sistema</h3>

    <div class="row">
        <div class="col-md-6">
            <h5 class="text-info">Clientes</h5>
            <ul class="list-group mb-4" id="listaClientes">
                <?php foreach ($clientes as $cliente): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap py-3" style="min-height: 70px;">
                        <div>
                            <?= esc($cliente['nombre_usuario']) ?> (<?= esc($cliente['email_usuario']) ?>)
                            <span class="badge bg-primary">Cliente</span>
                        </div>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Acciones usuario">
                            <!-- Form eliminar -->
                            <form method="post" action="<?= base_url('admin/usuarios/eliminar/' . $cliente['id_usuario']) ?>" style="display:inline;" onsubmit="return confirm('¿Eliminar usuario? Esta acción no se puede deshacer.')">
                                <?= csrf_field() ?>
                               <button type="submit" class="btn btn-danger btn-sm px-2 py-1">Eliminar</button>
                            </form>

                            <!-- Form cambiar rol a Admin -->
                            <form method="post" action="<?= base_url('admin/usuarios/cambiar_rol/' . $cliente['id_usuario']) ?>" style="display:inline;">
                                <?= csrf_field() ?>
                                <input type="hidden" name="nuevo_rol" value="2" />
                                <button type="submit" class="btn btn-info btn-sm px-2 py-1">Hacer Admin</button>
                            </form>
                        </div>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>

        <div class="col-md-6">
            <h5 class="text-warning">Administradores</h5>
            <ul class="list-group" id="listaAdmins">
                <?php foreach ($admins as $admin): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap py-3" style="min-height: 70px;">
                        <div>
                            <?= esc($admin['nombre_usuario']) ?> (<?= esc($admin['email_usuario']) ?>)
                            <span class="badge bg-warning text-dark">Admin</span>
                        </div>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Acciones usuario">
                            <!-- Form eliminar -->
                            <form method="post" action="<?= base_url('admin/usuarios/eliminar/' . $admin['id_usuario']) ?>" style="display:inline;" onsubmit="return confirm('¿Eliminar usuario? Esta acción no se puede deshacer.')">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-danger btn-sm px-2 py-1">Eliminar</button>
                            </form>

                            <!-- Form cambiar rol a Cliente -->
                            <form method="post" action="<?= base_url('admin/usuarios/cambiar_rol/' . $admin['id_usuario']) ?>" style="display:inline;">
                                <?= csrf_field() ?>
                                <input type="hidden" name="nuevo_rol" value="1" />
                                <button type="submit" class="btn btn-info btn-sm px-2 py-1">Hacer Cliente</button>
                            </form>
                        </div>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>

    <div class="mb-4 text-end">
        <a href="<?= base_url('admin/usuarios/eliminados') ?>" class="btn btn-warning mb-3">
            🗑 Ver usuarios eliminados
        </a>
    </div>
</div>

