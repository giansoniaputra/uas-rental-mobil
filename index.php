<?php
session_start();
// var_dump(empty($_SESSION['username_gian_sonia']));
if (empty($_SESSION['username_gian_sonia']) && empty($_SESSION['password_gian_sonia'])) {
    echo '
    <script>
    alert("Silahkan login Terlebih Dahulu");
    document.location.href = "auth/index.php"
    </script>
    ';
}

include 'config/connection.php';
include 'controller/MobilController.php';
include 'controller/PelangganController.php';
include 'controller/RentalController.php';
include 'helper.php';
$title = 'Gian Mobil';
if (isset($_GET['page'])) {
    if ($_GET['page'] == 'mobil') {
        $title .= ' | Data Mobil';
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'add') {
                $title2 = 'Tambah Data Mobil';
            } else if ($_GET['action'] == 'edit') {
                $title2 = 'Edit Data Mobil';
            } else if ($_GET['action'] == 'hapus') {
                $title2 = 'Hapus Data Mobil';
            }
        } else {
            $title2 = 'Data Mobil';
        }
    } else if ($_GET['page'] == 'pelanggan') {
        $title .= ' | Data Pelanggan';
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'add') {
                $title2 = 'Tambah Data Pelanggan';
            } else if ($_GET['action'] == 'edit') {
                $title2 = 'Edit Data Pelanggan';
            } else if ($_GET['action'] == 'hapus') {
                $title2 = 'Hapus Data Pelanggan';
            }
        } else {
            $title2 = 'Data Pelanggan';
        }
    } else if ($_GET['page'] == 'rental') {
        $title .= ' | Data Rental';
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'add') {
                $title2 = 'Tambah Data Rental';
            } else if ($_GET['action'] == 'edit') {
                $title2 = 'Edit Data Rental';
            } else if ($_GET['action'] == 'hapus') {
                $title2 = 'Hapus Data Rental';
            }
        } else {
            $title2 = 'Data Rental';
        }
    }
} else {
    $title2 = 'Selamat Datang';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="asset/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="asset/css/adminlte.min.css">
    <script src="asset/jquery.min.js"></script>
    <link rel="stylesheet" href="asset/sweetalert2.min.css">
    <script src="asset/sweetalert2.all.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <?php if (isset($_GET['pesan'])) : ?>
        <div class="pesan" data-pesan="<?= $_GET['pesan']; ?>"></div>
    <?php else : ?>
        <div class="pesan" data-pesan=""></div>
    <?php endif; ?>
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button type="button" class="nav-link btn-logout bg-transparent" style="border:0;">
                        <i class="fas fa-sign-out-alt"></i>
                        <p class="d-inline">Logout</p>
                    </button>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index3.html" class="brand-link">
                <img src="asset/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Rental Gian</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="asset/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Gian Sonia</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <?php include 'menu.php'; ?>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?= $title2; ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"><?= $title2; ?></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?php
                    if (isset($_GET['page'])) {
                        if ($_GET['page'] == 'mobil') {
                            if (isset($_GET['action'])) {
                                if ($_GET['action'] == 'add') {
                                    include 'page/mobil/add.php';
                                } else if ($_GET['action'] == 'edit') {
                                    include 'page/mobil/edit.php';
                                } else if ($_GET['action'] == 'hapus') {
                                    include 'page/mobil/hapus.php';
                                }
                            } else {
                                include 'page/mobil/index.php';
                            }
                        } else if ($_GET['page'] == 'pelanggan') {
                            if (isset($_GET['action'])) {
                                if ($_GET['action'] == 'add') {
                                    include 'page/pelanggan/add.php';
                                } else if ($_GET['action'] == 'edit') {
                                    include 'page/pelanggan/edit.php';
                                } else if ($_GET['action'] == 'hapus') {
                                    include 'page/pelanggan/hapus.php';
                                }
                            } else {
                                include 'page/pelanggan/index.php';
                            }
                        } else if ($_GET['page'] == 'rental') {
                            if (isset($_GET['action'])) {
                                if ($_GET['action'] == 'add') {
                                    include 'page/rental/add.php';
                                } else if ($_GET['action'] == 'edit') {
                                    include 'page/rental/edit.php';
                                } else if ($_GET['action'] == 'hapus') {
                                    include 'page/rental/hapus.php';
                                }
                            } else {
                                include 'page/rental/index.php';
                            }
                        }
                    }
                    ?>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="asset/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="asset/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="asset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="asset/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="asset/plugins/jszip/jszip.min.js"></script>
    <script src="asset/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="asset/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="asset/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="asset/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="asset/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="asset/js/adminlte.min.js"></script>
    <script src="asset/simple.money.format.js"></script>
    <script src="asset/simple.money.format.init.js"></script>
    <script>
        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        // <!-- ALERT -->
        let pesan = $('.pesan').attr('data-pesan');
        if (pesan) {
            Swal.fire({
                title: "Good job!",
                text: pesan,
                icon: "success"
            });
        }

        //Alert Hapus Mobil
        $(".hapus-mobil").on('click', function() {
            let no_plat = $(this).attr("data-plat");
            Swal.fire({
                title: "Apakah Kamu Yakin?",
                text: "Kamu akan menghapus Data Mobil!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Hapus!",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = `?page=mobil&action=hapus&no_plat=${no_plat}`
                }
            });
        });

        //Alert Hapus Pelanggan
        $(".hapus-pelanggan").on('click', function() {
            let no_pelanggan = $(this).attr("data-nik");
            Swal.fire({
                title: "Apakah Kamu Yakin?",
                text: "Kamu akan menghapus Data Pelanggan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Hapus!",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = `?page=pelanggan&action=hapus&no_pelanggan=${no_pelanggan}`
                }
            });
        });
        //Alert Hapus Rental
        $(".hapus-rental").on('click', function() {
            let no_trx = $(this).attr("data-trx");
            Swal.fire({
                title: "Apakah Kamu Yakin?",
                text: "Kamu akan menghapus Data Rantal!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Hapus!",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = `?page=rental&action=hapus&no_trx=${no_trx}`
                }
            });
        });
        // LOGOUT
        $(".btn-logout").on('click', function() {
            Swal.fire({
                title: "Apakah Kamu Yakin Ingin Keluar?",
                text: "Anda akan keluar!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Keluar!",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = `auth/logout.php`
                }
            });
        });
    </script>
</body>

</html>