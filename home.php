<?php
include('session/sessionloket.php');
require_once("koneksi.php");
open_connection();
?>
<!DOCTYPE html>

<html>
<head>
  <meta charset="UTF-8">
  <title>Aplikasi Antrian</title>
      <link rel="stylesheet" href="css/style.css">
</head>

<body>
   <div class="container-fluid">
  	<nav id="title-bar" class="row navbar-fixed-top">
    	
			<div id="judul_App">
				<p>Aplikasi Antrian Pasien</p>
			<div id="log_out">
				<a href="logout.php" style="text-decoration:none"><button id="logout">LOG OUT <i class="fa fa-sign-out" style="color: white"></i></button></a>
			</div>
		</div>
			
  	</nav>
	  
	</div>
	  <div class="wrapper">
        <div class="content">
            <h1 id="date" class="date"></h1>
            <h3 id="time" class="time"></h3>
        </div>
    </div>
	  
	  <div id="tabelantrian">
		  <div id="tab">
		  <?php
		  	if($login_session=="Pegawai Asuransi BPJS"){
		 			?>
			  <h1 style="color: black">ANTRIAN LOKET BPJS</h1>
			  <div class="info"> 
			<h2> 
			  Nama Pegawai :  <i><?php echo $login_session; ?></i>
			</h2>
	    </div>
	
		 <div id="tomboltindakan">
			 <a href="tombol_loket_cancel.php" style="text-decoration:none"><button id="tindakan" type="button">CANCEL</button></a>
			 <a href="tombol_loket_next.php" style="text-decoration:none"><button id="tindakan" type="button">NEXT <i class="fa fa-angle-right" aria-hidden="true"  style="color: white"></i></button></a>
	  	   </div>
			  <?php
						$select_antrian="SELECT nomor_antrian, no_rm, nama_pasien FROM t_transaksional WHERE prioritas=5 ORDER BY  nomor_antrian ASC LIMIT 5";
						$result=mysql_query($select_antrian);
						?>
						<table border="1" cellspacing="6" cellpadding="38" id="t_nomor_antrian">
 						<a style="text-decoration:none" id="penanda"><i class="fa fa-hand-o-right" aria-hidden="true" style="color: brown"></i></a>
						<tr>
							<td id="header_table" style="font-size:30px;">Nomor Antrian</td>
							<td id="header_table" style="font-size:30px;">No RM</td>
							<td id="header_table" style="font-size:30px;" width="200px">Nama Pasien</td>
							<td id="header_table" style="font-size:30px;">Jenis Pembayaran</td>
						</tr>
						<?php
						// Start looping rows in mysql database.

						while($rows=mysql_fetch_array($result, MYSQL_NUM)){
							?>
						<tr>
						<td margin-left="5px"; style="font-size:25px;" ><?php echo $rows[0]; ?></td>
						<td style="font-size:25px;"><?php echo $rows[1]; ?></td>
						<td style="font-size:25px;"><?php echo $rows[2]; ?></td>
						<td style="font-size:25px;">Asuransi BPJS</td>
						</tr>
						<?php
						}
						?>
						</table>

					<?php
			}
		  
		   else if($login_session=="Pegawai Keuangan"){
?>
			  <h1 style="color: black">ANTRIAN LOKET KEUANGAN</h1>
			  <div class="info"> 
			<h2> 
			  Nama Pegawai :  <i><?php echo $login_session; ?></i>
			</h2>
	    </div>
	
		 <div id="tomboltindakan">
			 <a href="tombol_loket_cancel.php" style="text-decoration:none">	<button id="tindakan" type="button">CANCEL</button></a>
			 <a href="tombol_loket_next.php" style="text-decoration:none"><button id="tindakan" type="button">NEXT <i class="fa fa-angle-right" aria-hidden="true"  style="color: white"></i></button></a>
	  	   </div>
			  <?php
					$select_antrian="SELECT nomor_antrian, no_rm, nama_pasien FROM t_transaksional WHERE prioritas=2 ORDER BY nomor_antrian ASC LIMIT 5";
					$result=mysql_query($select_antrian);
					?>
					<table width="400" border="1" cellspacing="6" cellpadding="40" id="t_nomor_antrian">
 					<a style="text-decoration:none" id="penanda"><i class="fa fa-hand-o-right" aria-hidden="true" style="color: brown"></i></a>
					<tr>
						<td id="header_table" style="font-size:30px;">Nomor Antrian</td>
						<td id="header_table" style="font-size:30px;">No RM</td>
						<td id="header_table" style="font-size:30px;">Nama Pasien</td>
						<td id="header_table" style="font-size:30px;">Jenis Pembayaran</td>
					</tr>
					<?php
					// Start looping rows in mysql database.

					while($rows=mysql_fetch_array($result, MYSQL_NUM)){
						?>
					<tr>
					<td margin-left="5px"; style="font-size:25px;" ><?php echo $rows[0]; ?></td>
					<td style="font-size:25px;"><?php echo $rows[1]; ?></td>
						<td style="font-size:25px;"><?php echo $rows[2]; ?></td>
						<td style="font-size:25px;">Asuransi</td>
					</tr>
					<?php
					}
					?>
					</table>

				<?php
		   }
		  else{
			  ?>
			  <h1 style="color: black">ANTRIAN LOKET PEMERIKSAAN LANJUTAN</h1>
			  <div class="info"> 
			<h2> 
			  Nama Pegawai :  <i><?php echo $login_session; ?></i>
			</h2>
	    </div>
	
		 <div id="tomboltindakan">
			 <a href="tombol_loket_cancel.php" style="text-decoration:none">	<button id="tindakan" type="button">CANCEL</button></a>
			 <a href="tombol_loket_next.php" style="text-decoration:none"><button id="tindakan" type="button">NEXT <i class="fa fa-angle-right" aria-hidden="true"  style="color: white"></i></button></a>
	  	   </div>
			  <?php
				$select_antrian="SELECT nomor_antrian, no_rm, nama_pasien, id_pembayaran FROM t_transaksional WHERE prioritas=3 ORDER BY nomor_antrian ASC LIMIT 5";
				$result=mysql_query($select_antrian);
				?>
				<table width="400" border="1" cellspacing="6" cellpadding="40" id="t_nomor_antrian">
			 <a style="text-decoration:none" id="penanda"><i class="fa fa-hand-o-right" aria-hidden="true" style="color: brown"></i></a>
				<tr>
					<td id="header_table" style="font-size:30px;">Nomor Antrian</td>
					<td id="header_table" style="font-size:30px;">No RM</td>
					<td id="header_table" style="font-size:30px;">Nama Pasien</td>
					<td id="header_table" style="font-size:30px;">Nama Dokter</td>
				</tr>
		
				<?php
				// Start looping rows in mysql database.

				while($rows=mysql_fetch_array($result, MYSQL_NUM)){
					?>

				<tr>
				<td margin-left="20px"; margin-right="20px" style="font-size:25px;"><?php echo $rows[0]; ?></td>
			<td style="font-size:25px;"><?php echo $rows[1]; ?></td>
			<td  style="font-size:25px;"><?php echo $rows[2]; ?></td>
			<td style="font-size:25px;">Dokter Fx. Suharnadi, Sp.PD</td>
				</tr>
				<?php
				}
				?>
				</table>

			<?php
		 
		  }
		?>
		  </div>  
	 <div id="nomorantrian">
			  <h2>NOMOR :</h2>
				  <div id="nomor_selanjutnya">
				  	<h1 id="nomorsaatini">
						<?php
							if($login_session=="Pegawai Asuransi BPJS"){
							$select_antrian="SELECT nomor_antrian FROM t_transaksional WHERE prioritas='5' ORDER BY nomor_antrian ASC LIMIT 1";
							$result=mysql_query($select_antrian);
							$row = mysql_fetch_array($result);
							echo $row['nomor_antrian'];
						?>
						  	<div id="list_antrian">
			  				<div id="list_antian_satu">
		  						<?php
				  					$select_antrian="SELECT no_rm, nama_pasien FROM t_transaksional WHERE prioritas=5 ORDER BY nomor_antrian ASC LIMIT 1";
				  					$result=mysql_query($select_antrian);
									while($rows=mysql_fetch_array($result, MYSQL_NUM)){
				 				?>
		   		  				<p>_____________________</p>
				  				<p>Nomor Rekam Medis : </p><p style="color:#009ac9;"><?php echo $rows[0]; ?></p>
				  				<p>Nama Pasien : </p><p style="color:#009ac9;"><?php echo $rows[1]; ?></p>
			    				<?php
									}
								?>
							</div>				  
		 					</div> 
						<?php
							}
						    else if($login_session=="Pegawai Keuangan"){
							$select_antrian="SELECT nomor_antrian FROM t_transaksional WHERE prioritas='2' ORDER BY nomor_antrian ASC LIMIT 1";
							$result=mysql_query($select_antrian);
							$row = mysql_fetch_array($result);
							echo $row['nomor_antrian'];	
							?>
						  <div id="list_antrian">
			  			 <div id="list_antian_satu">
		  		<?php
				  $select_antrian="SELECT no_rm, nama_pasien FROM t_transaksional WHERE prioritas=2 ORDER BY nomor_antrian ASC LIMIT 1";
				  $result=mysql_query($select_antrian);
				  while($rows=mysql_fetch_array($result, MYSQL_NUM)){
				 ?>
		   		  <p>_____________________</p>
				  <p>Nomor Rekam Medis : </p><p style="color:#009ac9;"><?php echo $rows[0]; ?></p>
				  <p>Nama Pasien : </p><p style="color:#009ac9;"><?php echo $rows[1]; ?></p>
				<?php
					}
				?>
		  	 </div>				  
		 </div> 
						<?php
							}
							else{
							$select_antrian="SELECT nomor_antrian FROM t_transaksional WHERE prioritas='3' ORDER BY nomor_antrian ASC LIMIT 1";
							$result=mysql_query($select_antrian);
							$row = mysql_fetch_array($result);
							echo $row['nomor_antrian'];
							?>
						  <div id="list_antrian">
			  <div id="list_antian_satu">
		  		<?php
				  $select_antrian="SELECT no_rm, nama_pasien FROM t_transaksional WHERE prioritas=3 ORDER BY nomor_antrian ASC LIMIT 1";
				  $result=mysql_query($select_antrian);
				  while($rows=mysql_fetch_array($result, MYSQL_NUM)){
				 ?>
		   		  <p>_____________________</p>
				  <p>Nomor Rekam Medis : </p><p style="color:#009ac9;"><?php echo $rows[0]; ?></p>
				  <p>Nama Pasien : </p><p style="color:#009ac9;"><?php echo $rows[1]; ?></p>
				<?php
					}
				?>
		  	 </div>				  
		 </div> 
						<?php
							
							}
						?>
				  	</h1>
				  </div>
			  
	      </div>
	  </div>
	
  <div id="coppyright_loket">
		  	<h5>&copy; Christiana Wahyunita Arum Melati || 71130038 || Skripsi </h5>
		  </div>
</body>
	  <script src="js/date.js"></script>
</html>
