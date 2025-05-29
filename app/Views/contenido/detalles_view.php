<main class="container-fluid p-0">

  <div class="container my-4" data-bs-theme="dark">

    <div class="container-fluid bg-dark-subtle p-4 d-flex align-items-center" style="height: 20px;">
      <p class="mb-0 me-2">categoriaTemporada</p>
      <p class="mb-0 me-2"> > </p>
      <p class="mb-0 me-2">categoriaGénero</p>
      <p class="mb-0 me-2"> > </p>
      <p class="mb-0 me-2">Producto</p>
    </div>

    <div class="bg-body-secondary p-4 border">
      <div class="row">
        <img 
          id="productoZoom" class="img-fluid col-7 drift-trigger drift-image" src="./assets/img/oferta2.jpg" alt="..." 
          data-zoom="./assets/img/oferta2.jpg"
          style="object-fit: cover;"
        />

        <div class="col-5">
          <div class="position-relative">

            <div id="zoomPane" class="w-100 h-75 z-1"></div>
            <div class="border p-4 z-0">

              <h2>nombre</h2>
              <p>precio</p>
              <div>Estrellas</div>

              <div>Stock disponible (número)</div>

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

  </div>

</main>