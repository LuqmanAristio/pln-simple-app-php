<?php  
session_start();
if (empty($_SESSION['Username'])) {
	echo "<script>alert('Silahkan Login Dulu');
	location.href='index.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data  Tarif</title>
	<link rel="stylesheet" type="text/css" href="css/style-tarif-input.css">
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
		<div class="link2" style="background-color: #2f3542;">
			<div class="ikon2">
				<i class="fa fa-address-book"></i>
			</div>
			<p><a href="input-data-tarif.php">Data Tarif</a></p>
		</div>
		<div class="link2">
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
		<form action="tambah-tarif.php" method="POST">
			<div class="form">
				<h2>Input Data Tarif</h2>
				<hr style="margin-bottom: 10px;">
				<div class="left">
					<p class="tampil"><a href="tampil-tarif.php">Tampilkan Data Tarif</a></p>
					<div class="form-1">
						<p>Daya</p>
						<div class="ikon-f">
							<i class="fas fa-bolt"></i>
						</div>
						<input type="text" name="Daya" placeholder="Daya">
					</div>
					<div class="form-1">
						<p>Tarif Per KWH</p>
						<div class="ikon-f">
							<i class="fas fa-dollar-sign"></i>
						</div>
						<input type="text" name="TarifPerKWH" placeholder="TarifPerKWH">
					</div>
					<div class="form-1">
						<p>Beban</p>
						<div class="ikon-f">
							<i class="fas fa-wrench"></i>
						</div>
						<input type="text" name="Beban" placeholder="Beban">
					</div>
					<div class="submit">
						<input type="submit" value="TAMBAH">
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