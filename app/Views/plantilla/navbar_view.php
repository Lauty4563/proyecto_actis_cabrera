<!DOCTYPE html>
<html lang="en">
<navbar class="navbar navbar-expand-lg bg-body-tertiary" >
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url('/') ?>">Sport Corrientes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link <?= ($active == 'principal') ? 'active' : '' ?>" 
                    href="<?= base_url('/') ?>" >
                        Principal
                    </a>
                    <a class="nav-link <?= ($active == 'sobre-nosotros') ? 'active' : '' ?>" 
                    href="<?= base_url('sobre-nosotros') ?>">
                        Sobre Nosotros
                    </a>
                    <a class="nav-link <?= ($active == 'comercializacion') ? 'active' : '' ?>" 
                    href="<?= base_url('comercializacion') ?>">
                        Comercialización
                    </a>
                    <a class="nav-link <?= ($active == 'contacto') ? 'active' : '' ?>" 
                    href="<?= base_url('contacto') ?>">
                        Contacto
                    </a>
                    <a class="nav-link <?= ($active == 'terminos') ? 'active' : '' ?>" 
                    href="<?= base_url('terminos') ?>">
                        Terminos y Usos
                    </a>
                    <a class="nav-link <?= ($active == 'productos') ? 'active' : '' ?>" 
                    href="<?= base_url('productos') ?>">
                        Productos
                    </a>
                    <a class="nav-link <?= ($active == 'consultas') ? 'active' : '' ?>" 
                    href="<?= base_url('consultas') ?>">
                        Consultas
                    </a>
                </div>
            </div>
        </div>
</navbar>