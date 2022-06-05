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

$baca=mysqli_query($konek,"select*from tbpembayaran where KodeTagihan='$KodeTagihan'");
$baca1=mysqli_fetch_array($baca);

$Kodep=$baca1[0];
$NoTagih=$baca1[1];
$Jenisp=$baca1[2];
$Norek=$baca1[3];
$AtasNama=$baca1[4];
$Tgl=$baca1[5];
$Nominal=$baca1[6];
$Status=$baca1[7];
$Bukti=$baca1[9];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Verifikasi Pembayaran</title>
	<link rel="stylesheet" type="text/css" href="css/verifikasi.css">
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
		<div class="link2">
			<div class="ikon2">
				<i class="fas fa-bell"></i>
			</div>
			<p><a href="input-data-tagihan.php">Tagihan</a></p>
		</div>
		<div class="link2" style="background-color: #2f3542;">
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
			<div class="form">
				<h2>Data Pembayaran Pelanggan</h2>
				<hr style="margin-bottom: 20px;">
					<div class="tampilgambar">
						<img src="gambardb/<?php echo $Bukti; ?>">
					</div>
					<div class="datanya">
						<div class="data-kiri">
							<p><b>1. Kode Pembayaran : </b> <?php echo $Kodep; ?></p>
							<p><b>2. No Tagihan : </b><?php echo $NoTagih; ?></p>
							<p><b>3. Jenis Pembayaran : </b><?php echo $Jenisp; ?></p>
							<p><b>4. No Rekening : </b><?php echo $Norek; ?></p>
						</div>
						<div class="data-kanan">
							<p><b>5. Atas Nama : </b><?php echo $AtasNama; ?></p>
							<p><b>6. Tanggal Transfer : </b><?php echo $Tgl; ?></p>
							<p><b>7. Nominal : </b><?php echo $Nominal; ?></p>
							<p><b>8. Status : </b><?php echo $Status; ?></p>
						</div>
					</div>
					<div class="submit">
						<?php
							echo "<a class='sah' href='verifikasi-proses-sah.php?KodeTagihan=$KodeTagihan' onclick='return confirm('Yakin?')''>Sudah Valid</a>
							<a class='tidaksah' href='verifikasi-proses-tidak.php?KodeTagihan=$KodeTagihan' onclick='return confirm('Yakin?')''>Tidak Valid</a>";
						?>
					</div>
	</div>
</div>
</body>	
</html>