<?php 
	$host="localhost";
	$user="root";
	$pass="";
	$db="pt_world_trans";
	$path="D:/db_wtp";
	$date=date("Y-m-d");

	exec("C:/xampp/mysql/bin/mysqldump -h localhost -u $user  $db > $path/$date-pt_world_trans.sql", $results, $result_value);
	if($result_value==0){
		echo "Backup Database Selesai";
	}else{
		echo "Backup Database Gagal";
	}



 ?>