<?php 

require_once "core/init.php";

require_once "templates/header.php";

$id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] : false;
$user = isset($_SESSION['user']) ? $_SESSION['user'] : false;


?> 
<div class="container">

 <!-- Page Content -->
      <div class="row">
        <div class="col-lg-3">
          <h1 class="my-4">Shop Name</h1>
          <?php 
            require_once "list_kategori.php";
           ?>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">
          <?php 

            $query = "SELECT * FROM barang WHERE id_barang=$id_barang";
            $result = mysqli_query($koneksi,$query);
            $row = mysqli_fetch_assoc($result);
            $nama_barang = $row['nama_barang'];
            $spesifikasi = '';
            $gambar = $row['gambar'];
            $harga = $row['harga'];

           ?>
          <div class="card mt-4">
            <div class="text-center">
              <img class="img-fluid" src="<?= 'image/barang/'.$gambar; ?>" alt="" width="500px">
            </div>
            <div class="card-body">
              <h3 class="card-title"><?= $nama_barang; ?></h3>
              <div class="clearfix">
                <div class="float-left">   
                  <h4><?= rupiah($harga); ?></h4>
                </div>
                <div class="float-right">
                  <a href="tambah_keranjang.php?id_barang=<?= $row['id_barang']; ?>" class="btn btn-primary btn-sm">Add to cart</a>    
                </div>
              </div>
              <p class="card-text"><?= $spesifikasi; ?></p>

            </div>
          </div>



          <!-- /.card -->
        </div>
        <!-- /.col-lg-9 -->
      </div>
    </div>
    <!-- /.container -->
<?php require_once "templates/footer.php"; ?>    