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
		$sql=mysql_query("SELECT MAX(klm_id)AS maxid FROM tbl_klaim")or die(mysql_error());
		$array=mysql_fetch_array($sql)or die(mysql_error());
		$fk=$array['maxid'];
		$string=substr( $array['maxid'],11,3);
		$cekhari=substr($array['maxid'],3,8);
		// echo "string=".$string."</br>";
		// echo "cekhari=".$cekhari."</br>";
			if($cekhari!==$datenow){
				$faktur="KLM".$datenow."001";
			}else{
				$tambah=(int)$string+1;
				if(strlen($tambah)==1){
					$faktur="KLM".$datenow."00".$tambah;
				}elseif(strlen($tambah)==2){
					$faktur="KLM".$datenow."0".$tambah;
				}else{
					$faktur="KLM".$datenow.$tambah;
				}
			}

		echo $faktur."|";
		break;

// case pencarian data admin
	case 'cari_nopol':
		@$klm_dt_nopol=$_GET['klm_dt_nopol'];
		$sql=mysql_query("SELECT * FROM tbl_mobil WHERE mbl_nopol LIKE '%".$klm_dt_nopol."%'") or die(mysql_error());
		echo "<ul class='hover'>";
			while ($array=mysql_fetch_array($sql)) {
?>
				<li id="<?php echo $array['mbl_id']; ?> " onclick="klm_mbl_copy('<?php echo $array['mbl_id'] ?>','<?php echo $array['mbl_nopol'] ?>')"><b><?php echo $array['mbl_nopol']; ?></b></li>
<?php
			}
		echo "</ul>";
		
		break;

case 'insert':
		//header  
		$klm_id=$_GET['klm_id'];
		// deail
		$klm_dt_nopol_id=$_GET['klm_dt_nopol_id'];
		$klm_dt_tgl=$_GET['klm_dt_tgl'];
		$klm_dt_harga= $_GET['klm_dt_harga'];
		$klm_dt_ket=$_GET['klm_dt_ket'];
		
			$insert=mysql_query("INSERT INTO tbl_klaim_detail VALUES('$klm_id','$klm_dt_nopol_id','$klm_dt_tgl','$klm_dt_harga','$klm_dt_ket')")or die(mysql_error());
		break;
case 'select':
		@$klm_id=$_GET['klm_id'];
		echo"
 			<table id='svc_tabel' class='display hov table-responsive'> 
 				<thead style='background-color:#21B3F0'>
 					<tr align='left'>
 						<th width='5%' class='colom'><b>No.</b></th>
 						<th width='15%' class='colom'><b>No Polisi </b></th>
 						<th width='12%' class='colom'><b>Tanggal Bon</b></th>
 						<th width='15%' class='colom'><b>Nominl Klaim </b></th>
 						<th width='12%' class='colom'><b>Keterangan</b></th>
 						<th width='8%' class='colom'><b>Aksi</b></th>
 					</tr>
 				</thead>";
 			echo"<tbody>";
 			$no=1;
 			$query=mysql_query("SELECT * FROM tbl_klaim_detail 
 								INNER JOIN tbl_mobil ON tbl_klaim_detail.mbl_id=tbl_mobil.mbl_id
 								WHERE tbl_klaim_detail.klm_id='$klm_id'
 								ORDER BY tbl_klaim_detail.klm_id ASC")or die(mysql_error());
 				while($array=mysql_fetch_array($query)){
 					extract($array);
 					echo"<tr align='left' >
 						<td  class='colom'>".$no."</td>
 						<td  class='colom'>".$mbl_nopol."</td>
 						<td  class='colom'>".$klm_dt_tgl."</td>
 						<td  class='colom'>Rp.".number_format($klm_dt_harga,0,',','.')."</td>
 						<td  class='colom'>".$klm_dt_ket."</td>";
?>
 						<td  class='colom'><button class="btn btn-danger" onclick="fun_klm_hapus('<?php echo $klm_id; ?>','<?php echo $mbl_id; ?>','<?php echo $klm_dt_tgl; ?>','<?php echo $klm_dt_harga; ?>','<?php echo $klm_dt_ket; ?>')"><span class="fa fa-fw fa-close"></span> Delete</button></td>

<?php
					echo "</tr>";
					@$klm_total=$klm_total+$klm_dt_harga;
 					$no++;
 				}
 					echo "<tr> <td colspan='4'><p class='text-right'><b>Total: Rp.". number_format(@$klm_total,0,',','.')."</b></p></td></tr>";	
 					echo "<tr> <td><button class='btn btn-primary btn-md' onclick='fun_klm_selesai(".@$klm_total.")'>Selesai</button></td></tr>";		
 			echo"</tbody>";
 			echo"</table>";

		break;


	case 'delete':
		$klm_id=$_GET['klm_id'];
		$mbl_id=$_GET['mbl_id'];
		$klm_dt_tgl=$_GET['klm_dt_tgl'];
		$klm_dt_harga=$_GET['klm_dt_harga'];
		$klm_dt_ket=$_GET['klm_dt_ket'];
		$delete=mysql_query("DELETE FROM tbl_klaim_detail WHERE klm_id='$klm_id' AND mbl_id='$mbl_id' AND klm_dt_tgl='$klm_dt_tgl' AND klm_dt_harga= '$klm_dt_harga' AND klm_dt_ket= '$klm_dt_ket' ") or die(mysql_error());
		break;

	case 'selesai':
		$klm_id=$_GET['klm_id'];
		$usr_id=$_SESSION['sess_usr_id'];
		// VARIABEL TANGGAL ADA DIATAS
		$klm_total=$_GET['klm_total'];


		$insert=mysql_query("INSERT INTO tbl_klaim VALUES('$klm_id','$usr_id','$tgl','$klm_total')")or die(mysql_error());
		break;



}//END SWITCH
 ?>
