<?php 
session_start();
include_once("koneksi.php");
$pro=$_GET['pro'];
switch ($pro) {
	case 'insert':
			$stn_id=$_GET['stn_id'];
			$stn_nama=$_GET['stn_nama'];
			$cek=mysql_query("SELECT * FROM tbl_satuan WHERE stn_id='$stn_id'")or die(mysql_error());
			if(mysql_num_rows($cek)>0){
				$update=mysql_query("UPDATE tbl_satuan SET stn_nama='$stn_nama' WHERE stn_id='$stn_id'")or die(mysql_error());
			}else{
				$insert=mysql_query("INSERT INTO tbl_satuan VALUES(NULL,'$stn_nama')")or die(mysql_error());
			}
		break;

	case 'select':
		echo"
			<h1><b><p class='text-center' >Data Satuan</p></b></h1><hr/><br/>
 			<table id='stn_tabel' class='display hov' width='100%'> 
 				<thead>
 					<tr align='left'>
 						<th><b>No.</b></th>
 						<th><b>Nama Satuan</b></th>
 						<th><b>Aksi</b></th>
 					</tr>
 				</thead>";
 			echo"<tbody>";
 			$no=1;
 			$query=mysql_query("SELECT * FROM tbl_satuan ORDER BY stn_id ASC")or die(mysql_error());
 				while($array=mysql_fetch_array($query)){
 					extract($array);
 					echo"<tr align='left'>
 						<td>".$no."</td>
 						<td>".$stn_nama."</td>
 						<td><button class='btn btn-danger' onclick='fun_stn_hapus(".$stn_id.")'><span class='fa fa-fw fa-close'></span> Delete</button>
							<button class='btn btn-primary' onclick='fun_stn_update(".$stn_id.")'><span class='fa fa-fw fa-edit'></span> Update</button>
 						</td>
 						</tr>";

 					$no++;
 				}
 					
 			echo"</tbody>";
 			echo"</table>";
 ?>
			 <script>
			 	$(document).ready(function(){
			 		$('#stn_tabel').DataTable({
			 			'ordering':false,
			 			'scrollY':true
			 		});
			 	});
			 </script>

 <?php

		break;

	case 'delete':
		$stn_id=$_GET['stn_id'];
		$delete=mysql_query("DELETE FROM tbl_satuan WHERE stn_id='$stn_id'") or die(mysql_error());
		break;

	case'ambil_satuan':
			$stn_id=$_GET['stn_id'];
			$ambil=mysql_query("SELECT * FROM tbl_satuan WHERE stn_id='$stn_id'") or die(mysql_error());
			$array=mysql_fetch_array($ambil);
			echo "$array[stn_id]|$array[stn_nama]|";
		break;
	
}
 ?>
