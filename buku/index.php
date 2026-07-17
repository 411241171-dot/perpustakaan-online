<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/koneksi.php';

if(isset($_GET['cari'])){

    $keyword = $_GET['keyword'];

    $query = mysqli_query($koneksi,

    "SELECT * FROM buku
    WHERE judul_buku LIKE '%$keyword%'");

}else{

    $query = mysqli_query($koneksi,
    "SELECT * FROM buku");

}

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Buku</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="../css/style.css">

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

<h2 class="fw-bold mb-1"><img src="https://i.pinimg.com/736x/06/67/26/066726213ef8a4d2bb0ab5efb0c97884.jpg" class="logo-navbar">
Data Buku
</h2>

<p class="text-muted">
Kelola seluruh data buku perpustakaan.
</p>

</div>

<a href="tambah.php" class="btn btn-pink">

+ Tambah Buku

</a>

</div>
<div class="card shadow-sm border-0 rounded-4 p-3 mb-4">

<form method="GET">

<div class="row g-2">

<div class="col-md-8">

<input
type="text"
name="keyword"
class="form-control"
placeholder="Cari judul buku..."
value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">

</div>

<div class="col-md-2">

<button
type="submit"
name="cari"
class="btn btn-pink w-100">

Cari

</button>

</div>

<div class="col-md-2">

<a
href="index.php"
class="btn btn-secondary w-100">

Reset

</a>

</div>

</div>

</form>

</div>
<br><br>

<div class="card shadow-sm border-0 rounded-4 p-4">

<div class="table-responsive">

<table class="table table-hover table-bordered align-middle">

<thead class="table-custom">

<tr>

<th>No</th>
<th>Judul Buku</th>
<th>Penulis</th>
<th>Penerbit</th>
<th>Tahun</th>
<th>Stok</th>
<th width="170">Aksi</th>

</tr>

</thead>


<?php

$no = 1;

while($data = mysqli_fetch_assoc($query)){

?>

<tr>

<td class="text-center">
    <?= $no++; ?>
</td>

<td><?= $data['judul_buku']; ?></td>

<td><?= $data['penulis']; ?></td>

<td><?= $data['penerbit']; ?></td>

<td><?= $data['tahun_terbit']; ?></td>

<td class="text-center">

<?php if($data['stok'] > 5){ ?>

<span class="badge btn btn-pink">
<?= $data['stok']; ?>
</span>

<?php }else{ ?>

<span class="badge bg-danger">
<?= $data['stok']; ?>
</span>

<?php } ?>

</td>

<td class="text-center">

<a href="edit.php?id=<?= $data['id_buku']; ?>" class="btn btn-pinkk btn-sm">
    Edit
</a>

<a href="#"
   class="btn btn-secondary btn-sm"
   onclick="hapusData('hapus.php?id=<?= $data['id_buku']; ?>')">
    Hapus
</a>

</td>

</tr>


<?php

}

?>


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
</body>
</html>