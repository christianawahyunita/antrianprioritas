//sudah benar
<?php
if (empty($nama_pasien) || empty($jenis_pembayaran) || empty($nama_dokter)|| empty($no_rm)){
echo "<script>alert('Harap Mengisi Seluruh Form Bertanda Bintang');</script>";
echo "<meta content=1;url=pendaftaran_antrian.php>";
}
else {
require_once("koneksi.php");
open_connection();

//untuk waktu nya
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s',time());
$loket_pribadi ="Ruang Praktek Dokter";
	
	  	if($jenis_pembayaran=="4"){
			$sql =mysql_query("INSERT INTO `t_transaksional`(`nama_pasien`, `no_rm`, `id_pembayaran`, `id_dokter`, `prioritas`, `loket_selanjutnya`, `waktu_pendaftaran`) VALUES ('$nama_pasien','$no_rm','$jenis_pembayaran','$nama_dokter','1','$loket_pribadi', '$date')", $connection);     
		 	$histori =mysql_query("INSERT INTO `t_pasien`(`nama_pasien`, `no_rm`, `id_pembayaran`, `id_dokter`, `warga_negara`, `nomor_hp`,`jumlah_kunjungan`) VALUES ('$nama_pasien','$no_rm','$jenis_pembayaran','$nama_dokter','$warga_negara','$nomor_hp','1')", $connection);	
			$row = mysql_fetch_assoc($sql, $histori);
			$login_session =$row['nama_pendaftaran'];
				if(!isset($login_session)){
				mysql_close($connection); // Menutup koneksi
				header('Location: nomor_antrian.php'); // Mengarahkan ke Home Page
			}
 		}
 		else if($jenis_pembayaran=="1"){
	 		$sql =mysql_query("INSERT INTO `t_transaksional`(`nama_pasien`, `no_rm`, `id_pembayaran`, `id_dokter`, `prioritas`, `loket_selanjutnya`, `waktu_pendaftaran`) VALUES ('$nama_pasien','$no_rm','$jenis_pembayaran','$nama_dokter','5','Loket BPJS','$date')", $connection);   
			$histori =mysql_query("INSERT INTO `t_pasien`(`nama_pasien`, `no_rm`, `id_pembayaran`, `id_dokter`, `warga_negara`, `nomor_hp`,`jumlah_kunjungan`) VALUES ('$nama_pasien','$no_rm','$jenis_pembayaran','$nama_dokter','$warga_negara','$nomor_hp','1')", $connection); $row = mysql_fetch_assoc($sql, $histori);
			$login_session =$row['nama_pendaftaran'];
				if(!isset($login_session)){
				mysql_close($connection); // Menutup koneksi
				header('Location: nomor_antrian.php'); // Mengarahkan ke Home Page
 		}
		}
	 	else{
				$sql =mysql_query("INSERT INTO `t_transaksional`(`nama_pasien`, `no_rm`, `id_pembayaran`, `id_dokter`, `prioritas`, `loket_selanjutnya`, `waktu_pendaftaran`) VALUES ('$nama_pasien','$no_rm','$jenis_pembayaran','$nama_dokter','2','Loket Keuangan','$date')", $connection);      
		 	$histori =mysql_query("INSERT INTO `t_pasien`(`nama_pasien`, `no_rm`, `id_pembayaran`, `id_dokter`, `warga_negara`, `nomor_hp`,`jumlah_kunjungan`) VALUES ('$nama_pasien','$no_rm','$jenis_pembayaran','$nama_dokter','$warga_negara','$nomor_hp','1')", $connection); $row = mysql_fetch_assoc($sql, $histori);
			$login_session =$row['nama_pendaftaran'];
				if(!isset($login_session)){
				mysql_close($connection); // Menutup koneksi
				header('Location: nomor_antrian.php'); // Mengarahkan ke Home Page
	 	}
		}
  }

?>
