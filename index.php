<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="css/style-indexx.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
</head>
<body>
	<div class="container">
		<div class="box">
			<div class="right-box">
				<p class="title">Welcome Back :)</p>
				<p class="sub-title">Silahkan login dengan menggunakan <b>username/email</b> dan <b>password</b> yang sudah dibuat.</p>
				<form name="formlogin" action="validasi.php" method="POST">
					<div class="input">
						<div class="ikon">
						<i class="far fa-envelope"></i>
						</div>
						<input type="text" name="Username" placeholder="Alamat Email" required>
					</div>
					<div class="input-2">
						<div class="ikon">
						<i class="fas fa-unlock-alt"></i>
						</div>
						<input type="password" name="Password" placeholder="Password" required>
					</div>
					<div class="submit">
						<input type="submit" value="Log In">
						<input type="reset" value="Reset">
					</div>
					<p class="reg">Belum punya akun?<a href="register.php"> Daftar Sekarang! </a></p>
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