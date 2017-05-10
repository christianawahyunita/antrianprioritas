<?php
if(isset($_SESSION['login_pendaftaran'])){
header("location: pendaftaran_antrian.php");
}
?>

<!DOCTYPE html>

<!--css oke-->
<html>
	
<head>
  <meta charset="UTF-8">
  <title>Aplikasi Antrian</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body style="margin-top:10%;">
	<div id="login">
		<a href="index.php" style="text-decoration:none"><button id="btn_close" type="button"><i class="fa fa-times" style="color: white"></i></button></a>
		
		<div class="judul"><h3>Login Pegawai Pendaftaran</h3></div>
		
		<div class="login-item">
			
		  <form action="" method="post" class="form form-login">
			  
			 <div class="form-field">
			    <label class="username" for="login-username">
					<span class="hidden">Username</span>
				</label>
				<input id="login-username" name="username" type="text" class="form-input" placeholder="Username" required autofocus>
			 </div>
			  
             <div class="form-field">
			   <label class="password" for="login-password">
				  <span class="hidden">Password</span>
			   </label>
			   <input id="login-password" name="password"  type="password" class="form-input" placeholder="Password" required>
			 </div>
			  
			 <div class="form-field">
			   <input type="submit" name="submit" value="Login" id="submit">
			 </div>

		  </form>
			
<?php
	session_start(); // Memulai Session
	$error=''; // Variabel untuk menyimpan pesan error
	if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {
				$error = "Username or Password is invalid";
		}
		else
		{
		// Variabel username dan password
		$username=$_POST['username'];
		$password=$_POST['password'];
		// Membangun koneksi ke database
		$connection = mysql_connect("localhost", "root", "");
		// Mencegah MySQL injection 
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		// Seleksi Database
		$db = mysql_select_db("antrian_prioritas", $connection);
		// SQL query untuk memeriksa apakah karyawan terdapat di database?
		$query = mysql_query("select * from t_pendaftaran where pass_pendaftaran='$password' AND user_pendaftaran='$username'", $connection);
		
		$rows = mysql_num_rows($query);
			if ($rows == 1) {
		    	$_SESSION['login_pendaftaran']=$username; // Membuat Sesi/session
				header("location: halaman_search_rm.php"); // Mengarahkan ke halaman profil
				} else {
				$error = "Username atau Password belum terdaftar";
				}
				mysql_close($connection); // Menutup koneksi
		}
	}
?>
			
		</div>
	</div>
	<div id="coppyright">
		  	<h5>&copy; Christiana Wahyunita Arum Melati || 71130038 || Skripsi </h5>
		  </div>
</body>
	
</html>