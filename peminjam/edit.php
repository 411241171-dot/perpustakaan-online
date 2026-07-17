<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

include '../config/koneksi.php';


$id = $_GET['id'];


$query = mysqli_query($koneksi, 
"SELECT * FROM peminjam WHERE id_peminjam='$id'");


$data = mysqli_fetch_assoc($query);



if(isset($_POST['update'])){


    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $no_hp = $_POST['no_hp'];


    $update = mysqli_query($koneksi,


    "UPDATE peminjam SET

    nama='$nama',
    nim='$nim',
    jurusan='$jurusan',
    no_hp='$no_hp'

    WHERE id_peminjam='$id'"

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

text:'Data peminjam berhasil diubah.',

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

<title>Edit Peminjam</title>

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
Edit Peminjam
</h2>

<p class="text-muted mb-4">
Perbarui data peminjam di bawah ini.
</p>

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card shadow-sm border-0 rounded-4 p-4">

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input
                        type="text"
                        name="nama"
                        class="form-control"
                        value="<?= $data['nama']; ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input
                        type="text"
                        name="nim"
                        class="form-control"
                        value="<?= $data['nim']; ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <input
                        type="text"
                        name="jurusan"
                        class="form-control"
                        value="<?= $data['jurusan']; ?>"
                        required>
                </div>

                <div class="mb-4">
                    <label class="form-label">No. HP</label>
                    <input
                        type="text"
                        name="no_hp"
                        class="form-control"
                        value="<?= $data['no_hp']; ?>"
                        required>
                </div>

                <button
                    type="submit"
                    name="update"
                    class="btn btn-pink">
                    Update Peminjam
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