<?php  
session_start();
if (empty($_SESSION['Username'])) {
	echo "<script>alert('Silahkan Login Dulu');
	location.href='index.php';</script>";
}
?>
<?php
include 'konek.php';

$KodeTagihan=$_GET['KodeTagihan'];

$sql=mysqli_query($konek,"select*from tbtagihan where KodeTagihan='$KodeTagihan'");
$query=mysqli_fetch_array($sql);

$NoTagihan=$query[1];
$TotalBayar=$query[7];

?>
<?php

$Username=$_SESSION['Username'];

$sql=mysqli_query($konek,"select*from tbuser where Username='$Username'");
$query=mysqli_fetch_array($sql);

$NamaLengkap=$query[4];
$KodeUser=$query[0];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Pembayaran</title>
	<link rel="stylesheet" type="text/css" href="css/bayar-tagihan-pelanggan.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
</head>
<body>
<div class="container">
	<div class="left-bar">
		<div class="profil-img" style="margin-top: 30px;">
			<img src="gambar/profil-img.png" style="margin-bottom: 20px;">
			<p><?php
				echo"$NamaLengkap";
			?></p>
		</div>
		<p class="dash"><a href="dashboard-pelanggan.php">Dashboard</a></p>
		<div class="link1" style="background-color: #2f3542;">
			<div class="ikon">
				<i class="fa fa-address-book"></i>
			</div>
			<p><a href="data-tagihan-pelanggan.php">Data Tagihan</a></p>
		</div>
		<div class="link2">
			<div class="ikon2">
				<i class="fas fa-chart-bar"></i>
			</div>
			<p><a href="history.php">History Tagihan</a></p>
		</div>
		<div class="link3">
			<div class="ikon3">
				<i class="fa fa-sign-out-alt"></i>
			</div>
			<p><a href="logout.php">Keluar</a></p>
		</div>
	</div>
	<div class="right-bar">
		<form action="tambah-pembayaran.php" method="POST" enctype="multipart/form-data">
			<div class="form">
				<h2>Bayar</h2>
				<hr style="margin-bottom: 20px;">
				<div class="left">
					<div class="form-1">
						<p>Kode Tagihan</p>
						<div class="ikon-f">
							<i class="fas fa-file-invoice"></i>
						</div>
						<input type="text" name="KodeTagihan" value="<?php echo $KodeTagihan ?>" readonly>
					</div>
					<div class="form-1">
						<p>No Tagihan</p>
						<div class="ikon-f">
							<i class="fas fa-file-invoice"></i>
						</div>
						<input type="text" name="NoTagihan" value="<?php echo $NoTagihan ?>" readonly>
					</div>
					<div class="form-1">
						<p>No Rekening</p>
						<div class="ikon-f">
							<i class="fas fa-credit-card"></i>
						</div>
						<input type="text" name="NoRek" placeholder="No Rekening" required>
					</div>
					<div class="form-1">
						<p>Tanggal Transfer</p>
						<div class="ikon-f">
							<i class="fas fa-calendar-check"></i>
						</div>
						<input type="date" name="TglTransfer" placeholder="Tanggal" required>
					</div>
				</div>
				<div class="right">
					<div class="form-1">
						<p>Jenis Pembayaran</p>
						<div class="ikon-f">
							<i class="fas fa-money-check-alt"></i>
						</div>
						<select name="JenisPembayaran">
							<option value="Bank">Transfer Bank</option>
						</select>
					</div>
					<div class="form-1">
						<p>Atas Nama</p>
						<div class="ikon-f">
							<i class="fas fa-file-signature"></i>
						</div>
						<input type="text" name="AtasNama" placeholder="Atas Nama" required>
					</div>
					<div class="form-1">
						<p>Nominal</p>
						<div class="ikon-f">
							<i class="fas fa-coins"></i>
						</div>
						<input type="text" name="Nominal" placeholder="Rp <?php echo $TotalBayar; ?>" required>
					</div>
					<div class="form-1">
						<p>Gambar</p>
<!-- 					<div class="ikon-f">
							<i class="fas fa-image"></i>
						</div> -->
						<input type="file" name="Bukti" required>
					</div>
				</div>
				<div class="submit">
						<input type="submit" value="TAMBAH">
						<input type="reset" value="BATAL">
				</div>
			</div>
		</form>
	</div>
</div>
</body>	
</html>