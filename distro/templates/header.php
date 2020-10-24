<?php 

$page = isset($_GET['page']) ? $_GET['page'] : false;
$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
$search = isset($_GET['search']) ? $_GET['search'] : false;

$totalKeranjang = count($keranjang);

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />

    <!-- Bootstrap core CSS -->
    <link href="templates/vendor/bootstrap/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="templates/ui-kit/css/bootstrap.min.css" rel="stylesheet">

     <!-- sweetalert CSS -->
    <link href="templates/js/sweetalert2/package/dist/sweetalert2.min.css">

    <!-- now ui kit -->
    <!-- <link href="templates/ui-kit/css/now-ui-kit.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="templates/css/shop-homepage.css" rel="stylesheet">

    <script src="templates/js/sweetalert2/package/dist/sweetalert2.all.min.js"></script>
    <script src="templates/js/sweetalert2/package/dist/sweetalert2.min.js"></script>
    <script src="templates/js/script.js"></script>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <form action="" method="GET">
                <input class="form-control" type="search" name="search" placeholder="Search brand, name">
              </form>
            </li>

              <li class="nav-item mr-1 ml-2">
                  <a class="nav-link" href="keranjang.php">
                    <img src="image/cart.png">
                    <?php if($totalKeranjang != 0) : ?>                     
                        <span class="badge badge-dark keranjang"><?= $totalKeranjang; ?></span>                      
                    <?php endif; ?>
                  </a>
              </li>
<!--             <?php if(isset($_SESSION['user'])) : ?>
              <li class="nav-item">
                <a class="nav-link" href="profile.php">Profile</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="logout.php">Logout</a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                  <a class="nav-link" href="register.php">Daftar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
                </li>
            <?php endif; ?> -->
          </ul>
        </div>
      </div>
    </nav>