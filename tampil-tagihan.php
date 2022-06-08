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
			<h2>Data Tagihan</h2>
			<hr style="margin-bottom: 20px;">
			<p class="tampil"><a href="input-data-tagihan.php">Tambah Tagihan</a></p>
			<div class="left">
				<div class="opsi_filter">
					<div class="filt">
						<form action="" method="POST">
							<p>Filter Berdasarkan : </p>
							<input type="radio" value="Bulan" name="filter"> Bulan
							<input type="radio" value="Tahun" name="filter"> Tahun
							<input type="radio" value="Pemakaian" name="filter"> Pemakaian
							<input type="radio" value="Sisa Bayar" name="filter"> Sisa Bayar 
							<br>
							<p>Masuskkan Rentang Nilai</p>
							<input class="input1" type="text" name="value1" placeholder="Masukkan Nilai1">
							<input class="input2" type="text" name="value2" placeholder="Masukkan Nilai2"><br>
							<button type="submit" name="filter2">Filter</button> <br><br>
							<div class="reset-table">
								<button type="submit" name="resettabel">Reset Table</button>
							</div>
							
						</form> 
					</div>
					
				</div>
				
			
				<table border="1" style="text-align: center; border-collapse: collapse; margin-left: 15px; margin-top: 30px;">
					<tr class="tabel">
						<td>No</td>
						<td>Kode Tagihan</td>
						<td>No Tagihan</td>
						<td>Nama (Kode User)</td>
						<td>Bulan Tagih</td>
						<td>Tahun Tagih</td>
						<td>Pemakaian</td>
						<td>Sisa Bayar</td>
						<td>Status</td>
						<td colspan="2">Action</td>
					</tr>
				<?php
				include "konek.php"; 
				if( isset($_POST["filter"])){
					$filter = $_POST["filter"];
				}
				if( isset($_POST["filter2"])){
					global $filter;
					$Value1 = $_POST["value1"];
					$Value2 = $_POST["value2"];
					if($filter == "Bulan"){
						$no=0;
						$baca=mysqli_query($konek,"SELECT * FROM tbtagihan LEFT JOIN tbuser ON tbuser.KodeUser=tbtagihan.KodeUser 
						WHERE tbtagihan.BulanTagih BETWEEN '$Value1' AND '$Value2'");
						while ($baca1=mysqli_fetch_array($baca))
						{
							$bayar=number_format($baca1['TotalBayar'],0,",",".");
							$no++;
							echo "
							<tr class='tabel2'>
								<td class='number'>$no</td>
								<td>$baca1[0]</td>
								<td>$baca1[1]</td>
								<td>$baca1[NamaLengkap] ($baca1[KodeUser])</td>
								<td>$baca1[4]</td>
								<td>$baca1[5]</td>
								<td>$baca1[6] KWh</td>
								<td>Rp $bayar</td>
								<td>$baca1[8]</td>
								<td class='edit'><a href='edit-tagihan.php?KodeTagihan=$baca1[KodeTagihan]'>EDIT</a></td> 
								<td class='hapus'><a href='hapus-tagihan.php?KodeTagihan=$baca1[KodeTagihan]'>HAPUS</a></td>
							</tr>";
						}
					}
					elseif($filter == "Tahun"){
						$no=0;
						$baca=mysqli_query($konek,"SELECT * FROM tbtagihan INNER JOIN tbuser ON tbuser.KodeUser=tbtagihan.KodeUser 
						WHERE tbtagihan.TahunTagih BETWEEN '$Value1' AND '$Value2'");
						while ($baca1=mysqli_fetch_array($baca))
						{
							$bayar=number_format($baca1['TotalBayar'],0,",",".");
							$no++;
							echo "
							<tr class='tabel2'>
								<td class='number'>$no</td>
								<td>$baca1[0]</td>
								<td>$baca1[1]</td>
								<td>$baca1[NamaLengkap] ($baca1[KodeUser])</td>
								<td>$baca1[4]</td>
								<td>$baca1[5]</td>
								<td>$baca1[6] KWh</td>
								<td>Rp $bayar</td>
								<td>$baca1[8]</td>
								<td class='edit'><a href='edit-tagihan.php?KodeTagihan=$baca1[KodeTagihan]'>EDIT</a></td> 
								<td class='hapus'><a href='hapus-tagihan.php?KodeTagihan=$baca1[KodeTagihan]'>HAPUS</a></td>
							</tr>";
						}
					}
					elseif($filter == "Pemakaian"){
						$no=0;
						$baca=mysqli_query($konek,"SELECT * FROM tbtagihan INNER JOIN tbuser ON tbuser.KodeUser=tbtagihan.KodeUser 
						WHERE tbtagihan.Pemakaian BETWEEN '$Value1' AND '$Value2'");
						while ($baca1=mysqli_fetch_array($baca))
						{
							$bayar=number_format($baca1['TotalBayar'],0,",",".");
							$no++;
							echo "
							<tr class='tabel2'>
								<td class='number'>$no</td>
								<td>$baca1[0]</td>
								<td>$baca1[1]</td>
								<td>$baca1[NamaLengkap] ($baca1[KodeUser])</td>
								<td>$baca1[4]</td>
								<td>$baca1[5]</td>
								<td>$baca1[6] KWh</td>
								<td>Rp $bayar</td>
								<td>$baca1[8]</td>
								<td class='edit'><a href='edit-tagihan.php?KodeTagihan=$baca1[KodeTagihan]'>EDIT</a></td> 
								<td class='hapus'><a href='hapus-tagihan.php?KodeTagihan=$baca1[KodeTagihan]'>HAPUS</a></td>
							</tr>";
						}
					}
					elseif(($filter == "Sisa Bayar")){
						$no=0;
						$baca=mysqli_query($konek,"SELECT * FROM tbtagihan INNER JOIN tbuser ON tbuser.KodeUser=tbtagihan.KodeUser 
						WHERE tbtagihan.TotalBayar BETWEEN '$Value1' AND '$Value2'");
						while ($baca1=mysqli_fetch_array($baca))
						{
							$bayar=number_format($baca1['TotalBayar'],0,",",".");
							$no++;
							echo "
							<tr class='tabel2'>
								<td class='number'>$no</td>
								<td>$baca1[0]</td>
								<td>$baca1[1]</td>
								<td>$baca1[NamaLengkap] ($baca1[KodeUser])</td>
								<td>$baca1[4]</td>
								<td>$baca1[5]</td>
								<td>$baca1[6] KWh</td>
								<td>Rp $bayar</td>
								<td>$baca1[8]</td>
								<td class='edit'><a href='edit-tagihan.php?KodeTagihan=$baca1[KodeTagihan]'>EDIT</a></td> 
								<td class='hapus'><a href='hapus-tagihan.php?KodeTagihan=$baca1[KodeTagihan]'>HAPUS</a></td>
							</tr>";
						}
					}
					else if ( isset($_POST['resettable'])){
						$no=0;
						$baca=mysqli_query($konek,"select*from tbtagihan inner join tbuser on tbuser.KodeUser=tbtagihan.KodeUser");
						while ($baca1=mysqli_fetch_array($baca))				
						{
						$bayar=number_format($baca1['TotalBayar'],0,",",".");
						$no++;
						echo "
						<tr class='tabel2'>
							<td class='number'>$no</td>
							<td>$baca1[0]</td>
							<td>$baca1[1]</td>
							<td>$baca1[NamaLengkap] ($baca1[KodeUser])</td>
							<td>$baca1[4]</td>
							<td>$baca1[5]</td>
							<td>$baca1[6] KWh</td>
							<td>Rp $bayar</td>
							<td>$baca1[8]</td>
							<td class='edit'><a href='edit-tagihan.php?KodeTagihan=$baca1[KodeTagihan]'>EDIT</a></td> 
							<td class='hapus'><a href='hapus-tagihan.php?KodeTagihan=$baca1[KodeTagihan]'>HAPUS</a></td>
						</tr>";
						}
					}
				}	
				else{
					$no=0;
					$baca=mysqli_query($konek,"select*from tbtagihan inner join tbuser on tbuser.KodeUser=tbtagihan.KodeUser");
					while ($baca1=mysqli_fetch_array($baca))				
					{
					$bayar=number_format($baca1['TotalBayar'],0,",",".");
					$no++;
					echo "
					<tr class='tabel2'>
						<td class='number'>$no</td>
						<td>$baca1[0]</td>
						<td>$baca1[1]</td>
						<td>$baca1[NamaLengkap] ($baca1[KodeUser])</td>
						<td>$baca1[4]</td>
						<td>$baca1[5]</td>
						<td>$baca1[6] KWh</td>
						<td>Rp $bayar</td>
						<td>$baca1[8]</td>
						<td class='edit'><a href='edit-tagihan.php?KodeTagihan=$baca1[KodeTagihan]'>EDIT</a></td> 
						<td class='hapus'><a href='hapus-tagihan.php?KodeTagihan=$baca1[KodeTagihan]'>HAPUS</a></td>
					</tr>";
					}
				}
				?>
				</table> 
			</div>
		</div>
	</div>
</div>
</body>	
</html>