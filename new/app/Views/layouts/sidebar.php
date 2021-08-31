<div id="sidebar" class="sidebar">
    <!-- Aplication Brand -->
    <div class="app-brand">
        <a href="<?= base_url('/') ?>" title="Sleek Dashboard">
            <svg
                class="brand-icon"
                xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="xMidYMid"
                width="30"
                height="33"
                viewBox="0 0 30 33"
                >
                <g fill="none" fill-rule="evenodd">
                    <path
                        class="logo-fill-blue"
                        fill="#7DBCFF"
                        d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
                        />
                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                </g>
            </svg>
            <span class="brand-name text-truncate">CDR Dashboard</span>
        </a>
    </div>
    <!-- begin sidebar scrollbar -->
    <div class="sidebar-scrollbar">
        <!-- sidebar menu -->
        <ul class="nav sidebar-inner" id="sidebar-menu">
            <li  class="has-sub <?= menu($menuActive,'dash','active') ?>" >
                <a class="sidenav-item-link" href="<?= base_url('/') ?>">
                    <i class="mdi mdi-view-dashboard-outline"></i>
                    <span class="nav-text"><?= lang('Cdr.sidebar.dashboard') ?></span>
                </a>                
            </li>
            <li  class="has-sub <?= menu($menuActive,'cdr','active') ?>" >
                <a class="sidenav-item-link" href="<?= base_url('/cdr') ?>">
                    <i class="mdi mdi-format-list-bulleted"></i>
                    <span class="nav-text"><?= lang('Cdr.sidebar.cdr') ?></span>
                </a>                
            </li>
            <?php if (in_array('users-list', $loggedUserPermissions) && in_array('users-add', $loggedUserPermissions) ): ?>
            <li  class="has-sub <?= menu($menuActive,'users','active') ?>" >
                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#users" aria-expanded="false" aria-controls="users">
                    <i class="mdi mdi-account-group"></i>
                    <span class="nav-text"><?= lang('Cdr.sidebar.users') ?></span> <b class="caret"></b>
                </a>                                
                <ul  class="collapse <?= menu($menuActive,'users','show') ?>"  id="users"
                    data-parent="#sidebar-menu">
                    <div class="sub-menu">
                        <?php if (in_array('users-list', $loggedUserPermissions) ): ?>
                            <li class="<?= menu($menuActive,'list','active') ?>" >
                                <a class="sidenav-item-link" href="<?= base_url('/users/list') ?>">
                                <span class="nav-text"><?= lang('Cdr.sidebar.allUsers') ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (in_array('users-add', $loggedUserPermissions) ): ?>
                            <li class="<?= menu($menuActive,'add','active') ?>" >
                                <a class="sidenav-item-link active" href="<?= base_url('/users/add') ?>">
                                <span class="nav-text"><?= lang('Cdr.sidebar.addUser') ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </div>
                </ul>
            </li>
            <?php endif; ?>
            <li  class="has-sub <?= menu($menuActive,'config','active') ?>" >
                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#config" aria-expanded="false" aria-controls="users">
                    <i class="mdi mdi-settings"></i>
                    <span class="nav-text"><?= lang('Cdr.sidebar.settings') ?></span> <b class="caret"></b>
                </a>                                
                <ul  class="collapse <?= menu($menuActive,'config','show') ?>"  id="config"
                    data-parent="#sidebar-menu">
                    <div class="sub-menu">
                        <li class="<?= menu($menuActive,'groups','active') ?>" >
                            <a class="sidenav-item-link" href="<?= base_url('/config/groups') ?>">
                            <span class="nav-text"><?= lang('Cdr.sidebar.groups') ?></span>
                            </a>
                        </li>
                    </div>
                </ul>
            </li>            
        </ul>
    </div>
</div