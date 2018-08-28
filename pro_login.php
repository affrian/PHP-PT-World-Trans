<?php 
	session_start();
	include_once("koneksi.php");
	$lgn_user=$_POST['lgn_user'];
	$lgn_pass=$_POST['lgn_pass'];
	$login=mysql_query("SELECT * FROM tbl_user WHERE usr_email='$lgn_user' AND usr_pass='$lgn_pass'")or die(mysql_error());
	// $array=mysql_fetch_array($login);
	if(mysql_num_rows($login)>0){
		$array=mysql_fetch_array($login);

		$_SESSION['sess_usr_id']=$array['usr_id'];
		$_SESSION['sess_usr_status']=$array['usr_status'];
		$_SESSION['sess_usr_nama']=$array['usr_nama'];
		$_SESSION['sess_usr_jk']=$array['usr_jk'];
		$_SESSION['sess_usr_tempat_lahir']=$array['usr_tempat_lahir'];
		$_SESSION['sess_usr_tgl_lahir']=$array['usr_tgl_lahir'];
		$_SESSION['sess_usr_alamat']=$array['usr_alamat'];
		$_SESSION['sess_usr_email']=$array['usr_email'];
		$_SESSION['sess_usr_tlp']=$array['usr_tlp'];
		$_SESSION['sess_usr_pass']=$array['usr_pass'];
		// echo $_SESSION['sess_usr_id']."/".$_SESSION['sess_usr_status'];
	}else{
		echo("Maaf User Tidak Ditemukan");
	}
	
 ?>