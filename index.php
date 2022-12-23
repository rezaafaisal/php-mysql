<?php

require "koneksi.php";

$query = "SELECT * FROM catatan";

$hasil = mysqli_query($koneksi, $query);

$data = array();

while($row = mysqli_fetch_assoc($hasil)){
    array_push($data, $row);
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
                <h4>Catatan Saya</h4>
                <a href="tambah.php" class="btn btn-primary">Tambah Catatan</a>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Judul Catatan</th>
                  <th class="text-center">Catatan Lengkap</th>
                  <th class="text-center">Tanggal Unggah</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($data as $i => $row) : ?>
                <tr>
                  <td><?= $i+1 ?></td>
                  <td><?= $row['judul'] ?></td>
                  <td><?= substr($row['catatan_lengkap'], 0, 200) ?></td>
                  <td><?= $row['tanggal_unggah'] ?></td>
                  <td>
                    <div class="d-flex gap-2">
                      <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-success">Lihat</a>
                      <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-info">Edit</a>
                      <button class="btn btn-sm btn-danger">Hapus</button>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
