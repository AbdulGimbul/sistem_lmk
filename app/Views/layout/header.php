<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- My Style -->

    <link rel="stylesheet" href="<?= base_url('/assets/css/style.css') ?>">

    <link rel="stylesheet" href="<?= base_url('/assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/css/reset.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/css/style-wizard.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/css/responsive.css') ?>">

    <link rel="stylesheet" href="<?= base_url('/assets/css/bootstrap.min.css') ?>">

    <!-- Google Font: Source Sans Pro -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="<?= base_url('/assets/themes/plugins/fontawesome-free/css/all.min.css') ?>">

    <!-- Ionicons -->

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Tempusdominus Bootstrap 4 -->

    <link rel="stylesheet" href="<?= base_url('/assets/themes/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">

    <!-- iCheck -->

    <link rel="stylesheet" href="<?= base_url('/assets/themes/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">

    <!-- JQVMap -->

    <link rel="stylesheet" href="<?= base_url('/assets/themes/plugins/jqvmap/jqvmap.min.css') ?>">

    <!-- Theme style -->

    <link rel="stylesheet" href="<?= base_url('/assets/themes/dist/css/adminlte.min.css') ?>">

    <!-- overlayScrollbars -->

    <link rel="stylesheet" href="<?= base_url('/assets/themes/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">

    <!-- Daterange picker -->

    <link rel="stylesheet" href="<?= base_url('/assets/themes/plugins/daterangepicker/daterangepicker.css') ?>">

    <!-- summernote -->

    <link rel="stylesheet" href="<?= base_url('/assets/themes/plugins/summernote/summernote-bs4.min.css') ?>">

    <!-- DataTables -->

    <link rel="stylesheet" href="<?= base_url('/assets/themes/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">

    <link rel="stylesheet" href="<?= base_url('/assets/themes/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">

    <link rel="stylesheet" href="<?= base_url('/assets/themes/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">

    <title><?= $title ?></title>



</head>



<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">



        <!-- Preloader -->

        <div class="preloader flex-column justify-content-center align-items-center">

            <img class="animation__shake" src="<?= base_url('/assets/img/default.png') ?>" alt="LMK" width="15%">

        </div>



        <!-- Navbar -->
        <div class="d-none d-sm-inline">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- Right navbar links -->

                <ul class="navbar-nav ml-auto">

                    <?php $session = session() ?>

                    <li class="nav-item dropdown user-menu">

                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">

                            <img src="<?= $session->get('avatar') ?>" class="user-image img-circle elevation-2" alt="User Image">

                            <span class="d-none d-md-inline"><?= $session->get('nama') ?></span>

                        </a>

                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                            <!-- User image -->

                            <li class="user-header bg-primary">

                                <img src="<?= $session->get('avatar') ?>" class="img-circle elevation-2" alt="User Image">

                                <p>

                                    <?= $session->get('nama') ?>

                                    <small>@<?= $session->get('username') ?></small>

                                </p>

                            </li>



                            <!-- Menu Footer-->

                            <li class="user-footer">

                                <a href="<?= base_url('user') ?>" class="btn btn-default btn-flat">Profile</a>

                                <a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-flat float-right">Sign out</a>

                            </li>

                        </ul>

                    </li>

                </ul>

            </nav>
        </div>
        <!-- /.navbar -->