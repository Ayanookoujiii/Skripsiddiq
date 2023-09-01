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
    <style>
        td {
            word-wrap: break-word;
            white-space: normal;
        }
    </style>

</head>

<body>
    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="welcome-message">
            <div class="wrap-info">
                <div class="information">
                    <div class="container">
                        <br>
                        <br>
                        <br>
                        <center>
                            <h1>DATA RUMAH</h1>
                        </center>
                        <br>
                        <br>
                        <div class="row justify-content-end">
                            <div class="col-md-3 text-right">
                                <a href="tambahrumah.php" class="btn btn-warning mt-3 mb-3"><i class="fa fa-plus"></i> Tambah Data</a>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID Rumah</th>
                                        <th>Nomor Rumah</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th>Harga</th>
                                        <th>Foto</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <?php include "fungsi.php";
                                $SQL = mysqli_query($conn, "SELECT * FROM rumah");
                                while ($data = mysqli_fetch_array($SQL)) {
                                ?>
                                    <tr class="warning">
                                        <td><?php echo $data['idrumah']; ?></td>
                                        <td><?php echo $data['nomorrumah']; ?></td>
                                        <td><?php echo $data['Deskripsi']; ?></td>
                                        <td><?php echo $data['status_rumah']; ?></td>
                                        <td><?php echo $data['harga']; ?></td>
                                        <td><img style="width:100px; height:auto;" src="images/upload/<?php echo $data['foto']; ?>"></td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center">
                                                <a class="btn btn-sm btn-primary mr-2" href="editrumah.php?idrumah=<?php echo $data['idrumah']; ?>">Edit</a>
                                                <form action="hapus.php" method="post">
                                                    <input type="hidden" name="idrumah" value="<?= $data['idrumah']; ?>">
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include 'footer.php'; ?>