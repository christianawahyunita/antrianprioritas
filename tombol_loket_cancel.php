<?php
include('session/sessionloket.php');
$loket="Selesai";

	if($login_session=="Pegawai Asuransi BPJS"){
		$select_antrian="SELECT nomor_antrian FROM t_transaksional WHERE prioritas='5' ORDER BY nomor_antrian ASC LIMIT 1";
		$result=mysql_query($select_antrian);
		$row = mysql_fetch_array($result);
		  $id=$row['nomor_antrian'];
		  date_default_timezone_set('Asia/Jakarta');
		  $date = date('Y-m-d H:i:s',time());
		//$pembayaran="Asuransi BPJS";
		
		 $ses_sql=mysql_query("UPDATE `t_transaksional` SET `prioritas`=4 , `loket_selanjutnya`='$loket' WHERE `nomor_antrian`= '$id'", $connection);
		
		 	 $histori=mysql_query("INSERT INTO t_history(no_rm, nama_pasien, id_pembayaran, id_dokter, waktu_pendaftaran, waktu_bpjs, waktu_keuangan, waktu_pemeriksaan,waktu_pemeriksaanlanjut) SELECT no_rm, nama_pasien, id_pembayaran, id_dokter, waktu_pendaftaran, waktu_bpjs, waktu_keuangan, waktu_pemeriksaan, waktu_pemeriksaanlanjut FROM t_transaksional WHERE nomor_antrian= '$id'", $connection);
		
	        $row = mysql_fetch_assoc($ses_sql, $histori);
			$login_session =$row['nama_loket'];
				if(!isset($login_session)){
				mysql_close($connection); // Menutup koneksi
				header('Location: home.php'); // Mengarahkan ke Home Page
			}
	 }
    else if($login_session=="Pegawai Keuangan"){
		$select_antrian="SELECT nomor_antrian FROM t_transaksional WHERE prioritas='2'  ORDER BY nomor_antrian ASC LIMIT 1";
		$result=mysql_query($select_antrian);
		$row = mysql_fetch_array($result);	
		
		  $id=$row['nomor_antrian'];
		  date_default_timezone_set('Asia/Jakarta');
		  $date = date('Y-m-d H:i:s',time());
	      $ses_sql=mysql_query("UPDATE `t_transaksional` SET `prioritas`=4 , `loket_selanjutnya`='$loket' WHERE `nomor_antrian`= '$id'", $connection);	
		$histori=mysql_query("INSERT INTO t_history(no_rm, nama_pasien, id_pembayaran, id_dokter, waktu_pendaftaran, waktu_bpjs, waktu_keuangan, waktu_pemeriksaan,waktu_pemeriksaanlanjut) SELECT no_rm, nama_pasien, id_pembayaran, id_dokter, waktu_pendaftaran, waktu_bpjs, waktu_keuangan, waktu_pemeriksaan, waktu_pemeriksaanlanjut FROM t_transaksional WHERE nomor_antrian= '$id'", $connection);
	        $row = mysql_fetch_assoc($ses_sql, $histori);
			$login_session =$row['nama_loket'];
				if(!isset($login_session)){
				mysql_close($connection); // Menutup koneksi
				header('Location: home.php'); // Mengarahkan ke Home Page
			}
		
	}
	else{
		$select_antrian="SELECT nomor_antrian FROM t_transaksional WHERE prioritas='3' ORDER BY nomor_antrian ASC LIMIT 1";
		$result=mysql_query($select_antrian);
		$row = mysql_fetch_array($result);
		
		  $id=$row['nomor_antrian'];
		  date_default_timezone_set('Asia/Jakarta');
		  $date = date('Y-m-d H:i:s',time());
	      $ses_sql=mysql_query("UPDATE `t_transaksional` SET `prioritas`=4 ,  `loket_selanjutnya`='$loket' WHERE `nomor_antrian`= '$id'", $connection);
		 $histori=mysql_query("INSERT INTO t_history(no_rm, nama_pasien, id_pembayaran, id_dokter, waktu_pendaftaran, waktu_bpjs, waktu_keuangan, waktu_pemeriksaan,waktu_pemeriksaanlanjut) SELECT no_rm, nama_pasien, id_pembayaran, id_dokter, waktu_pendaftaran, waktu_bpjs, waktu_keuangan, waktu_pemeriksaan, waktu_pemeriksaanlanjut FROM t_transaksional WHERE nomor_antrian= '$id'", $connection);
		  $row = mysql_fetch_assoc($ses_sql,$histori);
			$login_session =$row['nama_loket'];
				if(!isset($login_session)){
				mysql_close($connection); // Menutup koneksi
				header('Location: home.php'); // Mengarahkan ke Home Page
			}
		
	}

?>