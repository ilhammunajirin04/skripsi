 <?php 

    require '../../functions/db.php';
    require '../templates/init_header.php';

    $id_pesanan = $_GET['id_pesanan'];
    if(isset($_POST['submit'])){
      $status = $_POST['status'];
      $sql = "UPDATE pesanan SET status = '$status' WHERE id_pesanan = $id_pesanan";
      $query = mysqli_query($koneksi, $sql);
      $_SESSION['success'] = 'Pesanan berhasil diupdate';
      header('Location: index.php');

    }

    $query_pesanan = mysqli_query($koneksi, "SELECT status FROM pesanan WHERE id_pesanan=$id_pesanan");
    $row_pesanan = mysqli_fetch_assoc($query_pesanan);
  ?>

 <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Ubah Status</h4>
            </div>
            <div class="card-body">
              <form action="" method="POST">
                <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control">
                    <?php if($status == 1) : ?>
                      <option value="1" selected>Sudah Bayar</option>
                      <option value="2">Belum Bayar</option>
                    <?php else : ?>
                      <option value="1">Sudah Bayar</option>
                      <option value="2" selected>Belum Bayar</option>
                    <?php endif; ?>
                  </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-fill btn-sm">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

 <?php require_once "../templates/footer.php"; ?>


