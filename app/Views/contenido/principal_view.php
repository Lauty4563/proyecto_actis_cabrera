<div class="container">

<div>
<hr class="my-4" style="border: 0; height: 2px; background-image: linear-gradient(to right, rgba(255,255,255,0), rgba(255,255,255,0.75), rgba(255,255,255,0));">
  <div id="carouselExample" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-item active">
        <img src="./assets/img/principal4.jpg" class="d-block w-100"  alt="...">
      </div>
      <div class="carousel-item">
        <img src="./assets/img/principal.gif" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="./assets/img/principal3.jpg" class="d-block w-100" alt="...">
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
    </div>
  </div>  
</div> 

<hr class="my-5" style="border: 0; height: 2px; background-image: linear-gradient(to right, rgba(255,255,255,0), rgba(255,255,255,0.75), rgba(255,255,255,0));">

<div class="text-center">
    <h4>DESTACADOS</h4>
</div>

<hr class="mt-5" style="border: 0; height: 2px; background-image: linear-gradient(to right, rgba(255,255,255,0), rgba(255,255,255,0.75), rgba(255,255,255,0));">

<section class="container-fluid mt-3">
    <div class="row align-items-center container-fluid mt-5">

        <div class="col-md-3 d-flex align-items-center justify-content-center" data-aos="fade-right">
            <img src="./assets/img/ofertas.jpg" alt="Ofertas" class="img-fluid">
        </div>

        <div class="swiper mySwiper col-md-9">
            
            <div class="swiper-wrapper">

                <div class="swiper-slide p-2">
                    <a class="card w-100 p-2 bg-transparent border-secondary" href="<?= base_url('detalles') . '?id=1' ?>" style="width: 14rem;">
                        <img src="./assets/img/oferta1.jpg" class="img-fluid" alt="..." style="height: 75%; object-fit: cover;">
                        <div class="card-body bg-transparent p-0 pt-1" style="height: 25%">
                            <h5 class="card-title text-white text-center d-flex align-items-center justify-content-center" style="height: 3rem; overflow: hidden; text-overflow: ellipsis; font-size: 1rem;">
                                Zapatillas Nike Air Max Hombre
                            </h5>
                            <div class="card-text d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-white fs-6"><strong> ARS$ 199,99 </strong></p>
                                <button type="button" class="btn btn-outline-secondary rounded-pill p-0" data-bs-toggle="button" style="width: 3.5rem; height: 2rem;">
                                    <img class="img-fluid" src="./assets/img/buy-icon.png" alt="buy" style="height: 90%; object-fit: cover;"/>
                                </button>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="swiper-slide p-2">
                    <a class="card w-100 p-2 bg-transparent border-secondary" href="<?= base_url('detalles') . '?id=2' ?>" style="width: 14rem;">
                        <img src="./assets/img/otoño1.jpg" class="img-fluid" alt="..." style="height: 75%; object-fit: cover;">
                        <div class="card-body bg-transparent p-0 pt-1" style="height: 25%">
                            <h5 class="card-title text-white text-center d-flex align-items-center justify-content-center" style="height: 3rem; overflow: hidden; text-overflow: ellipsis; font-size: 1rem;">
                                Campera Running Puma Mesh
                            </h5>
                            <div class="card-text d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-white fs-6"><strong> ARS$ 199.99 </strong></p>
                                <button type="button" class="btn btn-outline-secondary rounded-pill p-0" data-bs-toggle="button" style="width: 3.5rem; height: 2rem;">
                                    <img class="img-fluid" src="./assets/img/buy-icon.png" alt="buy" style="height: 90%; object-fit: cover;"/>
                                </button>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="swiper-slide p-2">
                    <a class="card w-100 p-2 bg-transparent border-secondary" href="<?= base_url('detalles') . '?id=3' ?>" style="width: 14rem;">
                        <img src="./assets/img/oferta2.jpg" class="img-fluid" alt="..." style="height: 75%; object-fit: cover;">
                        <div class="card-body bg-transparent p-0 pt-1" style="height: 25%">
                            <h5 class="card-title text-white text-center d-flex align-items-center justify-content-center" style="height: 3rem; overflow: hidden; text-overflow: ellipsis; font-size: 1rem;">
                                Zapatillas Running Puma
                            </h5>
                            <div class="card-text d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-white fs-6"><strong> ARS$ 89.99 </strong></p>
                                <button type="button" class="btn btn-outline-secondary rounded-pill p-0" data-bs-toggle="button" style="width: 3.5rem; height: 2rem;">
                                    <img class="img-fluid" src="./assets/img/buy-icon.png" alt="buy" style="height: 90%; object-fit: cover;"/>
                                </button>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="swiper-slide p-2">
                    <a class="card w-100 p-2 bg-transparent border-secondary" href="<?= base_url('detalles') . '?id=4' ?>" style="width: 14rem;">
                        <img src="./assets/img/otoño3.jpg" class="img-fluid" alt="..." style="height: 75%; object-fit: cover;">
                        <div class="card-body bg-transparent p-0 pt-1" style="height: 25%">
                            <h5 class="card-title text-white text-center d-flex align-items-center justify-content-center" style="height: 3rem; overflow: hidden; text-overflow: ellipsis; font-size: 1rem;">
                                Remera Training Hang Loose
                            </h5>
                            <div class="card-text d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-white fs-6"><strong> ARS$ 119.99 </strong></p>
                                <button type="button" class="btn btn-outline-secondary rounded-pill p-0" data-bs-toggle="button" style="width: 3.5rem; height: 2rem;">
                                    <img class="img-fluid" src="./assets/img/buy-icon.png" alt="buy" style="height: 90%; object-fit: cover;"/>
                                </button>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="swiper-slide p-2">
                    <a class="card w-100 p-2 bg-transparent border-secondary" href="<?= base_url('detalles') . '?id=5' ?>" style="width: 14rem;">
                        <img src="./assets/img/oferta3.jpg" class="img-fluid" alt="..." style="height: 75%; object-fit: cover;">
                        <div class="card-body bg-transparent p-0 pt-1" style="height: 25%">
                            <h5 class="card-title text-white text-center d-flex align-items-center justify-content-center" style="height: 3rem; overflow: hidden; text-overflow: ellipsis; font-size: 1rem;">
                                Zapatillas Puma Park Lifestyle
                            </h5>
                            <div class="card-text d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-white fs-6"><strong> ARS$ 119.99 </strong></p>
                                <button type="button" class="btn btn-outline-secondary rounded-pill p-0" data-bs-toggle="button" style="width: 3.5rem; height: 2rem;">
                                    <img class="img-fluid" src="./assets/img/buy-icon.png" alt="buy" style="height: 90%; object-fit: cover;"/>
                                </button>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="swiper-slide p-2">
                    <a class="card w-100 p-2 bg-transparent border-secondary" href="<?= base_url('detalles') . '?id=6' ?>" style="width: 14rem;">
                        <img src="./assets/img/otoño2.jpg" class="img-fluid" alt="..." style="height: 75%; object-fit: cover;">
                        <div class="card-body bg-transparent p-0 pt-1" style="height: 25%">
                            <h5 class="card-title text-white text-center d-flex align-items-center justify-content-center" style="height: 3rem; overflow: hidden; text-overflow: ellipsis; font-size: 1rem;">
                            Buzo Training Kion Skill
                            </h5>
                            <div class="card-text d-flex align-items-center justify-content-between">
                                <p class="mb-0 text-white fs-6"><strong> ARS$ 89.99 </strong></p>
                                <button type="button" class="btn btn-outline-secondary rounded-pill p-0" data-bs-toggle="button" style="width: 3.5rem; height: 2rem;">
                                    <img class="img-fluid" src="./assets/img/buy-icon.png" alt="buy" style="height: 90%; object-fit: cover;"/>
                                </button>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <!-- Botones de navegación -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

    </div>

</section>

<hr class="my-5" style="border: 0; height: 2px; background-image: linear-gradient(to right, rgba(255,255,255,0), rgba(255,255,255,0.75), rgba(255,255,255,0));">


  <div class="text-center">
    <h4>EXPLORÁ POR MARCAS</h4>
  </div>

  <hr class="my-5" style="border: 0; height: 2px; background-image: linear-gradient(to right, rgba(255,255,255,0), rgba(255,255,255,0.75), rgba(255,255,255,0));">

  <div id="carouselMarcas" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="row justify-content-center">
        <div class="col-4 col-sm-2">
          <img src="./assets/img/Adidas.jpg" class="d-block mx-auto" alt="Marca 1">
        </div>
        <div class="col-4 col-sm-2">
          <img src="./assets/img/Nike.jpg" class="d-block mx-auto" alt="Marca 2">
        </div>
        <div class="col-4 col-sm-2">
          <img src="./assets/img/Puma.jpg" class="d-block mx-auto" alt="Marca 3">
        </div>
        <div class="col-4 col-sm-2">
          <img src="./assets/img/NewBalance.jpg" class="d-block mx-auto" alt="Marca 4">
        </div>
        <div class="col-4 col-sm-2">
          <img src="./assets/img/Asics.jpg" class="d-block mx-auto" alt="Marca 5">
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="row justify-content-center">
        
        <div class="col-4 col-sm-2">
          <img src="./assets/img/Montagne.jpg" class="d-block mx-auto" alt="Marca 6">
        </div>
        <div class="col-4 col-sm-2">
          <img src="./assets/img/UnderArmour.jpg" class="d-block mx-auto" alt="Marca 7">
        </div>
        <div class="col-4 col-sm-2">
          <img src="./assets/img/Salomon.jpg" class="d-block mx-auto" alt="Marca 8">
        </div>
        <div class="col-4 col-sm-2">
          <img src="./assets/img/Reebok.jpg" class="d-block mx-auto" alt="Marca 9">
        </div>
        <div class="col-4 col-sm-2">
          <img src="./assets/img/Penalty.jpg" class="d-block mx-auto" alt="Marca 10">
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselMarcas" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselMarcas" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
  
<hr class="my-5" style="border: 0; height: 2px; background-image: linear-gradient(to right, rgba(255,255,255,0), rgba(255,255,255,0.75), rgba(255,255,255,0));">

  <div class="text-center">
    <h4>EXPLORÁ POR GÉNERO</h4>
  </div>

<hr class="my-5" style="border: 0; height: 2px; background-image: linear-gradient(to right, rgba(255,255,255,0), rgba(255,255,255,0.75), rgba(255,255,255,0));">

  <div class="row w-100" data-bs-theme="dark">
    
    <img src="./assets/img/mujer.jpg" class="col-4 img-categoria" alt="categoria_mujer">
    
    <img src="./assets/img/hombre.jpg" class="col-4 img-categoria" alt="categoria_hombre">

    <img src="./assets/img/kids.jpg" class="col-4 img-categoria" alt="categoria_niños">
  </div>
</div>

<hr class="my-5" style="border: 0; height: 2px; background-image: linear-gradient(to right, rgba(255,255,255,0), rgba(255,255,255,0.75), rgba(255,255,255,0));">

<div class="d-flex align-items-center justify-content-center py-2 bg-dark text-white" data-aos="fade-up">
  <div class="p-5 rounded text-center" style="max-width: 800px; width: 100%;">
    <h2 class="text-light mb-4">Nosotros</h2>
    <p class="text-white">Somos la tienda N° 1 de Corrientes, ofreciendo los mejores productos deportivos para ti.</p>
  </div>
</div>

<hr class="my-5" style="border: 0; height: 2px; background-image: linear-gradient(to right, rgba(255,255,255,0), rgba(255,255,255,0.75), rgba(255,255,255,0));">

<div class="d-flex align-items-center justify-content-center py-5 bg-principal">
  <div class="bg-dark bg-opacity-75 p-5 rounded text-center text-white" style="max-width: 500px; width: 100%;">
    <h1 data-aos="fade-down" class="mb-4 text-white text-shadow">SUSCRIBETE</h1>
    <p class="mb-4 text-white">para recibir novedades y ofertas</p>

    <form action="suscripcion.php" method="POST">
      <div class="input-group">
        <input type="email" name="email" class="form-control" placeholder="Ingresá tu email" required>
        <button type="submit" class="btn btn-primary">Suscribirme</button>
      </div>
    </form>
  </div>
</div>

<hr class="my-5" style="border: 0; height: 2px; background-image: linear-gradient(to right, rgba(255,255,255,0), rgba(255,255,255,0.75), rgba(255,255,255,0));">

</div>

</div>