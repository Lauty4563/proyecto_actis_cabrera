<main class="container-fluid p-0">

  <div class="d-flex align-items-center justify-content-center py-4 bg-consultas">
    <h1 data-aos="fade-down"><?= $titulo ?></h1>
  </div>

  <div class="container" data-bs-theme="dark">

    <div class="container-fluid bg-dark-subtle p-4 d-flex align-items-center" style="height: 20px;">
      <p class="mb-0 me-2">categoriaTemporada</p>
      <p class="mb-0 me-2"> > </p>
      <p class="mb-0 me-2">categoriaGénero</p>
      <p class="mb-0 me-2"> > </p>
      <p class="mb-0 me-2">categoriaRopa</p>
    </div>

    <div class="bg-body-secondary p-4 border">
      <div class="row">
        <img class="img-fluid col-7" src="./assets/img/oferta2.jpg" alt="..." style="object-fit: cover;">

        <div class="col-5">
          <div class="border p-4">
            <h2>nombre</h2>
            <p>precio</p>
            <div>Estrellas</div>

            <div>Stock disponible (número)</div>

            <div class="dropdown">
              <button class="btn btn-warning bg-opacity-50 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Cantidad
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">1</a></li>
                <li><a class="dropdown-item" href="#">2</a></li>
                <li><a class="dropdown-item" href="#">3</a></li>
              </ul>
            </div>

            <form>
              <div class="col-auto">
                <label class="visually-hidden" for="autoSizingSelect">Preference</label>
                <select class="form-select" id="autoSizingSelect">
                  <option selected>Forma de Envio</option>
                  <option value="1">Correo Argentino</option>
                  <option value="2">Moto Mensajeria</option>
                  <option value="3">Envíos Internacionales</option>
                </select>
              </div>
            </form>

            <div class="d-grid gap-2">
              <button class="btn btn-primary" type="button">Comprar</button>
              <button class="btn btn-primary" type="button">Agregar al carrito</button>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>

</main>