<!DOCTYPE html>
	<!--css ok, tinggal tabel fungsi-->
<html>

	<head>
		<meta charset="UTF-8">
  		<title>Aplikasi Antrian</title>
		<link rel="stylesheet" href="css/style.css">
		<meta http-equiv="refresh" content="4">
	</head>
	<body>
		<div class="info">
			<h1>Aplikasi Antrian Pasien</h1>
		  	<a href="menu_pasien.php" style="text-decoration:none"><button id="back">BACK</button></a>
	    </div>
		<div id="loket_pasien">
			<h2>LOKET PEMERIKSAAN LANJUTAN</h2>
		</div>
		
	 <div id="tabelantrian">
		  <div id="tab">
		  <?php
			$host = "localhost";
			$user = "root";
			$pass = "";
			$database = "antrian_prioritas";
			$namatable = "pasien";
			$connect = mysql_connect($host,$user,$pass) or die("Koneksi gagal");
			$pilih_db = mysql_select_db($database) or die("Database tidak ada");
			  
			 $select_antrian="SELECT id_periksa, no_rm, nama_pasien, jenis_pembayaran , loket_selanjutnya FROM pasien WHERE prioritas=3 ORDER BY id_periksa ASC";
			  
			 $result=mysql_query($select_antrian);
		   ?>
	<table width="400" border="1" cellspacing="6" cellpadding="40" id="t_nomor_antrian">

	<tr>
		<td id="header_table">Nomor Antrian</td>
		<td id="header_table">No RM</td>
		<td id="header_table">Nama Pasien</td>
		<td id="header_table">Jenis Pembayaran</td>
		<td id="header_table">loket Selanjutnya</td>
	</tr>
			<?php
				while($rows=mysql_fetch_array($result, MYSQL_NUM)){
			?>

	<tr>
		<td margin-left="5px"; >
			<?php echo $rows[0]; ?></td>
		<td><?php echo $rows[1]; ?></td>
		<td><?php echo $rows[2]; ?></td>
		<td><?php echo $rows[3]; ?></td>
		<td>Ruang Praktek Dokter</td>
	</tr>
			<?php
				}
			?>
	</table>
		  </div>
		     <div id="nomorantrian">
			  <h2>NOMOR :</h2>
				  <div id="nomor_selanjutnya">
				  	<h1 id="nomorsaatini">
						<?php
							$select_antrian="SELECT id_periksa FROM pasien WHERE prioritas='3' ORDER BY id_periksa ASC LIMIT 1";
							$result=mysql_query($select_antrian);
							$row = mysql_fetch_array($result);
							echo $row['id_periksa'];
						?>
				  	</h1>
				  </div>
			  
	      </div>
	  </div>
		<div id="coppyright">
		  	<h5>&copy; Christiana Wahyunita Arum Melati || 71130038 || Skripsi </h5>
		  </div>	
	</body>
</html>