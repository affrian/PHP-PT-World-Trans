<?php 
session_start();
include_once("koneksi.php");
$pro=$_GET['pro'];
switch ($pro) {
	case 'insert':
		$spl_id=$_GET['spl_id'];
		$spl_nama=$_GET['spl_nama'];
		$spl_alamat=$_GET['spl_alamat'];
		$spl_tlp=$_GET['spl_tlp'];

		$cek_spl=mysql_query("SELECT * FROM tbl_supplier WHERE spl_id='$spl_id'") or die(mysql_error());
		if(mysql_num_rows($cek_spl)>0){
			$updatespl=mysql_query("UPDATE tbl_supplier SET spl_nama='$spl_nama', spl_alamat='$spl_alamat', spl_tlp='$spl_tlp' WHERE spl_id='$spl_id'")or die(mysql_error());
		}else{
			$insert=mysql_query("INSERT INTO tbl_supplier VALUES(NULL, '$spl_nama','$spl_alamat','$spl_tlp')")or die(mysql_error());
		}

		break;

	case 'select':
		echo"
			<h1><b><p class='text-center' >Data Supplier</p></b></h1><hr/><br/>
 			<table id='spl_tabel' class='display hov' width='100%'> 
 				<thead>
 					<tr align='left'>
 						<th><b>No.</b></th>
 						<th><b>Nama </b></th>
 						<th><b>Alamat</b></th>
 						<th><b>Telepon</b></th>
 						<th><b>Aksi</b></th>
 					</tr>
 				</thead>";
 			echo"<tbody>";
 			$no=1;
 			$query=mysql_query("SELECT * FROM tbl_supplier ORDER BY spl_id ASC")or die(mysql_error());
 				while($array=mysql_fetch_array($query)){
 					extract($array);
 					echo"<tr align='left'>
 						<td>".$no."</td>
 						<td>".$spl_nama."</td>
 						<td>".$spl_alamat."</td>
 						<td>".$spl_tlp."</td>
 						<td><button class='btn btn-danger' onclick='fun_spl_hapus(".$spl_id.")'><span class='fa fa-fw fa-close'></span> Delete</button>
							<button class='btn btn-primary' onclick='fun_spl_update(".$spl_id.")'><span class='fa fa-fw fa-edit'></span> Update</button>
 						</td>
 						</tr>";

 					$no++;
 				}
 					
 			echo"</tbody>";
 			echo"</table>";
?>

			<script>
			 	$(document).ready(function(){
			 		$('#spl_tabel').dataTable({
			 			'ordering':false,
			 			'scrollY':true
			 		});
			 	});
			 </script>


<?php
		break;

	case 'delete':
		$spl_id=$_GET['spl_id'];

		$delete=mysql_query("DELETE FROM tbl_supplier WHERE spl_id='$spl_id'") or die(mysql_error());
		break;

	case'ambil_supplier':
			$spl_id=$_GET['spl_id'];

			$ambil=mysql_query("SELECT * FROM tbl_supplier WHERE spl_id='$spl_id'") or die(mysql_error());
			$array=mysql_fetch_array($ambil);
			echo "$array[spl_id]|$array[spl_nama]|$array[spl_alamat]|$array[spl_tlp]|";
		break;


}
 ?>

 