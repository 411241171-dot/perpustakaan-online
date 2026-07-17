<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

include '../config/koneksi.php';



$peminjam = mysqli_query($koneksi, "SELECT * FROM peminjam");

$buku = mysqli_query($koneksi, "SELECT * FROM buku");



if(isset($_POST['simpan'])){


    $id_peminjam = $_POST['id_peminjam'];
    $id_buku = $_POST['id_buku'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $status = "Dipinjam";



    // Simpan transaksi

$query = mysqli_query($koneksi,


"INSERT INTO transaksi

(id_peminjam, id_buku, tanggal_pinjam, tanggal_kembali, status)

VALUES

('$id_peminjam',
'$id_buku',
'$tanggal_pinjam',
'$tanggal_kembali',
'$status')"

);



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
    icon:'success',
    title:'Berhasil!',
    text:'Data transaksi berhasil ditambahkan.',
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
    text:'Data transaksi gagal ditambahkan.',
    confirmButtonColor:'#ff8fb1'
}).then(() => {
    history.back();
});

</script>

</body>
</html>

<?php
exit;

}


}


?>


<!DOCTYPE html>
<html>


<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Tambah Transaksi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="../css/dashboard.css">

</head>


<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm">

<div class="container">

<a class="navbar-brand fw-bold" href="../index.php">
<img src="../logo.png" class="logo-navbar">
Sistem Informasi Perpustakaan

</a>

</div>

</nav>

<div class="container">


<h2 class="fw-bold mb-1">
Tambah Transaksi
</h2>

<p class="text-muted mb-4">
Silakan isi data transaksi peminjaman buku.
</p>

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card shadow-sm border-0 rounded-4 p-4">

<form method="POST">

<div class="mb-3">

<label class="form-label">
Peminjam
</label>

<select name="id_peminjam" class="form-select" required>

<option value="">
-- Pilih Peminjam --
</option>

<?php while($p = mysqli_fetch_assoc($peminjam)){ ?>

<option value="<?= $p['id_peminjam']; ?>">
<?= $p['nama']; ?>
</option>

<?php } ?>

</select>

</div>



<div class="mb-3">

<label class="form-label">
Buku
</label>

<select name="id_buku" class="form-select" required>

<option value="">
-- Pilih Buku --
</option>

<?php while($b = mysqli_fetch_assoc($buku)){ ?>

<option value="<?= $b['id_buku']; ?>">
<?= $b['judul_buku']; ?>
</option>

<?php } ?>

</select>

</div>



<div class="mb-3">

<label class="form-label">
Tanggal Pinjam
</label>

<input
type="date"
name="tanggal_pinjam"
class="form-control"
required>

</div>



<div class="mb-4">

<label class="form-label">
Tanggal Kembali
</label>

<input
type="date"
name="tanggal_kembali"
class="form-control">

</div>

<button
type="submit"
name="simpan"
class="btn btn-pink">

Simpan Transaksi

</button>

<a
href="index.php"
class="btn btn-secondary">

Batal

</a>

</form>

</div>

</div>

</div>


</div>


</body>


</html>