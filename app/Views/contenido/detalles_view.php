<main class="container-fluid p-0">

  <div class="container my-4" data-bs-theme="dark">

    <div class="container-fluid bg-dark-subtle p-4 d-flex align-items-center" style="height: 20px;">
      <p class="mb-0 me-2">Colección <?= $producto['nombre_coleccion'] ?></p>
      <p class="mb-0 me-2"> > </p>
      <p class="mb-0 me-2">Género <?= $producto['nombre_genero'] ?></p>
      <p class="mb-0 me-2"> > </p>
      <p class="mb-0 me-2"><?= $producto['nombre_prenda'] ?></p>
    </div>

    <div class="bg-body-secondary p-4 border">
      <div class="row">
        <img 
          id="productoZoom" class="img-fluid col-7 drift-trigger drift-image" src="./assets/img/<?= $producto['imagen_producto'] ?>" alt="..." 
          data-zoom="./assets/img/<?= $producto['imagen_producto'] ?>"
          style="object-fit: cover; background-color: white;"
        />

        <div class="col-5">
          <div class="position-relative">

            <div id="zoomPane" class="w-100 h-75 z-1"></div>
            <div class="border p-4 z-0">

                <h2><?= $producto['nombre_producto'] ?></h2>

                <p>ARS $<?= $producto['precio_producto'] ?></p>

                <div>Estrellas</div>

                <div>Stock disponible (<?= $producto['stock_producto'] ?>)</div>

                <?php echo form_open('add_cart'); ?>

                <div class="dropdown position-static">
                  <button class="btn btn-warning bg-opacity-50 dropdown-toggle z-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Cantidad
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">1</a></li>
                    <li><a class="dropdown-item" href="#">2</a></li>
                    <li><a class="dropdown-item" href="#">3</a></li>
                  </ul>
                </div>

                <div class="col-auto">
                  <select name="cantidad" class="form-select">
                      <option value="1" <?= set_select('cantidad', 1, true) ?>>1 Unidad</option>
                      <option value="2" <?= set_select('cantidad', 2) ?>>2 Unidades</option>
                      <option value="3" <?= set_select('cantidad', 3) ?>>3 Unidades</option>
                      <option value="4" <?= set_select('cantidad', 4) ?>>4 Unidades</option>
                      <option value="5" <?= set_select('cantidad', 4) ?>>5 Unidades</option>
                  </select>
                </div>


                <div class="col-auto">
                  <label class="visually-hidden" for="autoSizingSelect">Preference</label>
                  <select value="" id="categoria_prenda" class="form-select" id="autoSizingSelect">
                    <option selected>Forma de Envio</option>
                    <option value="1" selected>Correo Argentino</option>
                    <option value="2">Moto Mensajeria</option>
                    <option value="3">Envíos Internacionales</option>
                  </select>
                </div>


              <div class="d-grid gap-2 mt-3">
                <button class="btn btn-primary" type="button">Comprar</button>
              </div>

              <div class="d-grid gap-2 mt-3">
                <?php
                  echo form_hidden('id', $producto['id_producto']);
                  echo form_hidden('titulo', $producto['nombre_producto']);
                  echo form_hidden('precio', $producto['precio_producto']);
                  echo form_submit('comprar', 'Agregar al carrito', 'class="btn btn-primary" type="button"');
                  echo form_close();
                ?>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</main>