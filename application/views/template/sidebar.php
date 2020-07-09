<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img class="img-profile rounded-circle" src="<?= base_url(); ?>assets/img/logo/truck.png" style="max-width: 60px">
        </div>
        <div class="sidebar-brand-text mx-3">eTravel</div>
    </a>

    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu_524535`.`id`, `menu`
    FROM `user_menu_524535` JOIN `user_access_menu_524535`
    ON `user_menu_524535`.`id` = `user_access_menu_524535`.`menu_id`
    WHERE `user_access_menu_524535`.`role_id` = $role_id
    ORDER BY `user_access_menu_524535`.`menu_id` ASC
    ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading pt-3">
            <?= $m['menu']; ?>
        </div>

        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT * FROM `user_sub_menu_524535`
            WHERE `menu_id` = $menuId
            AND `is_active` = '1'
            ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
                </li>

            <?php endforeach; ?>

            <hr class="sidebar-divider">

        <?php endforeach; ?>



        <!--<div class="sidebar-heading">
        Features
    </div>
    <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
                    <i class="far fa-fw fa-window-maximize"></i>
                    <span>Bootstrap UI</span>
                </a>
                <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Bootstrap UI</h6>
                        <a class="collapse-item" href="alerts.html">Alerts</a>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="dropdowns.html">Dropdowns</a>
                        <a class="collapse-item" href="modals.html">Modals</a>
                        <a class="collapse-item" href="popovers.html">Popovers</a>
                        <a class="collapse-item" href="progress-bar.html">Progress Bars</a>
                    </div>
                </div>
            </li>-->
        <div class="version" id="version-ruangadmin"></div>
</ul>
<!-- Sidebar -->
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
            <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <ul class="navbar-nav ml-auto">

                <!--<li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-tasks fa-fw"></i>
                                <span class="badge badge-success badge-counter">3</span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Task
                                </h6>
                                <a class="dropdown-item align-items-center" href="#">
                                    <div class="mb-3">
                                        <div class="small text-gray-500">Design Button
                                            <div class="small float-right"><b>50%</b></div>
                                        </div>
                                        <div class="progress" style="height: 12px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item align-items-center" href="#">
                                    <div class="mb-3">
                                        <div class="small text-gray-500">Make Beautiful Transitions
                                            <div class="small float-right"><b>30%</b></div>
                                        </div>
                                        <div class="progress" style="height: 12px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item align-items-center" href="#">
                                    <div class="mb-3">
                                        <div class="small text-gray-500">Create Pie Chart
                                            <div class="small float-right"><b>75%</b></div>
                                        </div>
                                        <div class="progress" style="height: 12px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">View All Taks</a>
                            </div>
                        </li>-->
                <div class="topbar-divider d-none d-sm-block"></div>

                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="img-profile rounded-circle" src="<?= base_url(); ?>assets/img/user.png" style="max-width: 60px">

                        <span style="color:#fff;" class="ml-2 d-none d-lg-inline small"><?= $user['name']; ?></span>

                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                        <a class="dropdown-item" href="<?= base_url('user_524535'); ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- Topbar -->