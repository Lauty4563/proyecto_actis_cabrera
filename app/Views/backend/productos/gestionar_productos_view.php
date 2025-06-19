<div class="container">
  <div class="w-100 mt-3 mb-3 p-3 border rounded d-flex justify-content-center titulo" style="background: linear-gradient(45deg, rgb(0, 75, 75), rgb(32, 32, 32), rgb(26, 25, 25), rgb(32, 32, 32), rgb(0, 104, 107));">
    <h1 class="text-center"  style="letter-spacing: 3px;">Listado de Productos</h1>
  </div>

  <?php if (session()->getFlashdata('error_gestion')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session('error_gestion') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>
<?php endif; ?>

  <?php if (!empty($mensaje_gestion)) : ?>
      <div class="container alert alert-success mt-2" role="alert" data-bs-theme="dark" style="font-size: larger;">
          <?= esc($mensaje_gestion)?>
      </div>
  <?php endif ?>

  <div>
      <table id="mytable" class="table table-borbred table-striped table-hover">
        <thead>
          <th class="text-center align-middle" style="background-color: rgb(120, 120, 120); color: white; font-size: 20px;">
            Nombre
          </th>
          <th class="text-center align-middle" style="background-color: rgb(120, 120, 120); color: white; font-size: 20px;">
            Precio
          </th>
          <th class="text-center align-middle" style="background-color: rgb(120, 120, 120); color: white;">
            Categorias 
            <p class="text-center align-middle" style="font-size: 10px;">(Colección, Género, Prenda)</p>
          </th>
          <th class="text-center align-middle" style="background-color: rgb(120, 120, 120); color: white; font-size: 20px;">
            Descripción
          </th>
          <th class="text-center align-middle" style="background-color: rgb(120, 120, 120); color: white; font-size: 20px;">
            Stock
          </th>
          <th class="text-center align-middle" style="background-color: rgb(120, 120, 120); color: white; font-size: 20px;">
            Imagen
          </th>

          <th class="text-center align-middle" style="background-color: rgb(120, 120, 120); color: white; font-size: 20px;">Editar</th>
          <th class="text-center align-middle" style="background-color: rgb(120, 120, 120); color: white; font-size: 20px;">Activar</th>

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
                <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modalEditar" 
                onclick="editarProducto(<?= $row['id_producto'] ?>)" style="position: relative;z-index: 4;">
                  Editar
                </button>
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
</div>
<!-- Modal Editar -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true"  data-bs-theme="dark">
    <div class="modal-dialog inter">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Editar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <?php if (!empty($validation_gestion)) : ?>
                    <div class="alert alert-danger mt-2" role="alert">
                        <ul>
                            <?php foreach($validation_gestion as $error) : ?>
                                <li>
                                    <?= esc($error) ?>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>

                <?php echo form_open_multipart(base_url('actualizar_producto/unproducto'), ['id' => 'edit_formulario']); ?>
                    <div class="mb-3">
                      <label for="edit_nombre" class="form-label">Nombre</label>
                      <input value="<?= old('edit_nombre') ?>" name="edit_nombre" type="text" class="form-control" id="edit_nombre" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                      <label for="edit_precio" class="form-label">Precio</label>
                      <input value="<?= old('edit_precio') ?>" name="edit_precio" type="number" class="form-control" autocomplete="off" id="edit_precio" required>
                    </div>
                    <div class="mb-3 row" style="font-size: 12px">
                      <div class="col-4">
                        <label for="edit_coleccion" class="form-label">Categoria Coleccion</label>
                        <select value="<?= old('edit_coleccion') ?>" name="edit_coleccion" class="form-select" id="edit_coleccion" required></select>
                      </div>
                      <div class="col-4">
                        <label for="edit_genero" class="form-label">Categoria Género</label>
                        <select value="<?= old('edit_genero') ?>" name="edit_genero" class="form-select" id="edit_genero" required></select>
                      </div>
                      <div class="col-4">
                        <label for="edit_prenda" class="form-label">Categoria Prenda</label>
                        <select value="<?= old('edit_prenda') ?>" name="edit_prenda" class="form-select" id="edit_prenda" required></select>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="edit_descripcion" class="form-label">Descripción</label>
                      <textarea name="edit_descripcion" type="text" class="form-control" autocomplete="off" id="edit_descripcion" required><?= old('edit_descripcion') ?></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="edit_stock" class="form-label">Stock</label>
                      <input value="<?= old('edit_stock') ?>" name="edit_stock" type="number" class="form-control" autocomplete="off" id="edit_stock" required>
                    </div>
                    <div class="mb-3">
                      <label for="edit_imagen" class="form-label">Imagen</label>
                      <img id="imagen" src="./assets/img/<?= $row['imagen_producto']?>" alt="imagen" height="100" width="100" />
                      <?php echo form_input(['name'=>'edit_imagen', 'id'=> 'edit_imagen', 'type'=>'file']); ?>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Editar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
  function editarProducto(id) {
    fetch('<?= base_url('editar_producto') ?>/' + id)
    .then(response => response.json())
    .then(data => {
      // Eliminar opciones de otras requests
      document.getElementById('edit_coleccion').innerHTML = null;
      document.getElementById('edit_genero').innerHTML = null;
      document.getElementById('edit_prenda').innerHTML = null;

      // Redireccionar correctamente
      document.getElementById('edit_formulario').action = 'actualizar_producto/' + id;
      // Rellenar los input del producto
      document.getElementById('edit_nombre').value = data.producto.nombre_producto;
      document.getElementById('edit_precio').value = data.producto.precio_producto;
      document.getElementById('edit_descripcion').value = data.producto.descripcion_producto;
      document.getElementById('edit_stock').value = data.producto.stock_producto;
      document.getElementById('imagen').src = './assets/img/' + data.producto.imagen_producto;

      // Rellenar select de colección
      const coleccionSelect = document.getElementById('edit_coleccion');
      data.categoria_coleccion.forEach(cat => {
        const option = document.createElement('option');
        option.value = cat.id;
        option.text = cat.nombre;
        // Marcar seleccionada si coincide con la del producto
        if (cat.id == data.producto.cat_coleccion_id) {
          option.selected = true;
        }
        coleccionSelect.appendChild(option);
      });

      // Rellenar select de género
      const generoSelect = document.getElementById('edit_genero');
      data.categoria_genero.forEach(cat => {
        const option = document.createElement('option');
        option.value = cat.id;
        option.text = cat.nombre;
        if (cat.id == data.producto.cat_genero_id) {
          option.selected = true;
        }
        generoSelect.appendChild(option);
      });

      // Rellenar select de prenda
      const prendaSelect = document.getElementById('edit_prenda');
      data.categoria_prenda.forEach(cat => {
        const option = document.createElement('option');
        option.value = cat.id;
        option.text = cat.nombre;
        if (cat.id == data.producto.cat_prenda_id) {
          option.selected = true;
        }
        prendaSelect.appendChild(option);
      });

    })
    .catch(error => {
      console.error('Error al obtener los datos:', error);
    });
  }
</script>

<?php if (!empty($validation_gestion)) : ?>
  <script>
    
    document.addEventListener("DOMContentLoaded", function () {
        var modal = new bootstrap.Modal(document.getElementById('modalEditar'));
        modal.show();
    });

    fetch('<?= base_url('editar_producto') ?>/' + <?= old('edit_id') ?> )
    .then(response => response.json())
    .then(data => {;

      // Rellenar select de colección
      const coleccionSelect = document.getElementById('edit_coleccion');
      data.categoria_coleccion.forEach(cat => {
        const option = document.createElement('option');
        option.value = cat.id;
        option.text = cat.nombre;
        // Marcar seleccionada si coincide con la del producto
        if (cat.id == data.producto.cat_coleccion_id) {
          option.selected = true;
        }
        coleccionSelect.appendChild(option);
      });

      // Rellenar select de género
      const generoSelect = document.getElementById('edit_genero');
      data.categoria_genero.forEach(cat => {
        const option = document.createElement('option');
        option.value = cat.id;
        option.text = cat.nombre;
        if (cat.id == data.producto.cat_genero_id) {
          option.selected = true;
        }
        generoSelect.appendChild(option);
      });

      // Rellenar select de prenda
      const prendaSelect = document.getElementById('edit_prenda');
      data.categoria_prenda.forEach(cat => {
        const option = document.createElement('option');
        option.value = cat.id;
        option.text = cat.nombre;
        if (cat.id == data.producto.cat_prenda_id) {
          option.selected = true;
        }
        prendaSelect.appendChild(option);
      });

    })
    .catch(error => {
      console.error('Error al obtener los datos:', error);
    });
  </script>
<?php endif; ?>