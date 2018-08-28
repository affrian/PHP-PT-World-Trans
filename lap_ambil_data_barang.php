<?php 
session_start();
include_once("koneksi.php");
$pro=$_GET['pro'];
switch ($pro) {
	// case pencarian data admin
	case 'cari_kategori':
		@$lap_brg_ktg=$_GET['lap_brg_ktg'];
		$sql=mysql_query("SELECT * FROM tbl_kategori WHERE ktg_nama LIKE '%".$lap_brg_ktg."%'") or die(mysql_error());
		echo "<ul class='hover'>";
			while ($array=mysql_fetch_array($sql)) {
?>
				<li id="<?php echo $array['ktg_id']; ?> " onclick="lap_brg_ktg_copy('<?php echo $array['ktg_id'] ?>','<?php echo $array['ktg_nama'] ?>')"><b><?php echo $array['ktg_nama']; ?></b></li>
<?php
			}
		echo "</ul>";
		
		break;

// case pencarian data admin
	case 'cari_barang':
		@$lap_brg=$_GET['lap_brg'];

		$sql=mysql_query("SELECT * FROM tbl_barang 
							INNER JOIN tbl_kategori ON tbl_barang.ktg_id=tbl_kategori.ktg_id
							INNER JOIN tbl_satuan ON tbl_kategori.stn_id=tbl_satuan.stn_id
							WHERE tbl_barang.brg_nama LIKE '%".$lap_brg."%'") or die(mysql_error());
		echo "<ul class='hover'>";
			while ($array=mysql_fetch_array($sql)) {
?>
				<li id="<?php echo $array['brg_id']; ?> " onclick="lap_brg_copy('<?php echo $array['brg_id'] ?>','<?php echo $array['brg_nama'] ?>','<?php echo $array['brg_stok'] ?>','<?php echo $array['stn_nama'] ?>')"><b><?php echo $array['brg_nama']; ?></b></li>
<?php
			}
		echo "</ul>";
		
		break;

}
 ?>

