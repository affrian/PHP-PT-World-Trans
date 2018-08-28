<?php 
session_start();
include_once("koneksi.php");
$pro=$_GET['pro'];
switch ($pro) {
	// case pencarian data admin
	case 'cari_supir':
		@$mbl_spr_nama=$_GET['mbl_spr_nama'];
		$sql=mysql_query("SELECT * FROM tbl_supir WHERE spr_nama LIKE '%".$mbl_spr_nama."%'") or die(mysql_error());
		echo "<ul class='hover'>";
			while ($array=mysql_fetch_array($sql)) {
?>
				<li id="<?php echo $array['spr_id']; ?> " onclick="spr_copy('<?php echo $array['spr_id'] ?>','<?php echo $array['spr_nama'] ?>')"><b><?php echo $array['spr_nama']; ?></b></li>
<?php
			}
		echo "</ul>";
		
		break;

	case 'insert':
			$mbl_id=$_GET['mbl_id'];

			$mbl_spr_id=$_GET['mbl_spr_id'];
			$mbl_nopol=$_GET['mbl_nopol'];
			$mbl_km_showroom=$_GET['mbl_km_showroom'];
			$mbl_km_awal=$_GET['mbl_km_awal'];
			$mbl_tanggal=$_GET['mbl_tanggal'];

			$cek=mysql_query("SELECT * FROM tbl_mobil WHERE mbl_id='$mbl_id'")or die(mysql_error());
			if(mysql_num_rows($cek)>0){
				$update=mysql_query("UPDATE tbl_mobil SET spr_id='$mbl_spr_id',mbl_nopol='$mbl_nopol', mbl_km_showroom='$mbl_km_showroom', mbl_km_awal='$mbl_km_awal', mbl_tanggal='$mbl_tanggal' WHERE mbl_id='$mbl_id'")or die(mysql_error());
			}else{
				$insert=mysql_query("INSERT INTO tbl_mobil VALUES(NULL,'$mbl_spr_id','$mbl_nopol','$mbl_km_showroom','$mbl_km_awal','$mbl_tanggal')")or die(mysql_error());
			}
		break;

	case 'select':
		echo"
			<h1><b><p class='text-center' >Data Mobil</p></b></h1><hr/><br/>
 			<table id='mbl_tabel' class='display hov' width='100%'> 
 				<thead>
 					<tr align='left'>
 						<th><b>No.</b></th>
 						<th><b>Nama Supir</b></th>
 						<th><b>No. Polisi</b></th>
 						<th><b>Km Showroom</b></th>
 						<th><b>Km Awal</b></th>
 						<th><b>Tanggal Awal Penggunaan</b></th>
 						<th><b>Aksi</b></th>
 					</tr>
 				</thead>";
 			echo"<tbody>";
 			$no=1;
 			$query=mysql_query("SELECT * FROM tbl_mobil
 								INNER JOIN tbl_supir ON tbl_mobil.spr_id=tbl_supir.spr_id 
 								ORDER BY tbl_mobil.mbl_id ASC")or die(mysql_error());
 				while($array=mysql_fetch_array($query)){
 					extract($array);
 					echo"<tr align='left'>
 						<td>".$no."</td>
 						<td>".$spr_nama."</td>
 						<td>".$mbl_nopol."</td>
 						<td>".number_format($mbl_km_showroom,0,',','.') ."</td>
 						<td>".number_format($mbl_km_awal,0,',','.') ."</td>
 						<td>".$mbl_tanggal."</td>
 						<td><button class='btn btn-danger' onclick='fun_mbl_hapus(".$mbl_id.")'><span class='fa fa-fw fa-close'></span> Delete</button>
							<button class='btn btn-primary' onclick='fun_mbl_update(".$mbl_id.")'><span class='fa fa-fw fa-edit'></span> Update</button>
 						</td>
 						</tr>";

 					$no++;
 				}
 					
 			echo"</tbody>";
 			echo"</table>";
 ?>

			 <script>
			 	$(document).ready(function(){
			 		$('#mbl_tabel').DataTable({
			 			'ordering':false,
			 			'scrollY':true
			 		});
			 	});
			 </script>

 <?php
 		break;

 	case 'delete':
		$mbl_id=$_GET['mbl_id'];
		$delete=mysql_query("DELETE FROM tbl_mobil WHERE mbl_id='$mbl_id'") or die(mysql_error());
		break;

	case'ambil_mobil':
			$mbl_id=$_GET['mbl_id'];
			$ambil=mysql_query("SELECT * FROM tbl_mobil INNER JOIN tbl_supir ON tbl_mobil.spr_id=tbl_supir.spr_id WHERE tbl_mobil.mbl_id='$mbl_id'") or die(mysql_error());
			$array=mysql_fetch_array($ambil);
			echo "$array[mbl_id]|$array[spr_id]|$array[spr_nama]|$array[mbl_nopol]|$array[mbl_km_showroom]|$array[mbl_km_awal]|$array[mbl_tanggal]|";
		break;

}
 ?>
