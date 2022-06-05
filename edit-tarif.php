<?php  
session_start();
if (empty($_SESSION['Username'])) {
	echo "<script>alert('Silahkan Login Dulu');
	location.href='index.php';</script>";
}
?>
<?php
include 'konek.php';

$KodeTarif=$_GET['KodeTarif'];

$cek=mysqli_query($konek,"select*from tbtarif where KodeTarif='$KodeTarif'");
$baca=mysqli_fetch_array($cek);

$Daya=$baca[1];
$TarifPerKWH=$baca[2];
$Beban=$baca[3];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
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
		<div class="link3">
			<div class="ikon3">
				<i class="fa fa-sign-out-alt"></i>
			</div>
			<p><a href="logout.php">Keluar</a></p>
		</div>
	</div>
	<div class="right-bar">
		<form action="edit-proses-tarif.php" method="POST">
			<div class="form">
				<h2>Edit Data Tarif</h2>
				<hr style="margin-bottom: 10px;">
				<div class="left">
					<p class="tampil"><a href="tampil-tarif.php">Tampilkan Data Tarif</a></p>
					<div class="form-1">
						<p>Kode Tarif</p>
						<div class="ikon-f">
							<i class="fas fa-file-alt"></i>
						</div>
						<input type="text" name="KodeTarif" value="<?php echo $KodeTarif; ?>" readonly>
					</div>
					<div class="form-1">
						<p>Daya</p>
						<div class="ikon-f">
							<i class="fas fa-bolt"></i>
						</div>
						<input type="text" name="Daya" value="<?php echo $Daya; ?>">
					</div>
					<div class="form-1">
						<p>Tarif Per KWH</p>
						<div class="ikon-f">
							<i class="fas fa-dollar-sign"></i>
						</div>
						<input type="text" name="TarifPerKWH" value="<?php echo $TarifPerKWH; ?>">
					</div>
					<div class="form-1">
						<p>Beban</p>
						<div class="ikon-f">
							<i class="fas fa-wrench"></i>
						</div>
						<input type="text" name="Beban" value="<?php echo $Beban; ?>">
					</div>
					<div class="submit">
						<input type="submit" value="UBAH" onclick="return confirm('Yakin?')">
						<input type="reset" value="BATAL">
					</div>
				</div>
				<div class="right">
					<img src="gambar/img-2.png">
				</div>
			</div>
		</form>
	</div>
</div>
</body>	
</html>