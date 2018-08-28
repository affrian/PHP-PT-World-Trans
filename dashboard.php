 <?php include_once("koneksi.php"); ?>
 <div class="row">
     <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">
                    <?php 
                          $query_bl=mysql_query("SELECT SUM(pbl_total) AS jumlah FROM tbl_pembelian WHERE pbl_tanggal=CURDATE()") or die(mysql_error());
                          $array_bl=mysql_fetch_array($query_bl);
                          echo "<p><b>Transaksi Pembelian Hari Ini </b></p> <br> <p><b>Rp.".number_format($array_bl['jumlah'],0,',','.')."</b></p>";
                          
                      ?>
                     
                </div>
            </div>
            <a href="?cs=Laporan-Pembelian" class="card-footer text-white clearfix small z-1">
            <span class="float-left">View Details</span>
            <span class="float-right">
            <i class="fa fa-angle-right"></i>
            </span>
            </a>
        </div>
      </div>

     <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-cog"></i>
                </div>
                <div class="mr-5">
                     <?php 
                          $query_svs=mysql_query("SELECT COUNT(svs_id) AS jumlah FROM tbl_servis WHERE svs_tanggal=CURDATE()") or die(mysql_error());
                          $array_svs=mysql_fetch_array($query_svs);
                          echo " <p><b>Transaksi Servis Hari Ini </b></p> <br> <p><b>".$array_svs['jumlah']." Transaksi Servis</b></p>";
                          
                      ?>
                </div>
            </div>
            <a href="?cs=Laporan-Servis" class="card-footer text-white clearfix small z-1">
            <span class="float-left">View Details</span>
            <span class="float-right">
            <i class="fa fa-angle-right"></i>
            </span>
            </a>
        </div>
      </div>

       <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-file"></i>
                </div>
                <div class="mr-5">
                     <?php 
                          $query_klm=mysql_query("SELECT COUNT(klm_id) AS jumlah FROM tbl_klaim WHERE klm_tgl=CURDATE()") or die(mysql_error());
                          $array_klm=mysql_fetch_array($query_klm);
                          echo " <p><b>Transaksi Klaim Hari Ini </b></p> <br> <p><b>".$array_klm['jumlah']." Transaksi Klaim</b></p>";
                          
                      ?>
                </div>
            </div>
            <a href="?cs=Laporan-Klaim" class="card-footer text-white clearfix small z-1">
            <span class="float-left">View Details</span>
            <span class="float-right">
            <i class="fa fa-angle-right"></i>
            </span>
            </a>
        </div>
      </div>

 </div>
 
 