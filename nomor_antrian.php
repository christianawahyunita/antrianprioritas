<?php
include('session/sessionpendaftaran.php');
require_once("koneksi.php");
open_connection();
?>

<!DOCTYPE html>

<!--css ok-->

<html >
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
	  <div class="info">
			<h2> 
			  Nama Pegawai :  <i><?php echo $login_session; ?></i>
			</h2>
	    </div>
	  <div id="print_tambah">
	  <a href="halaman_search_rm.php"  style="text-decoration:none"><button id="menu" type="button"><i class="fa fa-plus-circle" style="color: white"></i> Add New </button></a>
	  	<a href="javascript:printDiv('area-1');" style="text-decoration:none"><button id="print"><i class="fa fa-print" style="color: white"></i>  Print</button></a>
	  </div>
	  	  
	  	<div id="pendaftaran_sukses"><h1>Pendaftaran Antrian Pasien A.n.<?php
				$antrian="SELECT nama_pasien FROM t_transaksional ORDER BY nomor_antrian DESC LIMIT 1";
				$res=mysql_query($antrian);
				$rows = mysql_fetch_array($res);
				echo $rows['nama_pasien'];	
			  ?>  Berhasil</h1></div>
	  
	  <div id="area-1">
	  <div class="contentform">
    	<div class="leftcontact">
			<p>Nomor Antrian Pasien:</p>
			<h1 id="nomorsaatini">
			  <?php
				$antrian="SELECT nomor_antrian FROM t_transaksional ORDER BY nomor_antrian DESC LIMIT 1";
				$res=mysql_query($antrian);
				$rows = mysql_fetch_array($res);
				echo $rows['nomor_antrian'];	
			  ?>
			<h1>
	  </div>
		  <div class="rightcontact">
		  <?php
	  		$select_antrian="SELECT no_rm, waktu_pendaftaran, loket_selanjutnya FROM t_transaksional ORDER BY nomor_antrian DESC LIMIT 1";
       		$result=mysql_query($select_antrian);
				  while($rows=mysql_fetch_array($result, MYSQL_NUM)){
       	  ?>
                  <p>---------------------------------------------</p>
			      <p>Pasien dr.Fx. Suharnadi, Sp.PD</p>
				  <p>Nomor Rekam Medis : <?php echo $rows[0]; ?></p>
			  <p>Waktu Pendaftaran : <?php echo $rows[1]; ?></p>
	              <p>Loket Pertama : <?php echo $rows[2]; ?></p>
			 	  
	   	<?php
		       }
         ?>
		  </div>
	  </div>
	  </div>
	   <div id="coppy">
		  	<p>&copy; Christiana Wahyunita Arum Melati || 71130038 || Skripsi </p>
		  </div>
</body>
		<script src="js/date.js"></script>
	
		<textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
		<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
		<script type="text/javascript">
			function printDiv(elementId) {
 			var a = document.getElementById('printing-css').value;
 			var b = document.getElementById(elementId).innerHTML;
 				window.frames["print_frame"].document.title = document.title;
 				window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
 				window.frames["print_frame"].window.focus();
 				window.frames["print_frame"].window.print();
				}
		</script>
    
</html>