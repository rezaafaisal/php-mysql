<?php

require "koneksi.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM catatan WHERE id = '$id'";
    $hasil = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($hasil);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplikasi Catatan</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <!-- <div class="col-8">
                <div class="card">
                    <div class="card-header">Catatan Saya</div>
                    <div class="card-body">
                        Ii adalah deskripsi catatan saya
                    </div>
                </div>
            </div> -->
      <div class="col-12 mt-5">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4>Catatan Lengkap Saya</h4>
                <a href="index.php" class="btn btn-primary">Kembali</a>
            </div>
          </div>
          <div class="card-body">
           <h6><?= $data['judul'] ?></h6>
           <p>
            <?= $data['catatan_lengkap'] ?>
           </p>
          </div>
        </div>

      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
