<main class="container-fluid p-0">

  <div class="container-fluid d-flex align-items-center justify-content-center nav-categorias">
    Filtros
  </div>

  <div class="d-flex align-items-center justify-content-center" style="height: 5rem; background-color: rgb(71, 88, 105)">
    <div class="btn p-0 ms-4 me-4" onClick="mostrarFiltros(1)">
      <img class="img-fluid" src="./assets/img/logo_verano.png" style="height: 5rem;" />
    </div>
    <div class="d-none btn-group categoria-container me-4" role="group" aria-label="Basic radio toggle button group" id="categoria1">
      <?php foreach($categorias_coleccion as $c) : ?>
        <input type="radio" class="btn-check" name="btnradio" id="<?= 'btnColradio' . $c['id'] ?>" autocomplete="off">
        <label class="btn btn-outline-info" for="<?= 'btnColradio' . $c['id'] ?>" onClick="filtro(<?= '1, `' . $c['nombre'] . '`' ?>)"><?= $c['nombre'] ?></label>
      <?php endforeach ?>
    </div>
    <div class="btn p-0 ms-4 me-4"  onClick="mostrarFiltros(2)">
      <img class="img-fluid" src="./assets/img/logo_otoño.png" style="height: 5rem;" />
    </div>
    <div class="d-none btn-group categoria-container me-4" role="group" aria-label="Basic radio toggle button group" id="categoria2">
      <?php foreach($categorias_genero as $g) : ?>
        <input type="radio" class="btn-check" name="btnradio" id="<?= 'btnGenradio' . $g['id'] ?>" autocomplete="off">
        <label class="btn btn-outline-info" for="<?= 'btnGenradio' . $g['id'] ?>" onClick="filtro(<?= '2, `' . $g['nombre'] . '`' ?>)"><?= $g['nombre'] ?></label>
      <?php endforeach ?>
    </div>
    <div class="btn p-0 ms-4 me-4" onClick="mostrarFiltros(3)">
      <img class="img-fluid" src="./assets/img/logo_invierno.png" style="height: 5rem;" />
    </div>
    <div class="d-none btn-group categoria-container me-4" role="group" aria-label="Basic radio toggle button group" id="categoria3">
      <?php foreach($categorias_prenda as $p) : ?>
        <input type="radio" class="btn-check" name="btnradio" id="<?= 'btnPrenradio' . $p['id'] ?>" autocomplete="off">
        <label class="btn btn-outline-info" for="<?= 'btnPrenradio' . $p['id'] ?>" onClick="filtro(<?= '3, `' . $p['nombre'] . '`' ?>)"><?= $p['nombre'] ?></label>
      <?php endforeach ?>
    </div>
  </div>

  <hr style="border: 0; height: 2px; background-image: linear-gradient(to right, rgba(255,255,255,0), rgba(255,255,255,0.75), rgba(255,255,255,0));">

  <div class="container-lg d-flex flex-wrap justify-content-center gap-3 p-3">


    <?php foreach($productos as $p) : ?>

      <a class="producto card card-efecto p-2 bg-transparent border-secondary" href="<?= base_url('detalles' . '?id=' . $p['id_producto']) ?>" style="width: 14rem; height: 24rem;"
        data-coleccion="<?= $p['nombre_coleccion'] ?>"
        data-genero="<?= $p['nombre_genero'] ?>"
        data-prenda="<?= $p['nombre_prenda'] ?>">
        <img src="./assets/img/<?= $p['imagen_producto'] ?>" class="img-fluid" alt="..." style="height: 75%; object-fit: cover; background-color: white;">
        <div class="card-body bg-transparent p-0 pt-1" style="height: 25%">
          <h5 class="card-title text-white text-center d-flex align-items-center justify-content-center" style="height: 3rem; overflow: hidden; text-overflow: ellipsis; font-size: 1rem;">
            <?= $p['nombre_producto'] ?>
          </h5>
          <div class="card-text d-flex align-items-center justify-content-between">
            <p class="mb-0 text-white fs-6">ARS$</p>
            <p class="mb-0 text-white fs-4">
              <strong><?= $p['precio_producto'] ?> </strong>
            </p>

            <?php if(!empty(session('login'))) : ?>
              <?php echo form_open('add_cart');
                echo form_hidden('id', $p['id_producto']);
                echo form_hidden('titulo', $p['nombre_producto']);
                echo form_hidden('precio', $p['precio_producto']);
                echo form_hidden('cantidad', '1'); ?>
                <button type="submit" class="btn btn-outline-secondary rounded-pill p-0" style="width: 3.5rem; height: 2rem;">
                  <img class="img-fluid" src="./assets/img/buy-icon.png" alt="buy" style="height: 90%; object-fit: cover;"/>
                </button>
              <?php echo form_close();
              ?>
            <?php endif ?>
          </div>
        </div>
      </a>

    <?php endforeach ?>

  <hr style="border: 0; height: 2px; background-image: linear-gradient(to right, rgba(255,255,255,0), rgba(255,255,255,0.75), rgba(255,255,255,0));">

</main>

<script>
  function filtro(id, nombre) {
    const productos = document.querySelectorAll('.producto');

    // Eliminar filtros anteriores
    productos.forEach(p => {
      p.classList.remove('d-none');
    });

    // Aplicar filtro actual.
    switch(id) {
      case 1:
        productos.forEach(p => {
          p.classList.toggle('d-none', nombre !== 'todos' && p.dataset.coleccion !== nombre);
        });
      break;
      case 2:
        productos.forEach(p => {
          p.classList.toggle('d-none', nombre !== 'todos' && p.dataset.genero !== nombre);
        });
      break;
      case 3:
        productos.forEach(p => {
          p.classList.toggle('d-none', nombre !== 'todos' && p.dataset.prenda !== nombre);
        });
      break;
    }
  }

  function mostrarFiltros(id) {
    const categorias = [1, 2, 3];

    categorias.forEach(c => {
      const elemento = document.getElementById('categoria' + c);
      if (c === id) {
        elemento.classList.remove('d-none'); // mostrar
      } else {
        elemento.classList.add('d-none'); // ocultar
      }
    });
  }
</script>