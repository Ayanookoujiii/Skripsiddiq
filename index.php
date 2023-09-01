<?php
session_start();
if (isset($_SESSION["login"])) {
    include 'headermember.php';
} else {
    include 'header.php';
}
?>

<div class="banner">
    <img src="images/1.jpg" class="img-responsive" alt="slide">
    <div class="welcome-message">
        <div class="wrap-info">
            <div class="information">
                <h1 class="animated fadeInDown" style="color: E8A9A9;">Selamat Datang di Kontrakan Triji</h1>
                <p class="animated fadeInUp" style="color: E8A9A9">Terjangkau, Bersih, Nyaman</p>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>