<?php
session_start();
if (!isset($_SESSION["login"])) {
	echo "<script>
	alert('Login Terlebih Dahulu!');
	document.location.href = 'login.php';
	</script>";
	exit;
}
include 'headermember.php';
require 'fungsi.php';
if (isset($_POST["isi"])) {
	if (keluhan($_POST) > 0) {
		echo "<script>
			alert('Keluhan sudah terkirim! mohon maaf atas ketidaknyamanannya. ');
			document.location.href = 'index.php';
			</script>";
	} else {
		echo "<script>
			alert('error!');
			</script>";
		echo mysqli_error($conn);
	}
}
$login = $_SESSION["login"];
$rumah = $_POST["rumah"];
$SQL = mysqli_query($conn, "SELECT * FROM `user` WHERE `id`='$login'");
$SQL1 = mysqli_query($conn, "SELECT * FROM `rumah` WHERE `rumah`.`idrumah` = $rumah");
?>

<div class="allcontain">
	<div class="feturedsection">
		<h2 class="text-center">Keluhan</h2>
	</div>
</div>
<center>
	<?php
	if ($SQL1->num_rows > 0) {
		while ($row = $SQL1->fetch_assoc()) {
			$row2 = mysqli_fetch_assoc($SQL);
	?>
			<form action="" method="POST">
				<table align="text-center">
					<tr>
						<td>Keluhan</td>
						<td> : </td>
						<td>
							<div class="form-group">
								<textarea class="form-control" name="isi" required></textarea>
							</div>
						</td>
					</tr>
					<tr>
						<input type="hidden" name="rumah" value="<?php echo $row['idrumah']; ?>">
						<input type="hidden" name="iduser" value="<?php echo $row2['id']; ?>">
						<td><br>
							<input type="submit" name="keluhan" id="keluhan" value="Kirim" class="btn btn-primary">
						</td>
					</tr>
				</table>
			</form>
	<?php }
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