<?php
$connection = mysql_connect("localhost", "root", "");
// Seleksi Database
$db = mysql_select_db("antrian_prioritas", $connection);
session_start();
$user_check=$_SESSION['login_pendaftaran'];
// Ambil nama karyawan berdasarkan username karyawan dengan mysql_fetch_assoc
$ses_sql=mysql_query("TRUNCATE TABLE t_transaksional", $connection);
$ses_sq=mysql_query("TRUNCATE TABLE t_notif", $connection);
$row = mysql_fetch_assoc($ses_sql,$ses_sq);
if(!isset($login_session)){
	mysql_close($connection); // Menutup koneksi
	header('Location: halaman_search_rm.php'); // Mengarahkan ke Home Page
}
?>