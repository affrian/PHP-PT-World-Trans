<?php 
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=Laporan-Summary.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	header("Content-Transfer-Encoding: binary");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Laporan Klaim|PT. world Trans</title>
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
		error_reporting(E_ALL^(E_NOTICE|E_DEPRECATED));
		set_time_limit(0);
		date_default_timezone_set("asia/jakarta");
		include_once("koneksi.php");
		@$lap_mbl_id=$_GET['lap_mbl_id'];

		@$lap_tgl_awal_klm=$_GET['lap_tgl_awal_klm'];
		@$lap_tgl_akhir_klm=$_GET['lap_tgl_akhir_klm'];

			if($lap_mbl_id!=""){
				$query=mysql_query("SELECT tbl_klaim.*,
											tbl_klaim_detail.*,
											tbl_mobil.mbl_id, tbl_mobil.mbl_nopol,
											(SELECT SUM(tbl_klaim_detail.klm_dt_harga )FROM tbl_klaim_detail WHERE tbl_klaim_detail.mbl_id='$lap_mbl_id' AND tbl_klaim_detail.klm_dt_tgl BETWEEN '$lap_tgl_awal_klm' AND '$lap_tgl_akhir_klm') AS total_sub
											FROM tbl_klaim_detail
											INNER JOIN tbl_klaim ON tbl_klaim.klm_id=tbl_klaim_detail.klm_id
											INNER JOIN tbl_mobil ON tbl_mobil.mbl_id=tbl_klaim_detail.mbl_id
											WHERE tbl_klaim_detail.mbl_id='$lap_mbl_id' AND tbl_klaim_detail.klm_dt_tgl BETWEEN '$lap_tgl_awal_klm' AND '$lap_tgl_akhir_klm'
											GROUP BY tbl_klaim_detail.mbl_id='$lap_mbl_id'
											ORDER BY tbl_klaim_detail.mbl_id ASC")or die(mysql_error());
		}else{

			$query=mysql_query("SELECT tbl_klaim.*,
								tbl_klaim_detail.*,
								tbl_mobil.mbl_id, tbl_mobil.mbl_nopol,
								(SELECT SUM(tbl_klaim_detail.klm_dt_harga )FROM tbl_klaim_detail WHERE tbl_klaim_detail.mbl_id=tbl_mobil.mbl_id AND tbl_klaim_detail.klm_dt_tgl BETWEEN '$lap_tgl_awal_klm' AND '$lap_tgl_akhir_klm') AS total_sub
								FROM tbl_klaim_detail
								INNER JOIN tbl_klaim ON tbl_klaim.klm_id=tbl_klaim_detail.klm_id
								INNER JOIN tbl_mobil ON tbl_mobil.mbl_id=tbl_klaim_detail.mbl_id
								WHERE tbl_klaim_detail.klm_dt_tgl BETWEEN '$lap_tgl_awal_klm' AND '$lap_tgl_akhir_klm'
								GROUP BY tbl_klaim_detail.mbl_id
								ORDER BY tbl_klaim_detail.mbl_id ASC")or die(mysql_error());
		}
		
		
	 ?>
	 <table width="98%" style="margin-left: 10px;font-size: 14px" class="colom">
		<tr>
			<td colspan="4"><p class="center"><img src="<?php echo realpath('image/logo_wtp2.jpg'); ?>" height="120px" width="320x" align="center" /></p></td>
			<td colspan="3"><p class="right"><img src="<?php echo realpath('image/iso.jpg'); ?>" height="100px" width="230px" align="center" /></p></td>
		</tr>
		<tr>
			<td colspan="7" style="text-align:left;"></td>
		</tr>
		<tr>
			<td style="text-align:left;">Tanggal</td>
			<td style="text-align:left;">: <?php echo date('d-m-Y'); ?></td>
			<td style="text-align:left;"></td>
		</tr>
		<tr>
			<td style="text-align:left;">Customer</td>
			<td style="text-align:left;">:</td>
		</tr>
		<tr>
			<td style="text-align:left;">No. JOB</td>
			<td style="text-align:left;">:</td>
		</tr>
		<tr>
			<td style="text-align:left;">Project</td>
			<td style="text-align:left;">:</td>
		</tr>
		<tr>
			<td style="text-align:left;">Scope Project</td>
			<td style="text-align:left;">:</td>
		</tr>

		<tr>
			<td style="text-align:left;">Nama</td>
			<td style="text-align:left;">: Wawan Saefulloh</td>
		</tr>
		<tr>
			<td colspan="7"> <hr class="garis" /></td>
		</tr>
		<tr>
			<td colspan="7" style="text-align: center" ><b>LAPORAN KLAIM BON</b></td>
		</tr>
		<tr>
			<td colspan="7"><b>Periode: <?php  if(!empty($lap_tgl_awal_klm) && !empty($lap_tgl_akhir_klm)){
				echo date('d-m-Y', strtotime($lap_tgl_awal_klm)) .' s/d '.date('d-m-Y', strtotime($lap_tgl_akhir_klm));
				} ?></b></td>
		</tr>
		<tr>
			<td colspan="7"> <hr class="garis" /></td>
		</tr>
	 	<tr>
	 		<td class="center colom warna">No </td>
	 		<td class="center colom warna">Tanggal </td>

	 		<td class="center colom warna">Batch No</td>
	 		<td class="center colom warna">Keterangan</td>
	 		<td class="center colom warna">Advance</td>
	 		<td class="center colom warna">Realisasi</td>

	 		<td class="center colom warna">Balance</td>

	 	</tr>		

	 	<?php 
	 	if (mysql_num_rows($query)>0) {
	 		
	 		while($array=mysql_fetch_array($query)){
	 			$total=$total+$array['total_sub'];
	 			echo "<tr>";
		 				
		 					echo"<td class='center colom' >".$no." </td>";
		 					echo"<td class='center colom' ></td>";
		 					
		 				
		 				
		?>
							<td class='center colom' ></td>
		 					<td class='center colom' ><?php echo "BIAYA PERBAIKAN ". $array['mbl_nopol']; ?> </td>
		 					<td class='center colom' ></td>
		 					<td class='center colom' ><?php echo "Rp.". number_format($array['total_sub'],0,',','.') ; ?> </td>
		 					
		<?php
						
						
		 				echo"<td class='center colom' ></td>";		 					
	 			echo "</tr>";
	 			
	 		}//kuraal whilE
	 		echo"<tr>
	 				<td class='colom' colspan='4' style='text-align:right'><b>Total</b></td>
	 				<td class='colom'  style='text-align:left'><b>Rp. </b></td>
	 				<td class='colom'  style='text-align:right'><b>Total: Rp. ".number_format($total,0,',','.')."</b></td>
					<td class='colom'  style='text-align:right'><b></b></td>
	 			</tr>";
	 		echo"<tr>
	 				<td class='colom' colspan='4' style='text-align:right'><b>KEKURANGAN YANG HARUS DIBAYARKAN</b></td>
	 				<td class='colom'  style='text-align:right'><b></b></td>
	 				<td class='colom'  style='text-align:right'><b></b></td>
	 				<td class='colom' style='text-align:right'><b>Total: Rp. ".number_format($total,0,',','.')."</b></td>


	 			</tr>";
	}else{
	 		echo "<tr>";
	 		echo"<td class='center colom' colspan='12'> <b>Data Tidak Ditemukan</b></td>";
	 		echo "</tr>";
	 	}
	 		
		 					
		?>			
	 </table>
</body>
</html>
