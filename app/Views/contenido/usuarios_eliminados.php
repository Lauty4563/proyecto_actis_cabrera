<div class="container my-5">
    <?php if(session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('mensaje') ?></div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <h3 class="text-white mb-4">Usuarios eliminados</h3>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Nombre de usuario</th>
                <th>Email</th>
                <th>Fecha eliminado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($eliminados)): ?>
                <?php foreach($eliminados as $usuario): ?>
                    <tr>
                        <td><?= esc($usuario['nombre_usuario']) ?></td>
                        <td><?= esc($usuario['email_usuario']) ?></td>
                        <td><?= esc($usuario['deleted_at']) ?></td>
                        <td>
                            <form method="post" action="<?= base_url('admin/usuarios/restaurar/' . $usuario['id_usuario']) ?>" onsubmit="return confirm('¿Restaurar usuario?')">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-success btn-sm">Restaurar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr><td colspan="4" class="text-center">No hay usuarios eliminados</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="<?= base_url('admin/usuarios') ?>" class="btn btn-primary mt-3">Volver a usuarios activos</a>
</div>
