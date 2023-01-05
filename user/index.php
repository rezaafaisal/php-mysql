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
    <?php 
        session_start();
        include "../partials/asset_header.php" ;
    ?>
</head>
<body>
    <div class="container">
        <h3>Selamat Datang, <?= $_SESSION['name'] ?></h3>
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
    <<?php 
        include "../partials/asset_footer.php" ;
    ?>
</body>
</html>