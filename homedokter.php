<?php
$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("antrian_prioritas", $connection);
session_start();
$user_check=$_SESSION['login_user'];
$ses_sql=mysql_query("select nama_dokter from t_dokter where user_dokter='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['nama_dokter'];
	if(!isset($login_session)){
		mysql_close($connection); 
		header('Location: login_dokter.php'); 
	 }
?>

<!DOCTYPE html>

<!--css ok, kurang tabel-->

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
		   <h1 style="color: black">ANTRIAN RUANG PRAKTEK DOKTER</h1>
			<h2 style="color: black"> 
			  Nama Dokter :  <i><?php echo $login_session; ?></i>
			</h2>
			  <h2 style="color: black"> 
			 Keterangan Dokter : Umum
			  </h2>
			  <div id="tomboltindakan">
			 <a href="tombol_dokter_cancel.php" style="text-decoration:none" ><button id="tindakan" type="button">CANCEL</button></a>
			<a href="tombol_dokter_terlambat.php" style="text-decoration:none" ><button id="tindakan" type="button">TERLAMBAT</button></a>
			  <a href="tombol_dokter_lanjutan.php" style="text-decoration:none"><button id="tindakan">LABORATORIUM</button></a>
			 <a href="tombol_dokter_next.php" style="text-decoration:none" ><button id="tindakan" type="button">NEXT <i class="fa fa-angle-right" aria-hidden="true"  style="color: white"></i> </button></a>
			 
			 
	  	   </div>
			 <?php
			  if($login_session=="dr.Fx.Suharnadi, Sp.PD"){
		 
						$select_antrian="SELECT nomor_antrian, no_rm, nama_pasien FROM t_transaksional WHERE prioritas='1' ORDER BY  nomor_antrian ASC LIMIT 5";
						$result=mysql_query($select_antrian);
				?>
						<table width="400" border="1" cellspacing="6" cellpadding="40" id="t_nomor_antrian">
						<a style="text-decoration:none" id="penanda_dok"><i class="fa fa-hand-o-right" aria-hidden="true" style="color: brown"></i></a>
						<tr>
							<td id="header_table" style="font-size:30px;">Nomor Antrian</td>
							<td id="header_table" style="font-size:30px;">No RM</td>
							<td id="header_table" style="font-size:30px;">Nama Pasien</td>
						</tr>
				<?php
						// Start looping rows in mysql database.

						while($rows=mysql_fetch_array($result, MYSQL_NUM)){
				?>
						<tr>
						<td margin-left="5px"; style="font-size:25px;" ><?php echo $rows[0]; ?></td>
						<td style="font-size:25px;"><?php echo $rows[1]; ?></td>
							<td style="font-size:25px;"><?php echo $rows[2]; ?></td>
						</tr>
				<?php
						}
				?>
						</table>

				<h2 style="color: black"> 
			Daftar Pasien yang terlambat datang :
			  </h2>
			  <a href="tombol_dokter_cancel_terlambat.php" style="text-decoration:none" ><button id="tindakan" type="button">CANCEL</button></a>
			  <a href="tombol_dokter_call_back.php" style="text-decoration:none" ><button id="tindakan" type="button">CALL BACK</button></a>
			  <?php
			  		$select_an="SELECT nomor_antrian, no_rm, nama_pasien FROM t_transaksional WHERE prioritas='6' ORDER BY  nomor_antrian ASC LIMIT 5";
						$result=mysql_query($select_an);
				?>
						<table width="400" border="1" cellspacing="6" cellpadding="40" id="t_nomor_antrian">
						
						<tr>
							<td id="header_table" style="font-size:30px;">Nomor Antrian</td>
							<td id="header_table" style="font-size:30px;">No RM</td>
							<td id="header_table" style="font-size:30px;">Nama Pasien</td>
						</tr>
				<?php
						// Start looping rows in mysql database.

						while($rows=mysql_fetch_array($result, MYSQL_NUM)){
				?>
						<tr>
						<td margin-left="5px"; style="font-size:25px;" ><?php echo $rows[0]; ?></td>
						<td style="font-size:25px;"><?php echo $rows[1]; ?></td>
							<td style="font-size:25px;"><?php echo $rows[2]; ?></td>
						</tr>
				<?php
						}
				?>
						</table>
<!--hapus aja atas ini-->
				<?php 
				  
			        }
			    ?>
			  
		  </div>
		  <div id="nomorantrian">
			  <h2>NOMOR :</h2>
				  <div id="nomor_selanjutnya">
					<h1 id="nomorsaatini">
					<?php
						if($login_session=="dr.Fx.Suharnadi, Sp.PD"){
						$select_antrian="SELECT nomor_antrian FROM t_transaksional WHERE prioritas='1' ORDER BY nomor_antrian ASC LIMIT 1";
						$result=mysql_query($select_antrian);
						$row = mysql_fetch_array($result);
						$id=$row['nomor_antrian'];
							echo $id;
							
						?>
						
						  <div id="list_antrian">
			  <div id="list_antian_satu">
		  		<?php
				  $select_antrian="SELECT no_rm, nama_pasien FROM t_transaksional WHERE prioritas=1 ORDER BY nomor_antrian ASC LIMIT 1";
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
