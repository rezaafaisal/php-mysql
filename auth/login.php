<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        include "../partials/asset_header.php" 
    ?>
</head>
<body class="vh-100">
    
<div class="container vh-100">
    <div class="row vh-100 justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form action="">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Masukkan email anda">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukkan password anda">
                        </div>
                        <div class="mb-3 text-end">
                            <button class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php 
        include "../partials/asset_footer.php" 
    ?>
</body>
</html>