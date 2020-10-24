<?php 
  
  require_once "core/init.php";

  require_once "templates/header.php";

 ?>

<div class="container">
    <div class="row">
      <div class="col-lg-3">
        <h1 class="my-4">Ilham Shop</h1>

        <?php 
          require_once "list_kategori.php";
         ?>

      <?php 
        $queryBanner = "SELECT * FROM banner WHERE status='on' ORDER BY id_banner DESC LIMIT 3";
        $result = mysqli_query($koneksi, $queryBanner);
       ?>

      <div class="col-lg-9">
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <?php 
              $i = 1;
              while($row = mysqli_fetch_assoc($result)) : 
                $banner = $row['banner'];
                $gambar = $row['gambar'];
                $gambar = 'image/banner/'.$gambar;
            ?>    
                <div class="carousel-item <?php if($i <= 1) { ?> active <?php } ?>">
                  <img class="d-block img-fluid" src="<?= $gambar; ?>" alt="<?= $banner; ?>">
                </div>
            <?php 
              $i++;
              endwhile; 
            ?>
          </div>  
          <ol class="carousel-indicators">
            <?php 
              $j = 0;
              while( $j < $rows = mysqli_num_rows($result)) : 
            ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $j; ?>" <?php if($j <= 0) { ?> class="active" <?php } ?>></li>
              <?php 
              $j++;
              endwhile; 
            ?>
          </ol>
          
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div> 

        <div class="row">
          <?php 
            if($id_kategori){
              $queryBarang = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' AND id_kategori = '$id_kategori' ORDER BY rand() DESC LIMIT 9");
            }elseif($search){
              //query barang
              $queryBarang = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' AND nama_barang LIKE '%$search%' ORDER BY rand() DESC LIMIT 9");
            }
            else{
              $queryBarang = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' ORDER BY rand() DESC LIMIT 9");
            } 
         ?>

          <?php while($rowBarang = mysqli_fetch_assoc($queryBarang)) : 

            $nama_barang = $rowBarang['nama_barang'];
            $id_barang = $rowBarang['id_barang'];
            $gambar = $rowBarang['gambar'];
            $stok = $rowBarang['stok'];
            $harga = $rowBarang['harga'];

            $gambar = 'image/barang/'.$gambar;

          ?>            
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="item.php?id_barang=<?= $id_barang; ?>"><img class="card-img-top" src="<?= $gambar; ?>" alt=""></a>
                <div class="card-body text-center">
                  <h6 class="card-title">
                    <a href="item.php?id_barang=<?= $id_barang; ?>"><?= $nama_barang; ?></a>
                  </h6>
                  <p>Stok : <?= $stok; ?></p>
                  <p class="card-text"><?= rupiah($harga); ?></p>
                <a href="tambah_keranjang.php?id_barang=<?= $rowBarang['id_barang']; ?>" class="btn btn-primary btn-sm">Add to Cart</a>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.col-lg-9 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</div>    

<?php require_once "templates/footer.php"; ?>