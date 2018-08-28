<?php 
session_start();
include_once("koneksi.php");
$pro=$_GET['pro'];
switch ($pro) {
	case 'insert':
			$ketpos_id=$_GET['ketpos_id'];

			$ketpos_nama=$_GET['ketpos_nama'];


			$cek=mysql_query("SELECT * FROM tbl_keterangan_posisi WHERE ket_id='$ketpos_id'")or die(mysql_error());
			if(mysql_num_rows($cek)>0){
				$update=mysql_query("UPDATE tbl_keterangan_posisi SET ket_nama='$ketpos_nama' WHERE ket_id='$ketpos_id'")or die(mysql_error());
			}else{
				$insert=mysql_query("INSERT INTO tbl_keterangan_posisi VALUES(NULL,'$ketpos_nama')")or die(mysql_error());
			}
		break;

	case 'select':
		echo"
			<h1><b><p class='text-center' > Data Keterangan  Posisi</p></b></h1><hr/><br/>
 			<table id='ketpos_tabel' class='display hov' width='100%'> 
 				<thead>
 					<tr align='left'>
 						<th><b>No.</b></th>
 						<th><b>Nama Posisi</b></th>
 						<th><b>Aksi</b></th>
 					</tr>
 				</thead>";
 			echo"<tbody>";
 			$no=1;
 			$query=mysql_query("SELECT * FROM tbl_keterangan_posisi ORDER BY ket_id ASC")or die(mysql_error());
 				while($array=mysql_fetch_array($query)){
 					extract($array);
 					echo"<tr align='left'>
 						<td>".$no."</td>
 						<td>".$ket_nama."</td>
 						<td><button class='btn btn-danger' onclick='fun_ketpos_hapus(".$ket_id.")'><span class='fa fa-fw fa-close'></span> Delete</button>
							<button class='btn btn-primary' onclick='fun_ketpos_update(".$ket_id.")'><span class='fa fa-fw fa-edit'></span> Update</button>
 						</td>
 						</tr>";

 					$no++;
 				}
 					
 			echo"</tbody>";
 			echo"</table>";
?>
			 <script>
			 	$(document).ready(function(){
			 		$('#ketpos_tabel').dataTable({
			 			'ordering':false,
			 			'scrollY':true
			 		});
			 	});
			 </script>

<?php
 		break;

 	case 'delete':
		$ketpos_id=$_GET['ketpos_id'];
		$delete=mysql_query("DELETE FROM tbl_keterangan_posisi WHERE ket_id='$ketpos_id'") or die(mysql_error());
		break;


	case'ambil_posisi':
			$ketpos_id=$_GET['ketpos_id'];
			$ambil=mysql_query("SELECT * FROM tbl_keterangan_posisi WHERE ket_id='$ketpos_id'") or die(mysql_error());
			$array=mysql_fetch_array($ambil);
			echo "$array[ket_id]|$array[ket_nama]|";
		break;
}
 ?>
