<?php

include 'config/koneksi.php';

$totalBuku = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM buku"));

$totalPeminjam = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM peminjam"));

$totalTransaksi = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM transaksi"));
$bukuDipinjam = mysqli_num_rows(mysqli_query(
    $koneksi,
    "SELECT * FROM transaksi WHERE status='Dipinjam'"
));

$bukuTersedia = mysqli_num_rows(mysqli_query(
    $koneksi,
    "SELECT * FROM buku WHERE stok > 0"
));
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Sistem Informasi Perpustakaan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">
             <img src="logo.png" class="logo-navbar">

            Sistem Informasi Perpustakaan
        </a>
    </div>
</nav>
<h2 class="text-center mt-4 mb-5 fw-bold">
Dashboard Perpustakaan
</h2>

<div class="row g-4">

    <div class="col-md-4">

        <div class="card p-4 text-center shadow">

            <img src="https://i.pinimg.com/736x/06/67/26/066726213ef8a4d2bb0ab5efb0c97884.jpg" class="dashboard-card">

            <h4>Data Buku</h4>

<h2 class="fw-bold angka-buku">
<?= $totalBuku; ?>
</h2>

<p>Total Buku</p>

            <a href="buku/index.php" class="btn btn-pink">
                Kelola Buku
            </a>

        </div>

    </div>



    <div class="col-md-4">

        <div class="card p-4 text-center shadow">

            <img src="https://i.pinimg.com/736x/7a/a6/69/7aa6690c0ddc5e42275c8c0f6fbaa703.jpg" class="dashboard-card">

            <h4>Data Peminjam</h4>

<h2 class="fw-bold angka-peminjam">
<?= $totalPeminjam; ?>
</h2>

<p>Total Peminjam</p>

            <a href="peminjam/index.php" class="btn btn-pinkk">
                Kelola Peminjam
            </a>

        </div>

    </div>



    <div class="col-md-4">

        <div class="card p-4 text-center shadow">

            <img src="https://i.pinimg.com/736x/d9/74/12/d974126a7e28ccb7454dd0ff7d2b28a6.jpg" class="dashboard-card">

            <h4>Transaksi</h4>

<h2 class="fw-bold angka-transaksi">
<?= $totalTransaksi; ?>
</h2>

<p>Total Transaksi</p>

            <a href="transaksi/index.php" class="btn btn-pink text-white">
                Kelola Transaksi
            </a>

        </div>

    </div>

</div>
<h3 class="text-center mt-5 mb-4">
    Informasi Perpustakaan
</h3>

<div class="row g-3">

    <div class="col-md-3">
        <div class="card text-center p-3">
            <h2><?= $totalBuku; ?></h2>
            <p>Total Buku</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center p-3">
            <h2><?= $totalPeminjam; ?></h2>
            <p>Total Peminjam</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center p-3">
            <h2><?= $bukuDipinjam; ?></h2>
            <p>Buku Dipinjam</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center p-3">
            <h2><?= $bukuTersedia; ?></h2>
            <p>Buku Tersedia</p>
        </div>
    </div>

</div>
</body>
</html>