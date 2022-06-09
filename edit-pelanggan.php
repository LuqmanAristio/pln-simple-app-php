<?php  
session_start();
if (empty($_SESSION['Username'])) {
	echo "<script>alert('Silahkan Login Dulu');
	location.href='index.php';</script>";
}
?>
<?php
include 'konek.php';

$KodeUser=$_GET['KodeUser'];

$cek=mysqli_query($konek,"select*from tbuser inner join tbtarif using (KodeTarif) where KodeUser='$KodeUser'");
$baca=mysqli_fetch_array($cek);

$NamaLengkap=$baca[5];
$Alamat=$baca[6];
$Telp=$baca[7];
$Email=$baca[8];
$KodeTarif=$baca[0];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="css/style-input-pelanggan.css">
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
		<div class="link1" style="background-color: #2f3542;">
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
		<form action="edit-proses-pelanggan.php" method="POST">
			<div class="form">
				<h2>Edit Data Pelanggan</h2>
				<hr style="margin-bottom: 10px;">
				<p class="tampil"><a href="tampil-pelanggan.php">Tampilkan Data Pelanggan</a></p>
				<div class="left">
					<div class="form-1">
						<p>Nama Lengkap</p>
						<div class="ikon-f">
							<i class="far fa-user"></i>
						</div>
						<input type="text" name="NamaLengkap" value="<?php echo $NamaLengkap; ?>" readonly>
					</div>
					<div class="form-1">
						<p>Alamat</p>
						<div class="ikon-f">
							<i class="fas fa-home"></i>
						</div>
						<input type="text" name="Alamat" value="<?php echo $Alamat; ?>" required>
					</div>
					<div class="form-1">
						<p>No Telpon</p>
						<div class="ikon-f">
							<i class="fas fa-mobile-alt"></i>
						</div>
						<input type="text" name="Telp" value="<?php echo $Telp; ?>" required>
					</div>
					<div class="form-1">
						<p>Email</p>
						<div class="ikon-f">
							<i class="far fa-envelope-open"></i>
						</div>
						<input type="text" name="Email" value="<?php echo $Email; ?>" required>
					</div>
					<div class="form-1">
						<p>Tarif</p>
						<div class="ikon-f">
							<i class="fas fa-bolt"></i>
						</div>
						<select name="KodeTarif" style="width:68%;">
								<?php
								include 'konek.php';

								$ambil=mysqli_query($konek,"select*from tbtarif where KodeTarif='$KodeTarif'");
								$data=mysqli_fetch_array($ambil);

								$Daya=$data[1];

								?>
								<option value="<?php echo $Daya ?>"><?php echo $Daya ?></option>
								<?php
								include 'konek.php';
								
								$sql = mysqli_query($konek,"SELECT * FROM tbtarif ORDER BY Daya,KodeTarif ASC");
								if(mysqli_num_rows($sql) != 0){
								while($row = mysqli_fetch_assoc($sql)){
									echo '<option>'.$row['Daya'].'</option>';
								}
									}
				
								?>
						</select>
					</div>
					<div class="submit">
						<input type="submit" value="UBAH" onclick="return confirm('Yakin?')">
						<input type="reset" value="BATAL">
					</div>
				</div>
				<div class="right-1">
					<img src="gambar/img-3.png">
				</div>
			<!-- 	<div class="center">
					<select name="Tarif">
						
					</select>
				</div> -->
			</div>
		</form>
	</div>
</div>
</body>	
</html>