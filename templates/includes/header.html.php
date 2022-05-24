
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestion-Insriptions</title>

    <!-- Custom fonts for this template-->
    <link href="<?= $front_template ?>/accueil/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= $front_template ?>/accueil/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="<?= $url_base ?>bootstrap5/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $url_base ?>css/style.css">
    <link rel="stylesheet" href="<?= $url_base ?>css/animate.css">
    <!-- <link rel="stylesheet" href="<?= $url_base ?>bootstrap5/dist/js/bootstrap.min.js"> -->



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Gest-Ins</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= $url_base ?>Securite/login">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->

            <!-- Nav Item - Pages Collapse Menu -->
            <?php if($role->isRP()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php $url_base ?>/Classe/lister">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Classes</span></a>
                </li>
            <?php endif; ?>
            <!-- Nav Item - Utilities Collapse Menu -->
            <?php if($role->isRP()): ?>

                <li class="nav-item">
                    <a class="nav-link" href="<?php $url_base ?>/Professeur/lister">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Professeurs</span></a>
                </li>

            <?php endif; ?>

            <!-- Nav Item - Pages Collapse Menu -->
            <?php if($role->isRP()):?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php $url_base ?>/Module/lister">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Modules</span></a>
                </li>
            <?php endif; ?>

            <?php if($role->isAC()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php $url_base ?>/Demande/lister">
                        <i class="fas fa-fw fa-table"></i>
                        <span>etudiant</span></a>
                </li>
            <?php endif; ?>

            <!-- Nav Item - Charts -->
            <?php if($role->isAC() || $role->isEtudiant()): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php $url_base ?>/Inscription/lister">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Inscriptions</span></a>
            </li>
            <?php endif; ?>
            <!-- Nav Item - Tables -->
            <?php if($role->isRP() || $role->isAC() || $role->isEtudiant()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php $url_base ?>/Demande/lister">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Demandes</span></a>
                </li>
            <?php endif; ?>
                
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li><a href="<?php $url_base ?>/Securite/logout">Logout</a></li>
                        
                    </ul>
                
                </nav>