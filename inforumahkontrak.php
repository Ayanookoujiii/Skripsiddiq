<?php
session_start();
if (isset($_SESSION["login"])) {
  include 'headermember.php';
} else {
  include 'header.php';
}
?>

<div class="container">
  <h2>Info Kontrakan</h2>
  <div>
    <?php include "fungsi.php";
    $SQL = mysqli_query($conn, "SELECT * FROM rumah");
    if (isset($_SESSION['login'])) $iduser = $_SESSION['login'];
    else $iduser = '';
    while ($data = mysqli_fetch_array($SQL)) {
    ?>
      <div class="col-sm-6 wowload fadeInUp">
        <div class="rooms">
          <img src="images/upload/<?php echo $data['foto']; ?>" class="img-responsive">
          <div class="info">
            <h3>Rumah <?php echo $data['nomorrumah']; ?> </h3>
            <p>Deskripsi : <?php echo $data['Deskripsi']; ?></p>
            <p>Status : <?php echo $data['status_rumah']; ?> </p>
            <h3>Rp.<?php echo $data['harga']; ?>/Tahun </h3>
            <div style="display: flex;">

              <form action="booking.php" method="POST">
                <input type="hidden" name="rumah" value="<?php echo $data['idrumah']; ?>">
                <button type="submit" name="pesan" class="btn btn-primary " style="margin-left:3px" <?php if (!isset($_SESSION['login']) or $data['status_rumah'] == 'Tidak Tersedia') : ?> disabled <?php endif; ?>>Pesan</button>
              </form>


              <form action="bayar.php" method="POST">
                <input type="hidden" name="rumah" value="<?php echo $data['idrumah']; ?>">
                <button type="submit" class="btn btn-success" style="margin-left:3px" <?php if (!isset($_SESSION['login']) or $iduser != $data['iduser']) : ?> disabled <?php endif; ?>>Pembayaran</button>
              </form>
              <form action="keluhan.php" method="POST">
                <input type="hidden" name="rumah" value="<?php echo $data['idrumah']; ?>">
                <button type="submit" name="keluhan" class="btn btn-warning" style="margin-left:3px" <?php if (!isset($_SESSION['login']) or $iduser != $data['iduser']) : ?> disabled <?php endif; ?>>Keluhan</button>
              </form>

            </div>
          </div>
        </div>
      </div>
    <?php } ?>
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