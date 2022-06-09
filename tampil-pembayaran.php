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
	<title>Data Pembayaran</title>
	<link rel="stylesheet" type="text/css" href="css/style-tampil-pel.css">
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
		<form action="tambah-pelanggan.php" method="POST">
			<div class="form">
				<h2>Data Pembayaran</h2>
				<hr style="margin-bottom: 20px;">
				<p class="tampil"><a href="verifikasi.php">Konfirmasi Tagihan</a></p><br>
				<p class="tampil"><a href="cek-status-pembayaran.php">Cek Status Pembayaran</a></p>
				<div class="left">
					<table border="1" style="text-align: center; border-collapse: collapse; margin-left: 15px; margin-top: 0px;">
					<tr class="tabel">
							<td>No</td>
							<td>Kode Pembayaran</td>
							<td>No Tagihan</td>
							<td>Jenis Pembayaran</td>
							<td>No Rek</td>
							<td>Atas Nama</td>
							<td>Tgl Transfer</td>
							<td>Nominal</td>
							<td>Status</td>
							<td>Kode Tagihan</td>
							<td colspan="2">Action</td>
						</tr>
				<?php
				include "konek.php";
				$no=0;
				$baca=mysqli_query($konek,"select*from tbpembayaran where Status='Lunas'");
				while ($baca1=mysqli_fetch_array($baca))				
				{
				$nominal=number_format($baca1['Nominal'],0,",",".");
				$no++;
				echo "
				<tr class='tabel2'>
					<td class='number'>$no</td>
					<td>$baca1[0]</td>
					<td>$baca1[1]</td>
					<td>$baca1[2]</td>
					<td>$baca1[3]</td>
					<td>$baca1[4]</td>
					<td>$baca1[5]</td>
					<td>Rp $nominal</td>
					<td>$baca1[7]</td> 
					<td>$baca1[8]</td> 
					<td class='hapus'><a href='hapus-pembayaran.php?KodePembayaran=$baca1[0]'>HAPUS</a></td>
				</tr>
				";
				}
				?>
			</table> 
				</div>
			</div>
		</form>
	</div>
</div>
</body>	
</html>
