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
	<title>Data Tarif</title>
	<link rel="stylesheet" type="text/css" href="css/style-tampil-tarif.css">
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
		<div class="link2"  style="background-color: #2f3542;">
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
		<form action="tambah-pelanggan.php" method="POST">
			<div class="form">
				<h2>Data Tarif</h2>
				<hr style="margin-bottom: 10px;">
				<p class="tampil"><a href="input-data-tarif.php" style="margin-left: 30px;">Tambah Data Tarif</a></p>
				<div class="left">
					<table border="1" style="text-align: center; border-collapse: collapse; margin-left: 30px; margin-top: 30px;">
					<tr class="tabel">
							<td>No</td>
							<td>KodeTarif</td>
							<td>Daya</td>
							<td>Tarif Per KWH</td>
							<td>Beban</td>
							<td colspan="2">Action</td>
						</tr>
				<?php
				include "konek.php";
				$no=0;
				$baca=mysqli_query($konek,"select*from tbtarif");
				while ($baca1=mysqli_fetch_array($baca))				
				{
				$daya=number_format($baca1['Daya'],0,",",".");
				$tarif=number_format($baca1['TarifPerKWH'],0,",",".");
				$beban=number_format($baca1['Beban'],0,",",".");		
				$no++;
				echo "
				<tr class='tabel2'>
					<td>$no</td>
					<td>$baca1[0]</td>
					<td>$daya VA</td>
					<td>Rp $tarif</td>
					<td>Rp $beban</td>
					<td class='edit'><a href='edit-tarif.php?KodeTarif=$baca1[0]'>EDIT</a></td> 
					<td class='hapus'><a href='hapus-tarif.php?KodeTarif=$baca1[0]'>HAPUS</a></td>
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