<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title><?= $title ?></title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon.png">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2/css/select2.min.css">
</head>

<body class="nk-body bg-lighter npc-default has-sidebar no-touch nk-nio-theme">
    <div class="main-wrapper">
        <div class="header header-one">
            <div class="header-left header-left-one">
                <a href="<?= base_url('dashboard') ?>" class="logo">
                    <img src="<?= base_url() ?>assets/img/favicon.png" alt="Logo">
                </a>
                <a href="<?= base_url('dashboard') ?>" class="white-logo">
                    <img src="<?= base_url() ?>assets/img/favicon.png" alt="Logo">
                </a>
                <a href="<?= base_url('dashboard') ?>" class="logo logo-small">
                    <img src="<?= base_url() ?>assets/img/favicon.png" alt="Logo" width="30" height="30">
                </a>
            </div>
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-bars"></i>
            </a>
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>
            <ul class="nav nav-tabs user-menu">
                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img src="<?= base_url() ?>assets/img/neko.png" alt="">
                            <span class="status online"></span>
                        </span>
                        <span>Admin</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i data-feather="log-out"
                                class="me-1"></i>
                            Logout</a>
                    </div>
                </li>
            </ul>
        </div>

        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title"><span>Main</span></li>
                        <?php
                        $role_id = $this->session->userdata('role_id');
                        $queryMenu = "SELECT `user_menu`.`id`, `menu`,`icon`
                                FROM `user_menu` JOIN `user_access_menu`
                                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                                WHERE `user_access_menu`.`role_id` = $role_id
                                ORDER BY `user_access_menu`.`menu_id` ASC
                ";
                        $menu = $this->db->query($queryMenu)->result_array();
                        ?>
                        <?php
                        foreach ($menu as $m) :
                        ?>
                        <li class="submenu">
                            <a href="<?= base_url() . $m['menu'] ?>"><i data-feather="<?= $m['icon'] ?>"></i> <span>
                                    <?= $m['menu']; ?></span> <span class="menu-arrow"></span></a>
                            <?php
                                $menuId = $m['id'];
                                $querySubMenu = "SELECT *
                        FROM `user_submenu` JOIN `user_menu`
                            ON `user_submenu`.`menu_id` = `user_menu`.`id`
                        WHERE `user_submenu`.`menu_id` = $menuId
                        AND `user_submenu`.`is_active` = 1";
                                $subMenu = $this->db->query($querySubMenu)->result_array();
                                ?>
                            <ul>
                                <?php foreach ($subMenu as $sm) : ?>
                                <li><a href="<?= base_url() . $sm['url'] ?>"><?= $sm['submenu']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <?php endforeach; ?>

                    </ul>

                </div>
            </div>
        </div>