<?php 
//1
    @$c = $_GET['ratakedatangan'];
    @$s = $_GET['ratapelayanan'];
    @$n = $_GET['jumlahloket'];

 	@$r = $_GET['ratakedatanganreal'];
    @$e = $_GET['ratapelayananreal'];
    @$l = $_GET['jumlahloketreal'];
	@$md=1800;
	
//2
    @$dua = $md/$c; 
	@$lamda = number_format($dua,0);

	@$duasatu = $md/$r; 
	@$lamdareal = number_format($duasatu,0);

//3
    @$tiga = $md/$s;
	@$myu  = number_format($tiga,4);

   	@$duadua = $md/$e;
	@$myureal  = number_format($duadua,4);

//4
	@$empat=$n*$myu;
	@$nu = number_format($empat,4);

	@$duatiga=$l*$myureal;
	@$nureal = number_format($duatiga,4);

//5
	@$lima=$lamda/$nu;
	@$phi = number_format($lima,4);

	@$duaempat=$lamdareal/$nureal;
	@$phireal = number_format($duaempat,4);

//6
	@$angka=$n;
	@$angkareal=$l;

       function faktorial($angka){
       if($angka<=1){
          $hasil=1;
          return $hasil;}
	   elseif($angka>1){
          for($i=1; $i<=$angka; $i++){
             $hasil=$angka * faktorial($angka-1);
                }
                return $hasil;}
			}

	   function faktor($angkareal){
       if($angkareal<=1){
          $hasilreal=1;
          return $hasilreal;}
	   elseif($angkareal>1){
          for($i=1; $i<=$angkareal; $i++){
             $hasilreal=$angkareal * faktor($angkareal-1);
                }
                return $hasilreal;}
			}

//7
    @$tujuh=1-$phi;
	@$po = number_format($tujuh,4);
   
	@$dualima=1-$phireal;
	@$poreal = number_format($dualima,4);

//8
	@$delapan =$lamda/$myu;
	@$lm = number_format($delapan,4);	

	@$duaenam =$lamdareal/$myureal;
	@$lmreal = number_format($duaenam,4);	

//9
	@$sembilan=pow($lm,$n);
	@$lmn = number_format($sembilan,4);

	@$duatujuh=pow($lmreal,$l);
	@$lmnreal = number_format($duatujuh,4);

//10
	@$sepuluh=$lamda/$nu;
	@$lmnu = number_format($sepuluh,4);

	@$duadelapan=$lamdareal/$nureal;
	@$lmnureal = number_format($duadelapan,4);

//11
	@$sebelas=1-$lmnu;
	@$dlmnu = number_format($sebelas,4);

	@$duasembilan=1-$lmnureal;
	@$dlmnureal = number_format($duasembilan,4);

//12
	@$duabelas=pow($dlmnu,2);
	@$sn = number_format($duabelas,4);

	@$tigapuluh=pow($dlmnureal,2);
	@$snreal = number_format($tigapuluh,4);

//13
	@$tigabelas=$lmn*$lmnu;
	@$ksatu = number_format($tigabelas,4);

	@$tigasatu=$lmnreal*$lmnureal;
	@$ksatureal = number_format($tigasatu,4);

//14
	@$empatbelas=faktorial($n)*$sn;
	@$kdua = number_format($empatbelas,4);

	@$tigadua=faktor($l)*$snreal;
	@$kduareal = number_format($tigadua,4);

//15
	@$limabelas=$ksatu/$kdua;
	@$lq = number_format($limabelas,4);

	@$tigatiga=$ksatureal/$kduareal;
	@$lqreal = number_format($tigatiga,4);

//16
	@$enambelas=$lamda/$myu;
	@$lampermy = number_format($enambelas,4);

	@$tigaempat=$lamdareal/$myureal;
	@$lampermyreal = number_format($tigaempat,4);

//17
	@$tujuhbelas=$lq+$lampermy;
	@$ls = number_format($tujuhbelas,4);

	@$tigalima=$lqreal+$lampermyreal;
	@$lsreal = number_format($tigalima,4);

//18
	@$delapanbelas=$lq/$lamda;
	@$wq = number_format($delapanbelas,4);

	@$tigaenam=$lqreal/$lamdareal;
	@$wqreal = number_format($tigaenam,4);

//19
	@$sembilanbelas=1/$myu;
	@$satupermyu = number_format($sembilanbelas,4);

	@$tigatujuh=1/$myureal;
	@$satupermyureal = number_format($tigatujuh,4);

//20
	@$duapuluh=$wq+$satupermyu;
	@$ws = number_format($duapuluh,4);

	@$tigadelapan=$wqreal+$satupermyureal;
	@$wsreal = number_format($tigadelapan,4);
?>

<!DOCTYPE html>
<hmtl>
    <head>
      <title>Perhitungan Antrian Priority Multi Channel Preemptive</title>
      <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
		<div class="info">
		<h1>Perhitungan Antrian Priority Multi Channel Preemptive</h1>
		</div>
		<hr></hr><br/>
	<div id="posisi">
					<a href="index.php" style="text-decoration:none"><button id="tomb"> BACK  <i class="fa fa-arrow-circle-right" style="color: white"></i></button></a>
				</div>
	<div class="contentform">
		
    	<div class="leftcontact">
        <form method="GET">
			
			    <div class="form-group">
				<p>Rata-Rata Waktu Kedatangan :</p>
					<input type="text" name="ratakedatangan" id="input_pendaftaran" value="<?php echo $c; ?>" autofocus/>
				<p>detik/pasien</p>
       		</div> 
			 <div class="form-group">
				<p>Rata-Rata Waktu Pelayanan :</p>
					<input type="text" name="ratapelayanan" id="input_pendaftaran" value="<?php echo $s; ?>" autofocus/>
				<p>detik/pasien</p>
       		</div> 
			 <div class="form-group">
				<p>Jumlah Loket Pelayanan :</p>
					<input type="text" name="jumlahloket" id="input_pendaftaran" value="<?php echo $n; ?>" autofocus/>
				<p>buah</p>
       		</div> 
			</div>
			
			<div class="rightcontact">
				 <!--<form method="GET">-->

					<div class="form-group">
					<p>Rata-Rata Waktu Kedatangan :</p>
						<input type="text" name="ratakedatanganreal" id="input_pendaftaran" value="<?php echo $r; ?>"/>
					<p>detik/pasien</p>
				</div> 
				 <div class="form-group">
					<p>Rata-Rata Waktu Pelayanan :</p>
						<input type="text" name="ratapelayananreal" id="input_pendaftaran" value="<?php echo $e; ?>"/>
					<p>detik/pasien</p>
				</div> 
				 <div class="form-group">
					<p>Jumlah Loket Pelayanan :</p>
						<input type="text" name="jumlahloketreal" id="input_pendaftaran" value="<?php echo $l; ?>"/>
					<p>buah</p>
				</div> 
			</div>
		</div>
			<input type="submit" name="submit" class="bouton-contact" value="SUBMIT"/><br/><br/>
			<table border="1" cellspacing="4" cellpadding="35">
                <tr>
                    <td><h1>n</h1></td>
                    <td><h1>Lamda</h1></td>
				    <td><h1>u</h1></td>
                    <td><h1>p</h1></td>
					<td><h1>Ls</h1></td>
                    <td><h1>Lq</h1></td>
					<td><h1>Ws</h1></td>
                    <td><h1>Wq</h1></td>
                    <td><h1>Po</h1></td>
                </tr> 
				 <tr>
                    <td><?php echo "<h2>".$n."      Buah</h2>"; ?></td>
                    <td><?php echo "<h2>".$lamda."       Pasien / 30 menit</h2>"; ?></td>
					<td><?php echo "<h2>".$myu."          Pasien / 30 menit</h2>"; ?></td>
                    <td><?php echo "<h2>".$phi."  </h2>"; ?></td>
					<td><?php echo "<h2>".$lq."      Pasien / 30 menit</h2>"; ?></td>
                    <td><?php echo "<h2>".$ls."     Pasien / 30 menit</h2>"; ?></td>
					<td><?php echo "<h2>".$ws."     Menit</h2>"; ?></td>
                    <td><?php echo "<h2>".$wq."     Menit</h2>"; ?></td>
					<td><?php echo "<h2>".$po."  </h2>"; ?></td>
                </tr> 
            </table>
	<br/>
		<table border="1" cellspacing="4" cellpadding="35">
                <tr>
                    <td><h1>n</h1></td>
                    <td><h1>Lamda</h1></td>
				    <td><h1>u</h1></td>
                    <td><h1>p</h1></td>
					<td><h1>Ls</h1></td>
                    <td><h1>Lq</h1></td>
					<td><h1>Ws</h1></td>
                    <td><h1>Wq</h1></td>
                    <td><h1>Po</h1></td>
                </tr> 
				 <tr>
                    <td><?php echo "<h2>".$l."      Buah</h2>"; ?></td>
                    <td><?php echo "<h2>".$lamdareal."       Pasien / 30 menit</h2>"; ?></td>
					<td><?php echo "<h2>".$myureal."          Pasien / 30 menit</h2>"; ?></td>
                    <td><?php echo "<h2>".$phireal."  </h2>"; ?></td>
					<td><?php echo "<h2>".$lqreal."      Pasien / 30 menit</h2>"; ?></td>
                    <td><?php echo "<h2>".$lsreal."     Pasien / 30 menit</h2>"; ?></td>
					<td><?php echo "<h2>".$wsreal."     Menit</h2>"; ?></td>
                    <td><?php echo "<h2>".$wqreal."     Menit</h2>"; ?></td>
					<td><?php echo "<h2>".$poreal."  </h2>"; ?></td>
                </tr> 
            </table>
        </form>
	<div id="coppyright_loket">
		  	<h5>&copy; Christiana Wahyunita Arum Melati || 71130038 || Skripsi </h5>
		  </div>
    </body>
</hmtl>