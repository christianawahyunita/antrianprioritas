
<?php
if (empty($jenis_pembayaran) || empty($nama_dokter)|| empty($no_rm)){
echo "<script>alert('Harap Mengisi Seluruh Form Bertanda Bintang');</script>";
echo "<meta content=1;url=halaman_search_rm.php>";
}
else {
require_once("koneksi.php");
open_connection();

//untuk waktu nya
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s',time());
$loket_pribadi ="Ruang Praktek Dokter";
$loket_bpjs="Loket BPJS";
$loket_keuangan="Loket Keuangan";
	
$histori =mysql_query("UPDATE `t_pasien` SET `id_pembayaran`=$jenis_pembayaran,`id_dokter`=$nama_dokter, `jumlah_kunjungan`=2 WHERE no_rm=$no_rm", $connection);
$row = mysql_fetch_assoc($histori);

if($jenis_pembayaran=="4"){
	 $sql =mysql_query("INSERT INTO t_transaksional(no_rm, nama_pasien, id_pembayaran, id_dokter) SELECT no_rm, nama_pasien, id_pembayaran, id_dokter FROM t_pasien WHERE no_rm=$no_rm", $connection);
	
	$update=mysql_query("UPDATE `t_transaksional` SET `prioritas`=1, `loket_selanjutnya`='$loket_pribadi', `waktu_pendaftaran`= '$date' WHERE no_rm=$no_rm", $connection);	
	
	$row = mysql_fetch_assoc( $sql, $update );
	$login_session =$row['nama_pendaftaran'];
	if(!isset($login_session)){
		mysql_close($connection); // Menutup koneksi
		header('Location: nomor_antrian.php'); // Mengarahkan ke Home Page
 	}
  }
else if($jenis_pembayaran=="1"){
	 $sql =mysql_query("INSERT INTO t_transaksional(no_rm, nama_pasien, id_pembayaran, id_dokter) SELECT no_rm, nama_pasien, id_pembayaran, id_dokter FROM t_pasien WHERE no_rm=$no_rm", $connection);
	
	$update=mysql_query("UPDATE `t_transaksional` SET `prioritas`=5, `loket_selanjutnya`='$loket_bpjs', `waktu_pendaftaran`='$date' WHERE no_rm=$no_rm", $connection);	
	
	$row = mysql_fetch_assoc($sql, $update);
	$login_session =$row['nama_pendaftaran'];
	if(!isset($login_session)){
		mysql_close($connection); // Menutup koneksi
		header('Location: nomor_antrian.php'); // Mengarahkan ke Home Page
	}
 }
else{
	 $sql =mysql_query("INSERT INTO t_transaksional(no_rm, nama_pasien, id_pembayaran, id_dokter) SELECT no_rm, nama_pasien, id_pembayaran, id_dokter FROM t_pasien WHERE no_rm=$no_rm", $connection);
	
	$update=mysql_query("UPDATE `t_transaksional` SET `prioritas`=2, `loket_selanjutnya`= '$loket_keuangan', `waktu_pendaftaran`='$date' WHERE no_rm=$no_rm", $connection);	
	
	$row = mysql_fetch_assoc($sql, $update);
	$login_session =$row['nama_pendaftaran'];
	if(!isset($login_session)){
		mysql_close($connection); // Menutup koneksi
		header('Location: nomor_antrian.php'); // Mengarahkan ke Home Page
		}
 }
}

?>