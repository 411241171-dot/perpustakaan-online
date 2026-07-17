<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi,
"DELETE FROM buku WHERE id_buku='$id'");

if($query){
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
    icon: 'success',
    title: 'Berhasil!',
    text: 'Data buku berhasil dihapus.',
    confirmButtonColor: '#ff8fb1'
}).then(() => {
    window.location = 'index.php';
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
    icon: 'error',
    title: 'Gagal!',
    text: 'Data buku gagal dihapus.',
    confirmButtonColor: '#ff8fb1'
}).then(() => {
    window.location = 'index.php';
});

</script>

</body>
</html>

<?php
exit;

}
?>