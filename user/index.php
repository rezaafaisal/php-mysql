<?php 
    require "../fungsi.php";
    $data = show_all();
    session_start();

    if(isset($_POST['logout'])){
        session_destroy();
        header('location:../auth/login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catatan Pengguna</title>
  <?php 
        include "../partials/asset_header.php" ;
    ?>

</head>

<body>
  <?php 
        if(!isset($_SESSION['name'])){
            // opsi pertama
            echo "
                <script>
                    Swal.fire({
                        icon: 'warning',
                        text: 'Silahkan login terlebih dahulu',
                        title:'Gagal Login'
                    }).then((e)=>{
                        window.location.href = '../auth/login.php'
                    });
                </script>
            ";
            // opsi kedua
            header("location:../auth/login.php");
            die();
        } 
    ?>
  <div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Notebook App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
          aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Catatan Lainnya</a>
            </li>
          </ul>
          <span class="navbar-text">
            <button onclick="logout()" class="btn btn-outline-danger">Keluar</button>
          </span>
        </div>
      </div>
    </nav>
    <h3 class="mt-5">Selamat Datang, <?= $_SESSION['name'] ?></h3>
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
  <?php 
        include "../partials/asset_footer.php" ;
    ?>
    

    <form id="form_logout" action="" method="post">
        <input type="hidden" name="logout">
    </form>
    <script>
        function logout(){
            Swal.fire({
                title:'Yakin keluar?',
                icon: 'question',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                cancelButtonColor: '#dc3545'
            }).then((e) => {
                if(e.isConfirmed){
                    $('#form_logout').submit()
                }
            })
        }
    </script>
</body>

</html>
