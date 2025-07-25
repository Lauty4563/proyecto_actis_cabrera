<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container">
    <div class="w-100 mt-3 mb-3 p-3 border rounded d-flex justify-content-center titulo" style="background: linear-gradient(45deg, rgb(99, 92, 0), rgb(32, 31, 18), rgb(26, 25, 25), rgb(32, 31, 18), rgb(179, 167, 0));">
        <h1 class="text-center"  style="letter-spacing: 3px;">Agregar nuevo Producto</h1>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
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


    <div class="border rounded p-4 mb-5" style="background-color: rgb(29, 29, 27);">
        <form action="<?= base_url('cargar_producto') ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre_producto" class="form-label">Nombre del producto</label>
                <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" required>
            </div>

            <div class="mb-3">
                <label for="descripcion_producto" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion_producto" name="descripcion_producto" rows="3"></textarea>
            </div>

            <div class="row">
                <div class="mb-3 col-6">
                    <label for="precio_producto" class="form-label">Precio</label>
                    <input type="number" step="0.01" class="form-control" id="precio_producto" name="precio_producto" required>
                </div>

                <div class="mb-3 col-6">
                    <label for="stock_producto" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock_producto" name="stock_producto" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="imagen_producto" class="form-label">Imagen del producto</label>
                <input type="file" class="form-control" id="imagen_producto" name="imagen_producto">
            </div>

            <div class="row">
                <div class="mb-3 col-4">
                    <label for="categoria_coleccion" class="form-label">Colección</label>
                    <select value="<?= old('categoria_coleccion') ?>" id="categoria_coleccion" class="form-select" name="cat_coleccion">
                        <?php foreach($categoria_coleccion as $c) : ?>
                            <option value="<?= $c['id']?>">
                                <?= $c['nombre'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="mb-3 col-4">
                    <label for="categoria_genero" class="form-label">Genero</label>
                    <select value="<?= old('categoria_genero') ?>" id="categoria_genero" class="form-select" name="cat_genero">
                        <?php foreach($categoria_genero as $g) : ?>
                            <option value="<?= $g['id']?>">
                                <?= $g['nombre'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="mb-3 col-4">
                    <label for="categoria_prenda" class="form-label">Tipo de prenda</label>
                    <select value="<?= old('categoria_prenda') ?>" id="categoria_prenda" class="form-select" name="cat_prenda">
                        <?php foreach($categoria_prenda as $p) : ?>
                            <option value="<?= $p['id']?>">
                                <?= $p['nombre'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="activo" name="activo" value="1" checked>
                <label class="form-check-label" for="activo">Producto activo</label>
            </div>

            <button type="submit" class="btn btn-warning">Guardar producto</button>
        </form>
    </div>
</div>

</body>
</html>
