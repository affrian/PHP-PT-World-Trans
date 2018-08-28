<?php 
session_start();
include_once("koneksi.php");
$pro=$_GET['pro'];
switch ($pro) {
	case 'insert':
		$usr_status=$_GET['usr_status'];
		$usr_nama=$_GET['usr_nama'];
		$usr_jk=$_GET['usr_jk'];
		$usr_tempat_lahir=$_GET['usr_tempat_lahir'];
		$usr_tgl_lahir=$_GET['usr_tgl_lahir'];
		$usr_alamat=$_GET['usr_alamat'];
		$usr_email=$_GET['usr_email'];
		$usr_tlp=$_GET['usr_tlp'];
		$usr_konfir_pass=$_GET['usr_konfir_pass'];

		$insert=mysql_query("INSERT INTO tbl_user VALUES(NULL,'$usr_status','$usr_nama','$usr_jk','$usr_tempat_lahir','$usr_tgl_lahir','$usr_alamat','$usr_email','$usr_tlp','$usr_konfir_pass')")or die(mysql_error());
		break;

	case 'select':
		echo"
			<h1><b><p class='text-center' >Data User</p></b></h1><hr/><br/>
 			<table id='usr_tabel' class='display hov' width='100%'> 
 				<thead>
 					<tr align='left'>
 						<th><b>No.</b></th>
 						<th><b>Status </b></th>
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
 			$query=mysql_query("SELECT * FROM tbl_user ORDER BY usr_id ASC")or die(mysql_error());
 				while($array=mysql_fetch_array($query)){
 					extract($array);
 					echo"<tr align='left'>
 						<td>".$no."</td>
 						<td>".$usr_status."</td>
 						<td>".$usr_nama."</td>
 						<td>".$usr_jk."</td>
 						<td>".$usr_tempat_lahir."</td>
 						<td>".$usr_tgl_lahir."</td>
 						<td>".$usr_alamat."</td>
 						<td>".$usr_email."</td>
 						<td>".$usr_tlp."</td>
 						<td><button class='btn btn-danger' onclick='fun_usr_hapus(".$usr_id.")'><span class='fa fa-fw fa-close'></span> Delete</button></td>
 						</tr>";

 					$no++;
 				}
 					
 			echo"</tbody>";
 			echo"</table>";
?>

			 <script>
			 	$(document).ready(function(){
			 		$('#usr_tabel').dataTable({
			 			'ordering':false,
			 			'scrollY':true
			 		});
			 	});
			 </script>

<?php
		break;

	case 'delete':
		$usr_id=$_GET['usr_id'];
		$delete=mysql_query("DELETE FROM tbl_user WHERE usr_id='$usr_id'") or die(mysql_error());
		break;

	case 'update':
		$usr_ubah_id=$_GET['usr_ubah_id'];
		$usr_ubah_nama=$_GET['usr_ubah_nama'];
		$usr_ubah_jk=$_GET['usr_ubah_jk'];
		$usr_ubah_tempat_lahir=$_GET['usr_ubah_tempat_lahir'];
		$usr_ubah_tgl_lahir=$_GET['usr_ubah_tgl_lahir'];
		$usr_ubah_alamat=$_GET['usr_ubah_alamat'];
		$usr_ubah_email=$_GET['usr_ubah_email'];
		$usr_ubah_tlp=$_GET['usr_ubah_tlp'];
		$update=mysql_query("UPDATE tbl_user SET usr_nama='$usr_ubah_nama', usr_jk='$usr_ubah_jk', usr_tempat_lahir='$usr_ubah_tempat_lahir', usr_tgl_lahir='$usr_ubah_tgl_lahir', usr_alamat='$usr_ubah_alamat', usr_email='$usr_ubah_email', usr_tlp='$usr_ubah_tlp' WHERE usr_id='$usr_ubah_id'") or die(mysql_error());
		break;

	case 'cek_pass':
			$usr_ubah_pass_id=$_GET['usr_ubah_pass_id'];
			$pass_awal=$_GET['pass_awal'];
			$cek=mysql_query("SELECT usr_pass FROM tbl_user WHERE usr_id='$usr_ubah_pass_id'AND usr_pass='$pass_awal'")or die(mysql_error());
			if(mysql_num_rows($cek)==1){
				echo "benar|";
			}else{
				echo "Maaf Password Salah!!|";
			}
		break;

	case 'update_pass':
			$usr_ubah_pass_id=$_GET['usr_ubah_pass_id'];
			$usr_ubah_konfir=$_GET['usr_ubah_konfir'];
			$up_pass=mysql_query("UPDATE tbl_user SET usr_pass='$usr_ubah_konfir' WHERE usr_id='$usr_ubah_pass_id'") or die(mysql_error());
		break;
}
 ?>

