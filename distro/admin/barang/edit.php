 <?php 

    require '../../functions/db.php';
    require '../templates/init_header.php';;

    $id_barang = $_GET['id_barang'];

    if(isset($_POST['submit'])){
      $kode_barang = $_POST['kode_barang'];
      $id_kategori = $_POST['id_kategori'];
      $nama_barang = $_POST['nama_barang'];
      $harga = $_POST['harga'];
      $stok = $_POST['stok'];
      $aktif = $_POST['aktif'];
      $nama_gambar = $_POST['gambar'];

      if($_FILES['gambar']['name']){
        $lokasi = '../../image/barang/'.$nama_gambar;
        unlink($lokasi);
        $nama_gambar = $_FILES['gambar']['name'];
        $lokasi = '../../image/barang/'.$nama_gambar;
        move_uploaded_file($_FILES['gambar']['tmp_name'], $lokasi);
      }

      $sql = "UPDATE barang SET id_kategori = '$id_kategori', 
                                kode_barang = '$kode_barang',
                                nama_barang = '$nama_barang', 
                                harga = '$harga', 
                                stok = '$stok', 
                                gambar = '$nama_gambar', 
                                aktif = '$aktif' 
                                WHERE id_barang = $id_barang";

      $query = mysqli_query($koneksi, $sql);
      $_SESSION['success'] = 'Barang berhasil diupdate';
      header('Location: index.php');

    }
    $query_kategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE aktif = 1 ORDER BY kategori ASC");
    $query_barang = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = $id_barang");
    $row = mysqli_fetch_assoc($query_barang);

  ?>

<div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Edit Barang</h4>
            </div>
            <div class="card-body">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Kode Barang</label>
                  <input type="text" name="kode_barang" class="form-control" value="<?php echo $row['kode_barang']; ?>">
                </div>

                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" name="nama_barang" class="form-control" value="<?php echo $row['nama_barang']; ?>">
                </div>

                <div class="form-group">
                  <label>Harga</label>
                  <input type="text" name="harga" class="form-control" value="<?php echo $row['harga']; ?>">
                </div>

                <div class="form-group">
                  <label>Stok</label>
                  <input type="text" name="stok" class="form-control" value="<?php echo $row['stok']; ?>">
                </div>

                <div class="form-group">
                  <label>Kategori</label>
                  <select name="id_kategori" class="form-control">
                    <?php while($row_kategori = mysqli_fetch_assoc($query_kategori)) : ?>
                      <?php if($row_kategori['id_kategori'] == $row['id_kategori']) : ?>
                        <option value="<?php echo $row_kategori['id_kategori']; ?>" selected><?php echo $row_kategori['kategori']; ?></option>
                      <?php else : ?>
                        <option value="<?php echo $row_kategori['id_kategori']; ?>"><?php echo $row_kategori['kategori']; ?></option>
                      <?php endif; ?>
                    <?php endwhile; ?>
                  </select>
                </div>

                <label>Gambar</label>
                <div class="row">
                  <input type="hidden" name="gambar" value="<?= $row['gambar']; ?>">
                    <div class="col-md-4">
                      <img src="../../image/barang/<?= $row['gambar']; ?>" class="img-thumbnail">
                    </div>
                    <div class="col-md-8">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        </div>
                        <div class="custom-file">
                          <input type="file" name="gambar" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                      </div>
                    </div>                  
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

                <button type="submit" name="submit" class="btn btn-primary btn-fill btn-sm">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

 <?php require_once "../templates/footer.php"; ?>

