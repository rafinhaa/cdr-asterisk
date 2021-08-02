<nav class="navbar navbar-static-top navbar-expand-lg">
    <!-- Sidebar toggle button -->
    <button id="sidebar-toggler" class="sidebar-toggle">
    <span class="sr-only">Toggle navigation</span>
    </button>
    <!-- search form -->
    <div class="search-form d-none d-lg-inline-block">
        <div class="input-group">
            
        </div>
    </div>
    <div class="navbar-right ">
        <ul class="nav navbar-nav">
            <!-- User Account -->
            <li class="dropdown user-menu">
                <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <img src="<?= base_url('assets/img/user/user.png') ?>" class="user-image" alt="User Image" />
                <span class="d-none d-lg-inline-block"><?= $loggedUser->getFullName() ?></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                    <!-- User image -->
                    <li class="dropdown-header">
                        <img src="<?= base_url('assets/img/user/user.png') ?>" class="img-circle" alt="User Image" />
                        <div class="d-inline-block">
                            <?= $loggedUser->getFullName() ?> <small class="pt-1"><?= $loggedUser->email ?></small>
                        </div>
                    </li>
                    <li>
                        <a href="<?= base_url('users/profile/'.$loggedUser->id ) ?>">
                        <i class="mdi mdi-account"></i> Meu perfil
                        </a>
                    </li>
                    <li class="dropdown-footer">
                        <a href="<?= base_url('/logout') ?>"> <i class="mdi mdi-logout"></i> Sair </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>