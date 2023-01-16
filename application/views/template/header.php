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
</head>

<body class="nk-body bg-lighter npc-default has-sidebar no-touch nk-nio-theme">
    <div class="main-wrapper">
        <div class="header header-one">
            <div class="header-left header-left-one">
                <a href="index.html" class="logo">
                    <img src="<?= base_url() ?>assets/img/favicon.png" alt="Logo">
                </a>
                <a href="index.html" class="white-logo">
                    <img src="<?= base_url() ?>assets/img/favicon.png" alt="Logo">
                </a>
                <a href="index.html" class="logo logo-small">
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
                        <a class="dropdown-item" href="login.html"><i data-feather="log-out" class="me-1"></i>
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
                        <li class="submenu">
                            <a href="#"><i data-feather="home"></i> <span> Dashboard</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            </ul>
                        <li class="submenu">
                            <a href="#"><i data-feather="list"></i> <span> Menu</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="<?= base_url('menu') ?>">Menu Management</a></li>
                            </ul>
                        </li>

                    </ul>

                </div>
            </div>
        </div>