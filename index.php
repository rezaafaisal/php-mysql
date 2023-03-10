<?php

require "fungsi.php";
$data = show_all();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplikasi Catatan</title>
  <?php 
     include "partials/asset_header.php"
  ?>
</head>

<body>
  
  <?php 
    if(isset($_GET['sukses_hapus'])){
      echo "
      <script>
        Swal.fire(
          'Terhapus!',
          'Catatan telah dihapus',
          'success'
        ).then((e) => {
          if(e.isConfirmed){
            window.location.href='index.php'
          }
        });
      </script>
      ";
    } 

    if(isset($_GET['sukses_tambah'])){
      echo "
      <script>
        Swal.fire(
          'Berhasil!',
          'Catatan telah ditambah',
          'success'
        ).then((e) => {
          if(e.isConfirmed){
            window.location.href='index.php'
          }
        });
      </script>
      ";
    } 
    if(isset($_GET['sukses_update'])){
      echo "
      <script>
        Swal.fire(
          'Berhasil!',
          'Catatan telah diupdate',
          'success'
        ).then((e) => {
          if(e.isConfirmed){
            window.location.href='index.php'
          }
        });
      </script>
      ";
    } 
  ?>
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
            <table class="table table-bordered" id="datatable">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Thumbnail</th>
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
                  <td><img src="img/<?= ($row['gambar'] != null) ? $row['gambar'] : 'images.jpeg' ?>" alt="" height="50px" width="50px"></td>
                  <td><?= $row['judul'] ?></td>
                  <td><?= substr($row['catatan_lengkap'], 0, 200) ?></td>
                  <td><?= $row['tanggal_unggah'] ?></td>
                  <td>
                    <div class="d-flex gap-2">
                      <?php 
                        $id = $row['id']; 
                      ?>
                      <a href="detail.php?id=<?= $id ?>" class="btn btn-sm btn-success">Lihat</a>
                      <a href="edit.php?id=<?= $id; ?>" class="btn btn-sm btn-info">Edit</a>
                      <button onclick="konfirmasiHapus('<?= $id ?>')" class="delete btn btn-sm btn-danger">Hapus</button>
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

  <form id="hapus_catatan" action="hapus.php" method="POST">
      <input id="form_delete_id" type="hidden" name="id_hapus" value="">
  </form>

  <?php 
     include "partials/asset_footer.php"
  ?>
  <script>
    $('#datatable').DataTable();
    function konfirmasiHapus(id){
      const formDelete = document.getElementById('hapus_catatan');
      const inputDelete = document.getElementById('form_delete_id');
      inputDelete.setAttribute("value", id);
        Swal.fire({
          title: 'Anda yakin?',
          text: "Catatan akan dihapus secara permanen!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Batal',
          confirmButtonText: 'Hapus!'
        }).then((result) => {
          if (result.isConfirmed) {
            formDelete.submit();
        }
    })
    }
  </script>
</body>

</html>
