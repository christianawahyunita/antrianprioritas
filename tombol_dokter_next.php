<?php
$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("antrian_prioritas", $connection);
session_start();
$user_check=$_SESSION['login_user'];
	$select_antrian="SELECT nomor_antrian, no_rm, nama_pasien FROM t_transaksional WHERE prioritas=1 ORDER BY nomor_antrian ASC LIMIT 1";
	$result=mysql_query($select_antrian);
	$row = mysql_fetch_array($result);
    $id=$row['nomor_antrian'];
	date_default_timezone_set('Asia/Jakarta');
	$date = date('Y-m-d H:i:s',time());
	$loket_lanjut="Selesai";
	$ses_sql=mysql_query("UPDATE `t_transaksional` SET `prioritas`=4, `waktu_pemeriksaan`='$date' , `loket_selanjutnya`= '$loket_lanjut' WHERE `nomor_antrian`= '$id'", $connection);
	 $histori=mysql_query("INSERT INTO t_history(no_rm, nama_pasien, id_pembayaran, id_dokter, waktu_pendaftaran, waktu_bpjs, waktu_keuangan, waktu_pemeriksaan,waktu_pemeriksaanlanjut) SELECT no_rm, nama_pasien, id_pembayaran, id_dokter, waktu_pendaftaran, waktu_bpjs, waktu_keuangan, waktu_pemeriksaan, waktu_pemeriksaanlanjut FROM t_transaksional WHERE nomor_antrian= '$id'", $connection);
	$row = mysql_fetch_assoc($ses_sql, $histori);
	if(!isset($login_session)){
		mysql_close($connection); // Menutup koneksi
		header('Location: homedokter.php'); // Mengarahkan ke Home Page
	}
?>