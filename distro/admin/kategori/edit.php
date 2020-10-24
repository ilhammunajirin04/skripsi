 <?php 

    require '../../functions/db.php';
    require '../templates/init_header.php';

    $id_kategori = $_GET['id_kategori'];

    if(isset($_POST['submit'])){
      $kategori = $_POST['kategori'];
      $aktif = $_POST['aktif'];

      $sql = "UPDATE kategori SET kategori = '$kategori', 
                                aktif = '$aktif' 
                                WHERE id_kategori = $id_kategori";
      $query = mysqli_query($koneksi, $sql);
      $_SESSION['success'] = 'Kategori berhasil ditambahkan';
      header('Location: index.php');

    }

    $query_kategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori = $id_kategori");
    $row = mysqli_fetch_assoc($query_kategori);

  ?>

 <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Edit Kategori</h4>
            </div>
            <div class="card-body">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Nama Kategori</label>
                  <input type="text" name="kategori" class="form-control" value="<?php echo $row['kategori']; ?>">
                </div>

                <div class="form-group">
                    <label>Status</label>  <br> 
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="aktif" id="inlineRadio1" value="1" <?= ($row['aktif'] == '1') ? 'checked' : ''; ?>>
                      <label class="form-check-label" for="inlineRadio1" >Aktif</label>
                    </div>
                    <br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="aktif" id="inlineRadio2" value="0" <?= ($row['aktif'] == '0') ? 'checked' : ''; ?>>
                      <label class="form-check-label" for="inlineRadio2">Tidak Aktif</label>
                    </div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-fill btn-sm">Edit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

 <?php require_once "../templates/footer.php"; ?>


