<div class="container my-4">
    <h2 class="text-white">Listado de Ventas</h2>

    <?php foreach ($ventas as $venta): ?>
        <div class="card mb-3">
            <div class="card-header bg-dark text-white">
                Venta #<?= esc($venta['id_venta']) ?> - Fecha: <?= esc($venta['fecha']) ?> - Cliente: <?= esc($venta['usuario']) ?>
            </div>
            <div class="card-body bg-secondary text-white">
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio Unitario</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($venta['productos'] as $prod): ?>
                            <tr>
                                <td><?= esc($prod['nombre']) ?></td>
                                <td>$<?= number_format($prod['precio'], 2, ',', '.') ?></td>
                                <td><?= esc($prod['cantidad']) ?></td>
                                <td>$<?= number_format($prod['subtotal'], 2, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <h5 class="text-end">Total: $<?= number_format($venta['total'], 2, ',', '.') ?></h5>
                <div class="text-end">
                    <a href="<?= base_url('ventas/detalle/' . $venta['id_venta']) ?>" class="btn btn-outline-light btn-sm">
                        Ver Detalle
                    </a>
                </div>

            </div>
        </div>
    <?php endforeach; ?>
</div>
