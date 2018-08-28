<?php 
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=Laporan-Pembelian.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	header("Content-Transfer-Encoding: binary");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Laporan Pembelian|PT. world Trans</title>
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
		include_once("koneksi.php");
		set_time_limit(0);
		@$lap_pbl_fak=$_GET['lap_pbl_fak'];
		@$lap_tgl_awal_pbl=$_GET['lap_tgl_awal_beli'];	
		@$lap_tgl_akhir_pbl=$_GET['lap_tgl_akhir_beli'];
		if($lap_pbl_fak!=""){
			$query=mysql_query("SELECT tbl_pembelian.*, 
								tbl_pembelian_detail.*,
								tbl_user.usr_id,tbl_user.usr_nama,
								tbl_barang.brg_id,tbl_barang.brg_nama,
								tbl_kategori.*,
								tbl_satuan.*,
								tbl_supplier.spl_id,tbl_supplier.spl_nama,
								(SELECT COUNT(tbl_pembelian_detail.pbl_id) FROM tbl_pembelian_detail WHERE tbl_pembelian_detail.pbl_id=tbl_pembelian.pbl_id) AS baris, 
								(SELECT SUM(tbl_pembelian_detail.pbl_subtot) FROM tbl_pembelian_detail WHERE tbl_pembelian_detail.pbl_id=tbl_pembelian.pbl_id AND tbl_pembelian_detail.pbl_id='$lap_pbl_fak') AS jumlah  
								FROM tbl_pembelian_detail
								INNER JOIN  tbl_pembelian ON tbl_pembelian.pbl_id=tbl_pembelian_detail.pbl_id
								INNER JOIN tbl_user ON tbl_user.usr_id=tbl_pembelian.usr_id
								INNER JOIN tbl_barang ON tbl_barang.brg_id=tbl_pembelian_detail.brg_id
								INNER JOIN tbl_kategori ON tbl_kategori.ktg_id=tbl_barang.ktg_id
								INNER JOIN tbl_satuan ON tbl_satuan.stn_id=tbl_kategori.stn_id
								INNER JOIN tbl_supplier ON tbl_supplier.spl_id=tbl_pembelian.spl_id
								WHERE tbl_pembelian_detail.pbl_id='$lap_pbl_fak' 
								ORDER BY tbl_pembelian.pbl_tanggal ASC")or die(mysql_error());
		}else{
			$query=mysql_query("SELECT tbl_pembelian.*, 
								tbl_pembelian_detail.*,
								tbl_user.usr_id,tbl_user.usr_nama,
								tbl_barang.brg_id,tbl_barang.brg_nama,
								tbl_kategori.*,
								tbl_satuan.*,
								tbl_supplier.spl_id,tbl_supplier.spl_nama,
								(SELECT COUNT(tbl_pembelian_detail.pbl_id) FROM tbl_pembelian_detail WHERE tbl_pembelian_detail.pbl_id=tbl_pembelian.pbl_id) AS baris, 
								(SELECT SUM(tbl_pembelian_detail.pbl_subtot) FROM tbl_pembelian_detail WHERE tbl_pembelian_detail.pbl_id=tbl_pembelian.pbl_id AND tbl_pembelian.pbl_tanggal BETWEEN '$lap_tgl_awal_pbl' AND '$lap_tgl_akhir_pbl') AS jumlah  
								FROM tbl_pembelian_detail
								INNER JOIN  tbl_pembelian ON tbl_pembelian.pbl_id=tbl_pembelian_detail.pbl_id
								INNER JOIN tbl_user ON tbl_user.usr_id=tbl_pembelian.usr_id
								INNER JOIN tbl_barang ON tbl_barang.brg_id=tbl_pembelian_detail.brg_id
								INNER JOIN tbl_kategori ON tbl_kategori.ktg_id=tbl_barang.ktg_id
								INNER JOIN tbl_satuan ON tbl_satuan.stn_id=tbl_kategori.stn_id
								INNER JOIN tbl_supplier ON tbl_supplier.spl_id=tbl_pembelian.spl_id
								WHERE tbl_pembelian.pbl_tanggal BETWEEN '$lap_tgl_awal_pbl' AND '$lap_tgl_akhir_pbl' 
								ORDER BY tbl_pembelian_detail.pbl_id ASC ")or die(mysql_error());
		}
	 ?>
	 <table width="98%" style="margin-left: 10px;font-size: 10pt" class="colom">
		<tr>
			<td colspan="7"><p class="center"><img src="<?php echo realpath('image/logo_wtp2.jpg'); ?>" height="120px" width="320x" align="center" /></p></td>
			<!-- <td colspan="6"><h2><p class="padding" style="font-size: 1.5em">PT. WORLD TRANS</p></h2> -->
			<td colspan="6"><p class="right"><img src="<?php echo realpath('image/iso.jpg') ?>" height="100px" width="230px" align="center" /></p></td>
				<!-- <p>Jalan Raya. By Pass Jomin Timur RT 11 Rw.02 Kec.Kotabaru Kab.Kaarawang-41374</p> -->
		</tr>
		<tr>
			<td colspan="13">Cetak: <?php echo date('d-m-Y'); ?></td>
		</tr>
		<tr>
			<td colspan="13"> <hr class="garis" /></td>
		</tr>
		<tr>
			<td colspan="13" style="text-align: center" ><b>LAPORAN PEMBELIAN</b></td>
		</tr>
		<tr>
			<td colspan="13"><b>Periode: <?php  if(!empty($lap_tgl_awal_pbl) && !empty($lap_tgl_akhir_pbl)){
				echo date('d-m-Y', strtotime($lap_tgl_awal_pbl)) .' s/d '.date('d-m-Y', strtotime($lap_tgl_akhir_pbl));
				} ?></b></td>
		</tr>
		<tr>
			<td colspan="13"> <hr class="garis" /></td>
		</tr>
	 	<tr>
	 		<td class="center colom warna">No </td>
	 		<td class="center colom warna">No Faktur</td>
	 		<td class="center colom warna">Tanggal Beli</td>
	 		<td class="center colom warna">Nama User</td>
	 		<td class="center colom warna">Nama Supplier</td>
	 		<td class="center colom warna">No PO</td>
	 		<td class="center colom warna">Nama Barang</td>
	 		<td class="center colom warna">Harga Beli</td>
	 		<td class="center colom warna">Jumlah Beli</td>
	 		<td class="center colom warna">Satuan</td>
	 		<td class="center colom warna">Serial Barang</td>
	 		<td class="center colom warna">Subtotal</td>
	 		<td class="center colom warna">TOTAL</td>
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
		 					echo"<td class='center colom' rowspan='".$array['baris']."'><b>".$array['pbl_id']."</b> </td>";
		 					echo"<td class='center colom' rowspan='".$array['baris']."'><b>". date('d-m-Y', strtotime($array['pbl_tanggal'])) ."</b> </td>";
		 					echo"<td class='center colom' rowspan='".$array['baris']."'>".$array['usr_nama']." </td>";
		 					echo"<td class='center colom' rowspan='".$array['baris']."'>".$array['spl_nama']." </td>";
		 					echo"<td class='center colom' rowspan='".$array['baris']."'>".$array['pbl_po']." </td>";
		 					$jum=$array['baris'];
		 					
		 				}else{
		 					$jum=$jum-1;
		 				}
		?>
							<td class='center colom'><?php echo $array['brg_nama']; ?></td>		 					
		 					<td class='center colom'><?php echo "Rp.".number_format($array['pbl_harga'],0,',','.'); ?></td>
		 					<td class='center colom'><?php echo $array['pbl_jumlah']; ?></td>
		 					<td class='center colom'><?php echo $array['stn_nama']; ?></td>
		 					<td class='center colom'><?php echo $array['pbl_serial']; ?></td>
		 					<td class='center colom'><?php echo "Rp.".number_format($array['pbl_subtot'],0,',','.') ; ?></td>

		 					
		<?php
						@$tot=@$tot+$array['pbl_subtot'];
						if($jum2<=1){		 			
		 					echo"<td class='center colom' rowspan='".$array['baris']."'><b>Rp.".number_format($array['jumlah'],0,',','.')."</b> </td>";		 					
		 					$jum2=$array['baris'];
		 					$no++;
		 				}else{
		 					$jum2=$jum2-1;
		 				}

	 			echo "</tr>";
	 			
	 		}//kuraal whilE

	 		echo"<tr><td class='center colom' colspan='13' style='text-align:right'><b>Total: Rp.".number_format(@$tot,0,',','.')."</b> </td></tr>";
	}else{
	 		echo "<tr>";
	 		echo"<td class='center colom' colspan='12'> <b>Data Tidak Ditemukan</b></td>";
	 		echo "</tr>";
	 	}
	 		
		 					
		?>			
	 </table>
</body>
</html>