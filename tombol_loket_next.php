<?php
include('session/sessionloket.php');

	if($login_session=="Pegawai Asuransi BPJS"){
		$select_antrian="SELECT nomor_antrian FROM t_transaksional WHERE prioritas='5' ORDER BY nomor_antrian ASC LIMIT 1";
		$result=mysql_query($select_antrian);
		$row = mysql_fetch_array($result);
			
		  $id=$row['nomor_antrian'];
		  date_default_timezone_set('Asia/Jakarta');
		  $date = date('Y-m-d H:i:s',time());
		  $loket_lanjut = "Ruang Praktek Dokter";
	      $ses_sql=mysql_query("UPDATE `t_transaksional` SET `prioritas`=1, `waktu_bpjs`='$date' , `loket_selanjutnya`= '$loket_lanjut'  WHERE `nomor_antrian`= '$id'", $connection);
		 $ses_sq=mysql_query("INSERT INTO `t_notif`(`isi_notif`, `tanggal`) VALUES ('Nomor Antrian $id dari Loket BPJS ke ruang dokter','$date')", $connection);
	        $row = mysql_fetch_assoc($ses_sql, $ses_sq);
			$login_session =$row['nama_loket'];
				if(!isset($login_session)){
				mysql_close($connection); // Menutup koneksi
				header('Location: home.php'); // Mengarahkan ke Home Page
			}
	 }
    else if($login_session=="Pegawai Keuangan"){
		$select_antrian="SELECT nomor_antrian FROM t_transaksional WHERE prioritas='2' ORDER BY nomor_antrian ASC LIMIT 1";
		$result=mysql_query($select_antrian);
		$row = mysql_fetch_array($result);	
		
		  $id=$row['nomor_antrian'];
		  date_default_timezone_set('Asia/Jakarta');
		  $date = date('Y-m-d H:i:s',time());
		 $loket_lanjut = "Ruang Praktek Dokter";
	      $ses_sql=mysql_query("UPDATE `t_transaksional` SET `prioritas`=1, `waktu_keuangan`='$date' ,`loket_selanjutnya`= '$loket_lanjut' WHERE `nomor_antrian`= '$id'", $connection);
		 $ses_sq=mysql_query("INSERT INTO `t_notif`(`isi_notif`, `tanggal`) VALUES ('Nomor Antrian $id dari Loket Keuangan ke ruang dokter','$date')", $connection);
	        $row = mysql_fetch_assoc($ses_sql, $ses_sq);
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
		 $loket_lanjut = "Ruang Praktek Dokter";
		  $id=$row['nomor_antrian'];
		  date_default_timezone_set('Asia/Jakarta');
		  $date = date('Y-m-d H:i:s',time());
	      $ses_sql=mysql_query("UPDATE `t_transaksional` SET `prioritas`=1, `waktu_pemeriksaanlanjut`='$date',`loket_selanjutnya`= '$loket_lanjut' WHERE `nomor_antrian`= '$id'", $connection);
		 $ses_sq=mysql_query("INSERT INTO `t_notif`(`isi_notif`, `tanggal`) VALUES ('Nomor Antrian $id dari Loket Laboratorium ke ruang dokter','$date')", $connection);
	        $row = mysql_fetch_assoc($ses_sql,$ses_sq);
			$login_session =$row['nama_loket'];
				if(!isset($login_session)){
				mysql_close($connection); // Menutup koneksi
				header('Location: home.php'); // Mengarahkan ke Home Page
			}
		
	}

?>