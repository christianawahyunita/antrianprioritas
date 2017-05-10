<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$database = "antrian_prioritas";
	$namatable = "t_transaksional";
	$connect = mysql_connect($host,$user,$pass) or die("Koneksi gagal");
	$pilih_db = mysql_select_db($database) or die("Database tidak ada");
?>
<!DOCTYPE html>
<!--css ok--> 
<html>
	<head>
		
		<meta charset="UTF-8">
  		<title>Aplikasi Antrian</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<meta http-equiv="refresh" content="4">
	  <div class="container-fluid">
  		<nav id="title-bar" class="row navbar-fixed-top">
			<div id="judul_App">
				<p>Aplikasi Antrian Pasien</p>
				<div id="log_out">
					<a href="index.php" style="text-decoration:none"><button id="logout"> BACK  <i class="fa fa-arrow-circle-right" style="color: white"></i></button></a>
				</div>
			</div>
			<div id="waktu">
			<p id="date" class="tanggal"></p><p class="tanggal">|</p>
              <p id="time" class="jam"></p>
  		</div>
	</nav>
  	 </div>
	 <div id="gerombolan_nomor_antrian">
	   <div id="nomorantrian" class="penanda">
		 <h2>Loket Keuangan</h2>
		 <div id="nomor_selanjutnya">
			<p id="nomorsaatini">
			  <?php
				$select_antrian="SELECT nomor_antrian FROM t_transaksional WHERE prioritas='2' ORDER BY nomor_antrian ASC LIMIT 1";
				$result=mysql_query($select_antrian);
				$row = mysql_fetch_array($result);
				echo $row['nomor_antrian'];	
			  ?>
			</p>
			  <p>Antrian Selanjutnya</p>
		   <div id="list_antrian">
			  <div id="list_antian_satu">
		  		<?php
				  $select_antrian="SELECT nomor_antrian, no_rm FROM t_transaksional WHERE prioritas=2 ORDER BY nomor_antrian ASC  LIMIT 3";
				  $result=mysql_query($select_antrian);
				  while($rows=mysql_fetch_array($result, MYSQL_NUM)){
				 ?>
		   		  <p>_____________________</p>
				  <p>Nomor Antrian : <?php echo $rows[0]; ?></p>
				  <p>Nomor RM : <?php echo $rows[1]; ?></p>
				  <p>Loket Selanjutnya : Ruang Praktek Dokter</p>
				<?php
					}
				?>
		  	 </div>				  
		 </div> 
		 </div>
	   </div> 
	   <div id="nomorantrian" class="penanda">
		 <h2>Loket BPJS</h2>
		 <div id="nomor_selanjutnya">
		    <p id="nomorsaatini">
			   <?php
				 $select_antrian="SELECT nomor_antrian FROM t_transaksional WHERE prioritas='5' ORDER BY nomor_antrian ASC LIMIT 1";
				 $result=mysql_query($select_antrian);
				 $row = mysql_fetch_array($result);
				 echo $row['nomor_antrian'];
	     		?>
			 </p>
			  <p>Antrian Selanjutnya</p>
		   <div id="list_antrian">
			  <div id="list_antian_satu">
		  		<?php
				  $select_antrian="SELECT nomor_antrian, no_rm FROM t_transaksional WHERE prioritas=5 ORDER BY nomor_antrian ASC  LIMIT 3";
				  $result=mysql_query($select_antrian);
				  while($rows=mysql_fetch_array($result, MYSQL_NUM)){
				 ?>
		   		  <p>_____________________</p>
				  <p>Nomor Antrian : <?php echo $rows[0]; ?></p>
				  <p>Nomor RM : <?php echo $rows[1]; ?></p>
				  <p>Loket Selanjutnya : Ruang Praktek Dokter</p>
				<?php
					}
				?>
		  	 </div>				  
		 </div> 
		 </div>	  
	   </div> 
	   <div id="nomorantrian_lanjutan" class="penanda" >
		 <h2>Laboratorium</h2>
		 <div id="nomor_selanjutnya">
		    <p id="nomorsaatini">
			   <?php
				 $select_antrian="SELECT nomor_antrian FROM t_transaksional WHERE prioritas='3' ORDER BY nomor_antrian ASC LIMIT 1";
				 $result=mysql_query($select_antrian);
				 $row = mysql_fetch_array($result);
				 echo $row['nomor_antrian'];
				?>
			</p>
		   <p>Antrian Selanjutnya</p>
		   <div id="list_antrian">
			  <div id="list_antian_satu">
		  		<?php
				  $select_antrian="SELECT nomor_antrian, no_rm FROM t_transaksional WHERE prioritas=3 ORDER BY nomor_antrian ASC  LIMIT 3";
				  $result=mysql_query($select_antrian);
				  while($rows=mysql_fetch_array($result, MYSQL_NUM)){
				 ?>
		   		  <p>_____________________</p>
				  <p>Nomor Antrian : <?php echo $rows[0]; ?></p>
				  <p>Nomor RM : <?php echo $rows[1]; ?></p>
				  <p>Loket Selanjutnya : Ruang Praktek Dokter</p>
				<?php
					}
				?>
		  	 </div>				  
		 </div> 
	   </div> 
		 </div>
	   <div id="nomorantrian_dokter">
		  <h2>Poli dr.Fx.Suharnadi,Sp.PD</h2>
		 <div id="nomor_selanjutnya">
		    <p id="nomorsaatini">
			   <?php
				 $select_antrian="SELECT nomor_antrian FROM t_transaksional WHERE prioritas='1' ORDER BY nomor_antrian ASC LIMIT 1";
				 $result=mysql_query($select_antrian);
				 $row = mysql_fetch_array($result);
				 echo $row['nomor_antrian'];
				?>
			</p>
		   <p>Antrian Selanjutnya</p>
		   <div id="list_antrian_dokter">
			  <div id="list_antian_dua">
		  		<?php
				  $select_antrian="SELECT nomor_antrian, no_rm FROM t_transaksional WHERE prioritas=1 ORDER BY nomor_antrian ASC  LIMIT 3";
				  $result=mysql_query($select_antrian);
				  while($rows=mysql_fetch_array($result, MYSQL_NUM)){
				 ?>
		   		  <p>_____________________</p>
				  <p>Nomor Antrian : <?php echo $rows[0]; ?></p>
				  <p>Nomor RM : <?php echo $rows[1]; ?></p>
				  <p>Loket Selanjutnya : Loket Kassa</p>
				<?php
					}
				?>
		  	 </div>				  
		 </div> 
	   </div> 
	   </div>
	</div>
	<div id="coppyright_pasien">
		<h5>&copy; Christiana Wahyunita Arum Melati || 71130038 || Skripsi </h5>
	</div>
</body>
	<script src="js/date.js"></script>
</html>