<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

include '../config/koneksi.php';


$query = mysqli_query($koneksi,

"SELECT transaksi.*, 
peminjam.nama,
buku.judul_buku

FROM transaksi

JOIN peminjam 
ON transaksi.id_peminjam = peminjam.id_peminjam

JOIN buku
ON transaksi.id_buku = buku.id_buku"

);

?>


<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Transaksi Peminjaman</title>

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


<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1"> <img src="https://i.pinimg.com/736x/d9/74/12/d974126a7e28ccb7454dd0ff7d2b28a6.jpg" class="dashboard-card">
            Data Transaksi
        </h2>

        <p class="text-muted">
            Kelola seluruh transaksi peminjaman buku.
        </p>

    </div>

    <a href="tambah.php" class="btn btn-pink">
        + Tambah Transaksi
    </a>

</div>




<div class="card shadow-sm border-0 rounded-4 p-4">

<div class="table-responsive">

<table class="table table-hover table-bordered align-middle">


<thead class="table-custom">

<tr>

<th>No</th>
<th>Peminjam</th>
<th>Buku</th>
<th>Tanggal Pinjam</th>
<th>Tanggal Kembali</th>
<th>Status</th>
<th width="220">Aksi</th>

</tr>

</thead>



<?php

$no=1;

while($data=mysqli_fetch_assoc($query)){

?>


<tr>

<td><?= $no++; ?></td>

<td><?= $data['nama']; ?></td>

<td><?= $data['judul_buku']; ?></td>

<td><?= $data['tanggal_pinjam']; ?></td>

<td><?= $data['tanggal_kembali']; ?></td>

<td class="text-center">

<?php if($data['status']=="Dipinjam"){ ?>

<span class="badge btn btn-pink text-dark">
    Dipinjam
</span>

<?php }else{ ?>

<span class="badge btn btn-pink">
    Dikembalikan
</span>

<?php } ?>

</td>


<td class="text-center">

<?php if($data['status']=="Dipinjam"){ ?>

<a href="kembali.php?id=<?= $data['id_transaksi']; ?>"
   class="btn btn-pinkk btn-sm">
    Kembalikan
</a>

<?php }else{ ?>

<button class="btn btn-pinkk btn-sm" disabled>
    ✓ Selesai
</button>

<?php } ?>

<a href="#"
   class="btn btn-secondary btn-sm"
   onclick="hapusData('hapus.php?id=<?= $data['id_transaksi']; ?>')">
    Hapus
</a>
</td>


</tr>


<?php } ?>


</table>
</div>

</div>

<br>

<a href="../index.php" class="btn btn-secondary mt-3">
    ← Kembali ke Dashboard
</a>


</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

function hapusData(url){

    Swal.fire({

        title:'Yakin ingin menghapus?',

        text:'Data yang dihapus tidak dapat dikembalikan.',

        icon:'warning',

        showCancelButton:true,

        confirmButtonColor:'#ff8fb1',

        cancelButtonColor:'#6c757d',

        confirmButtonText:'Ya, Hapus',

        cancelButtonText:'Batal'

    }).then((result)=>{

        if(result.isConfirmed){

            window.location=url;

        }

    });

}

</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

function hapusData(url){

    Swal.fire({

        title:'Yakin ingin menghapus?',

        text:'Data yang dihapus tidak dapat dikembalikan.',

        icon:'warning',

        showCancelButton:true,

        confirmButtonColor:'#ff8fb1',

        cancelButtonColor:'#6c757d',

        confirmButtonText:'Ya, Hapus',

        cancelButtonText:'Batal'

    }).then((result)=>{

        if(result.isConfirmed){

            window.location=url;

        }

    });

}

</script>
</body>

</html>