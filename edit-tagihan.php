<?php  
session_start();
if (empty($_SESSION['Username'])) {
	echo "<script>alert('Silahkan Login Dulu');
	location.href='index.php';</script>";
}
?>
<?php
include 'konek.php';

$KodeTagihan=$_GET["KodeTagihan"];

$baca=mysqli_query($konek,"select*from tbtagihan inner join tbuser on tbuser.KodeUser=tbtagihan.KodeUser where KodeTagihan='$KodeTagihan'");
$baca1=mysqli_fetch_array($baca);

$Nama=$baca1[13];
$KodeUser=$baca1[2];
$BulanTagih=$baca1[4];
$TahunTagih=$baca1[5];
$Pemakaian=$baca1[6];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Tagihan</title>
	<link rel="stylesheet" type="text/css" href="css/style-inp-tagihan.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
</head>
<body>
<div class="container">
	<div class="left-bar">
		<div class="profil-img">
			<img src="gambar/profil-img.png">
			<p>ADMIN</p>
		</div>
		<p class="dash"><a href="dashboard.php">Dashboard</a></p>	
		<div class="link1">
			<div class="ikon">
				<i class="fa fa-address-book"></i>
			</div>
			<p><a href="input-data-pelanggan.php">Data Pelanggan</a></p>
		</div>
		<div class="link2">
			<div class="ikon2">
				<i class="fa fa-address-book"></i>
			</div>
			<p><a href="input-data-tarif.php">Data Tarif</a></p>
		</div>
		<div class="link2"  style="background-color: #2f3542;">
			<div class="ikon2">
				<i class="fas fa-bell"></i>
			</div>
			<p><a href="input-data-tagihan.php">Tagihan</a></p>
		</div>
		<div class="link2">
			<div class="ikon2">
				<i class="fa fa-address-book"></i>
			</div>
			<p><a href="verifikasi.php">Verifikasi Pembayaran</a></p>
		</div>
		<!-- <div class="link3">
			<div class="ikon3">
				<i class="fas fa-file-invoice-dollar" style="margin-right: 18px;"></i>	
			</div>
			<p><a href="input-data-pembayaran.php">Pembayaran</a></p>
		</div> -->
		<!-- <div class="link2">
			<div class="ikon2">
				<i class="fas fa-chart-bar"></i>
			</div>
			<p><a href="laporan.php">Laporan</a></p>
		</div> -->
		<div class="link3">
			<div class="ikon3">
				<i class="fa fa-sign-out-alt"></i>
			</div>
			<p><a href="logout.php">Keluar</a></p>
		</div>
	</div>
	<div class="right-bar">
		<form action="edit-proses-tagihan.php" method="POST">
			<div class="form">
				<h2 style="margin-top: 35px;">Input Data Tagihan</h2>
				<hr style="margin-bottom: 15px;">
				<p class="tampil"><a href="tampil-tagihan.php">Tampilkan Data Tagihan</a></p>
				<div class="left">
					<div class="form-1">
						<p>Nama Lengkap (Kode User)</p>
						<div class="ikon-f">
							<i class="far fa-user"></i>
						</div>
						<input type="text" name="KodeUser" value="<?php echo $Nama; ?> (<?php echo $KodeUser; ?>)" readonly>
					</div>
					<div class="form-1">
						<p>Kode Tagihan</p>
						<div class="ikon-f">
							<i class="far fa-user"></i>
						</div>
						<input type="text" name="KodeTagihan" value="<?php echo $KodeTagihan; ?>" readonly>
					</div>
					<div class="form-1">
						<p>Bulan</p>
						<div class="ikon-f">
							<i class="fas fa-moon"></i>
						</div>
						<select name="BulanTagih">
							<option value="<?php echo $BulanTagih; ?>"><?php echo"$BulanTagih";?></option>
							<option value="Januari">Januari</option>
							<option value="Februari">Februari</option>
							<option value="Maret">Maret</option>
							<option value="April">April</option>
							<option value="Mei">Mei</option>
							<option value="Juni">Juni</option>
							<option value="Juli">Juli</option>
							<option value="Agustus">Agustus</option>
							<option value="September">September</option>
							<option value="Oktober">Oktober</option>
							<option value="November">November</option>
							<option value="Desember">Desember</option>
						</select>
					</div>
					<div class="form-1">
						<p>Tahun</p>
						<div class="ikon-f">
							<i class="fas fa-calendar-alt"></i>
						</div>
						<select name="TahunTagih">
							<option value="<?php echo $TahunTagih; ?>"><?php echo"$TahunTagih";?></option>
							<option value="2019">2019</option>
							<option value="2018">2018</option>
							<option value="2017">2017</option>
							<option value="2016">2016</option>
							<option value="2015">2015</option>
							<option value="2014">2014</option>
							<option value="2013">2013</option>
							<option value="2012">2012</option>
							<option value="2011">2011</option>
							<option value="2010">2010</option>
							<option value="2009">2009</option>
							<option value="2008">2008</option>
						</select>
					</div>
					<div class="form-1">
						<p>Pemakaian (KWh)</p>
						<div class="ikon-f">
							<i class="fas fa-bolt"></i>
						</div>
						<input type="number" name="Pemakaian" value="<?php echo "$Pemakaian";?>" required>
					</div>
					<div class="submit">
						<input type="submit" value="UBAH" onclick="return confirm('Yakin?')">
						<input type="reset" value="BATAL">
					</div>
				</div>
				<div class="right">
					<img src="gambar/img-2.png">
				</div>
			<!-- 	<div class="center">
					<select name="Tarif">
						
					</select>
				</div> -->
			</div>
		</form>
	</div>
</div>
</body>	
</html>