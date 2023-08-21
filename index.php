<?php
ob_start();
require 'koneksi.php';
require 'functions.php';

session_start();
if (!isset($_SESSION['id_user'])) {
    $_SESSION['id_user'] = "PLG";
}

if ( strpos($_SESSION['id_user'], "PLG" ) !== false) {
    include 'page/pelanggan/index.php';
}
else if ( strpos($_SESSION['id_user'], "ADM" ) !== false) {
    include 'page/admin/index.php';
}

?>
