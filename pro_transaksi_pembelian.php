<?php 
session_start();
include_once("koneksi.php");
date_default_timezone_get("asia/jakarta");
$tgl=date('Y-m-d');
$pro=$_GET['pro'];
switch ($pro) {
// case pembuatan faktur
	case 'faktur':
		$datenow=date('Ymd');
		$sql=mysql_query("SELECT MAX(pbl_id)AS maxid FROM tbl_pembelian")or die(mysql_error());
		$array=mysql_fetch_array($sql)or die(mysql_error());
		$fk=$array['maxid'];
		$string=substr( $array['maxid'],11,3);
		$cekhari=substr($array['maxid'],3,8);
		// echo "string=".$string."</br>";
		// echo "cekhari=".$cekhari."</br>";
			if($cekhari!==$datenow){
				$faktur="PBL".$datenow."001";
			}else{
				$tambah=(int)$string+1;
				if(strlen($tambah)==1){
					$faktur="PBL".$datenow."00".$tambah;
				}elseif(strlen($tambah)==2){
					$faktur="PBL".$datenow."0".$tambah;
				}else{
					$faktur="PBL".$datenow.$tambah;
				}
			}

		echo $faktur."|";
		break;

// case pencarian data admin
	case 'cari_barang':
		@$pbl_dt_brg_nama=$_GET['pbl_dt_brg_nama'];
		$sql=mysql_query("SELECT * FROM tbl_barang 
							INNER JOIN tbl_kategori ON tbl_barang.ktg_id=tbl_kategori.ktg_id
							INNER JOIN tbl_satuan ON tbl_satuan.stn_id=tbl_kategori.stn_id
							WHERE brg_nama LIKE '%".$pbl_dt_brg_nama."%'") or die(mysql_error());
		echo "<ul class='hover'>";
			while ($array=mysql_fetch_array($sql)) {
?>
				<li id="<?php echo $array['brg_id']; ?> " onclick="brg_copy('<?php echo $array['brg_id'] ?>','<?php echo $array['brg_nama'] ?>','<?php echo $array['stn_nama'] ?>')"><b><?php echo $array['brg_nama']; ?></b></li>
<?php
			}
		echo "</ul>";
		
		break;

case 'insert':
		$pbl_id=$_GET['pbl_id'];
		$pbl_dt_brg_id=$_GET['pbl_dt_brg_id'];
		$pbl_dt_brg_harga=$_GET['pbl_dt_brg_harga'];
		$pbl_dt_brg_serial=strtoupper($_GET['pbl_dt_brg_serial']) ;  
		$pbl_dt_jumlah=$_GET['pbl_dt_jumlah'];
		$pbl_dt_subtot=$_GET['pbl_dt_subtot'];
			$cekpbl=mysql_query("SELECT pbl_jumlah FROM tbl_pembelian_detail WHERE pbl_id='$pbl_id' AND brg_id='$pbl_dt_brg_id' AND pbl_serial='$pbl_dt_brg_serial'") or die(mysql_error());
		if(mysql_num_rows($cekpbl)>0){
			$updatestok=mysql_query("UPDATE tbl_barang SET brg_stok=brg_stok+'$pbl_dt_jumlah' WHERE brg_id='$pbl_dt_brg_id'")or die(mysql_error());
			$update=mysql_query("UPDATE tbl_pembelian_detail SET pbl_jumlah=pbl_jumlah+'$pbl_dt_jumlah', pbl_subtot=pbl_subtot+'$pbl_dt_subtot' WHERE pbl_id='$pbl_id' AND brg_id='$pbl_dt_brg_id' AND pbl_serial='$pbl_dt_brg_serial'")or die(mysql_error());
		}else{
			$updatestok=mysql_query("UPDATE tbl_barang SET brg_stok=brg_stok+'$pbl_dt_jumlah' WHERE brg_id='$pbl_dt_brg_id'")or die(mysql_error());
			$insert=mysql_query("INSERT INTO tbl_pembelian_detail VALUES('$pbl_id','$pbl_dt_brg_id','$pbl_dt_brg_serial','$pbl_dt_jumlah','$pbl_dt_brg_harga','$pbl_dt_subtot')")or die(mysql_error());
		}
		
		break;
case 'select':
	@$pbl_id=$_GET['pbl_id'];
		echo"
 			<table id='usr_tabel' class='display hov' width='100%'> 
 				<thead style='background-color:#21B3F0'>
 					<tr align='left'>
 						<th width='5%' class='colom'><b>No.</b></th>
 						<th width='15%' class='colom'><b>Nama Barang</b></th>
 						<th width='7%' class='colom'><b>Satuan</b></th>
 						<th width='20%' class='colom'><b>No Serial</b></th>
 						<th width='12%' class='colom'><b>Jumlah Beli</b></th>
 						<th width='20%' class='colom'><b>Harga Beli</b></th>
 						<th width='20%' class='colom'><b>Subtotal</b></th>
 						<th width='8%' class='colom'><b>Aksi</b></th>
 					</tr>
 				</thead>";
 			echo"<tbody>";
 			$no=1;
 			$query=mysql_query("SELECT * FROM tbl_pembelian_detail 
 								INNER JOIN tbl_barang ON tbl_pembelian_detail.brg_id=tbl_barang.brg_id
 								INNER JOIN tbl_kategori ON tbl_kategori.ktg_id=tbl_barang.ktg_id  
 								INNER JOIN tbl_satuan ON tbl_satuan.stn_id=tbl_kategori.stn_id  
 								WHERE tbl_pembelian_detail.pbl_id='$pbl_id'
 								ORDER BY tbl_pembelian_detail.pbl_id ASC")or die(mysql_error());
 				while($array=mysql_fetch_array($query)){
 					extract($array);
 					echo"<tr align='left'>
 						<td class='colom'>".$no."</td>
 						<td class='colom'>".$brg_nama."</td>
 						<td class='colom'>".$stn_nama."</td>
 						<td class='colom'>".$pbl_serial."</td>
 						<td class='colom'>".$pbl_jumlah."</td>
 						<td class='colom'>Rp. ".number_format($pbl_harga,0,',','.') ."</td>
 						<td class='colom'>Rp.". number_format($pbl_subtot,0,',','.') ."</td>";
?>
 						<td class='colom'><button class="btn btn-danger" onclick="fun_pbl_hapus('<?php echo $pbl_id; ?>','<?php echo $brg_id; ?>','<?php echo $pbl_serial; ?>','<?php echo $pbl_jumlah; ?>')"><span class="fa fa-fw fa-close"></span> Delete</button></td>

<?php
					echo "</tr>";
					@$kaltot=$kaltot+$pbl_subtot;
					
 					$no++;
 				}
 					echo "<tr> <td colspan='7'><p class='text-right'><b> Rp.". number_format(@$kaltot,0,',','.')."</b></p></td></tr>";	
 					echo "<tr> <td><button class='btn btn-primary btn-md' onclick='fun_pbl_selesai(".@$kaltot.")'>Selesai</button></td></tr>";		
 			echo"</tbody>";
 			echo"</table>";

		break;


	case 'delete':
		$pbl_id=$_GET['pbl_id'];
		$brg_id=$_GET['brg_id'];
		$pbl_serial=$_GET['pbl_serial'];
		$pbl_jumlah=$_GET['pbl_jumlah'];
		$delete=mysql_query("DELETE FROM tbl_pembelian_detail WHERE pbl_id='$pbl_id' AND brg_id='$brg_id' AND pbl_serial='$pbl_serial'") or die(mysql_error());
		$updatestokbrg=mysql_query("UPDATE tbl_barang SET brg_stok=brg_stok-'$pbl_jumlah' WHERE brg_id='$brg_id'")or die(mysql_error());
		break;

	case 'selesai':
		$spl_id=$_GET['spl_id'];
		$pbl_id=$_GET['pbl_id'];
		$usr_id=$_SESSION['sess_usr_id'];
		// VARIABEL TANGGAL ADA DIATAS
		$pbl_po=$_GET['pbl_po'];
		$pbl_kaltot=$_GET['pbl_kaltot'];

		$updatestokbrg=mysql_query("INSERT INTO tbl_pembelian VALUES('$pbl_id','$usr_id','$spl_id','$tgl','$pbl_po','$pbl_kaltot')")or die(mysql_error());
		$insertselect=mysql_query("INSERT INTO tbl_barang_detail (brg_id,dt_serial) SELECT brg_id, pbl_serial FROM tbl_pembelian_detail WHERE pbl_id='$pbl_id' AND pbl_serial!=''")or die(mysql_error());
		
		break;

// case pencarian data admin
	case 'cari_spl':
		@$pbl_spl=$_GET['pbl_spl'];

		$sql=mysql_query("SELECT * FROM tbl_supplier WHERE spl_nama LIKE '%".$pbl_spl."%'") or die(mysql_error());
		echo "<ul class='hover'>";
			while ($array=mysql_fetch_array($sql)) {
?>
				<li id="<?php echo $array['spl_id']; ?> " onclick="spl_copy('<?php echo $array['spl_id'] ?>','<?php echo $array['spl_nama'] ?>')"><b><?php echo $array['spl_nama']; ?></b></li>
<?php
			}
		echo "</ul>";
		
		break;

}
 ?>
