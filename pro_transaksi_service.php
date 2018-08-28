<?php 
session_start();
include_once("koneksi.php");
date_default_timezone_get("asia/jakarta");
$tgl=date('Y-m-d');
$pro=$_GET['pro'];
switch ($pro) {
// case pembuatan faktur
	case 'faktur':
		$datenow=date('Ymd');
		$sql=mysql_query("SELECT MAX(svs_id)AS maxid FROM tbl_servis")or die(mysql_error());
		$array=mysql_fetch_array($sql)or die(mysql_error());
		$fk=$array['maxid'];
		$string=substr( $array['maxid'],11,3);
		$cekhari=substr($array['maxid'],3,8);
		// echo "string=".$string."</br>";
		// echo "cekhari=".$cekhari."</br>";
			if($cekhari!==$datenow){
				$faktur="SVS".$datenow."001";
			}else{
				$tambah=(int)$string+1;
				if(strlen($tambah)==1){
					$faktur="SVS".$datenow."00".$tambah;
				}elseif(strlen($tambah)==2){
					$faktur="SVS".$datenow."0".$tambah;
				}else{
					$faktur="SVS".$datenow.$tambah;
				}
			}

		echo $faktur."|";
		break;

// case pencarian data admin
	case 'cari_nopol':
		@$svc_mbl_nopol=$_GET['svc_mbl_nopol'];
		$sql=mysql_query("SELECT * FROM tbl_mobil WHERE mbl_nopol LIKE '%".$svc_mbl_nopol."%'") or die(mysql_error());
		echo "<ul class='hover'>";
			while ($array=mysql_fetch_array($sql)) {
?>
				<li id="<?php echo $array['mbl_id']; ?> " onclick="mbl_copy('<?php echo $array['mbl_id'] ?>','<?php echo $array['mbl_nopol'] ?>')"><b><?php echo $array['mbl_nopol']; ?></b></li>
<?php
			}
		echo "</ul>";
		
		break;

case 'insert':
		//header  
		$svc_id=$_GET['svc_id'];
		$svc_usr_id=$_GET['svc_usr_id'];
		$svc_mbl_id=$_GET['svc_mbl_id'];
		$svc_mk_id=$_GET['svc_mk_id'];
		$svc_km=$_GET['svc_km'];
		// deail
		$svc_dt_brg_id=$_GET['svc_dt_brg_id'];
		$svc_dt_brg_stok=$_GET['svc_dt_brg_stok'];
		$svc_dt_brg_serial= strtoupper($_GET['svc_dt_brg_serial']);
		$svc_dt_jumlah=$_GET['svc_dt_jumlah'];
		$svc_ket_id=$_GET['svc_ket_id'];
		$svc_ket=$_GET['svc_ket'];

		if($svc_dt_brg_serial==""){
			$ceksvc=mysql_query("SELECT svs_jumlah FROM tbl_servis_detail WHERE svs_id='$svc_id' AND brg_id='$svc_dt_brg_id' AND svs_serial='$svc_dt_brg_serial'") or die(mysql_error());
			if(mysql_num_rows($ceksvc)>0){
				$updatestok=mysql_query("UPDATE tbl_barang SET brg_stok=brg_stok-'$svc_dt_jumlah' WHERE brg_id='$svc_dt_brg_id'")or die(mysql_error());
				
				$update=mysql_query("UPDATE tbl_servis_detail SET svs_jumlah=svs_jumlah+'$svc_dt_jumlah' WHERE svs_id='$svc_id' AND brg_id='$svc_dt_brg_id' AND svs_serial='$svc_dt_brg_serial'")or die(mysql_error());
			}else{
				$updatestok=mysql_query("UPDATE tbl_barang SET brg_stok=brg_stok-'$svc_dt_jumlah' WHERE brg_id='$svc_dt_brg_id'")or die(mysql_error());
				$insert=mysql_query("INSERT INTO tbl_servis_detail VALUES('$svc_id','$svc_dt_brg_id','$svc_ket_id','$svc_dt_brg_serial','$svc_dt_jumlah','$svc_ket')")or die(mysql_error());
			}

			
		}else{

				$updatestok=mysql_query("UPDATE tbl_barang SET brg_stok=brg_stok-'$svc_dt_jumlah' WHERE brg_id='$svc_dt_brg_id'")or die(mysql_error());
				$update_brg_detail=mysql_query("UPDATE tbl_barang_detail SET dt_status='false' WHERE brg_id='$svc_dt_brg_id' AND dt_serial='$svc_dt_brg_serial'")or die(mysql_error());
				$insert=mysql_query("INSERT INTO tbl_servis_detail VALUES('$svc_id','$svc_dt_brg_id','$svc_ket_id','$svc_dt_brg_serial','$svc_dt_jumlah','$svc_ket')")or die(mysql_error());
		}

		
		
		break;
case 'select':
		@$svc_id=$_GET['svc_id'];
		echo"
 			<table id='svc_tabel' class='display hov table-responsive'> 
 				<thead style='background-color:#21B3F0'>
 					<tr align='left'>
 						<th width='5%' class='colom'><b>No.</b></th>
 						<th width='15%' class='colom'><b>Nama Barang</b></th>
 						<th width='7%' class='colom'><b>Satuan</b></th>
 						<th width='20%' class='colom'><b>No Serial</b></th>
 						<th width='12%' class='colom'><b>Jumlah Pakai</b></th>
 						<th width='20%' class='colom'><b>Keterangan Posisi</b></th>
 						<th width='20%' class='colom'><b>Keterangan</b></th>
 						<th width='8%' class='colom'><b>Aksi</b></th>
 					</tr>
 				</thead>";
 			echo"<tbody>";
 			$no=1;
 			$query=mysql_query("SELECT * FROM tbl_servis_detail 
 								INNER JOIN tbl_barang ON tbl_servis_detail.brg_id=tbl_barang.brg_id
 								INNER JOIN tbl_kategori ON tbl_kategori.ktg_id=tbl_barang.ktg_id  
 								INNER JOIN tbl_satuan ON tbl_satuan.stn_id=tbl_kategori.stn_id  
 								LEFT JOIN tbl_keterangan_posisi ON tbl_keterangan_posisi.ket_id=tbl_servis_detail.ket_id
 								WHERE tbl_servis_detail.svs_id='$svc_id'
 								ORDER BY tbl_servis_detail.svs_id ASC")or die(mysql_error());
 				while($array=mysql_fetch_array($query)){
 					extract($array);
 					echo"<tr align='left' >
 						<td  class='colom'>".$no."</td>
 						<td  class='colom'>".$brg_nama."</td>
 						<td  class='colom'>".$stn_nama."</td>
 						<td  class='colom'>".$svs_serial."</td>
 						<td  class='colom'>".$svs_jumlah."</td>
 						<td  class='colom'>".$ket_nama."</td>
 						<td  class='colom'>".$svs_ket."</td>";
?>
 						<td  class='colom'><button class="btn btn-danger" onclick="fun_svs_hapus('<?php echo $svs_id; ?>','<?php echo $brg_id; ?>','<?php echo $svs_serial; ?>','<?php echo $svs_jumlah; ?>')"><span class="fa fa-fw fa-close"></span> Delete</button></td>

<?php
					echo "</tr>";
 					$no++;
 				}
 					echo "<tr> <td><button class='btn btn-primary btn-md' onclick='fun_svc_selesai()'>Selesai</button></td></tr>";		
 			echo"</tbody>";
 			echo"</table>";

		break;


	case 'delete':
		$svc_id=$_GET['svc_id'];
		$brg_id=$_GET['brg_id'];
		$svc_serial=$_GET['svc_serial'];
		$svc_jumlah=$_GET['svc_jumlah'];
		$delete=mysql_query("DELETE FROM tbl_servis_detail WHERE svs_id='$svc_id' AND brg_id='$brg_id' AND svs_serial='$svc_serial'") or die(mysql_error());
		$updatestokbrg=mysql_query("UPDATE tbl_barang SET brg_stok=brg_stok+'$svc_jumlah' WHERE brg_id='$brg_id'")or die(mysql_error());
		$update_detail_stok=mysql_query("UPDATE tbl_barang_detail SET dt_status='' WHERE brg_id='$brg_id' AND dt_serial='$svc_serial'")or die(mysql_error());
		break;

	case 'selesai':
		$svc_id=$_GET['svc_id'];
		$usr_id=$_SESSION['sess_usr_id'];
		$svc_mbl_id=$_GET['svc_mbl_id'];
		$svc_mk_id=$_GET['svc_mk_id'];
		$svc_km=$_GET['svc_km'];
		// VARIABEL TANGGAL ADA DIATAS


		$insert=mysql_query("INSERT INTO tbl_servis VALUES('$svc_id','$usr_id','$svc_mbl_id','$svc_mk_id','$svc_km','$tgl')")or die(mysql_error());
		break;

// case pencarian data admin
	case 'cari_mekanik':
		@$svc_mk_nama=$_GET['svc_mk_nama'];

		$sql=mysql_query("SELECT * FROM tbl_mekanik WHERE mk_nama LIKE '%".$svc_mk_nama."%'") or die(mysql_error());
		echo "<ul class='hover'>";
			while ($array=mysql_fetch_array($sql)) {
?>
				<li id="<?php echo $array['mk_id']; ?> " onclick="mk_copy('<?php echo $array['mk_id'] ?>','<?php echo $array['mk_nama'] ?>')"><b><?php echo "Mekanik ".$array['mk_nama']; ?></b></li>
<?php
			}
		echo "</ul>";
		
		break;


// case pencarian data admin
	case 'cari_barang':
		@$svc_dt_brg_nama=$_GET['svc_dt_brg_nama'];

		$sql=mysql_query("SELECT * FROM tbl_barang 
							INNER JOIN tbl_kategori ON tbl_barang.ktg_id=tbl_kategori.ktg_id
							INNER JOIN tbl_satuan ON tbl_kategori.stn_id=tbl_satuan.stn_id
							WHERE tbl_barang.brg_nama LIKE '%".$svc_dt_brg_nama."%'") or die(mysql_error());
		echo "<ul class='hover'>";
			while ($array=mysql_fetch_array($sql)) {
?>
				<li id="<?php echo $array['brg_id']; ?> " onclick="svc_brg_copy('<?php echo $array['brg_id'] ?>','<?php echo $array['brg_nama'] ?>','<?php echo $array['brg_stok'] ?>','<?php echo $array['stn_nama'] ?>')"><b><?php echo $array['brg_nama']; ?></b></li>
<?php
			}
		echo "</ul>";
		
		break;

// case pencarian data admin
	case 'cari_ket':
		@$svc_ket_posisi=$_GET['svc_ket_posisi'];

		$sql=mysql_query("SELECT * FROM tbl_keterangan_posisi WHERE ket_nama LIKE '%".$svc_ket_posisi."%'") or die(mysql_error());
		echo "<ul class='hover'>";
			while ($array=mysql_fetch_array($sql)) {
?>
				<li id="<?php echo $array['ket_id']; ?> " onclick="svc_ket_copy('<?php echo $array['ket_id'] ?>','<?php echo $array['ket_nama'] ?>')"><b><?php echo $array['ket_nama']; ?></b></li>
<?php
			}
		echo "</ul>";
		
		break;


	case'cari_serial':
			@$svc_dt_brg_id=$_GET['svc_dt_brg_id'];
			@$svc_dt_brg_serial=$_GET['svc_dt_brg_serial'];
			$sql=mysql_query("SELECT * FROM tbl_barang_detail WHERE brg_id='$svc_dt_brg_id' AND dt_serial='$svc_dt_brg_serial' AND dt_status=''") or die(mysql_error());
			$array=mysql_fetch_array($sql);
			if(mysql_num_rows($sql)>0){
				echo $array['dt_serial'];
			}else{
				echo "";
			}

		break;

}
 ?>
