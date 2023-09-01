<?php
session_start();
if (isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}
require 'fungsi.php';
if (isset($_POST["login"])) {
	$email = $_POST["email"];
	$password = $_POST["password"];
	$result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
	//cek email
	if (mysqli_num_rows($result) === 1) {
		//cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			//set session
			$_SESSION["login"] = $row['id'];
			header("Location: index.php");
			exit;
		}
	}
	$error = true;
}
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>

<head>
	<title>Halaman Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
	<?php if (isset($error)) {
		echo "<script>
	alert('Email/Pasword Salah!');
	document.location.href = 'login.php';
	</script>";
	}
	?>
	<div style="background-image: url(12.jpg);">
		<div class="container">
			<div class="d-flex justify-content-center h-100">
				<div class="card">
					<div class="card-header">
						<h3>Log In</h3>
					</div>
					<div class="card-body">
						<form action="" method="post">
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user"></i></span>
								</div>
								<input type="text" name="email" id="email" class="form-control" placeholder="email">
							</div>
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="password" name="password" id="password" class="form-control" placeholder="password">
							</div>
							<div class="form-group">
								<input type="submit" name="login" value="Login" class="btn float-right login_btn">
							</div>
						</form>
					</div>
					<div class="card-footer">
						<div class="d-flex justify-content-center links">
							<a href="index.php">Kembali ke Beranda</a>
						</div>
					</div>
					<div class="card-footer">
						<div class="d-flex justify-content-center links">
							Belum memiliki akun?<a href="registrasi.php">Daftar</a>
						</div>
						<div class="d-flex justify-content-center links">
							<a href="loginadmin.php">Admin</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>