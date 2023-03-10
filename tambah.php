<?php 
    require "fungsi.php";
     if (isset($_POST['submit'])) {
        insert_note($_POST, $_FILES);
     }



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>To Do App</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <?php 
                          if(isset($_GET['image_error'])){
                            echo "
                                    <div class='alert alert-danger text-center'>
                                        Format gambar tidak sesuai!!
                                    </div>
                                ";
                          }
                        if(isset($_POST['submit'])){
                          if($_POST['judul_catatan'] != null && $_POST['catatan'] != null){
                                if(mysqli_affected_rows($koneksi) > 0){
                                echo "
                                    <script>
                                        alert('Data berhasil ditambah!');
                                    </script>
                                ";
                                }
                            }

                            else{
                                echo "
                                    <div class='alert alert-danger text-center'>
                                        Data tidak boleh kosong, silahkan isi terlebih dahulu!!
                                    </div>
                                ";
                            }
                        }
                    ?>
                    
                </div>
                
            </div>
        </div>
      <div class="col-12 col-md-8 col-lg-6">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <h5>Tambah Catatan</h5>
              <a href="index.php" class="btn btn-primary">Kembali</a>
            </div>
          </div>
          <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label class="form-label" for="judul_catatan">Judul Catatan</label>
                <input type="text" name="judul_catatan" id="judul_catatan" class="form-control"
                  placeholder="Masukkan Judul Catatan">
              </div>
              <div class="mb-3">
                <label class="form-label" for="gambar_catatan">Thumbnail</label>
                <input type="file" name="gambar_catatan" id="gambar_catatan" class="form-control">
              </div>
              <div class="mb-3">
                <label for="catatan" class="form-label">Catatan</label>
                <textarea name="catatan" id="catatan" rows="5" class="form-control"
                  placeholder="Ketikkan Catatan Anda"></textarea>
              </div>
              <div class="mb-3">
                <button name="submit" class="btn btn-success">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
