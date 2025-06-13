<?php $cart = \Config\Services::cart(); ?>

<h1>Carrito de compras</h1>
<a href="productos" class="btn btn-success" role="button">Continuar comprando</a>

<?php if ($cart->contents() == NULL) { ?>
    <h2 class="text-center alert alert-danger">Carrito esta vacio</h2>
<?php } else { ?>
    <table id="mytable" class="table table-bordred table-striped">
        <thead>
            <tr>
                <td>Nº Item</td>
                <td>Nombre</td>
                <td>Precio</td>
                <td>Cantidad</td>
                <td>Subtotal</td>
                <td>Acción</td>
            </tr>
        </thead>
        <tbody>

            <?php $total = 0; ?>
            <?php $i = 1; ?>
            <?php $items = $cart->contents(); ?>
            <?php foreach ($items as $item) { ?>
                <tr
                    <?php if (session()->has('rowid_sin_stock') && session('rowid_sin_stock') == $item['rowid']) : ?>
                        style="border: solid 2px red; color: red;"
                    <?php endif ?>
                >
                    <td><?php echo $i++; ?></td>
                    <td><?= $item['name']; ?></td>
                    <td >$ <?php echo $item['price']; ?></td>
                    <td
                        <?php if (session()->has('rowid_sin_stock') && session('rowid_sin_stock') == $item['rowid']) : ?>
                            style="color: red;"
                        <?php endif ?>
                    ><?php echo $item['qty']; ?></td>
                    <td><?php echo $item['subtotal']; ?></td>
                    <?php $total = $total + $item['subtotal']; ?>
                    <td>
                        <a href="eliminar_item/<?php echo $item['rowid']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="4">Total Compra:</td>
                <td>$ <?php echo $total; ?></td>
                <td>
                    <a href="<?php echo base_url('eliminar_item/all'); ?>" class="btn btn-success">Vaciar Carrito</a>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <a href="ventas" class="btn btn-success" role="button">Confirmar Compra</a>
                </td>
            </tr>
        </tbody>
    </table>
<?php } ?>

<!-- Modal Compra -->
<div class="modal fade" id="modalCompra" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true"  data-bs-theme="dark">
    <div class="modal-dialog inter">
        <div class="modal-content">
            <div class="modal-body">
                <?php if (session()->has('mensaje_carrito')) : ?>
                    <div class="alert alert-success mt-2 fs-1" role="alert">
                        <?= esc(session('mensaje_carrito')) ?>
                    </div>
                <?php endif ?>
                <?php if (session()->has('error_carrito')) : ?>
                    <div class="alert alert-danger mt-2 fs-1" role="alert">
                        <?= esc(session('error_carrito')) ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>

<?php if (session()->has('mensaje_carrito') || session()->has('error_carrito')) : ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var modal = new bootstrap.Modal(document.getElementById('modalCompra'));
            modal.show();
        });
    </script>
<?php endif; ?>