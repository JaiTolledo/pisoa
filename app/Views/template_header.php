<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PISOA</title>
    <!--link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"-->

    <link href="https://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('public/adminlte') ?>/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('public/adminlte') ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?= base_url('public/adminlte') ?>/dist/css/adminlte.min.css">
</head>
<style>
    body {
        font-family: 'Montserrat', sans-serif;
    }

    .navbar-estado {
        background-color: #8E418D;
        color: white !important;
    }

    .navbar-estado .nav-link {
        color: white !important;
    }

    .navbar-estado .nav-link {
        color: white !important;
    }

    .navbar-estado .active {
        color: white !important;
        /*background-color: #713470 !important;*/
    }

    .sidebar-estado {
        background-color: #8E418D;
        /*background-color: #000;*/
        color: white !important;
    }

    .sidebar-estado .active {
        /* background-color: #713470 !important;*/
    }

    footer {
        background-image: url('<?= base_url("public/img/fondo_botom.png") ?>');
        background-repeat: repeat-x;
        background-position: bottom 0px right 100px;
    }

    .highcharts-credits {
        display: none;
    }

    .bg-check {
        color: green;
    }



    .menu-proceso {
        
        background-color: #99dfdb !important;
        color: #000 !important;
        
    }

    .menu-proceso:hover {
        background-color: #00B0A6 !important;
        color: #FFF !important;

    }

    .active-proceso {
        background-color: #009e95 !important;
        color: white !important;
    }

    .badge-default {
        background-color: #ccc;
    }

    .tabulator {
        background-color: #fff !important;
    }

    .active-menu-header {
        background-color: #ba657f !important;
        color: #fff !important;
    }

    .badge-filter {
        border: 1px solid #cecece;
        font-weight: bolder;
        font-size: 14px !important;
    }

    .badge-filter:hover {
        background-color: #691c32;
        color: white;
    }

    .color-verde {
        color: green;
    }

    .color-amarillo {
        color: yellow;
    }

    .color-rojo {
        color: red;
    }

    .color-azul {
        color: blue;
    }

    .color-gris {
        color: gray;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #000 !important;

    }

    .badge-contratado {
        background-color: #832d01 !important;
        color: #fff !important;
    }

    .badge-autorizada {
        background-color: #008080 !important;
        color: #fff !important;
    }

    .tt-autorizado {
        background-color: #E5F4FA !important;
    }

    .tt-autorizado:hover {
        background-color: #ccc !important;
    }


    .tabulator .tabulator-header .tabulator-col {
        color: #fff;        
        background: #B38E5D !important;
      

    }

    .tabulator {
        background-color: #ececec !important;
    }

    .tabulator-col-title {
        text-align: center !important;
    }

    .content-wrapper {
        background-image: url('<?= base_url('public/img/background_greca.png') ?>');
    }

    .main-header {
        background-color: #fff !important;
       
    }

    .main-header .nav-link {
        color: #fff !important;
    }

    .main-header .navbar-nav .nav-item-1 {
        background-color: #8E418D !important;
    }

    .main-header .navbar-nav .nav-item-2 {
        background-color: #7fd7d2 !important;
    }    

    .main-header .navbar-nav .nav-item-3 {
        background-color: #7fb0d7 !important;
    }

    .main-header .navbar-nav .nav-item-4 {
        background-color: #7fd7a6 !important;
    }

    .active_e{
        background-color: #589674 !important;
    }

    .card-body {
        background-color: #f8f8f8;
      
    }

    .main-sidebar {
        background-color: #9D2449 !important;      

    }


    .active_proceso {
        border-bottom: 2px solid white !important;
    }

    .btn-primary {
        background-color: #8E418D !important;
        border: 1px solid #8E418D !important;
    }

    .bg-primary {
        background-color: #9D2449 !important;
    }

    
</style>

<body class="hold-transition sidebar-mini layout-fixed"> 
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand main-top">
            <ul class="navbar-nav">
                <li class="nav-item nav-item-1">
                    <a class="nav-link nav-btn-1" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <?php if (@$entidad_menu) : ?>
                    <li class="nav-item nav-item-4 d-none d-sm-inline-block">
                        <a href="<?= base_url('ejecutora/' . $entidad_id) ?>" class="nav-link <?= (@$active_entidad == 'resumen') ? 'active_e' : '' ?>"><i class="fas fa-chart-pie"></i> Resúmen</a>
                    </li>
                    <li class="nav-item nav-item-4 d-none d-sm-inline-block">
                        <a href="<?= base_url('ejecutora_listado/' . $entidad_id) ?>" class="nav-link <?= (@$active_entidad == 'listado') ? 'active_e' : '' ?>"><i class="far fa-list-alt"></i> Listado</a>
                    </li>
                    <li class="nav-item nav-item-4 d-none d-sm-inline-block">
                        <a href="<?= base_url('ejecutora_mapa/' . $entidad_id) ?>" class="nav-link <?= (@$active_entidad == 'mapa') ? 'active_e' : '' ?>"><i class="fas fa-map-marked-alt"></i> Mapa</a>
                    </li>
                    <li class="nav-item nav-item-4 d-none d-sm-inline-block">
                        <a href="<?= base_url('ejecutora_estimaciones/' . $entidad_id) ?>" class="nav-link <?= (@$active_entidad == 'estimaciones') ? 'active_e' : '' ?>"><i class="fas fa-dollar-sign"></i> Estimaciones</a>
                    </li>
                    <li class="nav-item nav-item-4 d-none d-sm-inline-block">
                        <a href="<?= base_url('ejecutora_pagos/' . $entidad_id) ?>" class="nav-link <?= (@$active_entidad == 'pagos') ? 'active_e' : '' ?>"><i class="fas fa-dollar-sign"></i> Pagos</a>
                    </li>
                    <li class="nav-item nav-item-4 d-none d-sm-inline-block">
                        <a href="<?= base_url('ejecutora_expediente/' . $entidad_id) ?>" class="nav-link <?= (@$active_entidad == 'expediente') ? 'active_e' : '' ?>"><i class="far fa-file-alt"></i> Expediente</a>
                    </li>
                    <li class="nav-item nav-item-4 d-none d-sm-inline-block">
                        <a href="<?= base_url('ejecutora_capturas/' . $entidad_id) ?>" class="nav-link <?= (@$active_entidad == 'capturas') ? 'active_e' : '' ?>"><i class="fas fa-edit"></i> Capturas</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="<?= base_url('item_inicio/0') ?>" class="nav-link"><i class="fas fa-plus"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block active">
                        <a href="<?= base_url('portafolio') ?>" class="nav-link">2023</a>
                    </li>

                <?php endif; ?>
            </ul>


            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Buscar">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>



                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button">
                        <i class="fas fa-out"></i>
                        Salir
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-estado">

            <a href="<?= base_url() ?>" class="brand-link">
                <img src="<?= base_url("public/img/logo_circle.png") ?>" alt="PISOA logo" class="brand-image img-circle " style="opacity: 1">
                <span class="brand-text font-weight-light">PISOA</span>
            </a>


            <div class="sidebar">


                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?= base_url('portada') ?>" class="nav-link <?= @$active_menu_header == 'portada' ? 'active-menu-header' : '' ?>">
                                <i class="nav-icon fas fa-c fa-lg">
                                    <img style="width:20px;" src="<?= base_url("public/img/icons/min_valles.png") ?>" alt="">
                                </i>
                                <p>
                                    Inversión pública
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('ejecutoras') ?>" class="nav-link <?= @$active_menu_header == 'ejecutoras' ? 'active-menu-header' : '' ?>">
                                <i class="nav-icon fas fa-c fa-lg">
                                    <img style="width:20px;" src="<?= base_url("public/img/icons/min_valles.png") ?>" alt="">
                                </i>
                                <p>
                                    Entidades Ejecutoras
                                </p>
                            </a>
                        </li>                       
                        <li class="nav-item">
                            <a href="<?= base_url('obras') ?>" class="nav-link <?= @$active_menu_header == 'obras' ? 'active-menu-header' : '' ?>">
                                <i class="nav-icon fas fa-c fa-lg">
                                    <img style="width:20px;" src="<?= base_url("public/img/icons/min_cuenca.png") ?>" alt="">
                                </i>
                                <p>
                                    Obras
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('acciones') ?>" class="nav-link <?= @$active_menu_header == 'acciones' ? 'active-menu-header' : '' ?>">
                                <i class="nav-icon fas fa-c fa-lg">
                                    <img style="width:20px;" src="<?= base_url("public/img/icons/min_istmo.png") ?>" alt="">
                                </i>
                                <p>
                                    Programas Sociales
                                </p>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-c">
                                    <img style="width:20px;" src="<?= base_url("public/img/icons/min_norte.png") ?>" alt="">
                                </i>
                                <p>
                                    Ejes de Gobierno
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('eje_reparacion') ?>" class="nav-link <?= @$active_menu_header == 'eje_reparacion' ? 'active-menu-header' : '' ?>">
                                        <img style="width:70%" src="<?= base_url("public/img/b_reparacion.png") ?>" alt="">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('eje_desarrollo') ?>" class="nav-link  <?= @$active_menu_header == 'eje_desarrollo' ? 'active-menu-header' : '' ?>">
                                        <img style="width:70%" src="<?= base_url("public/img/b_desarrollo.png") ?>" alt="">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('eje_pacto') ?>" class="nav-link  <?= @$active_menu_header == 'eje_pacto' ? 'active-menu-header' : '' ?>">
                                        <img style="width:70%" src="<?= base_url("public/img/b_pacto.png") ?>" alt="">
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Gerencia
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('gerencia/6/0') ?>" class="nav-link <?= @$active_menu_header == 'gerencia' ? 'active-menu-header' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        Inspecciones
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('gerencia_reportes') ?>" class="nav-link <?= @$active_menu_header == 'gerencia' ? 'active-menu-header' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        Entregables
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('capturas') ?>" class="nav-link  <?= @$active_menu_header == 'capturas' ? 'active-menu-header' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        Capturas
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('gerencia_revisiones') ?>" class="nav-link  <?= @$active_menu_header == 'revisiones' ? 'active-menu-header' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        Revisiones
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="<?= base_url('proveedores') ?>" class="nav-link <?= @$active_menu_header == 'proveedores' ? 'active-menu-header' : '' ?>">
                                <i class="nav-icon fas fa-c">
                                    <img style="width:20px;" src="<?= base_url("public/img/icons/min_sur.png") ?>" alt="">
                                </i>
                                <p>
                                    Proveedores
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('padron') ?>" class="nav-link <?= @$active_menu_header == 'contratistas' ? 'active-menu-header' : '' ?>">
                                <i class="nav-icon fas fa-c">
                                    <img style="width:20px;" src="<?= base_url("public/img/icons/min_sur.png") ?>" alt="">
                                </i>
                                <p>
                                    Contratistas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('mapa/2023') ?>" class="nav-link <?= @$active_menu_header == 'mapa' ? 'active-menu-header' : '' ?>">
                                <i class="nav-icon fas fa-c">
                                    <img style="width:20px;" src="<?= base_url("public/img/icons/min_sur.png") ?>" alt="">
                                </i>
                                <p>
                                    Mapa
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('galeria/2023') ?>" class="nav-link <?= @$active_menu_header == 'galeria' ? 'active-menu-header' : '' ?>">
                                <i class="nav-icon fas fa-c">
                                    <img style="width:20px;" src="<?= base_url("public/img/icons/min_norte.png") ?>" alt="">
                                </i>
                                <p>
                                    Galeria
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('logout') ?>"><i class="nav-icon fas fa-sign-out-alt "></i>
                                <p>salir</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">