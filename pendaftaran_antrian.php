<?php
// Membangun Koneksi dengan Server dengan nama server, user_id dan password sebagai parameter
$connection = mysql_connect("localhost", "root", "");
// Seleksi Database
$db = mysql_select_db("antrian_prioritas", $connection);
session_start();// Memulai Session
// Menyimpan Session
$user_check=$_SESSION['login_pendaftaran'];
// Ambil nama karyawan berdasarkan username karyawan dengan mysql_fetch_assoc
$ses_sql=mysql_query("select nama_pendaftaran from t_pendaftaran where user_pendaftaran='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['nama_pendaftaran'];
if(!isset($login_session)){
	mysql_close($connection); // Menutup koneksi
	header('Location: login_pegawai_pendaftaran.php'); // Mengarahkan ke Home Page
}

?>

<!--Code untuk reset otomatis-->
<?php
mysql_connect("localhost", "root", "");
mysql_select_db("antrian_prioritas", $connection);
$lama = 1;
$query = "DELETE FROM t_transaksional WHERE DATEDIFF(CURDATE(), tanggal) > $lama";
$hasil = mysql_query($query);
?>

<!DOCTYPE html>

<!--css not ok-->

<html >
<head>
  <meta charset="UTF-8">
  <title>Aplikasi Antrian</title>
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
	  
   		<div class="info">
			  <h1>Pendaftaran Antrian Pasien</h1>
			<h2> 
			  Nama Pegawai :  <i><?php echo $login_session; ?></i>
			</h2>
	    </div>
	   <div class="wrapper">
        <div class="content">
            <h1 id="date" class="date"></h1>
            <h3 id="time" class="time"></h3>
        </div>
    </div>


  <form method="post">
	<div id="perintah">
		<h2>Lengkapi Data Diri Pasien : </h2> 
		<a href="reset.php" style="text-decoration:none"><button id="reset" type="button">RESET ANTRIAN  <i class="fa fa-trash-o" style="color: white"></i></button></a>
		
	</div>

    <div class="contentform">
    	<div class="leftcontact">
			
			    <div class="form-group">
				<p>Nomor Rekam Medis Pasien
					<span>*</span>  
				</p>
				<span class="icon-case"><i class="fa fa-newspaper-o"></i></span>
					<input type="text" name="no_rm" id="input_pendaftaran" autofocus/>
					<div class="validation"></div>
       		</div> 
			
			
			
			<div class="form-group">
			   <p>Nama Pasien
					<span>*</span>
			   </p>
			   <span class="icon-case"><i class="fa fa-male"></i></span>
			   <input type="text" name="nama_pasien" id="input_pendaftaran"  />
               <div class="validation"></div>
       	    </div> 
			
		

			<div class="form-group">
				<p>Nama Dokter 
					<span>*</span>
				</p>
				<span class="icon-case"><i class="fa fa-stethoscope"></i></span>					
				<select id="input_pendaftaran" name="nama_dokter"  tabindex="40" > 
					<option value="1">dr.Fx.Suharnadi, Sp.PD</option>
					<option value="2">dr.Yovita .Y.</option>
				</select>
                <div class="validation"></div>
			   </div>
			
			 
	    </div>

	    <div class="rightcontact">	
			
			<div class="form-group">
            	<p>Jenis Pembayaran 
					<span>*</span>
				</p>
            	<span class="icon-case"><i class="fa fa-credit-card"></i></span>
				<select id="input_pendaftaran" name="jenis_pembayaran" tabindex="40"> 
					<option value="4">Tanpa Asuransi</option>
					<option value="1">Asuransi BPJS</option>
					<option value="2">Asuransi lain</option>
    			</select>
                <div class="validation"></div>
			  </div>
			
			<div class="form-group">
				<p>Warga Negara</p>
					<span class="icon-case"> <i class="fa fa-globe"></i>
						</span>
				
					<select id="input_pendaftaran" name="warga_negara"  tabindex="40" > 
						<option value="Indonesia">Indonesia </option>
						<option value="Inggris">Inggris</option>
					</select>

                		<div class="validation"></div>
					</div>

					<div class="form-group">
						<p>Nomor HP </p>
						<span class="icon-case">
							<i class="fa fa-phone"></i>
						</span>
						<input type="text" name="nomor_hp" id="input_pendaftaran" />
                		<div class="validation"></div>
					</div>

		
	</div>
	</div>
	  <input type="submit" class="bouton-contact" name="register">

	
</form>	
	  <?php
        if ('POST' == $_SERVER['REQUEST_METHOD']) {
            $nama_pasien = $_POST['nama_pasien'];
            $no_rm = $_POST['no_rm'];
            $nama_dokter = $_POST['nama_dokter'];
            $jenis_pembayaran = $_POST['jenis_pembayaran'];
            $warga_negara = $_POST['warga_negara'];
            $nomor_hp = $_POST['nomor_hp'];
            $submit = $_POST['register'];
                   if (isset($_POST['register'])) {   
                         require_once "register.php";   
                   } 
		}
      ?>
<div id="coppyright">
		  	<h5>&copy; Christiana Wahyunita Arum Melati || 71130038 || Skripsi </h5>
		  </div>
	  <script src="js/index.js"></script>
	  <script src="js/date.js"></script>
</body>
    
</html>
