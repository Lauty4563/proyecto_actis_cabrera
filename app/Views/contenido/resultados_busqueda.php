<main class="container-fluid p-0">

  <div class="container-fluid d-flex align-items-center justify-content-center nav-categorias">
    Resultados para: "<?= esc($query) ?>"
  </div>

  <div class="container-lg d-flex flex-wrap justify-content-center gap-3 p-3">

    <?php if (empty($productos)) : ?>
      <div class="alert alert-warning text-center w-100">No se encontraron productos.</div>
    <?php else : ?>
      <?php foreach($productos as $p) : ?>

        <a class="producto card card-efecto p-2 bg-transparent border-secondary"
           href="<?= base_url('detalles?id=' . $p['id_producto']) ?>"
           style="width: 14rem; height: 24rem;"
           data-coleccion="<?= $p['nombre_coleccion'] ?? '' ?>"
           data-genero="<?= $p['nombre_genero'] ?? '' ?>"
           data-prenda="<?= $p['nombre_prenda'] ?? '' ?>">

          <img src="<?= base_url('assets/img/' . $p['imagen_producto']) ?>"
               class="img-fluid"
               alt="<?= esc($p['nombre_producto']) ?>"
               style="height: 75%; object-fit: cover; background-color: white;">

          <div class="card-body bg-transparent p-0 pt-1" style="height: 25%">
            <h5 class="card-title text-white text-center d-flex align-items-center justify-content-center"
                style="height: 3rem; overflow: hidden; text-overflow: ellipsis; font-size: 1rem;">
              <?= esc($p['nombre_producto']) ?>
            </h5>
            <div class="card-text d-flex align-items-center justify-content-between">
              <p class="mb-0 text-white fs-6">ARS$</p>
              <p class="mb-0 text-white fs-4"><strong><?= $p['precio_producto'] ?></strong></p>

              <?php if(session('login')) : ?>
                <?= form_open('add_cart') ?>
                <?= form_hidden('id', $p['id_producto']) ?>
                <?= form_hidden('titulo', $p['nombre_producto']) ?>
                <?= form_hidden('precio', $p['precio_producto']) ?>
                <?= form_hidden('cantidad', '1') ?>
                  <button type="submit" class="btn btn-outline-secondary rounded-pill p-0"
                          style="width: 3.5rem; height: 2rem;">
                    <img class="img-fluid" src="<?= base_url('assets/img/buy-icon.png') ?>" alt="buy"
                         style="height: 90%; object-fit: cover;"/>
                  </button>
                <?= form_close() ?>
              <?php endif ?>
            </div>
          </div>

        </a>

      <?php endforeach ?>
    <?php endif; ?>
  </div>

  <hr style="border: 0; height: 2px; background-image: linear-gradient(to right, rgba(255,255,255,0), rgba(255,255,255,0.75), rgba(255,255,255,0));">

</main>
