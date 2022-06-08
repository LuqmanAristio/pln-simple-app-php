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
	<title>Verifikasi Pembayaran</title>
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
				<h2>Konfirmasi Pembayaran Pelanggan</h2>
				<hr style="margin-bottom: 20px;">
				<p class="tampil"><a href="tampil-pembayaran.php">Tampilkan Data Pembayaran</a></p>
				<div class="left">
					<table border="1" style="text-align: center; border-collapse: collapse; margin-left: 15px; margin-top: 0px;">
					<tr class="tabel">
							<td>No</td>
							<td>Kode Tagihan</td>
							<td>No Tagihan</td>
							<td>Kode User</td>
							<td>Kode Tarif</td>
							<td>Pemakaian</td>
							<td>Total Bayar</td>
							<td>Status</td>
							<td colspan="2">Action</td>
						</tr>
				<?php
				include "konek.php";
				$no=0;
				// $baca=mysqli_query($konek,"select*from tbuser inner join tbtarif on tbtarif.KodeTarif=tbuser.KodeTarif where Level='Pelanggan'");
				$baca=mysqli_query($konek,"select*from tbtagihan inner join tbuser on tbuser.KodeUser=tbtagihan.KodeUser where Status='Proses'");
				while ($baca1=mysqli_fetch_array($baca))				
				{
				$daya=number_format($baca1['7'],0,",",".");
				$no++;
				echo "
				<tr class='tabel2'>
					<td class='number'>$no</td>
					<td>$baca1[0]</td>
					<td>$baca1[1]</td>
					<td>$baca1[NamaLengkap] ($baca1[KodeUser])</td>
					<td>$baca1[3]</td>
					<td>$baca1[6] KwH</td>
					<td>Rp $daya</td>
					<td>$baca1[8]</td>
					<td class='hapus'><a href='tampil-verifikasi.php?KodeTagihan=$baca1[0]'>KONFIRMASI</a></td>
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
