<?php
session_start();
if (!isset($_SESSION["login"])) {
	echo "<script>
	alert('Login Terlebih Dahulu!');
	document.location.href = 'login.php';
	</script>";
	exit;
}
require 'fungsi.php';
include 'headermember.php';
if (isset($_POST["bayar"])) {
	if (bayar($_POST) > 0) {
		echo "<script>
			alert('Bukti Pembayaran Berhasil Dikirim! Silakan Cek Status Pembayaran Secara Berkala.');
			document.location.href = 'index.php';
			</script>";
	} else {
		echo "<script>
			alert('error!');
			</script>";
		echo mysqli_error($conn);
	}
}
$login = $_SESSION['login'];
$rumah = $_POST["rumah"];
$SQL = mysqli_query($conn, "SELECT * FROM `user` WHERE `id`='$login'");
$SQL1 = mysqli_query($conn, "SELECT * FROM `rumah` WHERE `rumah`.`idrumah` = $rumah");
?>
<div class="allcontain">
	<div class="feturedsection">
		<h2><class="text-center">Pembayaran</h2>
	</div>
</div>
<center>
	<?php
	if ($SQL1->num_rows > 0) {
		while ($row = $SQL1->fetch_assoc()) {
			$row2 = mysqli_fetch_assoc($SQL);
	?>
			<form action="" method="POST" enctype="multipart/form-data">
				<table align="text-center">
					<tr>
						<td>Tanggal Pembayaran</td>
						<td> : </td>
						<td>
							<div class="form-group">
								<input type="date" class="form-control" name="tanggalpembayaran" required>
							</div>
						</td>
					</tr>
					<tr>
						<td>Nominal Pembayaran</td>
						<td> : </td>
						<td>
							<div class="form-group">
								<input type="text" value="<?php echo $row['harga'] ?>" class="form-control" name="nominal" required readonly>
							</div>
						</td>
					</tr>
					<tr>
						<td>Bukti Pembayaran</td>
						<td> : </td>
						<td>
							<div class="form-group">
								<input type="file" class="form-control" name="bukti" required>
							</div>
						</td>
					</tr>
					<tr>
						<input type="hidden" name="rumah" value="<?php echo $row['idrumah']; ?>">
						<input type="hidden" name="iduser" value="<?php echo $login; ?>">
						<td><br>
							<input type="submit" name="bayar" id="bayar" value="Kirim" class="btn btn-primary">
						</td>
					</tr>
				</table>
			</form>
	<?php
		}
	}
	?>
</center>
</div>
</div>
</div>
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