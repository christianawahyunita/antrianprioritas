<?php
 
if(isset($_SESSION['login_dokter'])){
header("location: homedokter.php");
}
?>

<!DOCTYPE html>

<!--css ok-->
<html>
<head>
  <meta charset="UTF-8">
  <title>Aplikasi Antrian</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body style="margin-top:10%;">
	<div id="login">
		<a href="index.php" style="text-decoration:none"><button id="btn_close" type="button"><i class="fa fa-times" style="color: white"></i></button></a>
		
		<div class="judul"><h3>Login Dokter</h3></div>
		<div class="login-item">
			
		  <form action="" method="post" class="form form-login">
			  
			 <div class="form-field">
			    <label class="username" for="login-username">
					<span class="hidden">Username</span>
				</label>
				<input id="login-username" name="usernamedokter" type="text" class="form-input" placeholder="Username dokter" required autofocus>
			 </div>
			  
			  
			  
             <div class="form-field">
			   <label class="password" for="login-password">
				  <span class="hidden">Password</span>
			   </label>
			   <input id="login-password" name="passwordokter"  type="password" class="form-input" placeholder="Password" required>
			 </div>
			  
			 <div class="form-field">
			   <input type="submit" name="submit" value="Login" id="submit">
			 </div>

		  </form>
			
	<?php
		session_start(); // Memulai Session
		$error=''; // Variabel untuk menyimpan pesan error
		if (isset($_POST['submit'])) {
			if (empty($_POST['usernamedokter']) || empty($_POST['passwordokter'])) {
					$error = "Username or Password is invalid";
		     }
		    else
			 {
				$username=$_POST['usernamedokter'];
				$password=$_POST['passwordokter'];
				$connection = mysql_connect("localhost", "root", "");
				$username = stripslashes($username);
				$password = stripslashes($password);
				$username = mysql_real_escape_string($username);
				$password = mysql_real_escape_string($password);
				$db = mysql_select_db("antrian_prioritas", $connection);
				$query = mysql_query("select * from t_dokter where pass_dokter='$password' AND user_dokter='$username'", $connection);
				$rows = mysql_num_rows($query);
					if ($rows == 1) {
							$_SESSION['login_user']=$username;
							header("location: homedokter.php");
						} else {
							$error = "Username atau Password belum terdaftar";
						}
				mysql_close($connection);
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
