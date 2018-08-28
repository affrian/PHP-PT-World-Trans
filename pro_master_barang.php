<?php 
session_start();
include_once("koneksi.php");
$pro=$_GET['pro'];
switch ($pro) {
	// case pencarian data admin
	case 'cari_kategori':
		@$brg_kategori=$_GET['brg_kategori'];
		$sql=mysql_query("SELECT * FROM tbl_kategori WHERE ktg_nama LIKE '%".$brg_kategori."%'") or die(mysql_error());
		echo "<ul class='hover'>";
			while ($array=mysql_fetch_array($sql)) {
?>
				<li id="<?php echo $array['ktg_id']; ?> " onclick="ktg_copy('<?php echo $array['ktg_id'] ?>','<?php echo $array['ktg_nama'] ?>')"><b><?php echo $array['ktg_nama']; ?></b></li>
<?php
			}
		echo "</ul>";
		
		break;
		
	case 'insert':
			$brg_id=$_GET['brg_id'];

			$brg_ktg_id=$_GET['brg_ktg_id'];
			$brg_nama=$_GET['brg_nama'];

			$cek=mysql_query("SELECT * FROM tbl_barang WHERE brg_id='$brg_id'")or die(mysql_error());
			if(mysql_num_rows($cek)>0){
				$stok=mysql_query("SELECT brg_stok FROM tbl_barang WHERE brg_id='$brg_id'")or die(mysql_error());
				$array=mysql_fetch_array($stok);
				$stokawal=$array['brg_stok'];
				$update=mysql_query("UPDATE tbl_barang SET ktg_id='$brg_ktg_id',brg_nama='$brg_nama', brg_stok='$stokawal' WHERE brg_id='$brg_id'")or die(mysql_error());
			}else{
				$insert=mysql_query("INSERT INTO tbl_barang VALUES(NULL,'$brg_ktg_id','$brg_nama','0')")or die(mysql_error());
			}
		break;

	case 'select':
		echo"
			<h1><b><p class='text-center' >Data Barang</p></b></h1><hr/><br/>
 			<table id='brg_tabel' class='display hov' width='100%'> 
 				<thead>
 					<tr align='left'>
 						<th><b>No.</b></th>
 						<th><b>Nama Kategori</b></th>
 						<th><b>Nama Barang</b></th>
 						<th><b>Satuan</b></th>
 						<th><b>Stok</b></th>
 						<th><b>Aksi</b></th>
 					</tr>
 				</thead>";
 			echo"<tbody>";
 			$no=1;
 			$query=mysql_query("SELECT * FROM tbl_barang 
 								INNER JOIN tbl_kategori ON tbl_barang.ktg_id=tbl_kategori.ktg_id 
 								INNER JOIN tbl_satuan ON tbl_satuan.stn_id=tbl_kategori.stn_id
 								ORDER BY tbl_kategori.ktg_id ASC")or die(mysql_error());
 				while($array=mysql_fetch_array($query)){
 					extract($array);
 					echo"<tr align='left'>
 						<td>".$no."</td>
 						<td>".$ktg_nama."</td>
 						<td>".$brg_nama."</td>
 						<td>".$stn_nama."</td>
 						<td>".$brg_stok."</td>
 						<td><button class='btn btn-danger' onclick='fun_brg_hapus(".$brg_id.")'><span class='fa fa-fw fa-close'></span> Delete</button>
							<button class='btn btn-primary' onclick='fun_brg_update(".$brg_id.")'><span class='fa fa-fw fa-edit'></span> Update</button>
 						</td>
 						</tr>";

 					$no++;
 				}
 					
 			echo"</tbody>";
 			echo"</table>";
?>
			 <script>
			 	$(document).ready(function(){
			 		$('#brg_tabel').DataTable({
			 			'ordering':false,
			 			'scrollY':true
			 		});
			 	});
			 </script>

<?php

		break;

	case 'delete':
		$brg_id=$_GET['brg_id'];
		$delete=mysql_query("DELETE FROM tbl_barang WHERE brg_id='$brg_id'") or die(mysql_error());
		break;

	case'ambil_barang':
			$brg_id=$_GET['brg_id'];
			$ambil=mysql_query("SELECT * FROM tbl_barang INNER JOIN tbl_kategori ON tbl_barang.ktg_id=tbl_kategori.ktg_id WHERE tbl_barang.brg_id='$brg_id'") or die(mysql_error());
			$array=mysql_fetch_array($ambil);
			echo "$array[brg_id]|$array[brg_nama]|$array[ktg_id]|$array[ktg_nama]|";
		break;
}
 ?>
