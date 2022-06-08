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
	<title>Data Pelanggan</title>
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
		<form action="" method="POST">
			<div class="form">
				<h2>Data Pelanggan</h2>
				<hr style="margin-bottom: 20px;">
				<p class="tampil"><a href="input-data-pelanggan.php">Tambah Pelanggan</a></p><br>
				<div class="left">
				
					<div class="filter">
						<div class="cari" style="margin-left: 16px;">
							<input type="text" name="keyword" placeholder="Cari nama pelanggan..">
							<input type="submit" name="cari" value="Cari">
						</div>

						<div class="cari" style="margin-left: 16px;">
							<input type="text" name="keywordtarif" placeholder="Cari kode tarif...">
							<input type="submit" name="caritarif" value="Cari">
						</div>
						
						<div class="reset-button" style="margin-left: 16px;">
							<input type="submit" name="resettabel" value="Reset">
						</div>
					</div>
					

					<table border="1" style="text-align: center; border-collapse: collapse; margin-left: 15px; margin-top: 00px;">
					<tr class="tabel">
							<td>No</td>
							<td>Kode User</td>
							<td>No Meter</td>
							<td>Nama Lengkap</td>
							<td>Alamat</td>
							<td>Telepon</td>
							<td>Email</td>
							<td>Kode Tarif</td>
							<td colspan="2">Action</td>
						</tr>
				<?php
				include "konek.php";
				if( isset($_POST["cari"]) ) {
					$no = 0;
					$keyword = $_POST["keyword"];
					$baca = mysqli_query($konek,"SELECT * FROM tbuser INNER JOIN tbtarif ON tbuser.KodeTarif = tbtarif.KodeTarif
					WHERE NamaLengkap LIKE '%$keyword%' AND Level='Pelanggan'");
					while ($baca1=mysqli_fetch_array($baca))				
					{
					$daya=number_format($baca1['Daya'],0,",",".");
					$no++;
					echo "
					<tr class='tabel2'>
						<td class='number'>$no</td>
						<td>$baca1[KodeUser]</td>
						<td>$baca1[NoMeter]</td>
						<td>$baca1[NamaLengkap]</td>
						<td>$baca1[Alamat]</td>
						<td>$baca1[Telp]</td>
						<td>$baca1[Email]</td>
						<td>$baca1[KodeTarif]</td>
						<td class='edit'><a href='edit-pelanggan.php?KodeUser=$baca1[KodeUser]' onclick='return confirm('Yakin?')'>EDIT</a></td> 
						<td class='hapus'><a href='hapus-pelanggan.php?KodeUser=$baca1[KodeUser]'>HAPUS</a></td>
					</tr>";
					}
				}
				else if( isset($_POST["caritarif"]) ){
					$no = 0;
					$keywordtarif = $_POST["keywordtarif"];
					$baca = mysqli_query($konek,"SELECT * FROM tbuser INNER JOIN tbtarif ON tbuser.KodeTarif = tbtarif.KodeTarif
					WHERE tbuser.KodeTarif = '$keywordtarif'");
					while ($baca1=mysqli_fetch_array($baca))				
					{
					$daya=number_format($baca1['Daya'],0,",",".");
					$no++;
					echo "
					<tr class='tabel2'>
						<td class='number'>$no</td>
						<td>$baca1[KodeUser]</td>
						<td>$baca1[NoMeter]</td>
						<td>$baca1[NamaLengkap]</td>
						<td>$baca1[Alamat]</td>
						<td>$baca1[Telp]</td>
						<td>$baca1[Email]</td>
						<td>$baca1[KodeTarif]</td>
						<td class='edit'><a href='edit-pelanggan.php?KodeUser=$baca1[KodeUser]' onclick='return confirm('Yakin?')'>EDIT</a></td> 
						<td class='hapus'><a href='hapus-pelanggan.php?KodeUser=$baca1[KodeUser]'>HAPUS</a></td>
					</tr>";
					}
				}
				elseif( isset($_POST["resettabel"]) ){
					$no=0;
					// $baca=mysqli_query($konek,"select*from tbuser inner join tbtarif on tbtarif.KodeTarif=tbuser.KodeTarif where Level='Pelanggan'");
					$baca=mysqli_query($konek,"select*from tbuser inner join tbtarif on tbtarif.KodeTarif=tbuser.KodeTarif where Level='Pelanggan'");
					while ($baca1=mysqli_fetch_array($baca))				
					{
						$daya=number_format($baca1['Daya'],0,",",".");
						$no++;
						echo "
						<tr class='tabel2'>
							<td class='number'>$no</td>
							<td>$baca1[KodeUser]</td>
							<td>$baca1[NoMeter]</td>
							<td>$baca1[NamaLengkap]</td>
							<td>$baca1[Alamat]</td>
							<td>$baca1[Telp]</td>
							<td>$baca1[Email]</td>
							<td>$baca1[KodeTarif]</td>
							<td class='edit'><a href='edit-pelanggan.php?KodeUser=$baca1[KodeUser]' onclick='return confirm('Yakin?')'>EDIT</a></td> 
							<td class='hapus'><a href='hapus-pelanggan.php?KodeUser=$baca1[KodeUser]'>HAPUS</a></td>
						</tr>";
					}
				}
				else{
					$no=0;
					// $baca=mysqli_query($konek,"select*from tbuser inner join tbtarif on tbtarif.KodeTarif=tbuser.KodeTarif where Level='Pelanggan'");
					$baca=mysqli_query($konek,"select*from tbuser inner join tbtarif on tbtarif.KodeTarif=tbuser.KodeTarif where Level='Pelanggan'");
					while ($baca1=mysqli_fetch_array($baca))				
					{
						$daya=number_format($baca1['Daya'],0,",",".");
						$no++;
						echo "
						<tr class='tabel2'>
							<td class='number'>$no</td>
							<td>$baca1[KodeUser]</td>
							<td>$baca1[NoMeter]</td>
							<td>$baca1[NamaLengkap]</td>
							<td>$baca1[Alamat]</td>
							<td>$baca1[Telp]</td>
							<td>$baca1[Email]</td>
							<td>$baca1[KodeTarif]</td>
							<td class='edit'><a href='edit-pelanggan.php?KodeUser=$baca1[KodeUser]' onclick='return confirm('Yakin?')'>EDIT</a></td> 
							<td class='hapus'><a href='hapus-pelanggan.php?KodeUser=$baca1[KodeUser]'>HAPUS</a></td>
						</tr>";
					}
				}
				?>
			</table> 
				<br>
				<br>
				<br>
				<div class="total">
					<?php
					include "konek.php";
					$data_pelanggan=mysqli_query($konek,"SELECT * FROM `tbuser` where Level='Pelanggan'");
					$jumlah_pelanggan = mysqli_num_rows($data_pelanggan);
					?>
					<p>Jumlah Data Pelanggan : <b><?php echo $jumlah_pelanggan; ?></b></p>
				</div>
					
				</div>
			</div>
		</form>
	</div>
</div>
</body>	
</html>
