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
	<title>Tagihan Plus</title>
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
		<div class="link3">
			<div class="ikon3">
				<i class="fa fa-sign-out-alt"></i>
			</div>
			<p><a href="logout.php">Keluar</a></p>
		</div>
	</div>

	<div class="menu1">
    <h2>Data Tagihan antara Rp. 0 - Rp.500.000</h2>
			<table border="1" style="text-align: center; border-collapse: collapse; margin-left: 15px; margin-top: 30px;">
					<tr class="tabel">
							<td>No</td>
							<td>Kode User</td>
							<td>Sisa Bayar</td>
							<td colspan="2">Action</td>
						</tr>
				<?php
				include "konek.php";
				$no=0;
				$baca=mysqli_query($konek,"select SUM(TotalBayar) AS TotalBayar, KodeUser FROM tbtagihan GROUP BY KodeUser HAVING SUM(TotalBayar) BETWEEN 0 AND 500000");
				while ($baca1=mysqli_fetch_array($baca))				
				{
				$bayar=number_format($baca1['TotalBayar'],0,",",".");
				$no++;
				echo "
				<tr class='tabel2'>
					<td class='number'>$no</td>
					<td>$baca1[KodeUser]</td>
					<td>Rp $bayar</td>
					<td class='edit'><a href='edit-tagihan.php?KodeTagihan=$baca1[KodeUser]'>EDIT</a></td> 
					<td class='hapus'><a href='hapus-tagihan.php?KodeTagihan=$baca1[KodeUser]'>HAPUS</a></td>
				</tr> 
				";
				}
				?>
			</table> 
			</div>

<div class="menu2">
<h2>Data Tagihan antara Rp.500.000-1000.000</h2>
			<table border="1" style="text-align: center; border-collapse: collapse; margin-left: 15px; margin-top: 30px;">
					<tr class="tabel">
							<td>No</td>
							<td>Kode User</td>
							<td>Sisa Bayar</td>
							<td colspan="2">Action</td>
						</tr>
				<?php
				include "konek.php";
				$no=0;
				$baca=mysqli_query($konek,"select SUM(TotalBayar) AS TotalBayar, KodeUser FROM tbtagihan GROUP BY KodeUser HAVING SUM(TotalBayar) BETWEEN 500000 AND 1000000");
				while ($baca1=mysqli_fetch_array($baca))				
				{
				$bayar=number_format($baca1['TotalBayar'],0,",",".");
				$no++;
				echo "
				<tr class='tabel2'>
					<td class='number'>$no</td>
					<td>$baca1[KodeUser]</td>
					<td>Rp $bayar</td>
					<td class='edit'><a href='edit-tagihan.php?KodeTagihan=$baca1[KodeUser]'>EDIT</a></td> 
					<td class='hapus'><a href='hapus-tagihan.php?KodeTagihan=$baca1[KodeUser]'>HAPUS</a></td>
				</tr> 
				";
				}
				?>
			</table> 
			</div>

<div class="menu3">
<h2>Data Tagihan antara Rp. 1JT-5JT</h2>
			<table border="1" style="text-align: center; border-collapse: collapse; margin-left: 15px; margin-top: 30px;">
					<tr class="tabel">
							<td>No</td>
							<td>Kode User</td>
							<td>Sisa Bayar</td>
							<td colspan="2">Action</td>
						</tr>
				<?php
				include "konek.php";
				$no=0;
				$baca=mysqli_query($konek,"select SUM(TotalBayar) AS TotalBayar, KodeUser FROM tbtagihan GROUP BY KodeUser HAVING SUM(TotalBayar) BETWEEN 1000000 AND 5000000");
				while ($baca1=mysqli_fetch_array($baca))				
				{
				$bayar=number_format($baca1['TotalBayar'],0,",",".");
				$no++;
				echo "
				<tr class='tabel2'>
					<td class='number'>$no</td>
					<td>$baca1[KodeUser]</td>
					<td>Rp $bayar</td>
					<td class='edit'><a href='edit-tagihan.php?KodeTagihan=$baca1[KodeUser]'>EDIT</a></td> 
					<td class='hapus'><a href='hapus-tagihan.php?KodeTagihan=$baca1[KodeUser]'>HAPUS</a></td>
				</tr> 
				";
				}
				?>
			</table> 
			</div>

	</div>
</div>
</body>	
</html>
