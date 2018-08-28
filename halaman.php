<?php 
@$cs=$_GET['cs'];
switch ($cs) {
	case 'Master-User':
		include_once('master_user.php');
		break;
	case 'Master-Kategori':
		include_once('master_kategori_barang.php');
		break;
	case 'Master-Satuan':
		include_once('master_satuan.php');
		break;
	case 'Master-Mekanik':
		include_once('master_mekanik.php');
		break;
	case 'Master-Barang':
		include_once('master_barang.php');
		break;
	case 'Master-Supir':
		include_once('master_supir.php');
		break;
	case 'Master-Mobil':
		include_once('master_mobil.php');
		break;
	case 'Master-Keterangan-Posisi':
		include_once('master_ket_posisi.php');
		break;
	case 'Master-Supplier':
		include_once('master_supplier.php');
		break;
	case 'Transaksi-Pembelian':
		include_once('transaksi_pembelian.php');
		break;
	case 'Transaksi-Servis':
		include_once('transaksi_service.php');
		break;
	case 'Transaksi-Klaim':
		include_once('transaksi_klaim.php');
		break;
	case 'Laporan-Pembelian':
		include_once('lap_pembelian.php');
		break;
	case 'Laporan-Servis':
		include_once('lap_servis.php');
		break;
	case 'Laporan-Persedian-Barang':
		include_once('lap_barang.php');
		break;
	case 'Laporan-Klaim':
		include_once('lap_klaim.php');
		break;
	case 'Ubah-Data':
		include_once('master_user_ubahdata.php');
		break;
	case 'Ubah-Sandi':
		include_once('master_user_ubahsandi.php');
		break;
	default:
		include_once("dashboard.php");
		break;
}

 ?>

<!--  
 <script>
 	$(document).ready(function(){
 		$('.usr_tabel').dataTable();
 	});
 </script> -->