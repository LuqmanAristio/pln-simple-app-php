<?php  
session_start();
if (empty($_SESSION['Username'])) {
	echo "<script>alert('Silahkan Login Dulu');
	location.href='index.php';</script>";
}
?>

<?php
	include "konek.php";

	$Kode=$_GET['KodeFilter'];

	if($Kode==1){
		$a=0;
		$b=500000;
	}
	else if($Kode==2){
		$a=500000;
		$b=1000000;
	}
	else{
		$a=1000000;
		$b=5000000;
	}

	$a=number_format($a,0,",",".");
	$b=number_format($b,0,",",".");
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
<div class="left-bar" style="overflow : hidden;">
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
	<div class="form">

			<h2>Data <?php echo"Rp $a - Rp $b"?></h2>
			<hr style="margin-bottom: 20px;">
			<p class="tampil"><a href="input-data-tagihan.php">Tambah Tagihan</a></p>

			<p class="tampil" style="margin-top:50px; float:left;"><?php echo"<a href='tagihanplus.php?KodeFilter=1'>0 - 500.000</a>"?></p>
			<p class="tampil" style="margin-top:50px; float:left;"><?php echo"<a href='tagihanplus.php?KodeFilter=2'>500.000 - 1.000.000</a>"?></p>
			<p class="tampil" style="margin-top:50px; float:left;"><?php echo"<a href='tagihanplus.php?KodeFilter=3'>1.000.0000 - 5.000.000</a>"?></p>
			<p class="tampil" style="margin-top:50px;"><a href="tampil-tagihan.php">Kembali</a></p>

			<div class="left">

			<table border="1" style="text-align: center; border-collapse: collapse; margin-left: 15px; margin-top: 0px;">
					<tr class="tabel">
							<td>No</td>
							<td>Kode User</td>
							<td>Total Pemakaian KWH</td>
							<td>Total Bayar</td>
							<td colspan="2">Action</td>
						</tr>
				<?php
				include "konek.php";

				$Kode=$_GET['KodeFilter'];

				if($Kode==1){
					$a=0;
					$b=500000;
				}
				else if($Kode==2){
					$a=500000;
					$b=1000000;
				}
				else{
					$a=1000000;
					$b=5000000;
				}

				$no=0;
				$baca=mysqli_query($konek,"select SUM(TotalBayar) AS TotalBayar, SUM(Pemakaian) AS TotalPemakaian, KodeUser FROM tbtagihan GROUP BY KodeUser HAVING SUM(TotalBayar) BETWEEN $a AND $b");
				while ($baca1=mysqli_fetch_array($baca))				
				{
				$bayar=number_format($baca1['TotalBayar'],0,",",".");
				$no++;
				echo "
				<tr class='tabel2'>
					<td class='number'>$no</td>
					<td>$baca1[KodeUser]</td>
					<td>$baca1[TotalPemakaian] KWH</td>
					<td>Rp $bayar</td>
					<td><a href='#' style='text-decoration: none; color:black;'>NULL</a></td> 
				</tr> 
				";
				}
				?>
			</table>
			</div>
		</div>
	</div>
</div>
</body>	
</html>
