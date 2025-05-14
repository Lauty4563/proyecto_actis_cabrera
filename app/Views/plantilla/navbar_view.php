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
        </div>
</navbar>
</header>