<?php
session_start();
if (!isset($_SESSION["login1"])) {
    echo "<script>
	alert('Login Terlebih Dahulu!');
	document.location.href = 'loginadmin.php';
	</script>";
    exit;
}
include 'headeradmin.php'
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="welcome-message">
            <div class="wrap-info">
                <div class="information">
                    <br>
                    <br>
                    <br>
                    <center>
                        <h1>LAPORAN KELUHAN </h1>
                    </center>
                    <br>
                    <br>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID keluhan</th>
                                <th>Nama Lengkap</th>
                                <th>Nomor Rumah</th>
                                <th>Keluhan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <?php include "fungsi.php";
                        $SQL = mysqli_query($conn, "SELECT * FROM keluhanpa1 INNER JOIN rumah ON keluhanpa1.idrumah = rumah.idrumah INNER JOIN user ON keluhanpa1.iduser = user.id");
                        while ($data = mysqli_fetch_array($SQL)) {
                        ?>
                            <tr class="warning">
                                <td><?php echo $data['idkeluhan']; ?></td>
                                <td><?php echo $data['namalengkap']; ?></td>
                                <td><?php echo $data['nomorrumah']; ?></td>
                                <td><?php echo $data['isi']; ?></td>
                                <td>
                                    <form action="hapus.php" method="post">
                                        <input type="hidden" name="idkeluhan" value="<?= $data['idkeluhan']; ?>">
                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                    </form>
                                </td>
                            <?php } ?>
                            </tr>
                    </table>
                </div>
            </div>
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
    <br>
    <br>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
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
<?php include 'footer.php'; ?>