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
    <br>
    <br>
    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="welcome-message">
            <div class="wrap-info">
                <div class="information">
                    <center>
                        <h1>DATA MEMBER </h1>
                    </center>
                    <br>

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama_Member</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>No HP</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <?php include "fungsi.php";
                        $SQL = mysqli_query($conn, "SELECT * FROM user");
                        while ($data = mysqli_fetch_array($SQL)) {
                        ?>
                            <tr class="warning">
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['namalengkap']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['password']; ?></td>
                                <td><?php echo $data['nohp']; ?></td>
                                <td>
                                    <form action="hapus.php" method="post">
                                        <input type="hidden" name="iduser" value="<?= $data['id']; ?>">
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
<br>
<br>
<br>
<br>
<br>
<?php include 'footer.php'; ?>