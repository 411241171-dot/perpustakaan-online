<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

include '../config/koneksi.php';

$id = $_GET['id'];

// Ambil id buku
$data = mysqli_query($koneksi,
"SELECT id_buku FROM transaksi
WHERE id_transaksi='$id'");

$transaksi = mysqli_fetch_assoc($data);

$id_buku = $transaksi['id_buku'];

// Hapus transaksi
$query = mysqli_query($koneksi,
"DELETE FROM transaksi
WHERE id_transaksi='$id'");

if($query){

    // Kembalikan stok buku
    mysqli_query($koneksi,
    "UPDATE buku
    SET stok = stok + 1
    WHERE id_buku='$id_buku'");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

<script>

Swal.fire({
    icon:'success',
    title:'Berhasil!',
    text:'Transaksi berhasil dihapus.',
    confirmButtonColor:'#ff8fb1'
}).then(() => {
    window.location='index.php';
});

</script>

</body>
</html>

<?php
exit;

}else{
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

<script>

Swal.fire({
    icon:'error',
    title:'Gagal!',
    text:'Transaksi gagal dihapus.',
    confirmButtonColor:'#ff8fb1'
}).then(() => {
    window.location='index.php';
});

</script>

</body>
</html>

<?php
exit;

}
?>