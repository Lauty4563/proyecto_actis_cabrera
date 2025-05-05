<div class="d-flex align-items-center justify-content-center py-4 bg-contacto">
    <h1 data-aos="fade-down"><?= $titulo ?></h1>
</div>
<div class="container row mx-auto justify-content-evenly my-4 g-3" data-bs-theme="dark">
    <div class="col-md-5 border" data-aos="zoom-in">
        <div class="">
            <h2 class="text-center pt-3">Datos de la Empresa</h2>
            <p class="p-5 mb-0">
                <b> Nombre del Titular: </b> Actis Lautaro <br/>
                <b> Razón Social: </b> Sport Corrientes SRL <br/>
                <b> Domicilio Legal: </b> 9 de Julio 1700, Corrientes Capital, Argentina <br/>
                <b> Teléfono: </b> +54 794 597030 <br/>
                <b> Email: </b> sportcorrientes@gmail.com <br/>
                <b> Horario de Atención: </b> Lunes a Viernes, 9:00 AM – 6:00 PM <br/>
                <br/>
                <b>Otras vías de contacto: </b> <br/>
                <br/>
                <img class="icon mx-1" src="./assets/img/icon_fb.png" />
                <img class="icon mx-1" src="./assets/img/icon_in.png" />
                <img class="icon mx-1" src="./assets/img/icon_ig.png" />
                <img class="icon mx-1" src="./assets/img/icon_wpp.png" />
            </p>
        </div>
    </div>

    <div class="col-md-6 border" data-bs-theme="dark" data-aos="zoom-in">
        <form class="px-5 py-2">
            <div class="py-2 fs-5"><b>Formulario de Contacto</b></div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre completo:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="number" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="asunto" class="form-label">Asunto</label>
                <input type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="mensaje" class="form-label">Mensaje</label>
                <textarea class="form-control bg-dark" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Enviar</button>
        </form>
    </div>

    <div class="my-5 text-center">
        <h4>Nos encontramos en:</h4>
    </div>

    <div class="container pt-3 d-flex justify-content-center" data-aos="zoom-in">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3540.0750781757515!2d-58.831931237404824!3d-27.46692191301753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sar!4v1745434537602!5m2!1ses-419!2sar" 
            width="80%" 
            height="300" 
            style="border:0; box-shadow: 0 0 5px 2px gray;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>