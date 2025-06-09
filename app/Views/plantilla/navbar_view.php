<!DOCTYPE html>
<html lang="en">
<navbar class="container-fluid navbar navbar-expand-lg navbar-dark bg-dark-2" >
        <div class="container">
            <a class="navbar-brand text-white dm-sans" href="<?= base_url('/') ?>"
                style="letter-spacing: 1.5px">
                    Sport Corrientes
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <?php if(session('login') == 2) : ?>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link <?= ($active == 'principal') ? 'active text-white border-top border-bottom border-secondary' : '' ?> text-white nav-op dm-sans underline-animation" 
                        href="<?= base_url('user_admin') ?>" >
                            Admin
                        </a>
                        <a class="nav-link <?= ($active == 'ver-consultas') ? 'active text-white border-top border-bottom border-secondary' : '' ?> text-white nav-op dm-sans" 
                        href="<?= base_url('ver_consultas') ?>">
                            Ver consultas
                        </a>
                        <a class="nav-link <?= ($active == 'Listar productos') ? 'active text-white border-top border-bottom border-secondary' : '' ?> text-white nav-op dm-sans" 
                        href="<?= base_url('comercializacion') ?>">
                            Listar productos
                        </a>
                        <a class="nav-link <?= ($active == 'Listar ventas') ? 'active text-white border-top border-bottom border-secondary' : '' ?> text-white nav-op dm-sans" 
                        href="<?= base_url('contacto') ?>">
                            Listar ventas
                        </a>
                        <a class="nav-link <?= ($active == 'registrar-productos') ? 'active text-white border-top border-bottom border-secondary' : '' ?> text-white nav-op dm-sans" 
                        href="<?= base_url('registrar_producto') ?>">
                            Registrar producto
                        </a>
                        <a class="nav-link <?= ($active == 'gestionar-productos') ? 'active text-white border-top border-bottom border-secondary' : '' ?> text-white nav-op dm-sans" 
                        href="<?= base_url('gestionar_productos') ?>">
                            Gestionar Productos
                        </a>
                    </div>
                </div>

            <?php else: ?>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link <?= ($active == 'principal') ? 'active text-white border-top border-bottom border-secondary' : '' ?> text-white nav-op dm-sans underline-animation" 
                        href="<?= base_url('/') ?>" >
                            Principal
                        </a>
                        <a class="nav-link <?= ($active == 'sobre-nosotros') ? 'active text-white border-top border-bottom border-secondary' : '' ?> text-white nav-op dm-sans" 
                        href="<?= base_url('sobre-nosotros') ?>">
                            Sobre Nosotros
                        </a>
                        <a class="nav-link <?= ($active == 'comercializacion') ? 'active text-white border-top border-bottom border-secondary' : '' ?> text-white nav-op dm-sans" 
                        href="<?= base_url('comercializacion') ?>">
                            Comercialización
                        </a>
                        <a class="nav-link <?= ($active == 'contacto') ? 'active text-white border-top border-bottom border-secondary' : '' ?> text-white nav-op dm-sans" 
                        href="<?= base_url('contacto') ?>">
                            Contacto
                        </a>
                        <a class="nav-link <?= ($active == 'terminos') ? 'active text-white border-top border-bottom border-secondary' : '' ?> text-white nav-op dm-sans" 
                        href="<?= base_url('terminos') ?>">
                            Términos y Usos
                        </a>
                        <a class="nav-link <?= ($active == 'productos') ? 'active text-white border-top border-bottom border-secondary' : '' ?> text-white nav-op dm-sans" 
                        href="<?= base_url('productos') ?>">
                            Productos
                        </a>
                    </div>
                </div>
            <?php endif ?>
        </div>
</navbar>