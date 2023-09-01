<?php
session_start();
if (!isset($_SESSION["login1"])) {
	echo "<script>
	alert('Login Terlebih Dahulu!');
	document.location.href = 'loginadmin.php';
	</script>";
	exit;
}
include 'headeradmin.php';
require 'fungsi.php';
if (isset($_POST["update"])) {
	if (update($_POST) > 0) {
		echo "<script>
			alert('Data berhasil diubah!');
			document.location.href = 'databayar.php';
			</script>";
	} else {
		echo "<script>
			alert('error!');
			</script>";
		echo mysqli_error($conn);
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div id="content" class="p-2 p-md-2 pt-2">
		<div>
			<div class="col-lg-12">
				<h1>EDIT DATA PEMBAYARAN </h1>
			</div>
			<?php
			$idbayar = $_GET['idbayar'];
			$db = mysqli_query($conn, " SELECT * FROM bayar WHERE idbayar='$idbayar'");
			while ($hasil = mysqli_fetch_array($db)) {
			?>
				<form action="" method="post">
					<input type="hidden" name="idbayar" value="<?php echo $hasil['idbayar']; ?>">
					<div class="form-group">
						<label>Tanggal Selesai</label><br>
						<input type="date" name="tanggalselesai" value="<?php echo $hasil['tanggalselesai']; ?>">
					</div>
					<div class="form-group">
						<label>Status</label><br>
						<select name="status" required>
							<option selected><?php echo $hasil['status'] ?></option>
							<option style="color:black" value="LUNAS">LUNAS</option>
							<option style="color:black" value="BELUM LUNAS">BELUM LUNAS</option>
						</select>
					</div>
					<div class="form-group">
						<input type="submit" name="update" id="update" value="Update" class="btn btn-primary">
						<a href="databayar.php" class="btn btn-danger">Batal</a>
					</div>
				</form>
			<?php } ?>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	</div>
</body>

</html>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include 'footer.php'; ?>