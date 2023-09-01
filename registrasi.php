<?php
require 'fungsi.php';
if (isset($_POST["register"])) {
	if (registrasi($_POST) > 0) {
		echo "<script>
			alert('Pengguna baru berhasil ditambahkan! Silakan login!');
			document.location.href = 'login.php';
            </script>";
	} else {
		echo mysqli_error($conn);
	}
}
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>

<head>
	<title>Halaman Registrasi</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
	<div style="background-image: url(12.jpg);">
		<div class="container">
			<div class="d-flex justify-content-center h-100">
				<div class="card">
					<div class="card-header">
						<h3>Registrasi</h3>
					</div>
					<div class="card-body">
						<form action="" method="post">
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"></span>
								</div>
								<input type="text" name="namalengkap" id="namalengkap" class="form-control" placeholder="Nama Lengkap" require>
							</div>
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"></span>
								</div>
								<input type="text" name="email" id="email" class="form-control" placeholder="email" required>
							</div>
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"></span>
								</div>
								<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
							</div>
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"></span>
								</div>
								<input type="password" name="password2" id="password2" class="form-control" placeholder="Konfirmasi Password" required>
							</div>
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"></span>
								</div>
								<input type="text" name="nohp" id="nohp" class="form-control" placeholder="Nomor Hp" required>
							</div>
							<div class="form-group">
								<input type="submit" name="register" id="register" value="Daftar" class="btn float-right login_btn">
							</div>
						</form>
					</div>
					<div>
						<center><a href="login.php">Kembali ke Beranda</a></center>
					</div>
					<div class="card-footer">
						<div class="d-flex justify-content-center links">
							Sudah memiliki akun?<a href="login.php">Masuk</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>