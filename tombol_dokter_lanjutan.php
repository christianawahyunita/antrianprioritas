<?php
$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("antrian_prioritas", $connection);
session_start();
$user_check=$_SESSION['login_user'];
	$select_antrian="SELECT nomor_antrian FROM t_transaksional WHERE prioritas='1' ORDER BY nomor_antrian ASC LIMIT 1";
	$result=mysql_query($select_antrian);
	$row = mysql_fetch_array($result);
    $id=$row['nomor_antrian'];
	date_default_timezone_set('Asia/Jakarta');
	$date = date('Y-m-d H:i:s',time());
    $loket_lanjutan="Ruang Pemeriksaan Lanjutan";
	$ses_sql=mysql_query("UPDATE `t_transaksional` SET `prioritas`=3, `waktu_pemeriksaan`='$date' , `loket_selanjutnya`= '$loket_lanjutan' WHERE `nomor_antrian`= '$id'", $connection);
	$ses_sq=mysql_query("INSERT INTO `t_notif`(`isi_notif`, `tanggal`) VALUES ('Nomor Antrian $id dari loket dokter ke laboratorium','$date')", $connection);
	$row = mysql_fetch_assoc($ses_sql, $ses_sq);
	if(!isset($login_session)){
		mysql_close($connection); // Menutup koneksi
		header('Location: homedokter.php'); // Mengarahkan ke Home Page
	}
?>