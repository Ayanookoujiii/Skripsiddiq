<?php
session_start();
if (!isset($_SESSION["login1"])) {
	echo "<script>
	alert('Login Terlebih Dahulu!');
	document.location.href = 'loginadmin.php';
	</script>";
	exit;
}
include 'fungsi.php';
//member
if (isset($_POST['iduser'])) {
	$idmember = $_POST['iduser'];
	$SQL = mysqli_query($conn, "DELETE FROM user WHERE id='$idmember'");
	if ($SQL) {
		header("location:member.php");
	} else {
		echo "Data Gagal Dihapus";
	}
}
//kamar
else if (isset($_POST['idrumah'])) {
	$idrumah = $_POST['idrumah'];
	$SQL = mysqli_query($conn, "DELETE FROM rumah WHERE idrumah='$idrumah'");
	if ($SQL) {
		header("location:datarumah.php");
	} else {
		echo "Data Gagal Dihapus";
	}
} else if (isset($_POST['idbayar'])) {
	$idbayar = $_POST['idbayar'];
	$SQL = mysqli_query($conn, "DELETE FROM bayar WHERE idbayar='$idbayar'");
	if ($SQL) {
		header("location:databayar.php");
	} else {
		echo "Data Gagal Dihapus";
	}
} else if (isset($_POST['idbooking'])) {
	$idbooking = $_POST['idbooking'];
	$SQL = mysqli_query($conn, "DELETE FROM booking WHERE idbooking='$idbooking'");
	if ($SQL) {
		header("location:databooking.php");
	} else {
		echo "Data Gagal Dihapus";
	}
} else if (isset($_POST['idkeluhan'])) {
	$idkeluhan = $_POST['idkeluhan'];
	$SQL = mysqli_query($conn, "DELETE FROM keluhanpa1 WHERE idkeluhan='$idkeluhan'");
	if ($SQL) {
		header("location:datakeluhan.php");
	} else {
		echo "Data Gagal Dihapus";
	}
}
