<div class="d-flex align-items-center justify-content-center py-4 bg-contacto">
    <h1><?= $titulo ?></h1>
</div>
<div class="container-fluid row mx-auto justify-content-evenly my-4 g-3"
data-bs-theme="dark">
    <div class="col-md-5 border">
        <div class="">
            <h2 class="text-center pt-3">Datos de la Empresa</h2>
            <p class="p-5 mb-0">
                <b> Nombre del Titular: </b> Actis Lautaro <br/>
                <b> Razón Social: </b> Sport Corrientes SRL <br/>
                <b> Domicilio Legal: </b> [Dirección Completa, Ciudad, País] <br/>
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

    <div class="col-md-6 border" data-bs-theme="dark">
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
</div>