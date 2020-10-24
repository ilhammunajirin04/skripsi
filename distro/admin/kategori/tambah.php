 <?php 

    require '../../functions/db.php';
    require '../templates/init_header.php';

    if(isset($_POST['submit'])){
      $kategori = $_POST['kategori'];
      $aktif = 1;

      $sql = "INSERT INTO kategori(kategori, aktif) VALUES('$kategori', '$aktif')";
      $query = mysqli_query($koneksi, $sql);
      $_SESSION['success'] = 'Kategori berhasil ditambahkan';
      header('Location: index.php');

    }

  ?>

 <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Tambah Kategori</h4>
            </div>
            <div class="card-body">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Nama Kategori</label>
                  <input type="text" name="kategori" class="form-control">
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-fill btn-sm">Tambah</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

 <?php require_once "../templates/footer.php"; ?>


