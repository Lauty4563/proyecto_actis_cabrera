<div class="container my-5">
    <div class="card bg-dark text-white shadow-lg rounded-4">
        <div class="card-header border-bottom border-secondary">
            <h4 class="mb-0">Detalle de Venta #<?= esc($venta['id_venta']) ?></h4>
            <small class="text-muted">Fecha: <?= esc($venta['venta_fecha']) ?></small>
        </div>

        <div class="card-body bg-dark-2 p-4">
            <h5 class="mb-3 border-bottom border-secondary pb-2">🧍 Información del Cliente</h5>
            <div class="row mb-4">
                <div class="col-md-6">
                    <p><strong>Nombre:</strong> <?= esc($usuario['nombre'] . ' ' . $usuario['apellido']) ?></p>
                    <p><strong>DNI:</strong> <?= esc($usuario['dni_usuario']) ?></p>
                    <p><strong>Email:</strong> <?= esc($usuario['email_usuario']) ?></p>
                </div>
                <div class="col-md-6">
                    <p><strong>Dirección:</strong> <?= esc($usuario['direccion_usuario']) ?></p>
                    <p><strong>Provincia:</strong> <?= esc($usuario['provincia_usuario']) ?></p>
                    <p><strong>País:</strong> <?= esc($usuario['pais_usuario']) ?></p>
                    <p><strong>Código Postal:</strong> <?= esc($usuario['codigopostal_usuario']) ?></p>
                </div>
            </div>

            <h5 class="mb-3 border-bottom border-secondary pb-2">📦 Productos Comprados</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-dark table-hover">
                    <thead class="table-secondary text-dark">
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $p): ?>
                            <tr>
                                <td><?= esc($p['nombre']) ?></td>
                                <td>$<?= number_format($p['precio'], 2, ',', '.') ?></td>
                                <td><?= esc($p['cantidad']) ?></td>
                                <td>$<?= number_format($p['subtotal'], 2, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="text-end mt-3">
                <h4 class="text-success">💲 Total: $<?= number_format($total, 2, ',', '.') ?></h4>
            </div>

            <div class="mt-4 text-end">
                <a href="<?= base_url('listar_ventas') ?>" class="btn btn-outline-light rounded-pill">
                    ← Volver al Listado
                </a>
            </div>
        </div>
    </div>
</div>
