<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cargar Producto</title>
</head>
<body>

<h2>Formulario de carga de producto</h2>

<?php if (!empty($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach ?>
    </ul>
<?php endif ?>

<?= form_open_multipart('upload/cargar_producto') ?>
    <label>Nombre:</label>
    <input type="text" name="nombre_producto" required><br>

    <label>Precio:</label>
    <input type="number" step="0.01" name="precio_producto" required><br>

    <label>Colección:</label>
    <input type="text" name="cat_coleccion"><br>

    <label>Género:</label>
    <input type="text" name="cat_genero"><br>

    <label>Tipo de prenda:</label>
    <input type="text" name="cat_prenda"><br>

    <label>Descripción:</label>
    <textarea name="descripcion_producto"></textarea><br>

    <label>Stock:</label>
    <input type="number" name="stock_producto" required><br>

    <label>Imagen:</label>
    <input type="file" name="userfile"><br>

    <input type="submit" value="Guardar producto">
</form>

</body>
</html>

