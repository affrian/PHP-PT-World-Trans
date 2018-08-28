<?php 
session_start();
include_once("koneksi.php");
$pro=$_GET['pro'];
switch ($pro) {
	// case pencarian data admin
	case 'cari_satuan':
		@$ktg_satuan=$_GET['ktg_satuan'];
		$sql=mysql_query("SELECT * FROM tbl_satuan WHERE stn_nama LIKE '%".$ktg_satuan."%'") or die(mysql_error());
		echo "<ul class='hover'>";
			while ($array=mysql_fetch_array($sql)) {
?>
				<li id="<?php echo $array['stn_id']; ?> " onclick="stn_copy('<?php echo $array['stn_id'] ?>','<?php echo $array['stn_nama'] ?>')"><b><?php echo $array['stn_nama']; ?></b></li>
<?php
			}
		echo "</ul>";
		
		break;
	case 'insert':
			$ktg_id=$_GET['ktg_id'];

			$ktg_stn_id=$_GET['ktg_stn_id'];
			$ktg_nama=$_GET['ktg_nama'];
			$cek=mysql_query("SELECT * FROM tbl_kategori WHERE ktg_id='$ktg_id'")or die(mysql_error());
			if(mysql_num_rows($cek)>0){
				$update=mysql_query("UPDATE tbl_kategori SET ktg_nama='$ktg_nama',stn_id='$ktg_stn_id' WHERE ktg_id='$ktg_id'")or die(mysql_error());
			}else{
				$insert=mysql_query("INSERT INTO tbl_kategori VALUES(NULL,'$ktg_stn_id','$ktg_nama')")or die(mysql_error());
			}
		break;

	case 'select':
		echo"
			<h1><b><p class='text-center' >Data Kategori</p></b></h1><hr/><br/>
 			<table id='ktg_tabel' class='display hov' width='100%'> 
 				<thead>
 					<tr align='left'>
 						<th><b>No.</b></th>
 						<th><b>Nama Kategori</b></th>
 						<th><b>Nama Satuan</b></th>
 						<th><b>Aksi</b></th>
 					</tr>
 				</thead>";
 			echo"<tbody>";
 			$no=1;
 			$query=mysql_query("SELECT * FROM tbl_kategori INNER JOIN tbl_satuan ON tbl_kategori.stn_id=tbl_satuan.stn_id ORDER BY tbl_kategori.ktg_id ASC")or die(mysql_error());
 				while($array=mysql_fetch_array($query)){
 					extract($array);
 					echo"<tr align='left'>
 						<td>".$no."</td>
 						<td>".$ktg_nama."</td>
 						<td>".$stn_nama."</td>
 						<td><button class='btn btn-danger' onclick='fun_ktg_hapus(".$ktg_id.")'><span class='fa fa-fw fa-close'></span> Delete</button>
							<button class='btn btn-primary' onclick='fun_ktg_update(".$ktg_id.")'><span class='fa fa-fw fa-edit'></span> Update</button>
 						</td>
 						</tr>";

 					$no++;
 				}
 					
 			echo"</tbody>";
 			echo"</table>";
?>
	 <script>
	 	$(document).ready(function(){
	 		$('#ktg_tabel').dataTable({
	 			'ordering':false,
	 			'scrollY':true
	 		});
	 	});
	 </script>
<?php
		break;

	case 'delete':
		$ktg_id=$_GET['ktg_id'];
		$delete=mysql_query("DELETE FROM tbl_kategori WHERE ktg_id='$ktg_id'") or die(mysql_error());
		break;

	case'ambil_kategori':
			$ktg_id=$_GET['ktg_id'];
			$ambil=mysql_query("SELECT * FROM tbl_kategori INNER JOIN tbl_satuan ON tbl_kategori.stn_id=tbl_satuan.stn_id WHERE tbl_kategori.ktg_id='$ktg_id'") or die(mysql_error());
			$array=mysql_fetch_array($ambil);
			echo "$array[ktg_id]|$array[ktg_nama]|$array[stn_id]|$array[stn_nama]|";
		break;
}
 ?>
