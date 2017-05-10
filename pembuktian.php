<?php
require_once("koneksi.php");
open_connection();
?>
<!DOCTYPE html>
<hmtl>
    <head>
      <title>Pembuktian antrian FIFO dan PS</title>
      <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
		<meta http-equiv="refresh" content="4">
		<div class="info">
		<h1>Pembuktian antrian FIFO dan PS</h1>
		</div>
		<hr><br/>
		<div id="posisi">
			<a href="index.php" style="text-decoration:none"><button id="tomb"> BACK  <i class="fa fa-arrow-circle-right" style="color: white"></i></button></a>
		</div>
	<div id="c">
		<h1>Pembuktian Algoritma Antrian Berperioritas (PS)</h1>
			<h2>Loket Pendaftaran</h2>
		</div>
			 <?php
	  		$select_antrian="SELECT nomor_antrian FROM t_transaksional ORDER BY nomor_antrian ASC LIMIT 20";
			  
			 $result=mysql_query($select_antrian);
		   ?>
	<table width="100px" border="1" cellspacing="2" cellpadding="20" id="t_pembuktian">

		<tr>
		<td id="header_table">Nomor Antrian</td>
			<?php
				while($rows=mysql_fetch_array($result, MYSQL_NUM)){
			?>
		<td margin-left="2px"; style="font-size:40px;"><?php echo $rows[0]; ?></td>
			<?php
				}
			?>
		</tr>
			
	</table>
	
		<div id="c">

			<h2>Poli Dokter Fx. Suharnadi, Sp.PD</h2>
		</div>
			 <?php
		
	  		$select_antrian="SELECT nomor_antrian, prioritas FROM t_transaksional WHERE prioritas=1 OR prioritas=6 ORDER BY prioritas , nomor_antrian ASC";
			  
			 $result=mysql_query($select_antrian);
		   ?>
	<table width="100px" border="1" cellspacing="2" cellpadding="20" id="t_pembuktian">

		<tr>
		<td id="header_table">Nomor Antrian</td>
			<?php
				while($rows=mysql_fetch_array($result, MYSQL_NUM)){
			?>
		<td margin-left="2px"; style="font-size:40px;"><?php echo $rows[0]; ?></td>
			<?php
				}
			?>
		</tr>
			
	</table>
	
			<div id="c">
			<h2>Loket BPJS</h2>
		</div>
			 <?php
	  		$select_antrian="SELECT nomor_antrian FROM t_transaksional WHERE prioritas=5 ORDER BY nomor_antrian ASC LIMIT 20";
			  
			 $result=mysql_query($select_antrian);
		   ?>
	<table width="100px" border="1" cellspacing="2" cellpadding="20" id="t_pembuktian" >

		<tr>
		<td id="header_table">Nomor Antrian</td>
			<?php
				while($rows=mysql_fetch_array($result, MYSQL_NUM)){
			?>
		<td margin-left="2px"; style="font-size:40px;"><?php echo $rows[0]; ?></td>
			<?php
				}
			?>
		</tr>
			
	</table>
		
			<div id="c">
			<h2>Loket Keuangan</h2>
		</div>
			 <?php
	  		$select_antrian="SELECT nomor_antrian FROM t_transaksional WHERE prioritas=2 ORDER BY nomor_antrian ASC LIMIT 20";
			  
			 $result=mysql_query($select_antrian);
		   ?>
	<table width="100px" border="1" cellspacing="2" cellpadding="20" id="t_pembuktian">

		<tr>
		<td id="header_table">Nomor Antrian</td>
			<?php
				while($rows=mysql_fetch_array($result, MYSQL_NUM)){
			?>
		<td margin-left="2px"; style="font-size:40px;"><?php echo $rows[0]; ?></td>
			<?php
				}
			?>
		</tr>
			
	</table>
	
			<div id="c">
			<h2>Loket Laboratorium</h2>
		</div>
			 <?php
	  		$select_antrian="SELECT nomor_antrian FROM t_transaksional WHERE prioritas=3 ORDER BY nomor_antrian ASC LIMIT 20";
			  
			 $result=mysql_query($select_antrian);
		   ?>
	<table width="100px" border="1" cellspacing="2" cellpadding="20" id="t_pembuktian">

		<tr>
		<td id="header_table">Nomor Antrian</td>
			<?php
				while($rows=mysql_fetch_array($result, MYSQL_NUM)){
			?>
		<td margin-left="2px"; style="font-size:40px;"><?php echo $rows[0]; ?></td>
			<?php
				}
			?>
		</tr>
			
	</table>
	<div id="notif">
			<div id="c">
			<h1 style="color:black;">Last Update : </h1>
			<h4 style="color:#3A3F44;"><?php
				$antrian="SELECT tanggal FROM t_notif ORDER BY id_notif DESC LIMIT 1";
				$res=mysql_query($antrian);
				$rows = mysql_fetch_array($res);
				echo $rows['tanggal'];	
			  ?></h4>
			<h3> <?php
				$antrian="SELECT isi_notif FROM t_notif ORDER BY id_notif DESC LIMIT 1";
				$res=mysql_query($antrian);
				$rows = mysql_fetch_array($res);
				echo $rows['isi_notif'];	
			  ?>
		   </h3>
		</div> 
	</div>
	<div id="d">
		<h1>Kondisi saat ini First in First Out(FIFO)</h1>
			<h2>Loket Pendaftaran</h2>
		</div>
			 <?php
	  		$select_antrian="SELECT nomor_antrian FROM t_transaksional ORDER BY nomor_antrian ASC LIMIT 20";
			  
			 $result=mysql_query($select_antrian);
		   ?>
	<table width="100px" border="1" cellspacing="2" cellpadding="20" id="t_pembuktian">

		<tr>
		<td id="header_table">Nomor Antrian</td>
			<?php
				while($rows=mysql_fetch_array($result, MYSQL_NUM)){
			?>
		<td margin-left="2px"; style="font-size:40px;"><?php echo $rows[0]; ?></td>
			<?php
				}
			?>
		</tr>
			
	</table>
	<div id="d">

			<h2>Poli Dokter Fx. Suharnadi, Sp.PD</h2>
		</div>
			 <?php
	$select_antrian="SELECT nomor_antrian FROM t_transaksional ORDER BY nomor_antrian ASC LIMIT 1";
	$result=mysql_query($select_antrian);
	$row = mysql_fetch_array($result);
    $id=$row['nomor_antrian'];
	$start=$id-1;
		
	$select_antrian="SELECT nomor_antrian FROM t_transaksional ORDER BY nomor_antrian ASC LIMIT $start,20";
			  
			 $result=mysql_query($select_antrian);
		   ?>
	<table width="100px" border="1" cellspacing="2" cellpadding="20" id="t_pembuktian">

		<tr>
		<td id="header_table">Nomor Antrian</td>
			<?php
				while($rows=mysql_fetch_array($result, MYSQL_NUM)){
			?>
		<td margin-left="2px"; style="font-size:40px;"><?php echo $rows[0]; ?></td>
			<?php
				}
			?>
		</tr>
			
	</table>
	
	<div id="coppyright_loket">
		  	<h5>&copy; Christiana Wahyunita Arum Melati || 71130038 || Skripsi </h5>
		  </div>
	</body>

</hmtl>