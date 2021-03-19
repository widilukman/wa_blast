<?php
session_start();
if (isset($_SESSION['nama']) && isset($_SESSION['kode'])) {
    unset($_SESSION['nama']);
    unset($_SESSION['kode']);
    session_destroy();
}
header('Location: ../web/login.php');