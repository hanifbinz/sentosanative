<?php
    // Mulai Sesi
session_start();

    // Cek apakah ada sesi "ses_email"
if (!isset($_SESSION["ses_email"]) || empty($_SESSION["ses_email"])) {
        // Jika tidak ada, redirect ke halaman login
    header("location: login.php");
} else {
        // Jika ada, ambil data dari sesi
    $data_id = $_SESSION["ses_id"];
    $data_nama = $_SESSION["ses_nama"];
    $data_email = $_SESSION["ses_email"];
    $data_level = $_SESSION["ses_level"];
}
    // Koneksi DB
include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <link rel="icon" href="dist/img/bmlogo.jpg">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <!-- <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Alert -->
    <script src="plugins/alert.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-blue navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#">
                        <i class="fas fa-bars text-white"></i>
                    </a>
                </li>
            </ul>      
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="dist/img/bmlogo.jpg" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
                <marquee behavior="scroll" direction="left" scrollamount="6">Aplikasi Dokumentasi Bongkar Muat - DokBm</marquee>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-2 pb-2 mb-2 d-flex">
                    <div class="image">
                        <img src="dist/img/user.png" class="img-circle elevation-1" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="index.php" class="d-block">
                            <?php echo $data_nama; ?>
                        </a>
                        <span class="badge badge-success">
                            <?php echo $data_level; ?>
                        </span>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <!-- Level -->
                        <?php if ($data_level == "Admin"): ?>

                            <li class="nav-header" style="margin-top: 10px; font-size: 25px; padding-left: 15px; width: 100%;">Menu Utama</li>
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="?page=bongkar" class="nav-link">
                                    <i class="nav-icon far fa fa-camera"></i>
                                    <p>
                                        Dokumentasi Bongkar
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?page=muat" class="nav-link">
                                    <i class="nav-icon far fa fa-camera"></i>
                                    <p>
                                        Dokumentasi Muat
                                    </p>
                                </a>
                            </li>

                            <li font-s class="nav-header" style="margin-top: 10px; font-size: 25px; padding-left: 15px; width: 100%;">Setting</li>

                            <li class="nav-item">
                                <a href="?page=user" class="nav-link">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        User
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="?page=angkutan" class="nav-link">
                                    <i class="nav-icon fas fa-truck"></i>
                                    <p>Angkutan</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="?page=barang" class="nav-link">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>Barang</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="?page=customer" class="nav-link">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>Customer</p>
                                </a>
                            </li>

                            <?php elseif($data_level == "Checker"): ?>

                                <li class="nav-header">Setting</li>
                                <li class="nav-item">
                                <a href="?page=bongkar" class="nav-link">
                                    <i class="nav-icon far fa fa-camera"></i>
                                    <p>
                                        Dokumentasi Bongkar
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?page=muat" class="nav-link">
                                    <i class="nav-icon far fa fa-camera"></i>
                                    <p>
                                        Dokumentasi Muat
                                    </p>
                                </a>
                            </li>

                            <?php endif; ?>

                            <li class="nav-item">
                                <a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
                                    <i class="nav-icon far fa-circle text-danger"></i>
                                    <p>
                                        Logout
                                    </p>
                                </a>
                            </li>

                        </nav>
                        <!-- /.sidebar-menu -->
                    </div>
                    <!-- /.sidebar -->
                </aside>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">

                    </section>

                    <!-- Main content -->
                    <section class="content">
                        <?php if (!isset($_GET['page'])): ?>
                            
                       
                        <section class="col-lg-12 connectedSortable">


                        <!-- Calendar -->
                        <div class="card bg-gradient-success">
                          <div class="card-header border-0">

                            <h3 class="card-title">
                              <i class="far fa-calendar-alt"></i>
                              Kalender
                          </h3>
                          <!-- tools card -->
                          <div class="card-tools">

                              <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pt-0">
                        <!--The calendar -->
                        <div id="calendar" style="width: 100%"></div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <marquee behavior="scroll" direction="left" style="background-color: #ff0000; color: #fff; padding: 5px;">BERDOA SEBELUM BEKERJA</marquee>
            </section>
             <?php endif ?>

            <!-- WEB DINAMIS DISINI -->
            <div class="container-fluid">

                <?php 
                if (isset($_GET['page'])) {
                    $hal = $_GET['page'];

                    switch ($hal) {
                            // Halaman Home User
                        case 'admin':
                        include "home/admin.php";
                        break;
                        case 'checker':
                        include "home/checker.php";
                        break;

                            // User
                        case 'user':
                        include "admin/user/user.php";
                        break;
                        case 'add-user':
                        include "admin/user/add_user.php";
                        break;
                        case 'edit-user':
                        include "admin/user/edit_user.php";
                        break;
                        case 'del-user':
                        include "admin/user/del_user.php";
                        break;

                            // Bongkar
                        case 'bongkar':
                        include "admin/bongkar/bongkar.php";
                        break;
                        case 'add-bongkar':
                        include "admin/bongkar/add_bongkar.php";
                        break;
                        case 'edit-bongkar':
                        include "admin/bongkar/edit_bongkar.php";
                        break;
                        case 'del-bongkar':
                        include "admin/bongkar/del_bongkar.php";
                        break;
                        case 'down-bongkar':
                        include "admin/bongkar/down_bongkar.php";
                        break;


                                // Muat
                        case 'muat':
                        include "admin/muat/muat.php";
                        break;
                        case 'add-muat':
                        include "admin/muat/add_muat.php";
                        break;
                        case 'edit-muat':
                        include "admin/muat/edit_muat.php";
                        break;
                        case 'del-muat':
                        include "admin/muat/del_muat.php";
                        break;

                            // Angkutan
                        case 'angkutan':
                        include "admin/angkutan/angkutan.php";
                        break;
                        case 'add-angkutan':
                        include "admin/angkutan/add_angkutan.php";
                        break;
                        case 'edit-angkutan':
                        include "admin/angkutan/edit_angkutan.php";
                        break;
                        case 'del-angkutan':
                        include "admin/angkutan/del_angkutan.php";
                        break;

                            // Barang
                        case 'barang':
                        include "admin/barang/barang.php";
                        break;
                        case 'add-barang':
                        include "admin/barang/add_barang.php";
                        break;
                        case 'edit-barang':
                        include "admin/barang/edit_barang.php";
                        break;
                        case 'del-barang':
                        include "admin/barang/del_barang.php";
                        break;

                            // Customer
                        case 'customer':
                        include "admin/customer/customer.php";
                        break;
                        case 'add-customer':
                        include "admin/customer/add_customer.php";
                        break;
                        case 'edit-customer':
                        include "admin/customer/edit_customer.php";
                        break;
                        case 'del-customer':
                        include "admin/customer/del_customer.php";
                        break;

                            // Default
                        default:
                        echo "<center><h1> ERROR !</h1></center>";
                        break;    
                    }
                } else {
                        // Halaman Home Pengguna otomatis terbuka
                    if ($data_level == "Administrator") {
                        include "home/admin.php";
                    } elseif ($data_level == "Sekretaris") {
                        include "home/cheker.php";
                    }
                }
                ?>

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            &copy; <?php echo date('Y'); ?> <a target="_blank" href="https://www.youtube.com/channel/UCDxjOzW7F0JOkltlXT6g7AQ"><strong>Amik YPAT-Purwakarta</strong></a> All rights reserved.
        </div>
        <b>Created by Hanif-AmikYpat</b>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>


<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<script>
    $('#calendar').datetimepicker({
        format: 'L',
        inline: true
    })
    $(function() {

                  // The Calender

                  $("#example1").DataTable();
                  $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                });
              });
          </script>

          <script>
            $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            $('[name="tgl"]').daterangepicker()
        })

            function cetak_bongkar() {
                $.ajax({
                  url : 'admin/bongkar/cetak_bongkar.php',
                  data : $("#form_print").serialize(),
                  type : 'post',
                  dataType : 'html',
                  success : function (response) {
                   var doc = window.open();
                   doc.document.write(response);
                   doc.print();
               }
           })
            }

            function cetak_muat() {
                $.ajax({
                  url : 'admin/muat/cetak_muat.php',
                  data : $("#form_print").serialize(),
                  type : 'post',
                  dataType : 'html',
                  success : function (response) {
                   var doc = window.open();
                   doc.document.write(response);
                   doc.print();
               }
           })
            }
        </script>

    </body>

    </html>