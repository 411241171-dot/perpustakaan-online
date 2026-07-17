<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/koneksi.php';


$id = $_GET['id'];


$data = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id'");

$buku = mysqli_fetch_assoc($data);



if(isset($_POST['update'])){

    $judul = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];
    $stok = $_POST['stok'];


    $update = mysqli_query($koneksi,

    "UPDATE buku SET
    judul_buku='$judul',
    penulis='$penulis',
    penerbit='$penerbit',
    tahun_terbit='$tahun',
    stok='$stok'

    WHERE id_buku='$id'"
    );


    if($update){

?>

<!DOCTYPE html>

<html>

<head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

<script>

Swal.fire({

icon:'success',

title:'Berhasil!',

text:'Data buku berhasil diubah.',

confirmButtonColor:'#ff8fb1'

}).then(()=>{

window.location='index.php';

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

<title>Edit Buku</title>

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
Edit Buku
</h2>

<p class="text-muted mb-4">
Ubah data buku sesuai kebutuhan.
</p>

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card shadow-sm border-0 rounded-4 p-4">

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Judul Buku</label>
                    <input
                        type="text"
                        name="judul_buku"
                        class="form-control"
                        value="<?= $buku['judul_buku']; ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <input
                        type="text"
                        name="penulis"
                        class="form-control"
                        value="<?= $buku['penulis']; ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Penerbit</label>
                    <input
                        type="text"
                        name="penerbit"
                        class="form-control"
                        value="<?= $buku['penerbit']; ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tahun Terbit</label>
                    <input
                        type="number"
                        name="tahun_terbit"
                        class="form-control"
                        value="<?= $buku['tahun_terbit']; ?>"
                        required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Stok</label>
                    <input
                        type="number"
                        name="stok"
                        class="form-control"
                        value="<?= $buku['stok']; ?>"
                        required>
                </div>

                <button
                    type="submit"
                    name="update"
                    class="btn btn-pink">
                    Update Buku
                </button>

                <a href="index.php" class="btn btn-secondary">
                    Batal
                </a>

            </form>

        </div>

    </div>

</div>


</div>
</body>

</html>