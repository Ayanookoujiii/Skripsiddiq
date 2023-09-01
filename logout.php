<?php
session_start();
if (isset($_SESSION['login'])) {
    $_SESSION = [];
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

if (isset($_SESSION['login1'])) {
    $_SESSION = [];
    session_unset();
    session_destroy();

    header("Location: index.php");
    exit;
}
