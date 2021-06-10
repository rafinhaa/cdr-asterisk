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
            <span class="brand-name text-truncate">Sleek Dashboard</span>
        </a>
    </div>
    <!-- begin sidebar scrollbar -->
    <div class="sidebar-scrollbar">
        <!-- sidebar menu -->
        <ul class="nav sidebar-inner" id="sidebar-menu">
            <li  class="has-sub active" >
                <a class="sidenav-item-link" href="<?= base_url('/') ?>">
                    <i class="mdi mdi-view-dashboard-outline"></i>
                    <span class="nav-text">Dashboard</span>
                </a>                
            </li>
            <li  class="has-sub" >
                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#users" aria-expanded="false" aria-controls="users">
                    <i class="mdi mdi-pencil-box-multiple"></i>
                    <span class="nav-text">Usuários</span> <b class="caret"></b>
                </a>                
                <ul  class="collapse"  id="users"
                    data-parent="#sidebar-menu">
                    <div class="sub-menu">
                        <li >
                            <a class="sidenav-item-link" href="example-1.html">
                            <span class="nav-text">Todos usuários</span>
                            </a>
                        </li>
                        <li >
                            <a class="sidenav-item-link" href="<?= base_url('/users/add') ?>">
                            <span class="nav-text">Adicionar</span>
                            </a>
                        </li>
                    </div>
                </ul>
            </li>
            <li  class="has-sub" >
                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#example" aria-expanded="false" aria-controls="example">
                    <i class="mdi mdi-pencil-box-multiple"></i>
                    <span class="nav-text">Example</span> <b class="caret"></b>
                </a>                
                <ul  class="collapse"  id="example"
                    data-parent="#sidebar-menu">
                    <div class="sub-menu">
                        <li >
                            <a class="sidenav-item-link" href="example-1.html">
                            <span class="nav-text">Example 1</span>
                            </a>
                        </li>
                        <li >
                            <a class="sidenav-item-link" href="example-2.html">
                            <span class="nav-text">Example 2</span>
                            </a>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</div