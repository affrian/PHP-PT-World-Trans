<?php 
	header("Content-Type: application/vnd.ms-word");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Content-disposition: attachment; filename=Laporan-Servis.doc");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Laporan Servis Mobil|PT. world Trans</title>
	<link rel="shortcut icon" type="image/x-icon" href="image/logo.png">
	<style>
		.content{
			margin-top: 100px;
			/*border: 1px solid black;*/
			width: 90%;
			margin-left: 5%;
		}
		.batas{
			margin-bottom: 100px;
		}

		.colom{
			border: 1px solid black;
		}
		.center{
			text-align: left;
		}
		.right{
			text-align: right;
		}
		.garis{
			border:0px;
			border-top: 3px double #8c8c8c;
		}
		.warna{
			background-color:#D6D5D5;
		}

		.warna2{
			background-color:#FF3232;
			border-radius: 5px;
		}
		.padding{
			letter-spacing: 5px;
		}

		.txt{
			color: white;
		}
		.view{
			border: 1px;
			background-color: #D6D5D5;
			height: auto;
			box-shadow: 10px 10px;
			border-radius: 20px;
		}
		.tebal{
			font-family: "Times New Roman", Times, serif;
		}
	</style>
</head>
<body>
	<?php 
	date_default_timezone_set("asia/jakarta");
		set_time_limit(0);
		include_once("koneksi.php");
		@$lap_svs_fak=$_GET['lap_svs_fak'];
		@$lap_tgl_awal_svs=$_GET['lap_tgl_awal_svs'];
		@$lap_tgl_akhir_svs=$_GET['lap_tgl_akhir_svs'];
		@$lap_svs_mbl_id=$_GET['lap_svs_mbl_id'];
		@$lap_svs_ktg=$_GET['lap_svs_ktg_id'];
		if($lap_svs_fak!=""){
			$query=mysql_query("SELECT tbl_servis.*, 
								tbl_servis_detail.*,
								tbl_user.usr_id,tbl_user.usr_nama,
								tbl_barang.brg_id,tbl_barang.brg_nama,
								tbl_mekanik.mk_id, tbl_mekanik.mk_nama,
								tbl_keterangan_posisi.ket_id, tbl_keterangan_posisi.ket_nama,
								tbl_mobil.mbl_id, tbl_mobil.mbl_nopol,
								tbl_kategori.*,
								tbl_satuan.*,
								(SELECT COUNT(tbl_servis_detail.svs_id) FROM tbl_servis_detail WHERE tbl_servis_detail.svs_id=tbl_servis.svs_id) AS baris 
								FROM tbl_servis_detail
								INNER JOIN  tbl_servis ON tbl_servis.svs_id=tbl_servis_detail.svs_id
								INNER JOIN tbl_user ON tbl_user.usr_id=tbl_servis.usr_id
								INNER JOIN tbl_barang ON tbl_barang.brg_id=tbl_servis_detail.brg_id
								INNER JOIN tbl_kategori ON tbl_kategori.ktg_id=tbl_barang.ktg_id
								INNER JOIN tbl_satuan ON tbl_satuan.stn_id=tbl_kategori.stn_id
								INNER JOIN tbl_mekanik ON tbl_mekanik.mk_id=tbl_servis.mk_id
								LEFT JOIN tbl_keterangan_posisi ON tbl_keterangan_posisi.ket_id=tbl_servis_detail.ket_id
								INNER JOIN tbl_mobil ON tbl_mobil.mbl_id=tbl_servis.mbl_id
								WHERE tbl_servis_detail.svs_id='$lap_svs_fak' 
								ORDER BY tbl_servis.svs_tanggal ASC")or die(mysql_error());
		}else if($lap_svs_mbl_id!=""){
				$query=mysql_query("SELECT tbl_servis.*, 
								tbl_servis_detail.*,
								tbl_user.usr_id,tbl_user.usr_nama,
								tbl_barang.brg_id,tbl_barang.brg_nama,
								tbl_mekanik.mk_id, tbl_mekanik.mk_nama,
								tbl_keterangan_posisi.ket_id, tbl_keterangan_posisi.ket_nama,
								tbl_mobil.mbl_id, tbl_mobil.mbl_nopol,
								tbl_kategori.*,
								tbl_satuan.*,
								(SELECT COUNT(tbl_servis_detail.svs_id) FROM tbl_servis_detail WHERE tbl_servis_detail.svs_id=tbl_servis.svs_id) AS baris 
								FROM tbl_servis_detail
								INNER JOIN  tbl_servis ON tbl_servis.svs_id=tbl_servis_detail.svs_id
								INNER JOIN tbl_user ON tbl_user.usr_id=tbl_servis.usr_id
								INNER JOIN tbl_barang ON tbl_barang.brg_id=tbl_servis_detail.brg_id
								INNER JOIN tbl_kategori ON tbl_kategori.ktg_id=tbl_barang.ktg_id
								INNER JOIN tbl_satuan ON tbl_satuan.stn_id=tbl_kategori.stn_id
								INNER JOIN tbl_mekanik ON tbl_mekanik.mk_id=tbl_servis.mk_id
								LEFT JOIN tbl_keterangan_posisi ON tbl_keterangan_posisi.ket_id=tbl_servis_detail.ket_id
								INNER JOIN tbl_mobil ON tbl_mobil.mbl_id=tbl_servis.mbl_id
								WHERE tbl_servis.mbl_id='$lap_svs_mbl_id' 
								ORDER BY tbl_servis.svs_tanggal ASC ")or die(mysql_error());
		}else if($lap_svs_ktg!=""){
			$query=mysql_query("SELECT tbl_servis.*, 
								tbl_servis_detail.*,
								tbl_user.usr_id,tbl_user.usr_nama,
								tbl_barang.brg_id,tbl_barang.brg_nama,
								tbl_mekanik.mk_id, tbl_mekanik.mk_nama,
								tbl_keterangan_posisi.ket_id, tbl_keterangan_posisi.ket_nama,
								tbl_mobil.mbl_id, tbl_mobil.mbl_nopol,
								tbl_kategori.*,
								tbl_satuan.*,
								(SELECT COUNT(tbl_servis_detail.svs_id) FROM tbl_servis_detail WHERE tbl_servis_detail.svs_id=tbl_servis.svs_id) AS baris 
								FROM tbl_servis_detail
								INNER JOIN  tbl_servis ON tbl_servis.svs_id=tbl_servis_detail.svs_id
								INNER JOIN tbl_user ON tbl_user.usr_id=tbl_servis.usr_id
								INNER JOIN tbl_barang ON tbl_barang.brg_id=tbl_servis_detail.brg_id
								INNER JOIN tbl_kategori ON tbl_kategori.ktg_id=tbl_barang.ktg_id
								INNER JOIN tbl_satuan ON tbl_satuan.stn_id=tbl_kategori.stn_id
								INNER JOIN tbl_mekanik ON tbl_mekanik.mk_id=tbl_servis.mk_id
								LEFT JOIN tbl_keterangan_posisi ON tbl_keterangan_posisi.ket_id=tbl_servis_detail.ket_id
								INNER JOIN tbl_mobil ON tbl_mobil.mbl_id=tbl_servis.mbl_id
								WHERE tbl_kategori.ktg_id='$lap_svs_ktg' 
								ORDER BY tbl_servis.svs_tanggal ASC ")or die(mysql_error());
		}else{
			$query=mysql_query("SELECT tbl_servis.*, 
								tbl_servis_detail.*,
								tbl_user.usr_id,tbl_user.usr_nama,
								tbl_barang.brg_id,tbl_barang.brg_nama,
								tbl_mekanik.mk_id, tbl_mekanik.mk_nama,
								tbl_keterangan_posisi.ket_id, tbl_keterangan_posisi.ket_nama,
								tbl_mobil.mbl_id, tbl_mobil.mbl_nopol,
								tbl_kategori.*,
								tbl_satuan.*,
								(SELECT COUNT(tbl_servis_detail.svs_id) FROM tbl_servis_detail WHERE tbl_servis_detail.svs_id=tbl_servis.svs_id) AS baris 
								FROM tbl_servis_detail
								INNER JOIN  tbl_servis ON tbl_servis.svs_id=tbl_servis_detail.svs_id
								INNER JOIN tbl_user ON tbl_user.usr_id=tbl_servis.usr_id
								INNER JOIN tbl_barang ON tbl_barang.brg_id=tbl_servis_detail.brg_id
								INNER JOIN tbl_kategori ON tbl_kategori.ktg_id=tbl_barang.ktg_id
								INNER JOIN tbl_satuan ON tbl_satuan.stn_id=tbl_kategori.stn_id
								INNER JOIN tbl_mekanik ON tbl_mekanik.mk_id=tbl_servis.mk_id
								LEFT JOIN tbl_keterangan_posisi ON tbl_keterangan_posisi.ket_id=tbl_servis_detail.ket_id
								INNER JOIN tbl_mobil ON tbl_mobil.mbl_id=tbl_servis.mbl_id
								WHERE tbl_servis.svs_tanggal BETWEEN '$lap_tgl_awal_svs' AND '$lap_tgl_akhir_svs' 
								ORDER BY tbl_servis.svs_tanggal ASC ")or die(mysql_error());
		}
	 ?>
	
	 <table width="98%" style="margin-left: 10px;font-size: 14px" class="colom">
		<tr>
			<td colspan="7"><p class="center"><img src="<?php echo realpath('image/logo_wtp2.jpg'); ?>" height="120px" width="320x" align="center" /></p></td>
			<td colspan="6"><p class="right"><img src="<?php echo realpath('image/iso.jpg'); ?>" height="100px" width="230px" align="center" /></p></td>
		</tr>
		<tr>
			<td colspan="13">Cetak: <?php echo date('d-m-Y'); ?></td>
		</tr>
		<tr>
			<td colspan="13"> <hr class="garis" /></td>
		</tr>
		<tr>
			<td colspan="13" style="text-align: center" ><b>LAPORAN SERVIS MOBIL</b></td>
		</tr>
		<tr>
			<td colspan="13"><b>Periode: <?php  if(!empty($lap_tgl_awal_svs) && !empty($lap_tgl_akhir_svs)){
				echo date('d-m-Y', strtotime($lap_tgl_awal_svs)) .' s/d '.date('d-m-Y', strtotime($lap_tgl_akhir_svs));
				} ?></b></td>
		</tr>
		<tr>
			<td colspan="13"> <hr class="garis" /></td>
		</tr>
	 	<tr>
	 		<td class="center colom warna">No </td>
	 		<td class="center colom warna">No Faktur</td>
	 		<td class="center colom warna">Tanggal Servis</td>
	 		<td class="center colom warna">Nama User</td>
	 		<td class="center colom warna">No Polisi</td>
	 		<td class="center colom warna">Nama Mekanik</td>
	 		<td class="center colom warna">KM servis</td>

	 		<td class="center colom warna">Nama Barang</td>
	 		<td class="center colom warna">Serial Barang</td>
	 		<td class="center colom warna">Jumlah Barang</td>
	 		<td class="center colom warna">Satuan</td>
	 		<td class="center colom warna">Keterangan Posisi</td>
	 		<td class="center colom warna">Keteranagn</td>
	 	</tr>		

	 	<?php 
	 	$no=1;
	 	$jum=1;
	 	$jum2=1;
	 	$jum3=1;
	 	// $array2=mysql_fetch_array($query);
	 	if (mysql_num_rows($query)>0) {
	 		
	 		while($array=mysql_fetch_array($query)){

	 			echo "<tr>";
		 				if($jum<=1){
		 					echo"<td class='center colom' rowspan='".$array['baris']."'>".$no." </td>";
		 					echo"<td class='center colom' rowspan='".$array['baris']."'><b>".$array['svs_id']."</b> </td>";
		 					echo"<td class='center colom' rowspan='".$array['baris']."'><b>".$array['svs_tanggal']."</b> </td>";
		 					echo"<td class='center colom' rowspan='".$array['baris']."'>".$array['usr_nama']." </td>";
		 					echo"<td class='center colom' rowspan='".$array['baris']."'>".$array['mbl_nopol']." </td>";
		 					echo"<td class='center colom' rowspan='".$array['baris']."'>Mekanik ".$array['mk_nama']." </td>";
		 					echo"<td class='center colom' rowspan='".$array['baris']."'>".$array['svs_km']." </td>";
		 					$jum=$array['baris'];
		 					$no++;
		 				}else{
		 					$jum=$jum-1;
		 				}
		?>
							<td class='center colom'><?php echo $array['brg_nama']; ?></td>		 					
		 					<td class='center colom'><?php echo $array['svs_serial']; ?></td>
		 					<td class='center colom'><?php echo $array['svs_jumlah']; ?></td>
		 					<td class='center colom'><?php echo $array['stn_nama']; ?></td>
		 					<td class='center colom'><?php echo $array['ket_nama']; ?></td>
		 					<td class='center colom'><?php echo $array['svs_ket']; ?></td>

		 					
		<?php
						// if($jum2<=1){		 			
		 			// 		echo"<td class='center colom' rowspan='".$array['baris']."'><b>Rp.".number_format($array['jumlah'],0,',','.')."</b> </td>";		 					
		 			// 		$jum2=$array['baris'];
		 			// 		$no++;
		 			// 	}else{
		 			// 		$jum2=$jum2-1;
		 			// 	}

	 			echo "</tr>";
	 			
	 		}//kuraal whilE
	}else{
	 		echo "<tr>";
	 		echo"<td class='center colom' colspan='12'> <b>Data Tidak Ditemukan</b></td>";
	 		echo "</tr>";
	 	}
	 		
		 					
		?>			
	 </table>
</body>
</html>
