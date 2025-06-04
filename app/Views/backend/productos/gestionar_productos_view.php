<h1 class="text-center">Listado de Productos</h1>

<div class="container">
    <table id="mytable" class="table table-borbred table-striped table-hover">
      <thead>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Categorias (Colección, Género, Prenda)</th>
        <th>Descripción</th>
        <th>Stock</th>
        <th>Imagen</th>

        <th>Editar</th>
        <th>Activar</th>

      </thead>

      <tbody>
        <?php foreach($producto as $row) : ?>
          <tr class="position-relative">
            <td><?php echo $row['nombre_producto'];?></td>
            <td><?php echo $row['precio_producto'];?></td>
            <td>
              <?php echo $row['nombre_coleccion'];?>
              <?php echo $row['nombre_genero'];?>
              <?php echo $row['nombre_prenda'];?>
            </td>
            <td><?php echo $row['descripcion_producto'];?></td>
            <td><?php echo $row['stock_producto'];?></td>

            <td><img src="./assets/img/<?php echo $row['imagen_producto'];?>" alt="" width="100" height="100"></td>
            <td>
              <a class="btn btn-success" href="<?= base_url('editar_producto/'.$row['id_producto']) ?>" style="position: relative;z-index: 4;">
                Editar
              </a>
            </td>

            <td>
              <?php if($row['activo'] == 1) : ?>
                <a class="btn btn-danger" href="<?= base_url('activar_producto/'.$row['id_producto'].'/0') ?>" 
                  onclick="return confirm('¿Estás seguro que quieres desactivar este producto?');">
                  Desactivar
                </a>
              <?php else : ?>
                <a class="btn btn-success" href="<?= base_url('activar_producto/'.$row['id_producto'].'/1') ?>" style="position: relative;z-index: 4;">
                  Activar
                </a>
              <?php endif ?>
              <?php if($row['activo'] == 0 ) : ?>
                <div class="position-absolute" style="left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(128, 128, 128, 0.6);"></div>
              <?php endif ?>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
</div>