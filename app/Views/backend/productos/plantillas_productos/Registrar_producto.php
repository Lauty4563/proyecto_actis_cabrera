<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container mt-5">
    <h2 class="mb-4">Agregar nuevo producto</h2>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('errors') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('productos/guardar') ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nombre_producto" class="form-label">Nombre del producto</label>
            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" required>
        </div>

        <div class="mb-3">
            <label for="precio_producto" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control" id="precio_producto" name="precio_producto" required>
        </div>

        <div class="mb-3">
            <label for="descripcion_producto" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion_producto" name="descripcion_producto" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="stock_producto" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock_producto" name="stock_producto" required>
        </div>

        <div class="mb-3">
            <label for="imagen_producto" class="form-label">Imagen del producto</label>
            <input type="file" class="form-control" id="imagen_producto" name="imagen_producto">
        </div>

        <div class="mb-3">
            <label for="cat_coleccion" class="form-label">Colección</label>
            <input type="text" class="form-control" id="cat_coleccion" name="cat_coleccion">
        </div>

        <div class="mb-3">
            <label for="cat_genero" class="form-label">Género</label>
            <select class="form-select" id="cat_genero" name="cat_genero">
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
                <option value="Unisex">Unisex</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="cat_prenda" class="form-label">Tipo de prenda</label>
            <input type="text" class="form-control" id="cat_prenda" name="cat_prenda">
        </div>

        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" id="activo" name="activo" value="1" checked>
            <label class="form-check-label" for="activo">Producto activo</label>
        </div>

        <button type="submit" class="btn btn-primary">Guardar producto</button>
    </form>
</div>

</body>
</html>
