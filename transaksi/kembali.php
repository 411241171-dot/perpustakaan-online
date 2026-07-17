<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

include '../config/koneksi.php';

$id = $_GET['id'];

// Ambil data transaksi
$data = mysqli_query($koneksi,

"SELECT id_buku, status
FROM transaksi
WHERE id_transaksi='$id'");

$transaksi = mysqli_fetch_assoc($data);

$id_buku = $transaksi['id_buku'];
$status = $transaksi['status'];

// Jika masih dipinjam
if($status=="Dipinjam"){

    // Update status
    mysqli_query($koneksi,

    "UPDATE transaksi
    SET status='Dikembalikan'
    WHERE id_transaksi='$id'");

    // Tambah stok buku
    mysqli_query($koneksi,

    "UPDATE buku
    SET stok = stok + 1
    WHERE id_buku='$id'");

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
    text:'Buku berhasil dikembalikan.',
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
    icon:'info',
    title:'Informasi',
    text:'Buku sudah dikembalikan sebelumnya.',
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