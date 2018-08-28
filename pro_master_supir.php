<?php 
session_start();
include_once("koneksi.php");
$pro=$_GET['pro'];
switch ($pro) {
	case 'insert':
		$spr_id=$_GET['spr_id'];

		$spr_nama=$_GET['spr_nama'];
		$spr_jk=$_GET['spr_jk'];
		$spr_tempat_lahir=$_GET['spr_tempat_lahir'];
		$spr_tgl_lahir=$_GET['spr_tgl_lahir'];
		$spr_alamat=$_GET['spr_alamat'];
		$spr_email=$_GET['spr_email'];
		$spr_tlp=$_GET['spr_tlp'];

		$cek_spr=mysql_query("SELECT * FROM tbl_supir WHERE spr_id='$spr_id'") or die(mysql_error());
		if(mysql_num_rows($cek_spr)>0){
			$updatespr=mysql_query("UPDATE tbl_supir SET spr_nama='$spr_nama', spr_jk='$spr_jk', spr_tempat_lahir='$spr_tempat_lahir', spr_tgl_lahir='$spr_tgl_lahir', spr_alamat='$spr_alamat', spr_email='$spr_email', spr_tlp='$spr_tlp' WHERE spr_id='$spr_id'")or die(mysql_error());
		}else{
			$insert=mysql_query("INSERT INTO tbl_supir VALUES(NULL, '$spr_nama','$spr_jk','$spr_tempat_lahir','$spr_tgl_lahir','$spr_alamat','$spr_email','$spr_tlp')")or die(mysql_error());
		}
		
		break;
	case 'select':
		echo"
			<h1><b><p class='text-center' >Data Supir</p></b></h1><hr/><br/>
 			<table id='spr_tabel' class='display hov' width='100%'> 
 				<thead>
 					<tr align='left'>
 						<th><b>No.</b></th>
 						<th><b>Nama Supir</b></th>
 						<th><b>JK</b></th>
 						<th><b>Tempat Lahir</b></th>
 						<th><b>Tanggal Lahir</b></th>
 						<th><b>Alamat</b></th>
 						<th><b>Email</b></th>
 						<th><b>No. Tlp</b></th>
 						<th><b>Aksi</b></th>
 					</tr>
 				</thead>";
 			echo"<tbody>";
 			$no=1;
 			$query=mysql_query("SELECT * FROM tbl_supir ORDER BY spr_id ASC")or die(mysql_error());
 				while($array=mysql_fetch_array($query)){
 					extract($array);
 					echo"<tr align='left'>
 						<td>".$no."</td>
 						<td>".$spr_nama."</td>
 						<td>".$spr_jk."</td>
 						<td>".$spr_tempat_lahir."</td>
 						<td>".$spr_tgl_lahir."</td>
 						<td>".$spr_alamat."</td>
 						<td>".$spr_email."</td>
 						<td>".$spr_tlp."</td>
 						<td><button class='btn btn-danger btn-block' onclick='fun_spr_hapus(".$spr_id.")'><span class='fa fa-fw fa-close'></span> Delete</button>
							<button class='btn btn-primary btn-block' onclick='fun_spr_update(".$spr_id.")'><span class='fa fa-fw fa-edit'></span> Update</button>
 						</td>
 						</tr>";

 					$no++;
 				}
 					
 			echo"</tbody>";
 			echo"</table>";
 ?>
			  <script>
			 	$(document).ready(function(){
			 		$('#spr_tabel').DataTable({
			 			'ordering':false,
			 			'scrollY':true
			 		});
			 	});
			 </script>



 <?php
		break;

	case 'delete':
		$spr_id=$_GET['spr_id'];
		$delete=mysql_query("DELETE FROM tbl_supir WHERE spr_id='$spr_id'") or die(mysql_error());
		break;

	case'ambil_supir':
			$spr_id=$_GET['spr_id'];
			$ambil=mysql_query("SELECT * FROM tbl_supir WHERE spr_id='$spr_id'") or die(mysql_error());
			$array=mysql_fetch_array($ambil);
			echo "$array[spr_id]|$array[spr_nama]|$array[spr_jk]|$array[spr_tempat_lahir]|$array[spr_tgl_lahir]|$array[spr_alamat]|$array[spr_email]|$array[spr_tlp]|";
		break;
}
 ?>
