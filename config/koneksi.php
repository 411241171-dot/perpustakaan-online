<?php
$host = "sql302.infinityfree.com";
$user = "if0_42402913";
$password = "UOFjJC21hp5np";
$db   = "if0_42402913_perpustakaanonline";

$koneksi = mysqli_connect($host, $user, $password, $db);

if (!$koneksi) {
    die("Koneksi database gagal : " . mysqli_connect_error());
}
?>