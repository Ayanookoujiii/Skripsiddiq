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
if (isset($_POST["ubah"])) {
	if (ubah($_POST) > 0) {
		echo "<script>
			alert('Data berhasil diubah!');
			document.location.href = 'datarumah.php';
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
				<h1>EDIT DATA RUMAH </h1>
			</div>
			<?php
			$idrumah = $_GET['idrumah'];
			$db = mysqli_query($conn, " SELECT * FROM rumah WHERE idrumah='$idrumah'");
			while ($hasil = mysqli_fetch_array($db)) {
			?>
				<form action="" method="post" enctype="multipart/form-data">
					<input type="hidden" name="fotolama" value="<?php echo $hasil['foto']; ?>">

					<div class="form-group">
						<label>Nomor Rumah</label><br>
						<input type="text" name="nomorrumah" value="<?php echo $hasil['nomorrumah']; ?>">
					</div>
					<div class="form-group">
						<label>Deskripsi Rumah</label><br>
						<input type="textarea" name="Deskripsi" value="<?php echo $hasil['Deskripsi']; ?>">
					</div>
					<div class="form-group">
						<label>Status</label>
						<select name="status_rumah" required>
							<option selected><?php echo $hasil['status_rumah'] ?></option>
							<option value="Tersedia" selected>Tersedia</option>
							<option value="Tidak Tersedia">Tidak Tersedia</option>
						</select>
					</div>
					<div class="form-group">
						<label>Biaya Sewa</label><br>
						<input type="text" name="harga" value="<?php echo $hasil['harga']; ?>">
					</div>
					<div class="form-group">
						<label>Foto Rumah</label>
						<img style="width:100px; height:auto;" src="images/upload/<?php echo $hasil['foto']; ?>">
						<input type="file" name="foto" id="foto" class="form-control" placeholder="Foto Rumah">
					</div>
					<input type="hidden" name="idrumah" id="idrumah" value="<?php echo $hasil['idrumah']; ?>">
					<div class="form-group">
						<input type="submit" name="ubah" id="ubah" value="ubah" class="btn btn-primary">
						<a href="datarumah.php" class="btn btn-danger">Batal</a>
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

<?php include 'footer.php'; ?>