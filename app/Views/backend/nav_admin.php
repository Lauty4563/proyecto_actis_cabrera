<navbar class="container-fluid navbar-admin navbar-expand-lg navbar-dark bg-dark-2" >
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
                    <a class="nav-link <?= ($active == 'Ver consultas') ? 'active text-white border-top border-bottom border-secondary' : '' ?> text-white nav-op dm-sans" 
                    href="<?= base_url('') ?>">
                        
                    </a>
                    <a class="nav-link <?= ($active == 'Listar productos') ? 'active text-white border-top border-bottom border-secondary' : '' ?> text-white nav-op dm-sans" 
                    href="<?= base_url('') ?>">
                        
                    </a>
                    <a class="nav-link <?= ($active == 'Listar ventas') ? 'active text-white border-top border-bottom border-secondary' : '' ?> text-white nav-op dm-sans" 
                    href="<?= base_url('') ?>">

                    </a>
                    <a class="nav-link <?= ($active == 'Registrar producto') ? 'active text-white border-top border-bottom border-secondary' : '' ?> text-white nav-op dm-sans" 
                    href="<?= base_url('') ?>">

                    </a>
                    <a class="nav-link <?= ($active == 'Gestionar Productos') ? 'active text-white border-top border-bottom border-secondary' : '' ?> text-white nav-op dm-sans" 
                    href="<?= base_url('') ?>">

                    </a>
                </div>
            </div>
        </div>
</navbar>