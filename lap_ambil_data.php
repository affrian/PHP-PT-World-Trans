<?php 
session_start();
include_once("koneksi.php");
$pro=$_GET['pro'];
switch ($pro) {
	// case pencarian data admin
	case 'cari_kategori':
		@$lap_svs_ktg=$_GET['lap_svs_ktg'];
		$sql=mysql_query("SELECT * FROM tbl_kategori WHERE ktg_nama LIKE '%".$lap_svs_ktg."%'") or die(mysql_error());
		echo "<ul class='hover'>";
			while ($array=mysql_fetch_array($sql)) {
?>
				<li id="<?php echo $array['ktg_id']; ?> " onclick="lap_svs_ktg_copy('<?php echo $array['ktg_id'] ?>','<?php echo $array['ktg_nama'] ?>')"><b><?php echo $array['ktg_nama']; ?></b></li>
<?php
			}
		echo "</ul>";
		
		break;

// case pencarian data admin
	case 'cari_nopol':
		@$lap_svs_mbl=$_GET['lap_svs_mbl'];
		$sql=mysql_query("SELECT * FROM tbl_mobil WHERE mbl_nopol LIKE '%".$lap_svs_mbl."%'") or die(mysql_error());
		echo "<ul class='hover'>";
			while ($array=mysql_fetch_array($sql)) {
?>
				<li id="<?php echo $array['mbl_id']; ?> " onclick="lap_svs_mbl_copy('<?php echo $array['mbl_id'] ?>','<?php echo $array['mbl_nopol'] ?>')"><b><?php echo $array['mbl_nopol']; ?></b></li>
<?php
			}
		echo "</ul>";
		
		break;
		
}
 ?>
 </script>