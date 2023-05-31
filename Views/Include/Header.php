<!DOCTYPE html>
<html lang="en">
<?php
// Obteniendo URL de la ágina actual
$host = $_SERVER["HTTP_HOST"];
$url = $_SERVER["REQUEST_URI"];

// En caso de poseer GET se le quita
if (strrpos($url, '?') === false) {
    $sin_get = "http://" . $host . $url;
} else {
    $url = explode("?", $url);
    $sin_get = "http://" . $host . $url[0];
}

$cantidad_s = substr_count($sin_get, "/");
if ($cantidad_s >= 6) {
    $slash = '../../';
} else {
    $slash = '../';
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Captación | <?= $menu_open ?></title>

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= $slash ?>Assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= $slash ?>Assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $slash ?>Assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= $slash ?>Assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ion Icons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= $slash ?>Assets/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= $slash ?>Assets/css/adicional.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= $slash ?>Assets/plugins/daterangepicker/daterangepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js" defer></script>
    <style>
        .cintillo {
            background-color: #2E219E !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= $slash ?>Assets/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header">
            <!-- <div class="cintillo">
                <img src="../Assets/img/CintilloInamujer.png" class="img-responsive" alt="">
            </div> -->
            <!-- Left navbar links -->
            <div class="navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>

                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Navbar Search -->
                    <li class="nav-item">
                        <a href="<?= $slash ?>Usuarios/logout/0" class="nav-link icon mr-2">
                            Cerrar Sesión <i class="ion ion-log-out"></i>
                        </a>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= $slash ?>Dashboard/dashboard" class="brand-link text-center">
                <span class="brand-text font-weight-light ">Captación Redes</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= $slash ?>Assets/img/user.png" class="img-circle elevation-2" alt="User Image">
                    </div>

                    <div class="info">
                        <!-- Nombre del usuario que lleva al dashborad o página principal -->
                        <a href="<?= $sin_get ?>" class="d-block"><?= $_SESSION['nombre'] ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Pruebas -->
                        <li class="nav-item <?= ($menu_open == 'pruebas') ? 'menu-open' : '' ?> pruebas">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-folder-open"></i>
                                <p>
                                    Pruebas
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <?php

                                if ($_SESSION['rol'] != 4) {
                                ?>
                                    <li class="nav-item">
                                        <a href="<?= $slash ?>Pruebas/listar" class="nav-link <?= ($activo == 'ListarPruebas') ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listar Pruebas</p>
                                        </a>
                                    </li>
                                <?php

                                }

                                if ($_SESSION['rol'] == 4) {
                                ?>
                                    <li class="nav-item">
                                        <a href="<?= $slash ?>Pruebas/realizar" class="nav-link <?= ($activo == 'RealizarPruebas') ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Realizar Pruebas</p>
                                        </a>
                                    </li>
                                <?php

                                }
                                ?>
                            </ul>
                        </li>

                        <?php

                        if ($_SESSION['rol'] != 4) {
                        ?>
                            <li class="nav-item <?= ($menu_open == 'preguntas') ? 'menu-open' : '' ?> preguntas">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-folder-open"></i>
                                    <p>
                                        Preguntas
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= $slash ?>Preguntas/listar" class="nav-link <?= ($activo == 'ListarPreguntas') ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listar Preguntas</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <!-- Usuarios -->
                            <li class="nav-item <?= ($menu_open == 'usuarios') ? 'menu-open' : '' ?> usuarios">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Usuarios
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= $slash ?>Usuarios/listar" class="nav-link <?= ($activo == 'ListarUsuarios') ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listar Usuarios</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Estadísticas -->
                            <li class="nav-item <?= ($menu_open == 'estadisticas') ? 'menu-open' : '' ?> estadisticas">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chart-area"></i>
                                    <p>
                                        Estadísticas
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= $slash ?>Estadisticas/realizados" class="nav-link <?= ($activo == 'EstadoBien') ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Cantidad de Pruebas</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= $slash ?>Estadisticas/cargos" class="nav-link <?= ($activo == 'TipoActa') ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Cargos de Postulantes</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Configuración -->
                            <li class="nav-item configuracion">
                                <a href="<?= $slash ?>Usuarios/configuracion" class="nav-link <?= ($activo == 'ConfiguracionUsuarios') ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-address-book"></i>
                                    <p>
                                        Configuración
                                    </p>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Contiene toda la página -->
        <div class="content-wrapper">

            <?php
            // Requiere las alertas
            Alertas($alerta);
            ?>

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-12">
                            <h1 class="m-0"><?= $titulo ?></h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->