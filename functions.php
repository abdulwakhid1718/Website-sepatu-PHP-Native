<?php
require 'koneksi.php';

function executeQuery($query)
{
    global $con;
    $result = $con->query($query);
    return mysqli_affected_rows($con);
}

function getAllData($query)
{
    global $con;
    $result = $con->query($query);
    return $result;
}

function getOneData($query)
{
    global $con;
    $result = $con->query($query)->fetch_assoc();
    return $result;
}

function setPesan(String $pesan, String $tipe)
{
    $_SESSION['pesan'] = [
        'text' => $pesan,
        'tipe' => $tipe,
    ];
}

function getPesan()
{
    if ( isset($_SESSION['pesan']) ) {
        echo '<div class="message-box '.$_SESSION['pesan']['tipe'].'"><i class="fa-solid fa-circle-exclamation" style="margin-right: 5px;"></i>'.$_SESSION['pesan']['text'].'</div>';
        unset($_SESSION['pesan']);
    }
}

function uploadImage($files, $lokasigambar) 
{
    $namafile = $files['name'];
    $ukuran = $files['size'];
    $tempname = $files['tmp_name'];

    // cek apakah yg diupload adalah gambar
    $ex_valid = ['jpg', 'jpeg', 'png'];
    $ex_gambar = explode('.', $namafile);
    $ex_gambar = strtolower(end($ex_gambar));

    // mengacak nama dari gambar
    $namagambar = uniqid('', true) . '.' . $ex_gambar;

    if (!in_array($ex_gambar, $ex_valid)) {
        setPesan("Maaf Yang Anda Masukan Bukan", "error");
    }else {
        // filter ukuran gambar
        if ($ukuran > 5000000) {
            setPesan("Maaf Ukuran Gambar Terlalu Besar", "error");
        }else {
            // lolos pengecekan gambar siap diupload
            move_uploaded_file($tempname, $lokasigambar . $namagambar);
            return $namagambar;
        }
    }
}

function batasTextPanjang($text)
{
    $maxLength = 40;
    $truncationIndicator = "...";

    if (strlen($text) > $maxLength) {
        $truncatedtext = substr($text, 0, $maxLength - strlen($truncationIndicator)) . $truncationIndicator;
        return $truncatedtext;
    } else {
        return $text;
    }

}