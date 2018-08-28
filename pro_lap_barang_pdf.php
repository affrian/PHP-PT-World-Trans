<?php 
ob_start(); 
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
		.table{
			width: 98%;
		}
	</style>
</head>
<body>
	<?php 
		set_time_limit(0);
		error_reporting(E_ALL^(E_NOTICE|E_DEPRECATED));
		date_default_timezone_set("asia/jakarta");
		include_once("koneksi.php");
		@$lap_brg_serial=$_GET['lap_brg_serial'];

		@$lap_brg_id=$_GET['lap_brg_id'];
		@$lap_brg_ktg_id=$_GET['lap_brg_ktg_id'];


		if($lap_brg_serial=="serial"){
				if($lap_brg_id!=""){
						$query=mysql_query("SELECT tbl_barang.*,
											tbl_barang_detail.*,
											tbl_satuan.*,
											tbl_kategori.*,
											(SELECT COUNT(tbl_barang_detail.dt_status)FROM tbl_barang_detail 
											WHERE  tbl_barang_detail.dt_status!='false' AND tbl_barang.brg_id=tbl_barang_detail.brg_id 
											AND tbl_barang_detail.dt_serial!=''
											 )AS justat
											 FROM tbl_barang
											INNER JOIN tbl_kategori ON tbl_kategori.ktg_id=tbl_barang.ktg_id
											INNER JOIN tbl_satuan ON tbl_satuan.stn_id=tbl_kategori.stn_id
											LEFT JOIN tbl_barang_detail ON tbl_barang_detail.brg_id=tbl_barang.brg_id

											WHERE tbl_barang.brg_id='$lap_brg_id' AND tbl_barang_detail.dt_status!='false'
											ORDER BY tbl_barang.brg_id ASC")or die(mysql_error());
					}else{
						$query=mysql_query("SELECT tbl_barang.*,
											tbl_barang_detail.*,
											tbl_satuan.*,
											tbl_kategori.*,
											(SELECT COUNT(tbl_barang_detail.dt_status)FROM tbl_barang_detail 
											WHERE  tbl_barang_detail.dt_status!='false' AND tbl_barang.brg_id=tbl_barang_detail.brg_id 
											AND tbl_barang_detail.dt_serial!=''
											 )AS justat
											 FROM tbl_barang
											INNER JOIN tbl_kategori ON tbl_kategori.ktg_id=tbl_barang.ktg_id
											INNER JOIN tbl_satuan ON tbl_satuan.stn_id=tbl_kategori.stn_id
											LEFT JOIN tbl_barang_detail ON tbl_barang_detail.brg_id=tbl_barang.brg_id
											WHERE tbl_barang.ktg_id='$lap_brg_ktg_id' AND tbl_barang_detail.dt_status!='false'
											ORDER BY tbl_barang.brg_id ASC")or die(mysql_error());
				}
		}else{
			if($lap_brg_id!=""){
						$query=mysql_query("SELECT tbl_barang.*,
											tbl_satuan.*,
											tbl_kategori.*
											 FROM tbl_barang
											INNER JOIN tbl_kategori ON tbl_kategori.ktg_id=tbl_barang.ktg_id
											INNER JOIN tbl_satuan ON tbl_satuan.stn_id=tbl_kategori.stn_id
											WHERE tbl_barang.brg_id='$lap_brg_id'
											ORDER BY tbl_barang.brg_id ASC")or die(mysql_error());
					}else{
						$query=mysql_query("SELECT tbl_barang.*,
											tbl_satuan.*,
											tbl_kategori.*
											 FROM tbl_barang
											INNER JOIN tbl_kategori ON tbl_kategori.ktg_id=tbl_barang.ktg_id
											INNER JOIN tbl_satuan ON tbl_satuan.stn_id=tbl_kategori.stn_id
											WHERE tbl_barang.ktg_id='$lap_brg_ktg_id'
											ORDER BY tbl_barang.brg_id ASC")or die(mysql_error());
				}
		}
		
		
	 ?>
	

	 <table width="98%" style="margin-left: 10px;font-size: 14px;" class="colom table">
		<tr>
			<td colspan="3"><p class="center"><img src="image/logo_wtp2.jpg" height="120px" width="250px" align="center" /></p></td>
			<td></td>
			<td colspan="2"><p class="right"><img src="image/iso.jpg" height="120px" width="250px" align="center" /></p></td>
				<!-- <p>Jalan Raya. By Pass Jomin Timur RT 11 Rw.02 Kec.Kotabaru Kab.Kaarawang-41374</p> -->
		</tr>
		<tr>
			<td colspan="6" style="text-align:left;">Cetak: <?php echo date('d-F-Y'); ?></td>
			<!-- <td style="text-align:left;">Print: <?php echo date("H:i:s"); ?></td> -->
		</tr>
		<tr>
			<td colspan="6"> <hr class="garis" /></td>
		</tr>
		
		<tr>
			<td colspan="6" style="text-align: center" ><b>LAPORAN PERSEDIAN BARANG</b></td>
		</tr>
		
		<tr>
			<td colspan="6"> <hr class="garis" /></td>
		</tr>
	 	<tr>
	 		<td class="center colom warna">No </td>
	 		<td class="center colom warna">Kategori Barang</td>
	 		<td class="center colom warna">Nama Barang</td>
	 		<td class="center colom warna">Stok Barang</td>
	 		<td class="center colom warna">Satuan</td>
	 		<?php 
	 			if($lap_brg_serial=="serial"){

	 				echo '<td class="center colom warna">Serial Barang</td>';
	 			}

	 		 ?>
	 		
	 		
	 	</tr>		

	 	<?php 
	 	$no=1;
	 	$jum=1;
	 	$jum2=0;
	 	$jum3=0;
	 	// $array2=mysql_fetch_array($query);
	 	if (mysql_num_rows($query)>0) {
	 		
	 		while($array=mysql_fetch_array($query)){

	 			echo "<tr>";
		 				if($jum<=1){
		 					echo"<td class='center colom' rowspan='".$array['justat']."'>".$no." </td>";
		 					echo"<td class='center colom' rowspan='".$array['justat']."'>".$array['ktg_nama']." </td>";
		 					echo"<td class='center colom' rowspan='".$array['justat']."'>".$array['brg_nama']." </td>";
		 					echo"<td class='center colom' rowspan='".$array['justat']."'>".$array['brg_stok']." </td>";
		 					echo"<td class='center colom' rowspan='".$array['justat']."'>".$array['stn_nama']." </td>";
		 					
		 					$jum=$array['justat'];
		 					$no++;
		 				}else{
		 					$jum=$jum-1;
		 				}
		?>
									 					


		 					
		<?php
			if($lap_brg_serial=="serial"){
				echo "<td class='center colom'>".$array['dt_serial']."</td>";
			}

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

<?php
$html=ob_get_contents();
ob_end_clean();
        
require_once('vendor/html2pdf/html2pdf.class.php');
// $html=file_get_contents($html1);
// $pdf = new HTML2PDF('P','A4','en');
$pdf = new HTML2PDF('P',array(200,300),'en',true,'UTF-8',array(2,5,2,2));
$pdf->pdf->SetDisplayMode(100);
// $pdf->AddPage();
$pdf->WriteHTML($html);
$pdf->Output('Laporan-Barang.pdf','D');
?>
