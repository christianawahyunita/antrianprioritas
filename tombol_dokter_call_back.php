<?php
$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("antrian_prioritas", $connection);
session_start();
$user_check=$_SESSION['login_user'];


	$select_antrian="SELECT nomor_antrian FROM t_transaksional WHERE prioritas='6' ORDER BY nomor_antrian ASC LIMIT 1";
	$result=mysql_query($select_antrian);
	$row = mysql_fetch_array($result);

 date_default_timezone_set('Asia/Jakarta');
		  $date = date('Y-m-d H:i:s',time());
    $id=$row['nomor_antrian'];
	$ses_sql=mysql_query("UPDATE `t_transaksional` SET `prioritas`=1, `waktu_pemeriksaan`='$date' WHERE `nomor_antrian`= '$id'", $connection);
	$ses_sq=mysql_query("INSERT INTO `t_notif`(`isi_notif`, `tanggal`) VALUES ('Nomor Antrian $id dipanggil ulang','$date')", $connection);
	$row = mysql_fetch_assoc($ses_sql, $histori);
	if(!isset($login_session)){
		mysql_close($connection); // Menutup koneksi
		header('Location: homedokter.php'); // Mengarahkan ke Home Page
	}


?>