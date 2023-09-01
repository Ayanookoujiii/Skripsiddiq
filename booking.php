<?php include 'headermember.php';
session_start();
require 'fungsi.php';
if (!isset($_SESSION["login"])) {
	echo "<script>
	alert('Login Terlebih Dahulu!');
	document.location.href = 'login.php';
	</script>";
	exit;
} else {
	if (isset($_POST["booking"])) {
		if (booking($_POST) > 0) {
			echo "<script>
				alert('Rumah berhasil dipesan! Silakan lakukan pembayaran!');
				document.location.href = 'index.php';
			</script>";
		} else {
			echo "<script>
			alert('error!');
			</script>";
			echo mysqli_error($conn);
		}
	}
}
$login = $_SESSION['login'];
$rumah = $_POST["rumah"];
$SQL1 = mysqli_query($conn, "SELECT * FROM `rumah` WHERE `idrumah` = $rumah");
?>

<div class="allcontain">
	<div class="feturedsection">
		<h2 class="text-center">Pemesanan Rumah</h2>
	</div>
</div>
<center>
	<?php
	if ($SQL1->num_rows > 0) {
		while ($row = mysqli_fetch_assoc($SQL1)) {
	?>
			<form action="" method="POST">
				<table align="text-center">
					<tr>
						<td>Tanggal Booking</td>
						<td> : </td>
						<td>
							<div class="form-group">
								<input type="date" class="form-control" name="tanggalbooking" required>
							</div>
						</td>
					</tr>
					<tr>
						<td>Tanggal Mulai</td>
						<td> : </td>
						<td>
							<div class="form-group">
								<input type="date" class="form-control" name="tanggalhuni" required>
							</div>
						</td>
					</tr>
					<tr>
						<td>Durasi Sewa</td>
						<td> : </td>
						<td>1 Tahun </td>
					</tr>
					<tr>
						<input type="hidden" name="idbooking" value="<?php echo $idbooking; ?>">
						<input type="hidden" name="rumah" value="<?php echo $row['idrumah']; ?>">
						<input type="hidden" name="iduser" value="<?php echo $login; ?>">
						<td><br>
							<input type="submit" name="booking" id="booking" value="Booking" class="btn btn-primary">
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