<?php
if (empty($no_rm)){
	echo "<script>alert('Harap Mengisi Nomor Rekam Medis Pasien');</script>";
	echo "<meta content=1;url=pendaftaran_antrian.php>";
    }
else{
	$connection = mysql_connect("localhost", "root", "");
	$db = mysql_select_db("antrian_prioritas", $connection);
	session_start();
	$user_check=$_SESSION['login_pendaftaran'];
	
	$cekdata="select no_rm, nama_pasien, id_pembayaran, id_dokter, warga_negara, nomor_hp from t_pasien where no_rm='$no_rm'";
	
	$ada=mysql_query($cekdata) or die(mysql_error());
			$row = mysql_fetch_assoc($ada);
            $nama =$row['nama_pasien'];
			$pembayaran =$row['id_pembayaran'];
			$dokter =$row['id_dokter'];
			$wn =$row['warga_negara'];
			$hp=$row['nomor_hp'];
	
		if(mysql_num_rows($ada)>0){ 
			if($pembayaran =="1"){
  				echo "<script language='JavaScript'>window.alert('Pasien sudah pernah mendaftar Nama Pasien : $nama , Warga Negara : $wn , Riwayat Pembayaran : Asuransi BPJS , Riwayat Dokter : dr.Fx.Suharnadi, Sp.PD');</script>";
				
				echo "<script>document.forms[0].no_rm.value=$no_rm;</script>";
				echo "<script>document.forms[0].jenis_pembayaran.disabled=false;</script>";
				echo "<script>document.forms[0].nama_dokter.disabled=false;</script>";
				echo "<meta content=1;url= halaman_search_rm.php>";
				}
			else if ($pembayaran =="2"){
				echo "<script language='JavaScript'>window.alert('Pasien sudah pernah mendaftar Nama Pasien : $nama , Warga Negara : $wn , Riwayat Pembayaran : Asuransi, Riwayat Dokter : dr.Fx.Suharnadi, Sp.PD');</script>";
				echo "<script>document.forms[0].no_rm.value=$no_rm;</script>";
				echo "<script>document.forms[0].jenis_pembayaran.disabled=false;</script>";
				echo "<script>document.forms[0].nama_dokter.disabled=false;</script>";
				echo "<meta content=1;url= halaman_search_rm.php>";
			}
			else{
				echo "<script language='JavaScript'>window.alert('Pasien sudah pernah mendaftar Nama Pasien : $nama , Warga Negara : $wn , Riwayat Pembayaran : Pribadi, Riwayat Dokter :dr.Fx.Suharnadi, Sp.PD');</script>";
				echo "<script>document.forms[0].no_rm.value=$no_rm;</script>";
				echo "<script>document.forms[0].jenis_pembayaran.disabled=false;</script>";
				echo "<script>document.forms[0].nama_dokter.disabled=false;</script>";
				echo "<meta content=1;url= halaman_search_rm.php>";
			}
  }
 else
  {	
   echo "<script>alert('Pasien Belum Pernah Mendaftar');</script>";	 
   header('Location: pendaftaran_antrian.php');	
   }	
}
?>