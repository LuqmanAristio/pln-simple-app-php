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
	<title>Data Pelanggan</title>
	<link rel="stylesheet" type="text/css" href="css/style-pelanggan.css">
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
		<div class="link1" style="background-color: #2f3542;">
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
		<form action="tambah-pelanggan.php" method="POST">
			<div class="form">
				<h2>Input Data Pelanggan</h2>
				<hr style="margin-bottom: 15px;">
				<p class="tampil"><a href="tampil-pelanggan.php">Tampilkan Data Pelanggan</a></p>
				<div class="left">
						<div class="form-1">
							<p>Nama Lengkap</p>
							<div class="ikon-f">
								<i class="fas fa-user-tag"></i>
							</div>
							<input type="text" name="NamaLengkap" placeholder="Nama Lengkap" required>
						</div>
						<div class="form-1">
							<p>Alamat</p>
							<div class="ikon-f">
								<i class="fas fa-map-marker-alt"></i>
							</div>
							<input type="text" name="Alamat" placeholder="Alamat Rumah" required>
						</div>
						<div class="form-1">
							<p>No Telp</p>
							<div class="ikon-f">
								<i class="fas fa-mobile"></i>
							</div>
							<input type="text" name="Telp" placeholder="No Telp" required>
						</div>
						<div class="form-1">
							<p>Email</p>
							<div class="ikon-f">
								<i class="fas fa-at"></i>
							</div>
							<input type="text" name="Email" placeholder="Alamat Email" required>
						</div>
						<div class="form-1">
							<p>Pilih Tarif</p>
							<div class="ikon-f">
								<i class="fas fa-bolt"></i>
							</div>
							<select name="KodeTarif">
				<?php
								include 'konek.php';
								
								$sql = mysqli_query($konek,"SELECT * FROM tbtarif ORDER BY Daya ASC");
								if(mysqli_num_rows($sql) != 0){
								while($row = mysqli_fetch_assoc($sql)){
									echo '<option>'.$row['Daya'].'</option>';
								}
									}
				
								?>
			</select>
						</div>
						<div class="submit">
							<input type="submit" value="TAMBAH">
							<input type="reset" value="BATAL">
						</div>
				</div>
				<div class="right">
					<div class="right">
					<img src="gambar/img-3.png">
				</div>
				</div>
			</div>
		</form>
	</div>
</div>
</body>	
</html>