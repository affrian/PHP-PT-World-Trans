<?php 
session_start();
include_once("koneksi.php");
date_default_timezone_get("asia/jakarta");
$tgl=date('Y-m-d');
$pro=$_GET['pro'];
switch ($pro) {
// case pencarian data admin
	case 'cari_nopol':
		@$lap_mbl_nama=$_GET['lap_mbl_nama'];
		$sql=mysql_query("SELECT * FROM tbl_mobil WHERE mbl_nopol LIKE '%".$lap_mbl_nama."%'") or die(mysql_error());
		echo "<ul class='hover'>";
			while ($array=mysql_fetch_array($sql)) {
?>
				<li id="<?php echo $array['mbl_id']; ?> " onclick="lap_klm_mbl_copy('<?php echo $array['mbl_id'] ?>','<?php echo $array['mbl_nopol'] ?>')"><b><?php echo $array['mbl_nopol']; ?></b></li>
<?php
			}
		echo "</ul>";
		
		break;

}
 ?>
