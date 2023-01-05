<?php 
    require "../fungsi.php";
    $data = show_all();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan Pengguna</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h3>Selamat Datang, User</h3>
        <div class="row mt-5">
            <?php 
                foreach ($data as $i => $note) :
            ?>
            <div class="col-12 col-md-6 col-lg-4 mb-3">
                <div class="card">
                    <div class="card-header"><?= $note['judul'] ?></div>
                    <div class="card-body">
                        <?= substr($note['catatan_lengkap'], 0, 100) ?>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-sm btn-primary">Lihat Catatan</button>
                    </div>
                </div>
            </div>
            <?php 
                endforeach; 
            ?>
        </div>
    </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>