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

?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/style-dashboard.css">
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
		<div class="link1">
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
		<h2>Selamat Datang di PLN </h2>
		<div class="img">
			<img src="gambar/ban2.png">
		</div>
	</div>
</div>
</body>	
</html>