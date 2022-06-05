<?php  
session_start();
if (empty($_SESSION['Username'])) {
	echo "<script>alert('Silahkan Login Dulu');
	location.href='index.php';</script>";
}
?>
<?php
include 'konek.php';

$Username=$_SESSION['Username'];

$sql=mysqli_query($konek,"select*from tbuser where Username='$Username'");
$query=mysqli_fetch_array($sql);

$NamaLengkap=$query[4];
$KodeUser=$query[0];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Tagihan Pelanggan</title>
	<link rel="stylesheet" type="text/css" href="css/style-tampil-pel.css">
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
		<form action="tambah-pelanggan.php" method="POST">
			<div class="form">
				<h2>Data Tagihan Pelanggan</h2>
				<hr style="margin-bottom: 20px;">
				<div class="left">
					<table border="1" style="text-align: center; border-collapse: collapse; margin-left: 15px; margin-top: 30px;">
					<tr class="tabel">
							<td>No</td>
							<td>Kode User</td>
							<td>Kode Tagihan</td>
							<td>No Tagihan</td>
							<td>Bulan Tagih</td>
							<td>Tahun Tagih</td>
							<td>Pemakaian</td>
							<td>Total Bayar</td>
							<td>Status</td>
							<td>Action</td>
						</tr>
				<?php
				include "konek.php";
				$no=0;
				// $baca=mysqli_query($konek,"select*from tbuser inner join tbtarif on tbtarif.KodeTarif=tbuser.KodeTarif where Level='Pelanggan'");
				$baca=mysqli_query($konek,"select*from tbtagihan inner join tbuser using(KodeUser) where KodeUser='$KodeUser' AND Status!='Lunas'");
				while ($baca1=mysqli_fetch_array($baca))				
				{
					$bayar=number_format($baca1['TotalBayar'],0,",",".");
				$no++;
				echo "
				<tr class='tabel2'>
					<td class='number'>$no</td>
					<td>$baca1[KodeUser]</td>
					<td>$baca1[KodeTagihan]</td>
					<td>$baca1[NoTagihan]</td>
					<td>$baca1[BulanTagih]</td>
					<td>$baca1[TahunTagih]</td>
					<td>$baca1[Pemakaian] KWH</td>
					<td>Rp $bayar</td>
					<td>$baca1[Status]</td>
				";
					if ($baca1[8]=='Belum Lunas') {
						echo "<td class='edit'>
						<a href='pembayaran-tagihan.php?KodeTagihan=$baca1[KodeTagihan]')'>BAYAR</a>
						</td> ";
					}
					else{
						echo "<td></td>";
					}
				echo "</tr>";
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