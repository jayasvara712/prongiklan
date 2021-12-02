<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Blank Page &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/stisla/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/stisla/assets/css/components.css">
    <link rel="stylesheet" href="<?= base_url() ?>/stisla/assets/css/custom.css">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                </form>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?= site_url("/dashboard") ?>">Stisla</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">St</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li><a class="nav-link" href="<?= site_url("/kategori") ?>"><i class="fas fa-list"></i> <span>Kategori</span></a></li>
                        <li><a class="nav-link" href="<?= site_url("/subkategori") ?>"><i class="fas fa-list"></i> <span>Subkategori</span></a></li>
                        <li class="menu-header">Iklan</li>
                        <li><a class="nav-link" href="<?= site_url("/iklan") ?>"><i class="fas fa-list"></i> <span>Iklan</span></a></li>
                        <!-- <li><a class="nav-link" href="credits.html"><i class="fas fa-list"></i> <span>Subkategori</span></a></li> -->
                        <!-- <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li> -->
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">

                <?= $this->renderSection('content') ?>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url() ?>/stisla/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>/stisla/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/stisla/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?= base_url() ?>/stisla/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="<?= base_url() ?>/stisla/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/assets/js/filter.js"></script>
    <script src="<?= base_url() ?>/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
</body>

</html>