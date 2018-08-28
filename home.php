<?php 
session_start();
if(empty($_SESSION['sess_usr_id'])){
  header('location:index.php');
}

 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>PT.World Trans|Home</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo.png">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" href="vendor/font-awesome-5.0.13/css/fontawesome-all.css" type="text/css"> -->


    <!-- Plugin CSS -->
    <link href="vendor/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <style>
      ul li a{
        color: white !important;
      }    
      .bg{
         /* background-color: rgba(255, 255, 255, 0.25); */
        background-color:#0B97A4 !important;
        color: white !important;
      }
      .bg_tem{
          background-color: #132A4A !important;
      }
      .bg li a:hover{
        background-color:#F02828;
      }
      
    </style>

  </head>

  <body class="fixed-nav sticky-footer bg-dark" id="page-top">


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top bg_tem" id="mainNav">
      <a class="navbar-brand" href="home.php"><img src="image/logo_home.png" alt="" width="100%" height="45px" class="img-responsive"></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse bg_tem" id="navbarResponsive">
        <!-- navigasi divisi -->
        <ul class="navbar-nav navbar-sidenav bg_tem" id="exampleAccordion">
        <!-- menu dashboard -->
          <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link bg_tem" href="home.php">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text">
                Dashboard</span>
            </a>
          </li><!-- end menu dashboard -->

         <!-- menu master -->
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-cog"></i>
              <span class="nav-link-text">
                Master</span>
            </a>
            <ul class="sidenav-second-level collapse bg" id="collapseComponents">
              <li>
               <a id="mn_master_user" href="?cs=Master-User"> <span class="fa fa-user-circle-o fa-md"></span> Master User</a>
              </li>
               <li>
                <a href="?cs=Master-Satuan"><span class="fa fa-cubes fa-md"> Master Satuan Barang</a>
              </li>
              <li>
                <a href="?cs=Master-Kategori"><span class="fa fa-cubes fa-md"> Master Kategori Barang</a>
              </li>
               <li>
                <a href="?cs=Master-Barang"> <span class="fa fa-cubes fa-md"> Master Barang</a>
              </li>
              <li>
                <a href="?cs=Master-Mekanik"><span class="fa fa-user-circle-o fa-md"> Master Mekanik</a>
              </li>
              
               <li>
                <a href="?cs=Master-Supplier"><span class="fa fa-user-circle-o fa-md"> Master Supplier</a>
              </li>
              <li>
                <a href="?cs=Master-Supir"><span class="fa fa-user-circle-o fa-md"> Master Supir</a>
              </li>
               <li>
                <a href="?cs=Master-Mobil"><span class="fa fa-car fa-md"> Master Mobil</a>
              </li>
               
               <li>
                <a href="?cs=Master-Keterangan-Posisi"> <span class="fa fa-cogs fa-md">  Master Keterangan Posisi</a>
              </li>
            </ul>
          </li><!-- emnd menu master -->

          <!-- menu transaksi -->
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-file"></i>
              <span class="nav-link-text">
                Transaksi</span>
            </a>
            <ul class="sidenav-second-level collapse bg" id="collapseExamplePages"  >
              <li>
                <a href="?cs=Transaksi-Pembelian"><span class="fa fa-shopping-basket fa-md"> Transaksi Pembelian</a>
              </li>
              <li>
                <a href="?cs=Transaksi-Servis"><span class="fa fa-car fa-md">  Transaksi Servis Mobil</a>
              </li>
               <li>
                <a href="?cs=Transaksi-Klaim""><span class="fa fa-file fa-md"> Transaksi Klaim Bon</a>
              </li>
            </ul>
          </li><!-- end menu transaksi -->

          <!-- menu laporan -->
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-book"></i>
              <span class="nav-link-text">
                Laporan</span>
            </a>
            <ul class="sidenav-second-level collapse bg" id="collapseMulti">
              <li>
                <a href="?cs=Laporan-Pembelian"> <i class="fa fa-fw fa-book"></i> Laporan Pembelian</a>
              </li>
              <li>
                <a href="?cs=Laporan-Servis"><i class="fa fa-fw fa-book"></i> Laporan Servis Mobil</a>
              </li>
               <li>
                <a href="?cs=Laporan-Persedian-Barang"><i class="fa fa-fw fa-book"></i>Laporan Barang</a>
              </li>
               <li>
                <a href="?cs=Laporan-Klaim"> <i class="fa fa-fw fa-book"></i>Laporan Klaim Bon</a>
              </li>
            </ul>
          </li><!-- end menu laporan -->

          <!-- menu database -->
         <!--  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#database" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-database"></i>
              <span class="nav-link-text">
                Database</span>
            </a> -->
            <!-- menu backup database -->
           <!--  <ul class="sidenav-second-level collapse bg" id="database">
              <li> -->
                <!-- <button id="backup_db">backup</button> -->
                <!-- <a href="" id="backup_db"> <i class="fa fa-fw fa-database"></i> Backup Database</a>
              </li>  
            </ul> --><!-- end menu backup database -->
          <!-- </li> --><!-- end menu database -->
          
        </ul><!-- end navigasi left -->

        <!-- start hide and show -->
        <ul class="navbar-nav sidenav-toggler bg" >
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul><!-- end hide and show -->

        <!-- navigasi header -->
        <ul class="navbar-nav ml-auto">
          <!-- heder user -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="alertsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-user"></i>
              <span class="d-lg-none"><?php echo $_SESSION['sess_usr_nama']; ?>
                <span class="badge badge-pill badge-warning"></span>
              </span>
              <?php echo $_SESSION['sess_usr_nama']; ?>
            </a>
            <!-- start dropdown -->
            <div class="dropdown-menu" aria-labelledby="alertsDropdown">
              <div class="dropdown-divider"></div>
              <!-- start ubah data pribadi -->
              <a class="dropdown-item" href="?cs=Ubah-Data" id="mn_ubahdata">
                <span class="text-danger">
                  <strong>
                    <i class="fa fa-edit"></i>
                    Ubah Data Pribadi</strong>
                </span>
              </a><!-- end ubah data pribadi -->
              
              <!-- start uabh sandi -->
              <a class="dropdown-item" href="?cs=Ubah-Sandi">
                <span class="text-success">
                  <strong>
                    <i class="fa fa-edit"></i>
                    Ubah Kata Sandi</strong>
                </span>
              </a> <!-- end ubah sandi -->
            </div><!-- end dropdown -->
          </li><!-- end header user -->
          <!-- start logout-->
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-fw fa-sign-out"></i>
              Logout</a>
          </li> <!-- end logout -->
        </ul><!-- end navgiasi header -->

      </div><!-- end divisi navigasi -->
    </nav><!-- end navigasi -->

    <!-- isi content -->

    <div class="content-wrapper">

         <div id="loading" style="position:absolute;z-index: 2;background: url('image/trans_hitam.png');width: 100%;min-height: 93%;display: none;">
            <img src='image/load.gif' style='margin-top:15%;margin-left: 27%;'>
         </div>

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active"><?php echo @$_GET['cs']; ?></li>
        </ol>
          <?php 
          // error_reporting(E_ALL^(E_NOTICE|E_DEPRECATED));
          include_once('halaman.php'); ?>
        <!-- <h1>Blank Page</h1> -->
        <!-- divis loading -->

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright &copy;   PT. World Trans-2018</small>
        </div>
      </div>
    </footer>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Akan Keluar?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="pro_logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->
    <script src="vendor/datatables/media/js/jquery.dataTables.min.js"></script>
    <!-- <script src="vendor/datatables/dataTables.bootstrap4.js"></script> -->

    <!-- Custom scripts for this template -->
    <script src="js/sb-admin.js"></script>
    <script src="js/jsbuild.js"></script>
    <script src='vendor/jquery-divider/number-divider.min.js'></script>
  </body>

</html>
