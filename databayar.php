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
                        <h1>DATA PEMBAYARAN </h1>
                    </center>
                    <br>
                    <br>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID Pembayaran</th>
                                <th>Nama Lengkap</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Nominal</th>
                                <th>Bukti Pembayaran</th>
                                <th>Tanggal Selesai</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <?php include "fungsi.php";
                        $query = mysqli_query($conn, "SELECT * FROM bayar INNER JOIN rumah ON bayar.idrumah = rumah.idrumah INNER JOIN user ON bayar.iduser = user.id");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr class="warning">
                                <td><?php echo $data['idbayar']; ?></td>
                                <td><?php echo $data['namalengkap']; ?></td>
                                <td><?php echo $data['tanggalbayar']; ?></td>
                                <td><?php echo $data['nominal']; ?></td>
                                <td><img style="width:100px; height:auto;" src="images/bukti/<?php echo $data['bukti']; ?>"></td>
                                <td><?php echo $data['tanggalselesai']; ?></td>
                                <td><?php echo $data['status']; ?></td>
                                <td>
                                    <a class="btn btn-primary mb-2" href=editbayar.php?idbayar=<?php echo $data['idbayar']; ?>>Edit</a>
                                    <form action="hapus.php" method="post">
                                        <input type="hidden" name="idbayar" value="<?= $data['idbayar']; ?>">
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
<br>
<?php include 'footer.php'; ?>