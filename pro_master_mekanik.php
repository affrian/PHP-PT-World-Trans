<?php 
session_start();
include_once("koneksi.php");
$pro=$_GET['pro'];
switch ($pro) {
	case 'insert':
			$mk_id=$_GET['mk_id'];

			$mk_nama=$_GET['mk_nama'];
			$mk_jk=$_GET['mk_jk'];
			$mk_tempat_lahir=$_GET['mk_tempat_lahir'];
			$mk_tgl_lahir=$_GET['mk_tgl_lahir'];
			$mk_alamat=$_GET['mk_alamat'];
			$mk_email=$_GET['mk_email'];
			$mk_tlp=$_GET['mk_tlp'];

			$cek=mysql_query("SELECT * FROM tbl_mekanik WHERE mk_id='$mk_id'")or die(mysql_error());
			if(mysql_num_rows($cek)>0){
				$update=mysql_query("UPDATE tbl_mekanik SET mk_nama='$mk_nama',mk_jk='$mk_jk',mk_tempat_lahir='$mk_tempat_lahir',mk_tgl_lahir='$mk_tgl_lahir',mk_alamat='$mk_alamat',mk_email='$mk_email',mk_tlp='$mk_tlp' WHERE mk_id='$mk_id'")or die(mysql_error());
			}else{
				$insert=mysql_query("INSERT INTO tbl_mekanik VALUES(NULL,'$mk_nama','$mk_jk','$mk_tempat_lahir','$mk_tgl_lahir','$mk_alamat','$mk_email','$mk_tlp')")or die(mysql_error());
			}
		break;
	case 'select':
		echo"
			<h1><b><p class='text-center' >Data Mekanik</p></b></h1><hr/><br/>
 			<table id='mk_tabel' class='display hov' width='100%'> 
 				<thead>
 					<tr align='left'>
 						<th><b>No.</b></th>
 						<th><b>Nama </b></th>
 						<th><b>JK</b></th>
 						<th><b>Tempat Lahir</b></th>
 						<th><b>Tanggal Lahir</b></th>
 						<th><b>Alamat</b></th>
 						<th><b>Email</b></th>
 						<th><b>Telepon</b></th>
 						<th><b>Aksi</b></th>
 					</tr>
 				</thead>";
 			echo"<tbody>";
 			$no=1;
 			$query=mysql_query("SELECT * FROM tbl_mekanik ORDER BY mk_id ASC")or die(mysql_error());
 				while($array=mysql_fetch_array($query)){
 					extract($array);
 					echo"<tr align='left'>
 						<td>".$no."</td>
 						<td>".$mk_nama."</td>
 						<td>".$mk_jk."</td>
 						<td>".$mk_tempat_lahir."</td>
 						<td>".$mk_tgl_lahir."</td>
 						<td>".$mk_alamat."</td>
 						<td>".$mk_email."</td>
 						<td>".$mk_tlp."</td>
 						<td><button class='btn btn-danger btn-block' onclick='fun_mk_hapus(".$mk_id.")'><span class='fa fa-fw fa-close'></span> Delete</button>
							<button class='btn btn-primary btn-block' onclick='fun_mk_update(".$mk_id.")'><span class='fa fa-fw fa-edit'></span> Update</button>
 						</td>
 						</tr>";

 					$no++;
 				}
 					
 			echo"</tbody>";
 			echo"</table>";
?>
			<script>
			 	$(document).ready(function(){
			 		$('#mk_tabel').dataTable({
			 			'ordering':false,
			 			'scrollY':true
			 		});
			 	});
			 </script>

<?php
 		break;


	case 'delete':
		$mk_id=$_GET['mk_id'];
		$delete=mysql_query("DELETE FROM tbl_mekanik WHERE mk_id='$mk_id'") or die(mysql_error());
		break;


	case'ambil_mekanik':
			$mk_id=$_GET['mk_id'];
			$ambil=mysql_query("SELECT * FROM tbl_mekanik WHERE mk_id='$mk_id'") or die(mysql_error());
			$array=mysql_fetch_array($ambil);
			echo "$array[mk_id]|$array[mk_nama]|$array[mk_jk]|$array[mk_tempat_lahir]|$array[mk_tgl_lahir]|$array[mk_alamat]|$array[mk_email]|$array[mk_tlp]|";
		break;
}
 ?>

