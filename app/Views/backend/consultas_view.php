<div class="container py-4">
    <h2 class="mb-4">Consultas recibidas</h2>

    <?php if (session()->getFlashdata('mensaje_respuesta')): ?>
        <div class="alert alert-success">
            <?= session('mensaje_respuesta') ?>
        </div>
    <?php endif ?>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Asunto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mensajes as $mensaje): ?>
                <tr>
                    <td><?= esc($mensaje['nombre_mensaje']) ?></td>
                    <td><?= esc($mensaje['email_mensaje']) ?></td>
                    <td><?= esc($mensaje['asunto_mensaje']) ?></td>
                    <td>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#verMensaje<?= $mensaje['id_mensaje'] ?>">
                            Ver
                        </button>
                    </td>
                </tr>

                <!-- Modal de visualización y respuesta -->
                <div class="modal fade" id="verMensaje<?= $mensaje['id_mensaje'] ?>" tabindex="-1" aria-labelledby="modalLabel<?= $mensaje['id_mensaje'] ?>" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="<?= base_url('responder_consulta') ?>" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel<?= $mensaje['id_mensaje'] ?>">Consulta de <?= esc($mensaje['nombre_mensaje']) ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Email:</strong> <?= esc($mensaje['email_mensaje']) ?></p>
                                    <p><strong>Teléfono:</strong> <?= esc($mensaje['telefono_mensaje']) ?></p>
                                    <p><strong>Asunto:</strong> <?= esc($mensaje['asunto_mensaje']) ?></p>
                                    <p><strong>Mensaje:</strong></p>
                                    <div class="border p-3 bg-light">
                                        <?= esc($mensaje['texto_mensaje']) ?>
                                    </div>

                                    <hr>
                                    <div class="form-group mt-3">
                                        <label for="respuesta<?= $mensaje['id_mensaje'] ?>">Tu respuesta:</label>
                                        <textarea class="form-control" name="respuesta" id="respuesta<?= $mensaje['id_mensaje'] ?>" rows="5" required></textarea>
                                    </div>
                                    <input type="hidden" name="email_destinatario" value="<?= esc($mensaje['email_mensaje']) ?>">
                                    <input type="hidden" name="nombre_destinatario" value="<?= esc($mensaje['nombre_mensaje']) ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Enviar respuesta</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
