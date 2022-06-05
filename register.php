<!DOCTYPE html>
<html>
<head>
	<title>Register Page</title>
	<link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/style-register.css">
</head>
<body>
	<div class="container">
			<div class="box">
			<div class="right-box">
				<p class="title">Register Page</p>
				<p class="sub-title">Silahkan isi form dibawah ini dengan data yang sebenarnya.</p>
				<form name="formdaftar" action="tambah-user.php" method="POST">
					<div class="input">
						<div class="ikon">
						<i class="far fa-user"></i>
						</div>
						<input type="text" name="NamaLengkap" placeholder="Nama Lengkap" required>
					</div>
					<div class="input-2">
						<div class="ikon-1">
						<i class="fas fa-home"></i>
						</div>
						<input type="text" name="Alamat" placeholder="Alamat Rumah">
					</div>
					<div class="input-3">
						<div class="ikon-2">
						<i class="fas fa-mobile-alt"></i>
						</div>
						<input type="text" name="Telp" placeholder="No Telepon">
					</div>
					<div class="input-4">
						<div class="ikon-3">
						<i class="far fa-envelope-open"></i>
						</div>
						<input type="email" name="Email" placeholder="Email" required="">
					</div>
					<div class="submit">
						<input type="submit" value="Register">
						<input type="reset" value="Reset">
					</div>
					<p class="reg">Sudah Punya Akun ?<a href="index.php"> Log In </a></p>
				</form>
			</div>
			<div class="left-box">
				<div class="logo">
					<img src="gambar/logo.png">
				</div>
				<div class="pict">
					<img src="gambar/ban2.png">
				</div>
			</div>
		</div>
	</div>
</body>
</html>